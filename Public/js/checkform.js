/* 
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
var checkform = {
	Email    : /^\w+([-+.]\w+)*@\w+([-.]\w+)*\.\w+([-.]\w+)*$/,
		Phone    : /^((\(\d{2,3}\))|(\d{3}\-))?(\(0\d{2,3}\)|0\d{2,3}-)?[1-9]\d{6,7}(\-\d{1,4})?$/,
		Mobile   : /^((\(\d{2,3}\))|(\d{3}\-))?13\d{9}$/,
		Url      : /^http:\/\/[A-Za-z0-9]+\.[A-Za-z0-9]+[\/=\?%\-&_~`@[\]\':+!]*([^<>\"\"])*$/,
		Currency : /^\d+(\.\d+)?$/,
		Number   : /^\d+$/,
		Zip      : /^[1-9]\d{5}$/,
		QQ       : /^[1-9]\d{4,8}$/,
		Integer : /^[-\+]?\d+$/,
		Double   : /^[-\+]?\d+(\.\d+)?$/,
		English : /^[A-Za-z]+$/,
		Chinese : /^[\u0391-\uFFE5]+$/,
		Username : /^[a-zA-Z]\w{3,}$/i,
	checkPwd: function(pwd1, pwd2, id1, id2, f) {
		var pwd_val1 = $('#' + pwd1).val();
		var pwd_val2 = $('#' + pwd2).val();
		var r1 =   this.reg(pwd1, id1, f, '密码', '密码为长度为8-18的字符串');
		var r2 =   this.reg(pwd2, id2, f, '密码', '密码为长度为8-18的字符串');

		// 一致性
		if (pwd_val1 != pwd_val2) {
			$('#' + id2).html('<b>两次密码不一致，请重新输入</b>');
			return false;
		}
		// 验证是否通过格式 非空 和 长度的验证	
		if(r1 && r2){
			return true;
		}else{
			return false;
		}
		
	},
		/*非空 长度  和 正则的验证*/
		/*id 要进行验证的表单对象 input type=text username
		 *out_id 你要显示信息的element 元素
		 *f：如何验证的规则 1 2 3 R#Email#4-30 R##3-18
		 *m: 提示信息 4-6
		 */
	
	reg:function(id,out_id,f,name,m){
		var val = $('#'+id).val();
		var r = f.split('#')[0];
		// 非空验证
		if(r){
			if(!val){
				$('#'+out_id).html(name+'不能为空');
				return false;
			}
		}
		// 长度验证
		var len = f.split('#')[2];
		if(len){
			var start_len = len.split('-')[0];
			var end_len = len.split('-')[1];
			if(val.length < start_len || val.length > end_len ){
				$('#'+out_id).html(name+'的长度在4-30之间');
				return false;
			}
		}
		// 格式验证
		var reg = f.split('#')[1];
		if(reg){
			var regs = this[reg];//
			if(!regs.test(val)){
				$('#'+out_id).html(name+'格式错误');
				return false;
			}
		}
		$('#'+out_id).html(name+'格式正确');
		return true;
	}
}


