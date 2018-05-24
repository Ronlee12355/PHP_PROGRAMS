<?php
	session_start();
	if($_SESSION['user_name'] == '' || $_SESSION['user_type'] !== 0){
		header('Location: /');
		exit;
	}
	include str_replace('\\', '/', dirname(__DIR__)).'/front_page/header_inner.php';
	?>
	<main style="background-color: #f5f2f0;">
		<br />
		<br />
		<div>
			<div class="row">
		        <div class="col s7">
		          <div class="card  hoverable">
		            <div class="card-content center-align">
		              <span class="card-title">请输入预测需要的文件</span>
		              <div class="divider"></div>
		              <div class="row">
		              	<form id="lung-cancer">
		              	<div class="container">
		              		<div class="row">
		              			<div class="col s4">
		              				<div class="input-field">
		              					<label style="font-size: 1.5em;color: black;">请输入上传文件类型</label>
		              				</div>
		              			</div>
		              			<div class="col s5 offset-s3">						          
						          <div class="input-field inline">						            
						            <input name="data-type" type="radio" id="test1" value="genechip"/>
      								<label for="test1">Gene-Chip</label>
      								
      								<input name="data-type" type="radio" id="test2" checked="checked" value="rnaseq"/>
      								<label for="test2">RNA-Seq</label>
						            
						          </div>
						        </div>
		              		</div>
		              		
		              		<div class="row">
		              			<div class="col s4">
		              				<div class="input-field">
		              					<label style="font-size: 1.5em;color: black;">是否上传对照文件</label>
		              				</div>
		              			</div>
		              			<div class="col s3 offset-s5">						          
						          <div class="input-field">						            
						          		<div class="switch">
									    <label>
									      否
									      <input type="checkbox" name="ctl">
									      <span class="lever"></span>
									      是
									    </label>
									  </div>			            
						          </div>
						        </div>
		              		</div>
		              		
		              		<br />
		              		<div class="row">
		              			<div class="col s4">
		              				<div class="input-field">
		              					<label style="font-size: 1.5em;color: black;">上传数据文件</label>
		              				</div>
		              			</div>
		              			<div class="col s5 offset-s3">						          
						          <div class="file-field input-field">
								      <div class="btn purple accent-2">
								        <span>文件</span>
								        <input type="file" name="input_file">
								      </div>
								      <div class="file-path-wrapper">
								        <input class="file-path validate" type="text" placeholder="只允许上传TXT文件">
								      </div>
								    </div>
						        </div>
		              		</div>
		              		<div class="divider"></div>
		              		
		              		<div class="row control-row" style="display: none;">
		              			<div class="col s4">
		              				<div class="input-field">
		              					<label style="font-size: 1.5em;color: black;">上传对照文件</label>
		              				</div>
		              			</div>
		              			<div class="col s5 offset-s3">						          
						          <div class="file-field input-field">
								      <div class="btn blue lighten-1">
								        <span>文件</span>
								        <input type="file" name="control_file">
								      </div>
								      <div class="file-path-wrapper">
								        <input class="file-path validate" type="text" placeholder="只允许上传TXT文件">
								      </div>
								    </div>
						        </div>
		              		</div>
		              	</div>		              	
		              </form>
		              </div>
		            </div>
		            <div class="card-action center-align">
		              <button class="btn waves-effect waves-light" type="button" name="action">提交
					    <i class="material-icons right">send</i>
					  </button>
		            </div>
		          </div>
		        </div>
		        <div class="col s5">
		        	<div class="row">
			        <div class="col s12">
			          <div class="card white hoverable">
			            <div class="card-content black-text">
			              <p class="center-align"><span class="card-title">组合药物预测</span></p>
			              <div class="divider"></div>
			              <br />
			              <div class="row">
						    <form class="col s12" id="drug_combina">
						      <div class="row">
						        <div class="input-field col s4">
						          <i class="material-icons prefix">info</i>
						          <input id="icon_d1" type="text" name="drug1">
						          <label for="icon_d1">第一个药物名</label>
						        </div>
						        <div class="input-field col s4">
						          <i class="material-icons prefix">info</i>
						          <input id="icon_d2" type="text" class="validate" name="drug2">
						          <label for="icon_d2">第二个药物名</label>
						        </div>
						        <div class="input-field col s4">
						          <i class="material-icons prefix">info</i>
						          <input id="icon_d3" type="text" class="validate" name="drug3">
						          <label for="icon_d3">第三个药物名</label>
						        </div>
						      </div>
						      <input type="hidden" name="generank" id="generank"/>
						    </form>
						  </div>
			            </div>
			            <div class="card-action">
			              <div class="center-align">
			              	<button class="btn waves-effect waves-light" type="button" name="drug_predict">提交
						    <i class="material-icons right">send</i>
						  </button>
			              </div>
			              <br />
			              <div class="divider"></div>
			              <br />
			              <div class="left-align" style="display: none;" id="p-value">
			              	<p style="font-weight: 800;font-size: 1.1em;">预测组合药物p值(取负log值)为:&nbsp;&nbsp;<span></span></p>	             
			            </div>
			          </div>
			        </div>
			      </div>
		        </div>
		      </div>
		</div>

		<div style="display: none;" class="show-result">
			<div class="row">
				<div class="col s6">
					<table id="app" class="responsive-table center bordered" width="100%" style="table-layout:fixed;">
						<caption class="left-align">批准药物</caption>
				        <thead>
				          <tr>
				              <th width="50%">药物名</th>
				              <th width="50%">p值(取负log对数)</th>				              
				          </tr>
				        </thead>			
				        <tbody></tbody>
			      </table>
				</div>
				<div class="col s6">
					<table id="relocation" class="responsive-table center bordered"  width="100%" style="table-layout:fixed;">
						<caption  class="left-align">重定位药物</caption>
				        <thead>
				          <tr>
				              <th width="50%">药物名</th>
				              <th width="50%">p值(取负log对数)</th>				              
				          </tr>
				        </thead>			
				        <tbody></tbody>
			      </table>
				</div>				
			</div>
			<div class="row">
				<div class="col s6">
					<table id="app-app" class="responsive-table center bordered"  width="100%" style="table-layout:fixed;">
						<caption>批准药物组合</caption>
				        <thead>
				          <tr>
				              <th width="30%">药物名</th>
				              <th width="30%">p值(取负log对数)</th>	
				              <th width="40%">药物互作信息</th>			              
				          </tr>
				        </thead>			
				        <tbody></tbody>
			      </table>
				</div>
				<div class="col s6">
					<table id="app-relocation" class="responsive-table center bordered"  width="100%" style="table-layout:fixed;">
						<caption>批准与重定位药物组合</caption>
				        <thead>
				          <tr>
				              <th width="30%">药物名</th>
				              <th width="30%">p值(取负log对数)</th>
				              <th width="40%">药物互作信息</th>				              
				          </tr>
				        </thead>			
				        <tbody></tbody>
			      </table>
				</div>
			</div>
		</div>
	</main>
	
	
	
<?php
    //D:/wamp/www/tcga
	include str_replace('\\', '/', dirname(__DIR__)).'/front_page/footer.html';
	?>	 