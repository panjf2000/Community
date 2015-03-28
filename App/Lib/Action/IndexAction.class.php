<?php
// 本类由系统自动生成，仅供测试用途
class IndexAction extends Action {
	
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
	
    public function index(){
//		$_SESSION['mid'] = $_SESSION['mid']['_id'];
		dump($_SESSION);
		
		import('ORG.Util.Page');
		// 总数量
		$counts = $this->mongo_post->count();
		$page = new Page($counts,3);
		// 生成 下一页 上一页等分页代码。。。
		$pages = $page->show();
		// 综合讨论区 显示所有的话题
		$lists = $this->mongo_post->limit($page->firstRow.','.$page->listRows)->order('created_date desc')->select();
		//格式化数据
		foreach($lists as $key=>$val){
			$userinfo = $this->mongo_user->field('uname')->find($val['uid']);
			$categoryinfo = $this->mongo_category->find($val['type_id']);
			$lists[$key]['uname'] = $userinfo;
			$lists[$key]['typename'] = $categoryinfo?$categoryinfo['name']:'未分类';
		
			
		}
//		dump($lists);
		$this->assign('page',$pages);
		$this->assign('lists',$lists);
		
		
		$this->display();//渲染在 App/Tpl/Index/index.html
    }
	// 显示发布话题的界面
	public function addTopic(){
		if($_SESSION['isLogin'] != 1){
			$this->error('请登录后再发布话题！',U('User/login'));
		}
		// 分类 显示分类的数据
		$re = $this->mongo_category->field('name')->select();
//		dump($re);
		$this->assign('typelist',$re);
		$this->display();
	}
	
	// 执行添加新的话题操作
	public function doAddNewTopic(){
		if($_POST['title']){
			$data['title'] = $_POST['title'];
			$data['body'] = $_POST['content'];
			$data['tag'] = array('1','2','3');
			$data['type_id'] = $_POST['type'];
			$data['comment_count'] = 0;
			$data['created_date'] = time();
			$data['hits'] = 0;
			$re = $this->mongo_post->add($data);
			if($re){
				$this->success('发布新话题成功！',U('Index/topic_detail',array('id'=>$re)));
			}else{
				$this->error('发布错误！'.U('Index/index'));
			}
		}
	}
	
	/*
	 * 根据id的不同 显示不同的信息 id：topic id post
	 */
	// 显示话题的详细信息 用户可以浏览和评论 转发
	public function topic_detail(){
		//获取id
		$id =  $_GET['id'];
		if(!$id){
			$this->error('当前话题不存在或者已经被删除！');
		}
		// 查询数据库 判断返回的数据是否正确
		$re = $this->mongo_post->find($id);
//		dump($re);
		if(!$re){
			$this->error('话题已经被删除！');
		}
		//id 进行数据传输的 安全性验证
		// 获取用户信息
		$re['userinfo'] = $this->mongo_user->find($re['uid']);
		// topic 的 分类信息
		$re['typeinfo'] = $this->mongo_category->find($re['type_id']);
//		
//		
		$commentlists = $this->mongo_comment->where(array('post_id'=>$re['_id']))->select();
		foreach($commentlists as $key=>$val){
			$userinfo = $this->mongo_user->find($val['uid']);
			$commentlists[$key]['userinfo'] = $userinfo;
		}
		$this->assign('commentlist',$commentlists);
//		dump($re);
		// 设置首页标题
		$this->assign('site_title',$re['title']."_".C('WEB_NAME'));
		$this->assign('data',$re);
		$this->display();
	}
    
}