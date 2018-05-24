<main style="margin-top: 0.1%">
    <div class="container">
        <h3 class="center">病人表达谱数据下载</h3>
        <p class="center-align"><span style="font-style: italic;">提供病人信息下载和搜索界面</span></p>
        <div class="row">
            <div class="row">
                <form class="col s12" method="get" action="/Doctor/download.php">
                    <div class="row">
                        <div class="input-field col s6">
                            <i class="material-icons prefix">search</i>
                            <input id="p" type="text" class="validate" name="id">
                            <label for="p">请输入样本编号</label>
                        </div>
                        <div class="input-field col s6">
                            <input type="submit" class="btn green"/>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <div style="margin-left: 1%">
        <p>
            <a class="btn red">一共有<?php echo count($res_dl);?>例样本</a>
        </p>

        <table class="responsive-table highlight bordered">
            <thead>
            <tr>
                <th data-field="">存储编号</th>
                <th data-field="">姓名</th>
                <th data-field="">癌症分型</th>
                <th data-field="">是否死亡</th>                
                <th data-field="">数据上传人员</th>
                <th data-field="">数据类型</th>
                <th data-field="">是否公开</th>
                <th data-field="">数据上传时间</th>
                <th data-field="">下载</th>
            </tr>
            </thead>
            <tbody>
				<?php
					foreach ($res_dl as $key => $v) {
						if ($v['control']){
				?>
							<tr>
								<td><?=$v['diagnosis_id']?></td>
								<td><?=$v['username']?></td>
								<td><?=$v['cancer_type']?></td>
								<td><?=$v['died']?></td>
								<td><?=$v['upload_by']?></td>
								<td><?=$v['sample_type']?></td>
								<td><?=$v['access']?></td>
								<td><?=date('Y-m-d H:i:s',$v['create_time'])?></td>
								<td>
									<a class="waves-effect waves-light btn" href="<?=str_replace(str_replace('\\', '/', dirname(dirname(__DIR__))),'',$v['sample'])?>" download="">
										<i class="fa fa-download fa-fw"></i>下载数据</a>
									<a class="waves-effect waves-light btn" href="<?=str_replace(str_replace('\\', '/', dirname(dirname(__DIR__))),'',$v['control'])?>" download="">
										<i class="fa fa-download fa-fw"></i>下载对照</a>
								</td>
							</tr>
				<?php
						}else{
				?>
							<tr>
								<td><?=$v['diagnosis_id']?></td>
								<td><?=$v['username']?></td>
								<td><?=$v['cancer_type']?></td>
								<td><?=$v['died']?></td>
								<td><?=$v['upload_by']?></td>
								<td><?=$v['sample_type']?></td>
								<td><?=$v['access']?></td>
								<td><?=date('Y-m-d H:i:s',$v['create_time'])?></td>
								<td>
									<a class="waves-effect waves-light btn" href="<?=str_replace(str_replace('\\', '/', dirname(dirname(__DIR__))),'',$v['sample'])?>" download="">
										<i class="fa fa-download fa-fw"></i>下载数据</a>
								</td>
							</tr>
				<?php
						}
					}
					?>
            </tbody>
        </table>
    </div>
</main>