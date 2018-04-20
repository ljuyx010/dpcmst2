<?php 
namespace app\index\controller;
use \think\Controller;
use \think\Request;

class index extends Controller {
	
	public function index(){
		$sj=request()->isMobile();
		//dump(db('article'));
		echo $sj;
		//$this->error('错误信息');
	}
	
}