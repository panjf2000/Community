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
					  <li class="active">新话题</li>
				  </ul>
				  
				  <ul class="nav nav-tabs">
					  <li>
						  <a href="<?php echo U('Admin/topiclist');?>">话题列表</a>
					  </li>
					  <li  class="active"><a href="#">添加新话题</a></li>
					 
				  </ul>
				 
				  
				  <form class="form-horizontal" action='<?php echo U("Admin/doEditTopic");?>' method="post">
					  <fieldset>
						  <div id="legend" class="">
							  <legend class="">编辑话题</legend>
						  </div>
						  <div class="control-group">

							  <!-- Text input-->
							  <label class="control-label" for="input01">话题标题</label>
							  <div class="controls">
								  <input name='title' id='title' type="text" value='<?php echo ($data["title"]); ?>' placeholder="话题标题" class="input-xlarge">
								  <p class="help-block">请输入话题标题</p>
							  </div>
						  </div>



						  <div class="control-group">

							  <!-- Select Basic -->
							  <label class="control-label">话题分类</label>
							  <div class="controls">
								  <select class="input-xlarge" name='type_id' id='type_id'>
									 <?php if(is_array($type)): $i = 0; $__LIST__ = $type;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><option value="<?php echo ($vo["_id"]); ?>" <?php if($data['type_id'] == $vo['_id']){echo "selected";} ?>><?php echo ($vo["title"]); ?></option><?php endforeach; endif; else: echo "" ;endif; ?>
								  </select>
							  </div>

						  </div>

						  <div class="control-group">
							  <label class="control-label">是否可见</label>
							  <div class="controls">
								  <!-- Multiple Radios -->
								  <label class="radio">
									  <input type="radio" value="1" name="status" checked="checked">
									  可见
								  </label>
								  <label class="radio">
									  <input type="radio" value="0" name="status">
									  不可见
								  </label>
							  </div>

						  </div>

						  <div class="control-group">

							  <!-- Text input-->
							  <label class="control-label" for="input01">标签</label>
							  <div class="controls">
								  <input name='tag' id='tag' value='<?php echo ($data["tag"]); ?>'  type="text" placeholder="标签" class="input-xlarge">
								  <p class="help-block">输入标签</p>
							  </div>
						  </div>

						  <div class="control-group">

							  <!-- Textarea -->
							  <label class="control-label">话题内容</label>
							  <div class="controls">
								  <div class="textarea">
									  <textarea name="body" id="body" type="" class="" style='width:80%;height:400px;'><?php echo ($data["body"]); ?></textarea>
								  </div>
							  </div>
						  </div>
						  <input type="hidden" name="post_id" value="<?php echo ($data["_id"]); ?>">
						  <div class="control-group">
							  <label class="control-label">修改</label>

							  <!-- Button -->
							  <div class="controls">
								  <button class="btn btn-success">修改</button>
							  </div>
						  </div>

					  </fieldset>
				  </form>
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