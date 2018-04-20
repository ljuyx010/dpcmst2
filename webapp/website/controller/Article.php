<?php
namespace app\website\controller;
use think\Controller;

class Article extends Controller {
	
	public function index (){
		echo 111;
	}
	
	public function add (){
		return	$this->fetch();
	}
	
}