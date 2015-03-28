<?php
// 根据用户登录与否的状态，来取显示不同的效果。in no 
class UserInfoWidget extends Widget{
	public function render($data){
		if(is_array($data)){
			$var = $data;
		}
		//判断用户是否在线 来显示不同的模板
		$mid = $_SESSION['mid'];
		if($mid){
			$var = $this->getUserInfo($mid);
			$tpl = 'userinfo';
		}else{
			$tpl = 'unlogin';
		}
		$content = $this->renderFile($tpl,$var);
		return $content;
	}
	
	private function getName($name){
		return "你的名称：".$name;
	}
	
	
	private function getUserInfo($uid){
		$user = new MongoModel('User');
		return $user->find($uid);
	}
}
?>
