<?php
/**
*
* for Login
* @author yangming
* @since 2016-03-01
* 
*/
namespace Home\Controller;
use Think\Controller;
use Home\Model\UserModel as User;

header("Content-Type: text/html; charset=utf-8");
class UserController extends Controller {

    public function login(){

        if(session('name')){
           $this->redirect('/Home/index/index');
        }
    	$this->display();
    }

    public function register(){
    	$this->display();
    }

    public function registerDo(){
    	$email = I('post.email','','htmlspecialchars');
    	$username = I('post.username','','htmlspecialchars');
    	$password = I('post.password','','htmlspecialchars');
    	$c_password = I('post.confirm_password','','htmlspecialchars');
    	$registerM = new User();

    	$res = array();

    	if($email&&$username&&$password&&$c_password){

    		if($password==$c_password){
    			$registerM->register($email,$username,$password);
    			$this->display('User/login');
    		}else{
    			$res['msg'] = "两次密码不一致";
    			$this->redirect('/Home/user/register');
    		}

    	}else{
    		$res['msg'] = "信息不完整，不能注册";
    		$this->redirect('/Home/user/login');
    	}
    }
    /* check email, if register return 1*/
    public function checkEmail(){

    	$registerM = new User();
    	$email = I('get.email','','htmlspecialchars');

    	$res = array();
    	if($email){
    		$checkRes = $registerM->checkEmail($email);
    		if($checkRes){
    			$res['succ'] = 1;
    		}else{
    			$res['succ'] = 0;
    		}
    	}else{
    		$res['succ'] = 0;
    		
    	}

    	echo json_encode($res);
    }

    public function loginDo(){

    	$email = I('post.email','','htmlspecialchars');
    	$password = I('post.password','','htmlspecialchars');
    	$remenber = I('post.remenber','','htmlspecialchars');
        $verify = I('post.verify','','htmlspecialchars');

    	$res = array();

    	$users = new User();
        $verify = self::check_verify($verify);
    	if($email&&$password&&$verify){
    		$stat  = $users->checkLogin($email,$password,$remenber);
    		if($stat){
    			$this->redirect('/Home/index/index');

    		}else{
    			$res['msg'] = '用户名或密码不正确';
    			$this->assign('data',$res);
				$this->display('user/login');
    		}
    		
    	}else{
    		$res['msg'] = '用户名或密码不能为空';
    		$this->assign('data',$res);
    		$this->display('user/login');
    	}
	}

	public function logout(){
		session('name',null);
		$this->redirect('/Home/user/login');
	}

    public function Verify(){

        $config =    array(
            'fontSize'    =>    30,    // 验证码字体大小
            'length'      =>    4,     // 验证码位数
            'useNoise'    =>    false, // 关闭验证码杂点
        );
        $Verify = new \Think\Verify($config);
        $verify = $Verify->entry();

    }


    //test
    // 检测输入的验证码是否正确，$code为用户输入的验证码字符串
    function check_verify($code, $id = ''){
        $verify = new \Think\Verify();
        return $verify->check($code, $id);
    }

}