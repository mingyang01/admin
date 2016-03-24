<?php
/**
*
*
*/

namespace Home\Model;
class UserModel{

	/*
	* Login method
	*/
	public function login($name,$pass){

		if($name&&$pass){
			$pass = md5($pass);
		}

	}

	public function register($email,$name,$pass){

		try {
			$key = mt_rand(3,6);
			$data = array();
			$data['email'] = $email;
			$data['username'] = $name;
			$data['password'] = substr(md5($pass),0,15);
			$userM = M('users');
			$userM->add($data);
			return true;
		} catch (Exception $e) {
			return false;
		}
	}

	public function checkEmail($email){
		if($email){
			$userM = M('users');

			$res = $userM->where(" email = '%s' ",array($email))->select();
			if($res){
				return true;
			}else{
				return false;
			}
		}else{
			return false;
		}

	}

	public function checkLogin($email,$password,$flag){

		if($email&&$password){
			$userM = M('users');
			$password = substr(md5($password), 0,15);

			$res = $userM->where(" email = '%s' and password = '%s' ",array($email,$password))->select();
			if($res){
				session('name',$res[0]['username']);
				return true;
			}else{
				return false;
			}
		}else{
			return false;
		}

	}
}