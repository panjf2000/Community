<?php
// 根据用户登录与否的状态，来取显示不同的效果。in no 
class CommentDiggWidget extends Widget{
	public function render($data){
		if(is_array($data)){
			$var = $data;
		}
		// 通过cid和uid查询来看当前的赞模块的状态
		$post_digg = new MongoModel('Post_digg');
		// 查询当前comment有多少赞 uid
		$map['comment_id'] = $data['comment_id'];
		$re = $post_digg->where($map)->count();
		$var['number'] = $re;
		
		// 对于当前数据 你是否已经赞了》
		$map['uid'] = $_SESSION['mid'];
		$re = $post_digg->where($map)->find();
		
		if($re){
			$var['type'] = 0;
		}else{
			$var['type'] = 1;
		}
		
		$content = $this->renderFile("digg",$var);
		return $content;
	}
	
	
}
?>
