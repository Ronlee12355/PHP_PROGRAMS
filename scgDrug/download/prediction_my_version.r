setwd("D:/wamp/www/scgDrug/download")
library(e1071,lib.loc = "D:/R-3.3.1/library")
library(MASS,lib.loc = "D:/R-3.3.1/library")
library(rjson,lib.loc = "D:/R-3.3.1/library")
library(plyr,lib.loc = "D:/R-3.3.1/library")
load("scgdrug.RDATA")
data_train<-read.table(file = "4_1&1_2.txt",sep = "\t")
colnames(data_train)<-c("x1","x2","x3","x4","class")
data_train$class<-factor(data_train$class)

bayes_model<-naiveBayes(class~.,data_train)
svm_model<-svm(class~.,data =data_train,probability=T)
glm_model<-glm(class~.,data = data_train,family = "binomial")


input<-commandArgs(T)
drug_input<-as.character(input[1])
drug_genes<-c()
#drug_genes<-c('UBE2Q1', 'RNF14', 'RNF17', 'RNF10', 'RNF13', 'CCDC109B', 'DUOXA2', 'MZT2A', 'MZT2B', 'ATRX', 'PMM1', 'ASS1', 'NCBP1', 'ZNF709', 'RBM141234')
for (i in 2:length(input)) {
  drug_genes[i-1]<-as.character(input[i])
}
drug_genes_num<-length(intersect(drug_genes,allGeneticTargets))
if(drug_genes_num>0){
  data_input<-c()
  for (i in 1:ncol(disGenes)) {
    dis_cid<-disNames.disGenes[i]
    dis_name<-as.character(cuiToDisname[which(dis_cid==cuiToDisname[,1]),2])
    if(dis_cid %in% disNames.topGenes){
      top_gene<-union(ohnoGenes,topGenes[,which(disNames.topGenes==dis_cid)])
    }else{
      top_gene<-ohnoGenes
    }
    m1=0;m2=0.0;m3=0;m4=0.0
    a<-intersect(disGenes[,i],drug_genes)
    m1<-length(a)
    m2<-m1/drug_genes_num
    m3<-length(intersect(top_gene,a))
    m4<-m3/drug_genes_num
    if(m1!=0){
      tmp<-c(m1,m2,m3,m4,drug_input,dis_name)
      data_input<-rbind(data_input,tmp)
    }
  }
  feature<-data.frame(x1=as.integer(data_input[,1]),x2=as.numeric(data_input[,2]),x3=as.integer(data_input[,3]),x4=as.numeric(data_input[,4]))
  assoDrugDis <- data.frame(drugs=data_input[,5],diseases=data_input[,6])
  nb<-c(predict(bayes_model,feature,type = "raw")[,2])
  svm<-predict(svm_model,feature,probability = T)
  svm<-c(attr(svm,"probabilities")[,1])
  glm<-predict(glm_model,feature,type="response")
  result<-data.frame(assoDrugDis,nb,svm,glm)
  json_result = toJSON(unname(alply(result, 1, identity)))
	cat(json_result)
}else{
  result<-data.frame(drugs=drug, diseases="No diseases related to this drug", bayes = 0.0, glm = 0.0, svm = 0.0)
  json_result = toJSON(unname(alply(result, 1, identity)))
	cat(json_result)
}