<?php
/**
*
* Event 
* @author yangming
* @since 2016-03-09
* 
*/
namespace Home\Controller;
use Think\Controller;
use Home\Model\EventModel as Event;

class EventController extends BaseController {


    public function index(){

    	$this->display();

    }

    public function getEvent(){
    	$eventModel = new Event();
    	// $citycode = I('get.citycode','','htmlspecialchars');
    	$res = $eventModel->getCityName('010');

    	if($res){
    		$resutls = array("succ"=>1,"city"=>$res);
    		echo json_encode($resutls);
    	}else{
    		$resutls = array("succ"=>0);
    		echo json_encode($resutls);
    	}
    }

    public function getAllEvent(){

    	$eventModel = new Event();
    	$citycode = I('get.citycode','','htmlspecialchars');
    	$res = $eventModel->getEvent($citycode);

    	$resutls = array();
    	if($res){
    		$resutls = array("succ"=>1,"data"=>$res);
    	}else{
    		$resutls = array("succ"=>0);
    	}

    	echo json_encode($resutls);

    }

}