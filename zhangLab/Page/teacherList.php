<div class="container-fluid" style="background-color:lightblue;margin-top:2%;padding-bottom: 2%;padding-top: 2%;">
	<div class="caption" style="margin-top: 1%;">
		<h1 align="center">教师名录</h1>
		<h3 align="center" style="color: #828282;font-family:sans-serif;">本实验室教师目录，可点击姓名查看详细信息</h3>
	</div>
	<?php
		$sql_all_t="SELECT id,tname,researchfiled,rank,degree FROM teacherNew";
		$res=$DB->get_rows_array($sql_all_t);
		?>
		<div class="container">
			<table class="table table-responsive table-hover" style="margin-top: 2%;">
				<thead>
			      <tr>
			        <th>姓名</th>
			        <th>职称</th>
			        <th>学位</th>
			        <th>研究领域</th>
			      </tr>
			    </thead>
			    <tbody>
			    	<?php
			    		foreach($res as $v):
			    		?>
			    		<tr>
					        <td><a href="./member.php?id=<?php echo $v['id'];?>"><?php echo $v['tname'];?></a></td>
					        <td><?php echo $v['rank'];?></td>
					        <td><?php echo $v['degree'];?></td>
					        <td><?php echo $v['researchfiled'];?></td></tr>
					      <tr>
			    		
			    		<?php
			    			endforeach;
			    			?>
			    </tbody>
			</table>
		</div>
</div>