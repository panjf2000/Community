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
        padding-top: 60px;
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

    <div class="navbar navbar-inverse navbar-fixed-top">
      <div class="navbar-inner">
        <div class="container">
          <button type="button" class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="brand" href="#">PHP讨论社</a>
          <div class="nav-collapse collapse">
            <ul class="nav">
              <li class="active"><a href="#">主页</a></li>
              <li><a href="#about">分类板块</a></li>
              <li><a href="#about">社区主页</a></li>
            </ul>
            <form class="navbar-form pull-left">
              <input class="span2" type="text" placeholder="请输入关键字">
              <button type="submit" class="btn btn-info">搜索</button>
            <a href="<?php echo U('Index/addTopic');?>" class="btn btn-primary">发布新话题</a>
            </form>
			  <?php if($_SESSION['isLogin'] != 1){ ?>
              <div class="btn-group pull-right">
                  <a class="btn" href='<?php echo U("User/login");?>'>登录</a>
                  <a class="btn" href='<?php echo U("User/register");?>'>注册</a>
              </div>
			  <?php }else{ ?>
              <div class="btn-group pull-right">
                  <a class="btn"><?php echo ($_SESSION['userinfo']); ?></a>
                  <button class="btn dropdown-toggle" data-toggle="dropdown">
                      <span class="caret"></span>
                  </button>
                  <ul class="dropdown-menu">
                      <li><a>个人主页</a></li>
                      <li><a href='<?php echo U("User/setting");?>'>个人设置</a></li>
                      <li><a>我的话题</a></li>
                      <li><a>我的回复</a></li>
                      <li><a>其他</a></li>
                  </ul>
                 
              </div>
              <div class="pull-right">
                  <a class="btn" href="<?php echo U('User/layout');?>">推出</a>
              </div>
			  <?php } ?>
          </div><!--/.nav-collapse -->
        </div>
      </div>
    </div>

    <div class="container">

      <div class="row">
          <div class="span8">
              <div class="content">
                    <div class="content-header"><h3>修改用户密码</h3>
                    </div>
				  <ul class="nav nav-tabs">
                                <li  ><a href="<?php echo U('User/setting');?>">基本设置</a></li>
                                <li  class="active" ><a href="<?php echo U('User/changeavater');?>">头像设置</a></li>
                                <li ><a href="<?php echo U('User/changepwd');?>">修改密码</a></li>
                            </ul>
                    <div class="content-list">
                       
                      <div class='change_avatar'>
                            <h4>当前头像：</h4>
                            <img src='__ROOT__/Uploads/thumb_<?php echo ($info["avater"]); ?>' class='img-rounded' width='150' height="150">
                            <img src='__ROOT__/Uploads/thumb_<?php echo ($info["avater"]); ?>' class='img-rounded' width='100' height="100">
                            <form id="seticon" action="<?php echo U('User/uploadAvatar');?>" method="post" enctype="multipart/form-data">
                                
                                    <div class="formuitem">
                                            <span>选择:</span>
                                            <input type="file" name="icon" class="inputfile" value="选择图片">
                                    </div>
                                    <div><button class='btn btn-info' id='avatar_sub_btn' >确认</button></div>
                              </form>
                            </div>
                    </div>
                    
              </div>
          </div>
          <div class="span4">
              <div class="content"></div>
          </div>
      </div>
        
<!--    <footer>
        <p>&copy; Company 2013</p>
        </footer>-->
    </div>
      <!-- /container end-->
   
     <!--footer-->
      <div class="footer">
          <p>
              <a>意见反馈</a>|
              <a>关于我们</a>
          </p>
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