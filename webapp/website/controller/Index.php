<?php
namespace app\website\controller;
use think\Controller;

class Index extends Controller {
	
	public function index (){
		return	$this->fetch();
	}
	
	public function welcom (){
		return	$this->fetch();
	}
	
	public function cate (){
		return	$this->fetch();
	}
	
}