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
            <a class="btn btn-primary">发布新话题</a>
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
                                <li  ><a href="<?php echo U('User/changeavater');?>">头像设置</a></li>
                                <li  class="active"><a href="<?php echo U('User/changepwd');?>">修改密码</a></li>
                            </ul>
                    <div class="content-list">
                       
                        <form class="form-horizontal" action='<?php echo U("User/doChangePwd");?>' method="post">
							<fieldset>
								<input type='hidden' name='pwd_mail_token' value='<?php echo ($_GET["pwd_mail_token"]); ?>'>
								<div class="control-group" style="display:<?php echo ($show_oldpwd); ?>;">

									<!-- Text input-->
									<label class="control-label" for="input01">原密码</label>
									<div class="controls">
										<input type="password" name='oldpwd' id='oldpwd' placeholder="请输入您当前的密码" class="input-xlarge">
										<p class="help-block">原密码</p>
									</div>
								</div>

								<div class="control-group">

									<!-- Text input-->
									<label class="control-label" for="input01">新密码</label>
									<div class="controls">
										<input type="password"  name='newpwd1' id='newpwd1' placeholder="请输入您的新密码" class="input-xlarge">
										<p class="help-block">密码为8-20位开头必须字母的数字和字母组合</p>
									</div>
								</div>

								<div class="control-group">

									<!-- Text input-->
									<label class="control-label" for="input01">再次输入</label>
									<div class="controls">
										<input type="password"  name='newpwd2' id='newpwd2' placeholder="再次输入新密码" class="input-xlarge">
										<p class="help-block">输入确认</p>
									</div>
								</div>
									<div class="control-group">

									<!-- Text input-->
									<label class="control-label" for="input01">验证码</label>
									<div class="controls">
										<img src="__APP__/User/verify" id='verify_img' onclick='checkimg(this)'>
										<script>
											function checkimg(obj){
												//alert(obj);
												obj.src = "__APP__/User/verify/time"+new Date().getTime();
											}
										</script>
										<input type="text"  name='verify'  class="input-xlarge">
										<p class="help-block">输入确认</p>
									</div>
								</div>
								<div class="control-group">
									<label class="control-label">提交</label>

									<!-- Button -->
									<div class="controls">
										<button class="btn btn-success" id='change_pwd_submit'>确认修改</button>
									</div>
								</div>

							</fieldset>
						</form>
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
  </body>
</html>