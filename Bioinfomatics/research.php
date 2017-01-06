<?php
	include 'page/header.html';
	error_reporting(E_ALL^E_NOTICE);
	$num=$_GET['num'];
	if(!filter_var($num,FILTER_VALIDATE_INT)){
		$num=1;
	}
	?>
	<div class="container-fluid">
			<div class="container">
				<div class="row">
					<?php
						include 'page/slideContent.html';
						?>
					<div class="col-md-9">
						<div class="panel panel-default">							
						    <div class="panel-heading">
						        <strong>研究方向</strong>
						    </div>
						    <div class="panel-body">
						        <ul id="myTab" class="nav nav-tabs">
									<li class="active"><a href="#home1" data-toggle="tab">基因组信息挖掘</a></li>
									<li><a href="#home2" data-toggle="tab">蛋白质序列结构功能分析</a></li>
									<li><a href="#home3" data-toggle="tab">代谢组分析与药物设计</a></li>
									<li><a href="#home4" data-toggle="tab">表型组分析与设计育种</a></li>
									<li><a href="#home5" data-toggle="tab">生物信息技术研发</a></li>
								</ul>
								<div id="myTabContent" class="tab-content">
									<div class="tab-pane fade in active" id="home1">
										<p>该方向的研究内容是建立与动、植物良种繁育相关的生物信息数据库和基因功能注释软件，分离、
											克隆有自主知识产权、有重要经济价值的新基因及重要的基因表达调控元件，发现控制优良性状基因的分子标记，
											为农作物、畜禽和微生物育种提供全面的生物信息学服务。
											</p>
										<img src="img/jiyinzu.jpg"/>	
									</div>
									<div class="tab-pane fade" id="home2">
										<p>该方向的研究内容是整合国内外蛋白质序列、结构、相互作用等信息资源，
											从蛋白质结构和相互作用角度预测动、植物、微生物基因功能，解释其优良性状的分子基础，
											为基于蛋白质改良的分子设计育种提供理论指导。
											</p>
											<img src="img/danbaijiegou.jpg"/>
									</div>
									<div class="tab-pane fade" id="home3">
										<p>该方向的研究内容是解析农业生物中代谢物的产生和消耗途径，探索小分子化合物在动、
											植物发育和抗病过程中的作用，开展小分子功能化合物（包括药物）在农业领域中的应用研究，为我国
											农业的可持续性发展做出贡献。</p>
										<img src="img/daixie.jpg"/>
									</div>
									<div class="tab-pane fade" id="home4">
										<p>该方向的研究内容是针对重要作物开展表型信息获取、显微图像表型特征分析与提取、形态信息三维建模等研究，
											在基因型和表型之间建立定量关联模型，预测表型特征，为设计育种提供理论指导。
										</p>
										<img src="img/protein.jpg"/>
									</div>
									<div class="tab-pane fade" id="home5">
										<p>该方向的研究内容是研发针对基因组、转录组、蛋白质组和代谢组数据分析所使用的各种生物信息学新方法，为其他四个研究方向提供有力的技术支撑。
										</p>
										<img src="img/bioinfo.jpg"/>
									</div>
								</div>
						    </div>
						</div>
					</div>
					<script type="text/javascript">
						$(function(){
							var id=<?php echo $num;?>;							
							$("#myTab li:eq("+(id-1)+") a").tab("show");
						});
					</script>
				</div>
			</div>
		</div>
<?php
	include 'page/footer.html';
	?>