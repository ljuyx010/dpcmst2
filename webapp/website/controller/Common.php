<?php
namespace app\website\controller;
use think\Controller;
use org\Upload;

class Common extends Controller{
	
	public function upload (){
		//dump(input('param.'));die;
		$uproot= 'upload/';
		$upload = new  \org\Upload();// 实例化上传类
		$upload->maxSize   =     3145728 ;// 设置附件上传大小
		$upload->exts      =     array('jpg', 'gif', 'png', 'jpeg');// 设置附件上传类型
		$upload->saveExt  = 'jpg'; //设置保存后缀
		$upload->rootPath  =    './'. $uproot;  // 设置附件上传目录    // 上传文件
		$upload->saveName=time().rand(1111,9999);
		$date=date("Y-m-d",time());//已上传日期为子目录名
		$info   =   $upload->upload();
		if(!$info) {// 上传错误提示错误信息

			$this->error($upload->getError());

		}else{// 上传成功
			//$m=db(images);
			$data['filepath']=ROOT .$uproot.$date.'/'.$upload->saveName.'.'.$upload->saveExt;
			//$result=$m->add($data);
			$file=['id'=>1,'imagepath'=>$data['filepath']];
			echo json_encode($file);

		}
	}
	
}