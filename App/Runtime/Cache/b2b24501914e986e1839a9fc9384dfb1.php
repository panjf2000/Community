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
		<div class="span12" style='background:#fff;'>
			<div class='admin_content'>
			<ul class="breadcrumb">
				<li>
					<a href="#">后台管理</a> <span class="divider">/</span>
				</li>
				<li>
					<a href="#">用户管理</a> <span class="divider">/</span>
				</li>
				<li >
					编辑用户
				</li>
			</ul>
			<ul class="nav nav-tabs">
				<li >
					<a href="<?php echo U('Admin/userlist');?>">用户列表</a>
				</li>
				<li >
					<a href="<?php echo U('Admin/user_permission');?>">用户权限</a>
				</li>
				<li class="active">
					<a href="#">编辑用户信息</a>
				</li>
			</ul>
			<div class='btn-group'>
				<a href='<?php echo U("Admin/userlist");?>' class="btn btn-info">返回列表</a>
				</div>
					<form class="form-horizontal" action='<?php echo U("Admin/saveUserinfo");?>' method='post'>
					<fieldset>
						<input type='hidden' value='<?php echo ($userinfo["_id"]); ?>' name='_id'>
						<div class="control-group">

							<!-- Text input-->
							<label class="control-label" for="input01">用户名</label>
							<div class="controls">
								<input type="text" name='uname' value='<?php echo ($userinfo["uname"]); ?>' placeholder="" class="input-xlarge">
								<p class="help-block">用户登录标示</p>
							</div>
						</div>

						<div class="control-group">
							<!-- Search input-->
							<label class="control-label">邮箱</label>
							<div class="controls">
								<input type="text" name="email" id="email" value='<?php echo ($userinfo["email"]); ?>' placeholder="email" class="input-xlarge">
								<p class="help-block">请输入邮箱</p>
							</div>

						</div>



						<div class="control-group">
							<label class="control-label">性别</label>
							<div class="controls">
								<!-- Inline Radios -->
								<label class="radio inline">
									<input type="radio" value="0" name="sex" <?php if($userinfo["sex"] == 0): ?>checked<?php endif; ?>>
									男
								</label>
								<label class="radio inline">
									<input type="radio" value="1" name="sex" <?php if($userinfo["sex"] == 1): ?>checked<?php endif; ?>>
									女
								</label>
							</div>
						</div><div class="control-group">

							<!-- Select Basic -->
							<label class="control-label">状态</label>
							<div class="controls">
								<select class="input-xlarge" name="status">
									<option value="1" <?php if($userinfo["status"] == 1): ?>selected<?php endif; ?>>正常</option>
									<option value="0" <?php if($userinfo["status"] == 0): ?>selected<?php endif; ?>>禁止</option></select>
							</div>

						</div><div class="control-group">

							<!-- Textarea -->
							<label class="control-label">用户描述</label>
							<div class="controls">
								<div class="textarea">
									<textarea type="" class="" name="description"><?php echo ($userinfo["description"]); ?></textarea>
								</div>
							</div>
						</div><div class="control-group">
							<label class="control-label">权限</label>

							<!-- Multiple Checkboxes -->
							<div class="controls">
								<!-- Inline Checkboxes -->
								<?php if(is_array($nodes)): $i = 0; $__LIST__ = $nodes;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><label class="checkbox inline">
										<input type="checkbox" value="<?php echo ($vo["_id"]); ?>" name="permission_node[]" <?php if($vo['open'] == 1): ?>checked<?php endif; ?>>
										<?php echo ($vo["description"]); ?>
									</label><?php endforeach; endif; else: echo "" ;endif; ?>
								
								
							</div>

						</div><div class="control-group">
							<label class="control-label">提交</label>

							<!-- Button -->
							<div class="controls">
								<button class="btn btn-success">添加</button>
							</div>
						</div>

					</fieldset>
				</form>
				</div>
			
		</div>
		
	</div>
</div>
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