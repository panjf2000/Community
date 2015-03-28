<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title><?php echo (($site_title)?($site_title):beifeng); ?></title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="<?php echo (($site_desc)?($site_desc):beifeng); ?>">
    <meta name="author" content="">

    <!-- Le styles -->
    <link href="__PUBLIC__/css/bootstrap.css" rel="stylesheet">
    <style type="text/css">
      body {
        background:url('__PUBLIC__/img/bg.gif');
        padding-top: 0px;
        /*padding-bottom: 40px;*/
      }
    </style>
    <link href="__PUBLIC__/css/bootstrap-responsive.css" rel="stylesheet">
     <link href="__PUBLIC__/css/global.css" rel="stylesheet">
    <!-- HTML5 shim, for IE6-8 support of HTML5 elements -->
    <!--[if lt IE 9]>
      <script src="../assets/js/html5shiv.js"></script>
    <![endif]-->
    
    <!-- Fav and touch icons -->
    <script>
        var _APP_ = "__APP__";
        var _ROOT_ = "__ROOT__";
        var _PUBLIC_ = "__PUBLIC__";
    </script>
    <link rel="apple-touch-icon-precomposed" sizes="144x144" href="../assets/ico/apple-touch-icon-144-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="114x114" href="../assets/ico/apple-touch-icon-114-precomposed.png">
      <link rel="apple-touch-icon-precomposed" sizes="72x72" href="../assets/ico/apple-touch-icon-72-precomposed.png">
                    <link rel="apple-touch-icon-precomposed" href="../assets/ico/apple-touch-icon-57-precomposed.png">
                                   <link rel="shortcut icon" href="../assets/ico/favicon.png">
  </head>

  <body>

  <div class="navbar">
  <div class="navbar-inner">
    <a class="brand" href="#">后台内容管理</a>
    <ul class="nav">
      <li <?php echo ($index); ?>><a href="<?php echo U('Admin/index');?>">首页</a></li>
      <li <?php echo ($topic); ?>><a href="<?php echo U('Admin/topiclist');?>">话题管理</a></li>
      <li><a href="#">评论管理</a></li>
	  <li><a href="#">用户管理</a></li>
    </ul>
  </div>
</div>

    <div class="container">

      <div class="row">
          
          <div class="span12">
			  <div class="content" style="padding:10px;">
				  <ul class="breadcrumb">
					  <li><a href="#">内容管理</a> <span class="divider">/</span></li>
					  <li><a href="#">首页</a> <span class="divider">/</span></li>
					  <li class="active">首页</li>
				  </ul>
				  
				  <ul class="nav nav-tabs">
					  <li class="active">
						  <a href="#">首页</a>
					  </li>
					  <li><a href="#">系统设置</a></li>
					 
				  </ul>
			  </div>
		  </div>
      </div>
        
<!--    <footer>
        <p>&copy; Company 2013</p>
        </footer>-->
    </div>
      <!-- /container end-->
   
     <!--footer-->
      <div class="footer">
          
          <p>&copy; Company 2013</p>
      </div>
      <!--/footer-->
    <!-- Le javascript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="__PUBLIC__/js/jquery.js"></script>
    <script src="__PUBLIC__/js/bootstrap.js"></script>
    <script src="__PUBLIC__/js/dev.main.js"></script>
	<script src="__PUBLIC__/js/checkform.js"></script>
  </body>
</html>