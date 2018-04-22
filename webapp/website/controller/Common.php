<?php
namespace app\website\controller;
use think\Controller;
use think\Db;

class Common extends Controller{

	public function upload (){
		$file=request()->file('file_data');
		$rootpath ='./upload/';
		$date=date("Ymd",time());
		$saveName=time().rand(1111,9999);
		$image = \think\Image::open($file);
		$width = $image->width(); // 返回图片的宽度
		$height = $image->height(); // 返回图片的高度
		if($file){
			$info = $file->move($rootpath);
			if($info){
				// 成功上传后 获取上传信息
				$path= $info->getFilename();
				$img['imagepath']= ROOT .'upload/'.$date.'/'.$path;
			}else{
				// 上传失败获取错误信息
				$img['error']=$file->getError();
			}
		}
		if($width>=800||$height>=600){
			$image->thumb($width/2, $height/2)->save($rootpath.$date.'/thumb'.$saveName.'.jpg');
			$img['thumb']= ROOT .'upload/'.$date.'/thumb'.$saveName.'.jpg';
		}else{
			$img['thumb'] = $img['imagepath'];
		}
		//图片添加水印
		//$image->water('./logo.png',\think\Image::WATER_SOUTHEAST)->save($rootpath.$date.'/'.$path); // 图片水印
		//$image->text('水印文字内容','./public/static/Admin/fonts/glyphicons-halflings-regular.ttf',20,'#ffffff')->save($rootpath.$date.'/'.$path); //文字水印
		//$img['id']=Db('images')->insertGetId($img);
		echo json_encode($img);
	}
	
}