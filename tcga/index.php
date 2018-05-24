<?php
	session_start();
	if($_SESSION['user_name'] == '' || !in_array($_SESSION['user_type'],array(0,1,2))){
		header('Location: /Login');
		exit;
	}
	include 'front_page/header.php';
	?>
	<main style="background-color: #f5f2f0;">
		<div>
			<div class="row">
		      <div class="col s5" style="margin-top: 1%;">
		      	<div id="hc" style="height: 600px;"></div>
		      </div>
		      <div class="col s7">
		      	<p style="font-size: 20px;font-style: italic;">获取肺癌患者精准用药数据</p>
		      	<p style="font-size: 30px;font-weight: 800;">关于我们网页服务的简介&nbsp;&nbsp;<span class="red-text" style="font-size: 15px;font-weight: 800;">Version 0.1</span></p>
		      	<div class="row">
			        <div class="col s12">
			          <div class="card blue darken-1">
			            <div class="card-content white-text">
			              <span class="card-title">数据入口概要</span>
			              <br /><br /><br />
			              <div class="container">
			              	<div class="row">
			              	<div class="col s4">
			              		<p>病人总数</p>
			              		<i class="medium material-icons" style="margin-top: 2%;">assignment_ind</i><strong style="font-size: 2em;color: red;">66</strong>
			              	</div>
			              	<div class="col s4">
			              		<p>转录组数据</p>
			              		<i class="medium material-icons" style="margin-top: 2%;">settings_input_composite</i><strong style="font-size: 2em;color: #cddc39;">1000</strong>
			              	</div>
			              	<div class="col s4">
			              		<p>RNA-Seq处理数据</p>
			              		<i class="medium material-icons" style="margin-top: 2%;">view_week</i><strong style="font-size: 2em;color: #ffb74d;">1500</strong>
			              	</div>
			              </div>
			              
			              <div class="row">
			              	<div class="col s4">
			              		<p>病人总数</p>
			              		<i class="medium material-icons" style="margin-top: 2%;">assignment_ind</i><strong style="font-size: 2em;color: red;">66</strong>
			              	</div>
			              	<div class="col s4">
			              		<p>转录组数据</p>
			              		<i class="medium material-icons" style="margin-top: 2%;">settings_input_composite</i><strong style="font-size: 2em;color: #cddc39;">1000</strong>
			              	</div>
			              	<div class="col s4">
			              		<p>RNA-Seq处理数据</p>
			              		<i class="medium material-icons" style="margin-top: 2%;">view_week</i><strong style="font-size: 2em;color: #ffb74d;">1500</strong>
			              	</div>
			              </div>
			              </div>
			            </div>			            
			          </div>
			        </div>
			      </div>
		      </div>		      
		    </div>
		</div>
		
		<div class="container">
			<h4 class="center-align">我们提供的功能</h4>
			<p class="center-align"><span style="font-style: italic;">我们根据不同使用场景设计了四种服务，为医生和数据处理人员提供了友好的界面以及流畅的体验</span></p>
			<div class="divider"></div>
			<br />
			<div class="row">
				<div class="col s3 m3 l3">
					<div class="card medium hoverable">
			            <div class="card-image">
			              <img src="/public/img/dataProcess.jpg">
			              <!--<span class="card-title">个性化推荐用药</span>-->
			            </div>
			            <div class="card-content">
			              <p>上传病人表达谱数据，即可获取针对个人的精准用药推荐</p>
			            </div>
			            <div class="card-action center">
			              <a class="waves-effect waves-light btn" href="/Doctor/batch.php"><i class="fa fa-search fa-fw"></i>获取推荐</a>
			            </div>
			        </div>
				</div>
				<div class="col s3 m3 l3">
					<div class="card medium hoverable">
			            <div class="card-image">
			              <img src="/public/img/doctor.jpg">			              
			            </div>
			            <div class="card-content">
			              <p>上传病人信息数据，为病人个性化用药助力</p>
			            </div>
			            <div class="card-action center">
			              <a class="waves-effect waves-light btn" href="/Doctor/insert.php"><i class="fa fa-edit fa-fw"></i>录入信息</a>
			            </div>
			        </div>
				</div>
				<div class="col s3 m3 l3">
					<div class="card medium hoverable">
			            <div class="card-image">
			              <img src="/public/img/upload.jpg">			              
			            </div>
			            <div class="card-content">
			              <p>下载并获得病人的特定测序信息</p>
			            </div>
			            <div class="card-action center">
			              <a class="waves-effect waves-light btn" href="/Doctor/download.php"><i class="fa fa-download fa-fw"></i>数据下载</a>
			            </div>
			        </div>
				</div>
				
				<div class="col s3 m3 l3">
					<div class="card medium hoverable">
			            <div class="card-image">
			              <img src="/public/img/upload2.jpg">			              
			            </div>
			            <div class="card-content">
			              <p>上传病人已处理的测序信息</p>
			            </div>
			            <div class="card-action center">
			              <a class="waves-effect waves-light btn" href="/Operator/"><i class="fa fa-upload fa-fw"></i>数据上传</a>
			            </div>
			        </div>
				</div>
			</div>
		</div>
		<div class="fixed-action-btn horizontal click-to-toggle">
			<a class="btn-floating btn-large red">
			  <i class="material-icons">menu</i>
			</a>
			<ul>
			  <li><a class="btn-floating red" href="/Doctor/video.php"><i class="fa fa-youtube-play fa-fw"></i></a></li>
			  <li><a class="btn-floating yellow darken-1" onclick="toLogout();return false;"><i class="fa fa-sign-out fa-fw"></i></a></li>			  
			</ul>
		  </div>
	</main>
<?php
	include 'front_page/footer.html';
	?>