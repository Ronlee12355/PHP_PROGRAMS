<?php
	include('./pages/header.html');
?>
<div class="container-fluid">
	<div class="container" id="index_head">
		<div class="caption">
			<h1>System Chemical Genetic-Drug&nbsp;<small>predict potential activities of drugs
				<a  data-toggle="tooltip" data-placement="top" title="SCG-Drug"><span class="glyphicon glyphicon-info-sign"></span></a></small>
				</h1>
		</div>
		<ul id="myTab" class="nav nav-tabs" style="margin-top: 2%;">
		    <li class="active">
		        <a href="#drug" data-toggle="tab">Drug</a>
		    </li>
		    <li><a href="#gene" data-toggle="tab">Gene</a></li>
		    <li class="dropdown">
		        <a href="#batch" data-toggle="tab">Batch Prediction</a>
		    </li>
		</ul>
		<div class="load">
			<img src="img/loading.gif"/>
		</div>
		<div id="myTabContent" class="tab-content">
		    <div class="tab-pane fade in active" id="drug">		        
		        <form class="form-horizontal" role="form">
				  <div class="form-group">
				    <label for="drug_pred" class="col-sm-2 control-label">Drug Name</label>
				    <div class="col-sm-10">
				      <div class="input-group">
                    <input type="text" class="form-control" name="drug_pred" id="drug_pred">
                    <span class="input-group-btn drug_button">
                        <button class="btn btn-primary" type="button">search</button>
                    </span>
                	</div>
				    </div>
				  </div>
				  <div class="form-group" style="display: none;margin-top: 1%;" id="drug_info">
					  	<div class="panel panel-primary col-md-offset-1">
					    <div class="panel-heading">
					        <h3 class="panel-title">drug information</h3>
					    </div>
					    <div class="panel-body">
					        <table class="table table-hover">
							  <thead>
							    <tr>
							      <th>Drug name</th>
							      <th>Drug text</th>							     
							    </tr>
							  </thead>
							  <tbody>							
							    <tr>
							      <td><a href=""></a></td>
							      <td></td>						      
							    </tr>
							  </tbody>
							</table>
					    </div>
					    </div>
					</div>
					<div class="form-group" style="display: none;margin-top: 1%;" id="drug_disease_info">
					  	<div class="panel panel-info col-md-offset-1">
					    <div class="panel-heading">
					        <h3 class="panel-title">diseases associated with drug</h3>
					    </div>
					    <div class="panel-body">
					        <table class="table table-hover">
							<thead>
								<tr>
									<th>Disease Name</th>
									<th>Disease descriptor</th>									
									<th>Source</th>
								</tr>
								<tbody></tbody>
							</thead>
						</table>
					    </div>
					    </div>
					</div>
					<div class="form-group" style="display: none;margin-top: 1%;" id="drug_gene_info">
					  	<div class="panel panel-danger col-md-offset-1">
					    <div class="panel-heading">
					        <h3 class="panel-title">genes associated with drug</h3>
					    </div>
					    <div class="panel-body">
					        <table class="table table-hover">
							<thead>
								<tr>
									<th>Gene Name</th>
									<th>Entrez id</th>
									<th>Gene descriptor</th>
									<th>source</th>									
								</tr>
								<tbody></tbody>
							</thead>
						</table>
					    </div>
					    </div>
					</div>
				  <div class="form-group pred_input">
				    <label for="firstname" class="col-sm-2 control-label">Gene Names</label>
				    <div class="col-sm-10">
				      <textarea class="form-control" rows="4" placeholder="Type in gene names, separated by comma.(e.g. SDC3,SDHC)" name="genes_pred"></textarea>
				      <button type="button" class="btn btn-success" style="margin-top: 1%;">Predict</button>
				      <button type="reset" class="btn btn-danger" style="margin-top: 1%;">Reset</button>
				    </div>						    
  				</div>	
  				
  				<div class="form-group" style="display: none;margin-top: 1%;" id="prediction">
					  	<div class="panel panel-info col-md-offset-1">
					    <div class="panel-heading">
					        <h3 class="panel-title">predictions results</h3>
					    </div>
					    <div class="panel-body">
					        <table class="table table-hover">
							<thead>
								<tr>
									<th>DISEASE</th>
									<th>NB</th>
									<th>SVM</th>
									<th>GLM</th>
								</tr>
								<tbody></tbody>
							</thead>
						</table>
					    </div>
					    </div>
					</div>			  				    	    					
				</form>
		    </div>
		        
		    <div class="tab-pane fade" id="gene">
		    	<form class="form-horizontal" role="form">
		        <div class="form-group">
				    <label for="drug_pred" class="col-sm-2 control-label">Gene Name</label>
				    <div class="col-sm-10">
				      <div class="input-group">
                    <input type="text" class="form-control" name="gene" placeholder="Type in a gene name or entrez id" id="gene_search">
                    <span class="input-group-btn">
                        <button class="btn btn-primary" type="button">search</button>
                    </span>
                	</div>
				    </div>
				  </div>
					<div class="form-group" style="display: none;margin-top: 1%;" id="gene_info">
					  	<div class="panel panel-primary col-md-offset-1">
					    <div class="panel-heading">
					        <h3 class="panel-title">gene information</h3>
					    </div>
					    <div class="panel-body">
					        <table class="table table-hover">
							  <thead>
							    <tr>
							      <th>Gene name</th>
							      <th>Gene Entrez id</th>
							      <th>Gene text</th>
							    </tr>
							  </thead>
							  <tbody>							
							    <tr>
							      <td><a href=""></a></td>
							      <td></td>
							      <td></td>
							    </tr>
							  </tbody>
							</table>
					    </div>
					    </div>
					</div>
					<div class="form-group" style="display: none;margin-top: 1%;" id="gene_drug_info">
					  	<div class="panel panel-info col-md-offset-1">
					    <div class="panel-heading">
					        <h3 class="panel-title">drugs associated with gene</h3>
					    </div>
					    <div class="panel-body">
					        <table class="table table-hover">
							<thead>
								<tr>
									<th>Drug Name</th>
									<th>Drug CAS ID</th>
									<th>Drug Descriptor</th>
									<th>Source</th>
								</tr>
								<tbody></tbody>
							</thead>
						</table>
					    </div>
					    </div>
					</div>
					<div class="form-group" style="display: none;margin-top: 1%;" id="gene_disease_info">
					  	<div class="panel panel-danger col-md-offset-1">
					    <div class="panel-heading">
					        <h3 class="panel-title">diseases associated with gene</h3>
					    </div>
					    <div class="panel-body">
					        <table class="table table-hover">
							<thead>
								<tr>
									<th>Disease Name</th>
									<th>Disease descriptor</th>
									<th>source</th>									
								</tr>
								<tbody></tbody>
							</thead>
						</table>
					    </div>
					    </div>
					</div>
				  </form>				  
		    </div>
		    <div class="tab-pane fade" id="batch">
		        <form class="form-horizontal" action="pages/doEmail.php" method="post" enctype="multipart/form-data">
                    <div class="form-group">
                        <label class="col-sm-2 control-label" for="file">Email</label>
                            <div class="col-sm-10">
                                <input type="email" name="email" placeholder="Type in your email address" class="form-control" autocomplete="on">
                            </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-2 control-label" for="file">Upload file</label>
                            <div class="col-sm-10">
								<input type="file" id="inputfile" name="myFile">
								<span style="color: red;">only text file allowed</span>
							</div>
					</div>
				    <div class="form-group">
						<div class="col-sm-offset-2 col-sm-10">
							<input type="submit" class="btn btn-primary" value="Submit">
								<a href="./download/tpl.txt" target="_blank" class="btn btn-success">
									Download a template
								</a>
						</div>
					</div>
				</form>
		    </div>		    
		</div>
	</div>
	<div class="container" id="index_bottom">
		<div class="row">
			<div class="col-md-6">
				<div class="panel panel-danger">
			    <div class="panel-heading">
			        <h3 class="panel-title">数据来源</h3>
			    </div>
			    <div class="panel-body">
			        <p>The database of this website contains 5,716 drugs, 671 diseases and 
			        	16,201 genes derived from several sources that 
			        	cover <a href="">ClinicalTrials</a>, <a href="">DGIdb</a>, <a href="">TTD</a>,<a href="">DrugBank</a>,<a href="">Clinvar</a>, 
			        	<a href="">OMIM</a>....</p>
			        <p><a href="about.php">>>>wanna know more....</a></p>
			    </div>
			</div>	
			</div>
			<div class="col-md-6">
				<div class="panel panel-success">
				    <div class="panel-heading">
				        <h3 class="panel-title">关于网站</h3>
				    </div>
				    <div class="panel-body">
				        <p>This website is built to provide researchers with a tool to predict whether the drug is workable
				        	to centain diseases.For more information about the predicting model and the machine learning R script,click to see
				        </p>
				        <p><a href="about.php">>>>wanna know more....</a></p>
				    </div>
				</div>	
			</div>
		</div>
	</div>
</div>
<?php
	include('./pages/footer.html');
	?>