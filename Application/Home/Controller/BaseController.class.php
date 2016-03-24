<?php
/**
*
* BaseController
* @author yangming
* @since 2016-03-01
* 
*/
namespace Home\Controller;
use Think\Controller;

class BaseController extends Controller {

    public function _initialize()
	{
		self::checkLogin();
	}

	public function checkLogin(){
		$name = session('name');
		if(!$name){
			$this->redirect('/Home/user/login');
		}
	}

}