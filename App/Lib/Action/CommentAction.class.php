<?php
// 本类由系统自动生成，仅供测试用途
class CommentAction extends Action {
	
	// post
	private $mongo_post = null;
	// category
	private $mongo_category = null;
	
	private $mongo_user = null;
	
	private $mongo_comment = null;
	
	//初始化方法
	protected function _initialize() {
		$this->mongo_post = new MongoModel('Post');
		$this->mongo_category = new MongoModel('Category');
		$this->mongo_user = new MongoModel('User');
		$this->mongo_comment = new MongoModel('Comment');
	}
	
    public function addComment(){
		if($_POST['comment_content']){
//			echo "addComemntok";
			//验证用户是否已经登录
			
			if($_SESSION['isLogin'] != 1){
				echo 0;
				exit();
			}else{
				$data['uid'] = $_SESSION['mid'];
				$data['content'] = $_POST['comment_content'];
				$data['post_id'] = $_POST['post_id'];
				$data['created_date'] =time();
				if($this->mongo_comment->add($data)){
					//post topic 
					
					$this->mongo_post->where(array('_id'=>$data['post_id']))->setInc('comment_count',1);
					echo 1;
					exit();
				}else{
					echo 2;
					exit();
				}
			}
			
		}
	}
}
?>