library(e1071);library(pROC);library(MASS);library(rjson);library(plyr)
Argvs = commandArgs(T)
drug = Argvs[1]
drugGeneTmp = c()
for (i in 2:length(Argvs)){
  drugGeneTmp = cbind(drugGeneTmp,toupper(as.character(Argvs[i])))
}

###load data###
load("scgdrug.RDATA")

#drug = "drug1"
#drugGeneTmp = c('UBE2Q1', 'RNF14', 'RNF17', 'RNF10', 'RNF13', 'CCDC109B', 'DUOXA2', 'MZT2A', 'MZT2B', 'ATRX', 'PMM1', 'ASS1', 'NCBP1', 'ZNF709', 'RBM141234')
#drugGeneTmp = c('UBE2Q3331', 'RNF133334', 'RNF333317', 'RNF13330')
#drugGeneTmp = toupper(c('BRCA1' ,'BRCA3','BRCA2','DDl1'))

drugGenes = intersect(drugGeneTmp, allGeneticTargets)

drugGenNum = length(drugGenes)
if(drugGenNum == 0){
  result = data.frame(drugs=drug, diseases="No diseases related to this drug.", bayes = 0.0, glm = 0.0, svm = 0.0)
}else{
  ###prepare features###
  features_tmp = c()
  for (i in 1:ncol(disGenes)){
    disNameCui = disNames.disGenes[i]
    disName = as.character(cuiToDisname[which(cuiToDisname[,1]==disNameCui),2])
    if (disNameCui %in% disNames.topGenes){
      topGenes.new = union(ohnoGenes,topGenes[,which(disNames.topGenes==disNameCui)])
    }else{
          topGenes.new = ohnoGenes
        }
    f1=0;f2=0.0;f3=0;f4=0.0
    f1Genes = intersect(disGenes[,i], drugGenes)
    f1 = length(f1Genes)
    f2 = f1/drugGenNum
    f3 = length(intersect(f1Genes,topGenes.new))
    f4 = f3/drugGenNum
    if (f1 != 0 && f2 != 0){
      tmp = c(f1,f2,f3,f4,drug,disName)
      #tmp = c(f1,f2,f3,f4,drug,disNameCui)
      features_tmp = rbind(features_tmp, tmp)
    }
  }
  
  ###prediction###
  
  features <- data.frame(x1=as.integer(features_tmp[,1]),x2=as.numeric(features_tmp[,2]),x3=as.integer(features_tmp[,3]),x4=as.numeric(features_tmp[,4]))
  assoDrugDis <- data.frame(drugs=features_tmp[,5],diseases=features_tmp[,6])
  
  #baye.mod
  load("models/baye.mod")
  bayes=c(predict(baye.mod,features,type="raw")[,2])
  
  #glm.mod
  load("models/glm.mod")
  glm=predict(glm.mod,features,type="response")
  
  #svm.tmp
  load("models/svm.mod")
  svm=c()
  svm_tmp=predict(svm.tmp,newdata=features,probability=T)
  svm=attr(svm_tmp,"probabilities")[,2]
  
  result = data.frame(assoDrugDis,bayes, glm, svm)
}
json_result = toJSON(unname(alply(result, 1, identity)))
cat(json_result)
