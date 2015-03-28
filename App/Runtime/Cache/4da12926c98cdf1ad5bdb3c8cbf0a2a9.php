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
					  <li><a href="#">话题管理</a> <span class="divider">/</span></li>
					  <li class="active">话题列表</li>
				  </ul>
				  
				  <ul class="nav nav-tabs">
					  <li class="active">
						  <a href="#">话题列表</a>
					  </li>
					  <li><a href="#">话题分类</a></li>
					 
				  </ul>
				  
				  <!--table-->
				  <table class='table table-bordered'>
					  <thead>
						  <tr>
							  <th>话题名称</th>
							  <th>话题简介</th>
							  <th>作者</th>
							  <th>分类</th>
							  <th>状态</th>
							  <th>发布时间</th>
							  <th>操作</th>
						  </tr>
					  </thead>
					  <tbody>
						   <?php if(is_array($lists)): $i = 0; $__LIST__ = $lists;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><tr>
							  <td><?php echo ($vo["title"]); ?></td>
							 <td><?php echo ($vo["body"]); ?></td>
							 <td><?php echo ($vo["uname"]["uname"]); ?></td>
							 <td><?php echo ($vo["typename"]); ?></td>
							 <td><?php echo ($vo["status"]); ?></td>
							 <td><?php echo (date("Y-m-d H:i:s",$vo["created_date"])); ?></td>
							 <td><?php echo ($vo["action"]); ?></td>
						  </tr><?php endforeach; endif; else: echo "" ;endif; ?>
					  </tbody>
				  </table>
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