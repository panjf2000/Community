<?php
/*
 * 用户控制器
 */
class UserAction extends Action{
    
    private $username = null;
    
    private $user_id = null;
    
    protected function _initialize(){
        // 初始化需要经常使用的对象方法等
        $this->username = 'beifeng';
        $this->user_id = 1;
    }
    
    public function index(){
        echo "用户控制器执行成功！";
    }
    public function login(){
        $this->display();
    }
	
	public function doLogin(){
		if($_POST['uname']){
			$map['uname'] = $_POST['uname'];
			$map['password'] = md5($_POST['password']);
			$user = new MongoModel('User');
			$re = $user->where($map)->find();
//			dump($re);
			if($re != null){
				//自动登录操作！
				$_SESSION['isLogin'] = 1;
				$_SESSION['mid'] = $re['_id'];
				$_SESSION['userinfo'] = $re['uname'];
				
				$this->success('用户登录成功！！',U('Index/index'));
			}else{
				$this->error('帐号或者密码错误！！！');
			}
		}else{
			$this->error('数据出现问题！');
		}
	}
	
	//新用户注册界面
	public function register(){
		$this->display();
	}
	//
	public function doRegister(){
		if($_POST['uname']){
			// 验证此用户名是否已经注册
			$user = new MongoModel('User');
			$re = $user->where(array('uname'=>$_POST['uname']))->find();
			if($re != null){
				$this->error('当前的用户名已经被注册了！');
				return false;
			}
			//格式化数据 并且存储在user集合中
			$data['uname'] = $_POST['uname'];
			$data['email'] = $_POST['email'];
			$data['password'] = md5($_POST['password']);
			$data['status'] = 0;
			$data['ctime'] = time();
			$data['ip']= get_client_ip();
			
			$re = $user->add($data);
			
			if($re){
				//自动登录操作！
				$_SESSION['isLogin'] = 1;
				$_SESSION['mid'] = $re['_id'];
				$_SESSION['userinfo'] = $data['uname'];
				
				$this->success('注册成功！',U('Index/index'));
			}else{
				$this->error('注册数据出现问题！');
			}
		}else{
			$this->error('注册数据出现问题！');
		}
	}
	// 注销用户的登录
	public function layout(){
		unset($_SESSION['isLogin']);
		unset($_SESSION['mid']);
		unset($_SESSION['userinfo']);
		$this->success('退出成功！',U('Index/index'));
	}
	
	// 头像
	public function changeavater(){
		$user = new MongoModel('User');
		$info = $user->find($_SESSION['mid']);
		$this->assign('info',$info);
		$this->display();
	}
	// 密码
	public function changepwd(){
		$this->display();
	}
	
	public function doChangePwd(){
		if($_POST['oldpwd']){
			//验证码的验证
			if ($_SESSION['verify'] != md5($_POST['verify'])) {
				$this->error('验证码错误！');
			}

			$user = new MongoModel('User');
			$map['_id'] = $_SESSION['mid'];
			$map['password'] = md5($_POST['oldpwd']);
			$re = $user->where($map)->find();
			if(!$re){
				$this->error('请输入正确的密码！');
				return false;
			}
			
			$data['password'] = md5($_POST['newpwd2']);
			
			$re = $user->where(array('_id'=>$_SESSION['mid']))->save($data);
			
			if($re){
				unset($_SESSION['mid']);
				unset($_SESSION['isLogin']);
				unset($_SESSION['userinfo']);
				$this->success('修改成功！',U('User/Login'));
			}else{
				$this->error('error');
			}
//			dump($re);
			
		}else{
			$this->error('error');
		}
	}
	
	// 不上传头像，系统会默认分配给你一张头像
	// 
	
	public function uploadAvatar(){
		if($_FILES){
			import('ORG.Net.UploadFile');
			$upload = new UploadFile(); // 实例化上传类
			$upload->maxSize = 3145728; // 设置附件上传大小
			$upload->allowExts = array('jpg', 'gif', 'png', 'jpeg'); // 设置附件上传类型
			$upload->savePath = './Uploads/'; // 设置附件上传目录
			
			//生成缩略图
			$upload->thumb = true;
			$upload->thumbMaxWidth = "100";
			$upload->thumbMaxHeight = "100";
			
			if (!$upload->upload()) {// 上传错误提示错误信息
				$this->error($upload->getErrorMsg());
			} else {// 上传成功 获取上传文件信息
				$info = $upload->getUploadFileInfo();
				dump($info);
				$user = new MongoModel('User');
				$re = $user->where(array('_id'=>$_SESSION['mid']))->save(array('avater'=>$info[0]['savename']));
			
				if($re){
					$this->success('修改成功！',U('User/changeavater'));
				}else{
					$this->error('upload error');
				}
			}	

		}else{
			$this->error('upload error');
		}
	}
	// 验证码
	public function verify(){
		import('ORG.Util.Image');
		Image::buildImageVerify(4,1,'png',80,30,'verify');
	}

}
?>
