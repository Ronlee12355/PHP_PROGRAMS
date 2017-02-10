<?php
include('./pages/header.html');
?>
<div class="container">
	<div class="page-header">
    <h1>About
        <small>网站细节</small>
    </h1>
	</div>
	<div class="well">
		<p><span style="font-weight: bold;font-size: 1.5em;">数据来源</span>&nbsp;&nbsp;网站数据，包括疾病，疾病靶标，药物，药物靶标以及相关靶标信息全部来自于以下数据库:</p>
		<ul class="list-group" style="background-color: #F5F5F5;">
		    <a href="https://clinicaltrials.gov/" target="_blank"><li class="list-group-item">ClinicalTrials</li></a>
		    <a href="http://dgidb.genome.wustl.edu/" target="_blank"><li class="list-group-item">DGIdb</li></a>
		    <a href="http://bidd.nus.edu.sg/group/cjttd/" target="_blank"><li class="list-group-item">TTD</li></a>
		    <a href="https://www.drugbank.ca/" target="_blank"><li class="list-group-item">DrugBank</li></a>
		    <a href="https://www.ncbi.nlm.nih.gov/clinvar/" target="_blank"><li class="list-group-item">Clinvar</li></a>
		    <a href="http://omim.org/" target="_blank"><li class="list-group-item">OMIM</li></a>
		    <a href="https://geneticassociationdb.nih.gov/" target="_blank"><li class="list-group-item">GAD</li></a>
		    <a href="http://www.orpha.net/consor/cgi-bin/index.php" target="_blank"><li class="list-group-item">Orphanet</li></a>
		    <a href="http://www.regulomedb.org/" target="_blank"><li class="list-group-item">RegulomeDB</li></a>
		</ul>
	</div>
	<div class="well">
		<p><span style="font-weight: bold;font-size: 1.5em;">关于网站</span>&nbsp;&nbsp;包含本网站使用的机器学习方法以及技术实现细节:</p>
		<ul class="list-group">
		    <li class="list-group-item">后台脚本语言：PHP</li>
		    <li class="list-group-item">数据库：MySQL</li>
		    <li class="list-group-item">前端：Bootstrap框架，jQuery以及相关jQuery插件</li>
		    <li class="list-group-item">机器学习实现：R语言(使用R中的caret，e1071，MASS，pROC，rjson数据包)</li>
		    <li class="list-group-item">使用机器学习中的支持向量机(SVM)，朴素贝叶斯(Naive Bayes)，广义线性回归(glm)</li>
		</ul>
	</div>
</div>
<?php
	include('./pages/footer.html');
	?>