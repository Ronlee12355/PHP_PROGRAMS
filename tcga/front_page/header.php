<!DOCTYPE HTML>
<html xmlns="http://www.w3.org/1999/xhtml">
	<head>
		<meta charset="UTF-8"/>
		<meta name="viewport" content="width=device-width, initial-scale=1.0"/>
		<meta name="renderer" content="webkit">
		<meta http-equiv="X-UA-Compatible" content="IE=edge" />
		<meta http-equiv="X-UA-Compatible" content="IE=9" />
		<link rel="stylesheet" type="text/css" href="/public/js/layer/theme/default/layer.css"/>
		<link rel="stylesheet" href="https://cdn.bootcss.com/font-awesome/4.7.0/css/font-awesome.css">
		<link rel="stylesheet" type="text/css" href="/public/materialize/css/materialize.min.css"/>
		<link rel="stylesheet" type="text/css" href="/public/materialize/iconfont/material-icons.css"/>
		<link rel="stylesheet" type="text/css" href="/public/js/DataTables/DataTables-1.10.16/css/dataTables.bootstrap.min.css"/>
    	<link rel="stylesheet" type="text/css" href="/public/js/DataTables/datatables.min.css"/>
    	<link rel="stylesheet" type="text/css" href="/public/js/DataTables/Buttons-1.5.1/css/buttons.bootstrap.min.css"/>
    	<link rel="stylesheet" type="text/css" href="/public/js/DataTables/Buttons-1.5.1/css/buttons.dataTables.min.css"/>
    	<link rel="stylesheet" type="text/css" href="/public/js/DataTables/Responsive-2.2.1/css/responsive.dataTables.min.css"/>
		<title>TCGA of China Edition</title>
		<!--[if lt IE 9]>
	      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
	      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
	    <![endif]-->
		<style type="text/css">
			body {
			    display: flex;
			    min-height: 100vh;
			    flex-direction: column;
			  }		
			  main {
			    flex: 1 0 auto;
			  }
			  caption{
			  	font-size: 1.3em;
			  	font-weight: 800;
			  	color: red;
			  }
			  
		</style>
	</head>
	<body>
		<header>			
			<nav class="black">
		    <div class="nav-wrapper">
		      <a href="/" class="brand-logo center"><i class="fa fa-database"></i>理性精准用药推荐系统</a>
		      <a href="#" data-activates="mobile-demo" class="button-collapse"><i class="material-icons">menu</i></a>
		      <ul class="right hide-on-med-and-down">
		      	<!--<li><a href="index.php" class="waves-effect waves-light btn orange darken-2">主页</a></li>-->
		        <!--<li><a href="batch.php" class="waves-effect waves-light btn orange darken-2">预测</a></li>-->
		        <!--<li><a href="insert.php" class="waves-effect waves-light btn orange darken-2">信息录入</a></li>-->
		        <li><a class="waves-effect waves-light btn" onclick="toLogout();return false;">退出登录</a></li>
		        <!--<li><a class="dropdown-button white-text" href="#!" data-activates="dropdown2"><?php echo @$_SESSION['user_name'];?><i class="material-icons right">arrow_drop_down</i></a></li>-->
		      </ul>      
		    </div>
		  </nav>
		</header>