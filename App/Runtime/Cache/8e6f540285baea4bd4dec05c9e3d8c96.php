<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title>PHP BootStrap模板</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
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
                    <div class="content-header"><h3>用户登录</h3>
                    </div>
                    <div class="content-list">
                       
                      <form class="form-horizontal" id="register_form" method="post" action="<?php echo U('User/doRegister');?>">
    <fieldset>
      
    <div class="control-group">

          <!-- Text input-->
          <label class="control-label" for="input01">账&nbsp;&nbsp;&nbsp;&nbsp;号</label>
          <div class="controls">
              <input type="text" name="uname" placeholder="请输入您的账号名" class="input-xlarge"><span><b>&nbsp;ok!</b></span>
            <p class="help-block">账号会显示为您的常用昵称</p>
          </div>
        </div>
 <div class="control-group">

     <!-- Text input-->
          <label class="control-label" for="input01">邮&nbsp;&nbsp;&nbsp;&nbsp;箱</label>
          <div class="controls">
              <input type="text" id='register_email' name="email" placeholder="请输入您常用的邮箱账号" class="input-xlarge"><span><b>&nbsp;ok!</b></span>
            <p class="help-block" id='register_email_str'>请输入您常用的邮箱账号</p>
          </div>
        </div>

    

    <div class="control-group">

          <!-- Text input-->
          <label class="control-label" for="input01">密&nbsp;&nbsp;&nbsp;&nbsp;码</label>
          <div class="controls">
            <input type="password" name="password" id="register_pwd1" placeholder="请输入您的密码" class="input-xlarge">
            <p class="help-block" id="register_pwd1_str">请输入您的密码</p>
          </div>
        </div>

    <div class="control-group">

          <!-- Text input-->
          <label class="control-label" for="input01">确认密码</label>
          <div class="controls">
            <input type="password" name="password1" id="register_pwd2" placeholder="请再次输入您的密码" class="input-xlarge">
            <p class="help-block" id="register_pwd2_str">确认您的密码安全</p>
          </div>
        </div><div class="control-group">
          <label class="control-label"></label>

          <!-- Button -->
          <div class="controls">
            <a id='register_sub_btn' class="btn btn-info">点我注册</a>
            <a class="btn btn-primary">返回登陆</a>
          </div>
        </div>

    

    </fieldset>
  </form>

                    </div>
                    <div class="content-others">
                        <h4>热门话题</h4>
                        <ul>
                            <li><a>如何搭建linux下面的服务器环境</a></li>
                            <li><a>如何搭建linux下面的服务器环境</a></li>
                            <li><a>如何搭建linux下面的服务器环境</a></li>
                            <li><a>如何搭建linux下面的服务器环境</a></li>
                            <li><a>如何搭建linux下面的服务器环境</a></li>
                            <li><a>如何搭建linux下面的服务器环境</a></li>
                            <li><a>如何搭建linux下面的服务器环境</a></li>
                        </ul>
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