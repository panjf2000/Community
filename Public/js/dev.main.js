/* 
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

// __APP__
// 进行url请求发送的时候 如何确定内容
$(function(){
   $('#test').click(function(){
       alert(_APP_+"/Index/getAjax");
       $.post(_APP_+"/Index/getAjax",{id:1},function(msg){
           $('#showtest').html(msg);
       })
   })
   
   // register
   
   $('#register_sub_btn').click(function(){
	   // 内容的验证
	  var email = checkform.reg('register_email','register_email_str','R#Email#4-30','邮箱','Msg');
	  var pwd = checkform.checkPwd('register_pwd1','register_pwd2','register_pwd1_str','register_pwd2_str',"R##6-18");
	  if(email && pwd){
		  alert(email);
		  alert(pwd);
		  alert('submit ok');
	  }
	   
   })
   
   $('#widgettest').click(function(){
		alert('widget is good!');
		})
		
	//发布新话题 ajax
	
	$('#comment_sub_btn').click(function(){
		var comment_content = $('#comment_content').val();
		var post_id = $('#post_id').val();
		if(!comment_content || !post_id){
			// checkForm reg 进行验证 作业
			alert('评论不能为空，或者数据错误！');
			return false;
		}
		alert(_APP_+"/Comment/addComment");
		// ajax
		$.post(_APP_+"/Comment/addComment",
			{comment_content:comment_content,post_id:post_id},
			function(msg){
				alert(msg)
				if(msg == 0){
					alert('请在登录后进行一个评论的添加');
					return false;
				}
			})
	})
	
	//赞
	$('.digg_btn').click(function(){
		var comment_id = $(this).attr('comment_id');
		var uid = $(this).attr('uid');
		var type = $(this).attr('type');
		var _this = $(this);
		// 判断是赞 还是 取消赞
		if(type){
			$.post(_APP_+'/Digg/addDigg',
			{comment_id:comment_id},
			function(msg){
				if(msg == 1){
					var old_num = _this.parent().find('.show_digg_number').text();
					_this.parent().find('.show_digg_number').html(Number(old_num)+1);
				}
			})
		}else{
			
		}
		// 判断用户是否登录
		
	})
})