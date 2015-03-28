<?php
// 本类由系统自动生成，仅供测试用途
class AdminAction extends Action {
	
	private $mongo_post = null;
	private $mongo_attach = null;
	private $mongo_user = null;
	private $mongo_tag = null;
	private $mongo_category = null;
	private $mongo_permission = null;
	private $mongo_comment = null;
	private $mongo_post_digg = null;
	private $mongo_system = null;
	private $mongo_link = null;
	
	private $limit  = 5;
	
    // 定义初始化函数
	protected function _initialize() {
		// 登录用户验证
		if($_SESSION['isLogin'] != 1){
			$this->assign('jumpUrl',U('User/login'));
			$this->error('请登录后再使用管理系统！');
		}
		$this->mongo_user = new MongoModel('User');
		$this->mongo_attach = new MongoModel('Attach');
		$this->mongo_tag = new MongoModel('Tag');
		$this->mongo_post = new MongoModel('Post');
		$this->mongo_category = new MongoModel('Category');
		$this->mongo_permission = new MongoModel('Permission_node');
		$this->mongo_comment = new MongoModel('Comment');
		$this->mongo_post_digg = new MongoModel('Post_digg');
		$this->mongo_system = new MongoModel('System');
		$this->mongo_link = new MongoModel('Link');
	}
	
    public function index(){
		
		dump($re);
		$this->assign("index",'class="active"');
		$this->display();
	}
	
	public function topiclist(){
		$re = checkPermission("admin", "topic", "后台话题");
		if(!$re){
			$this->error('您没有使用【后台话题】模块的权限',U('Index/index'));
		}
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
		
			// 字符串的截取
			$lists[$key]['body'] = msubstr($val['body'], 0,20);
			// 操作
			$lists[$key]['action'] = "<a href=".U('Admin/delTopic',array('id'=>$val['_id']))." class='btn btn-danger btn-mini'>删除</a>-<a href=".U('Admin/editTopic',array('id'=>$val['_id']))." class='btn btn-primary btn-mini'>编辑</a>";
		}
//		dump($lists);
		$this->assign('page',$pages);
		$this->assign('lists',$lists);
		
		$this->assign("topic",'class="active"');
		$this->display();
	}
	
	// 编辑添加 用户
	public function editUser(){
		if($_GET['id']){
			$userinfo = $this->mongo_user->find($_GET['id']);
		}
		
		$nodes = $this->mongo_permission->select();
		foreach($nodes as $key=>$val){
			
			if(in_array($val['_id'],$userinfo['permission_node'])){
				$nodes[$key]['open'] = 1;
			}
		}
//		dump($nodes);
		$this->assign('nodes',$nodes);
		$this->assign('userinfo',$userinfo);
		$this->assign('userlist',"class='active'");
		$this->display();
	}
	// 删除topic
	/*
	 * 如果减少误删除的几率 或者批量删除该如何操作
	 */
	Public function delTopic(){
		if($_GET['id']){
			// 不要intval 
			$re = $this->mongo_post->delete($_GET['id']);
			if($re){
				$this->success('删除成功！',U('Admin/topiclist'));
			}else{
				$this->error('删除失败！',U('Admin/topiclist'));
			}
		}else{
			$this->error();
		}
	}
	
	//edit 更新 编辑
	public function editTopic(){
		
		// 查询出 id 所指向的信息
		$id = $_GET['id'];
		
		$type = $this->mongo_category->select();
		
		$data = $this->mongo_post->find($id);
		
		// 进行数据操作
		
		
		$this->assign('type',$type);
		$this->assign('data',$data);
		$this->display();
	}

	//
	public function doEditTopic(){
		if($_POST){
			$data['title'] = $_POST['title'];
			$data['body'] = $_POST['body'];
			$data['type_id'] = $_POST['type_id'];
			$data['status'] = $_POST['status'];
			
			$map['_id'] = $_POST['post_id'];

			
			$re = $this->mongo_post->where($map)->save($data);
			
			if($re){
				redirect(U('Admin/topiclist'));
			}
		}
	}
	
	// 执行 保存/编辑 用户信息
	public function saveUserinfo(){
		if($_POST['uname']){
			// 各种验证，比如说对于用户名的验证
			// 对于邮箱的验证和非空验证等
			
			$data['uname'] = $_POST['uname'];
			$data['email'] = $_POST['email'];
			$data['sex'] = $_POST['sex'];
			$data['status'] = $_POST['status'];
			$data['description'] = $_POST['description'];
			$data['permission_node'] = $_POST['permission_node'];
			$id = '';
			if(isset($_POST['_id'])){
				$re = $this->mongo_user->where(array('_id'=>$_POST['_id']))->save($data);
				$id = $re;
			}else{
				$re = $this->add($data);
				$id = $_POST['_id'];
			}
			if($re){
				$this->success('保存成功！',U('Admin/editUser',array('id'=>$_POST['_id'])));
			}else{
				$this->error('数据保存错误！请稍后再试！');
			}
			
		}else{
			$this->error('数据错误！请稍后再试！');
		}
	}
	// 用户管理
	public function userlist(){
		
		import('ORG.Util.Page');
		$limit = $this->limit ? $this->limit : 10;
//		dump($GLOBALS);
		// 数据分页
		$count = $this->mongo_user->count();
		$page = new Page($count, $limit);
		$show = $page->show();


		$re = $this->mongo_user->limit($page->firstRow . ',' . $page->listRows)->order('created_date desc')->select();
		foreach ($re as $key => $val) {
			$re[$key]['sex'] = $val['sex'] == 0?"男":"女";
			$re[$key]['action'] = "<a class='btn btn-danger btn-mini user_del_btn' post_id=".$val['_id']." href='javascript:;'>删除</a>-<a class='btn btn-info btn-mini user_edit_btn' post_id=".$val['_id']." href='".U('Admin/editUser',array('id'=>$val['_id']))."'>编辑</a>";
		}
		$this->assign('userlist',"class='active'");
		$this->assign('page', $show);
		$this->assign('lists', $re);
		$this->display();
	}
    
}