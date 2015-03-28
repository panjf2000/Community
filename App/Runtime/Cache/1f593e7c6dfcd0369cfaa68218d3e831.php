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
<!--主体开始-->
        
        <div class="row">
            
                    <div class="span8" style='background:#fff;'>
                       <div class="content">
                    <div class="content-header"><h3>综合讨论区</h3>
                    </div>
                    <div class="content-list">
                            
                            <form id='topic_form' name="addtopic" action="<?php echo U('Index/doAddNewTopic');?>" method="post">
                            <h4>话题标题</h4>
                            <input type="text" name='title' id='title' value="" style="width:95%;"><span></span>
                            <!--<p>话题标题不能少于xx字</p>-->
                            <h4>话题内容</h4>
							
                            <textarea id="editor_id" name="content" style="width:97%;height:400px;"></textarea>
                            
                            <h4>帖子标签</h4>
                            <div style="position:relative;left:0px;top:0px;"><input type="text" name='tag' id="tag" style="width:95%;">
							<div id="show_tags" style="width:200px;height:auto;position:absolute;border:1px solid #ddd;background:#fff;display: none;">显示内容</div>
                            </div>
							<p>多个标签使用 , 分割，一次最多输入5个。</p>
							<div id='testshow'></div>
                            <h4>板块</h4>
                            <select name='type' id='topic_type'>
                                <option value="0">--请选择--</option>
								<?php if(is_array($typelist)): foreach($typelist as $key=>$vo): ?><option value="<?php echo ($vo["_id"]); ?>"><?php echo ($vo["name"]); ?></option><?php endforeach; endif; ?>
                              
                            </select>
                            <h4>验证码</h4>

							<img src='<?php echo U("Index/verify/");?>'  id="verifyImg" onclick="fleshVerify()"/>
							<script language="JavaScript">
								function fleshVerify(){ 
								   //重载验证码
								   var time = new Date().getTime();
									   document.getElementById('verifyImg').src= '<?php echo U("Index/verify/",array("time"=>'+time+'));?>';
								}
							</script>
							<input type="text" name="verify" id="verify" style="width:100px;">
                            <button href="javascript:;" id="topic_sub_btn" class="btn btn-primary pull-right" style="margin-right: 18px;">发布新话题</button><span></span>
                            </form>
                                <div id="submitinfo" style="display:none;font-size:16px;font-weight: bold;color: red;">请输入正确的话题格式</div>
                                </div>
                            
                        </div>
                    </div>
                    <div class="span4">
                        <div class="content-right">
                  <div class="user_info">
                      <h4>加入我们</h4>
                      <p>如何快速的注册！</p>
                      <a class="btn btn-primary">快速注册</a>
                      <p>如何已经注册，请登录！</p>
                  </div>
              </div>
                    </div>
            </div>
<!--主体结束-->
</div>
<script charset="utf-8" src="__PUBLIC__/kindeditor/kindeditor.js"></script>
<script charset="utf-8" src="__PUBLIC__/kindeditor/lang/zh_CN.js"></script>
<script>
        KindEditor.ready(function(K) {
                window.editor = K.create('#editor_id');
             
        });
        
    
</script>
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