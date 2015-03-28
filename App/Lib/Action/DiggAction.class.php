<?php
// 本类由系统自动生成，仅供测试用途
class DiggAction extends Action {
	
	// post
	private $mongo_post_digg = null;
	// category
	
	
	//初始化方法
	protected function _initialize() {
		$this->mongo_post_digg = new MongoModel('Post_digg');
		
	}
	// +赞 +1
    public function addDigg(){
		if($_POST['comment_id']){
//			echo 1;
			// 登录后才可以赞
//			if($_SESSION['isLogin'] !=1){
//				
//			}
			// add data post_digg
			$data['comment_id'] = $_POST['comment_id'];
			$data['uid'] = $_SESSION['mid'];
			
			$re = $this->mongo_post_digg->add($data);
			if($re){
				echo 1;exit();
			}else{
				echo 2;exit();
			}
		}
	}
}
?>