<?php
include('./pages/header.html');
?>
<div class="container">
	<div class="page-header">
    <h1>Download
        <small>部分源代码下载</small>
    </h1>
	</div>
	<div class="well">
		<p><span style="font-weight: bold;font-size: 1.5em;">文件下载</span>&nbsp;&nbsp;包括R语言机器学习模型,数据库SQL文件等:</p>
		<ul class="list-group" style="background-color: #F5F5F5;">
		    <a href="pages/doDownload.php?filename=download/prediction_my_version.r"><li class="list-group-item">R语言脚本</li></a>
		    <a href="pages/doDownload.php?filename=download/scgdb.sql"><li class="list-group-item">数据库SQL文件</li></a>
		    <a href="pages/doDownload.php?filename=download/4_1&1_2.txt"><li class="list-group-item">机器学习建模样本</li></a>
		    <a href="pages/doDownload.php?filename=download/scgdrug.RDATA"><li class="list-group-item">疾病，靶标，top基因数据</li></a>
		    <a href="pages/doDownload.php?filename=download/bootstrap.zip"><li class="list-group-item">Bootstrap源码</li></a>		 		 
		</ul>
	</div>
</div>
<?php
	include('./pages/footer.html');
	?>