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
		  <div class='span12'>
                        <ul class="breadcrumb">
                            <li><a href="#">首页</a> <span class="divider">/</span></li>
                            <li><a href="#"><?php echo ($data["typeinfo"]["name"]); ?></a> <span class="divider">/</span></li>
                            <li class="active"><?php echo ($data["title"]); ?></li>
                        </ul>
                    </div>
          <div class="span8">
              <div class="content">
                    <div class="content-header"><h3>详细内容</h3>
                    </div>
                    <div class="content-list">
                       <div class='detail_info'>
                                <h3><?php echo ($data["title"]); ?></h3>
                                <p>作者：<?php echo ($data["userinfo"]["uname"]); ?>，<?php echo (date("Y-m-d",$data["created_date"])); ?>发布，分类：<?php echo ($data["typeinfo"]["name"]); ?>，<?php echo ($data["hits"]); ?>阅读</p>
                                <p>标签：<?php echo ($tag_str); ?>&nbsp;</p>
                            </div>
                            <div class='detail_content'><?php echo ($data["body"]); ?></div>
							
							<div class='detail_comment'>
                                
								<?php if(is_array($commentlist)): foreach($commentlist as $key=>$vo): ?><div class="media">
                                <a class="pull-left" href="#">
                                  <img class="media-object" data-src="holder.js/64x64" alt="64x64" style="width: 64px; height: 64px;" src="__ROOT__/Uploads/<?php echo ($vo["userinfo"]["thumb"]["thumb"]); ?>">
                                </a>
                                <div class="media-body">
                                  <h5 class="media-heading">[1]楼 <a href='<?php echo U("User/index",array("id"=>$vo["userinfo"]["_id"]));?>'><?php echo ($vo["userinfo"]["uname"]); ?></a></h5>
								
                                  <div class="media">
                                    <?php echo ($vo["content"]); ?>
                                  </div>
								  
                                  <div style='width:100%;text-align: right;'>发布于<?php echo (date("Y-m-d H:i:s",$vo["created_date"])); ?> <a href="javascript:;" class="show_textarea_btn" >回复</a>|<?php echo W('CommentDigg',array('comment_id'=>$vo['_id'],'uid'=>$vo['uid']));?></div>
								  <div style="display:none" class="reply_textarea"><textarea style="width:500px;"></textarea>
									  <a href="javascript:;" class="btn btn-primary reply_comment" p_id="<?php echo ($data["_id"]); ?>" mid="<?php echo (session('mid')); ?>" comment_id="<?php echo ($vo["_id"]); ?>" uname="<?php echo ($vo["userinfo"]["uname"]); ?>" uid="<?php echo ($vo["uid"]); ?>">回复</a>
								  </div>
								</div>
                             </div><?php endforeach; endif; ?>
                                <div class='input_area'>
                                    <textarea rows='5' id='comment_content'></textarea>
                                </div>
								<input type='hidden' name='post_id' id='post_id' value='<?php echo ($data["_id"]); ?>'>
                                <div><a href="javascript:;" class='btn btn-info' id='comment_sub_btn' >快速回复</a></div>
								<div id='comment_info'></div>
                            </div>
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