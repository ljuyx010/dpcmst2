// 图片上传
function deleteImage(id){
	$.ajax({
		url:'{:url("common/delimg")}',
		type:'get',
		data:{id:id},
		dataType:'json',
		success:function(data){
			if(data==1){
				$('#imageDelete'+id).remove();
				var imagepath=$('input[class=imagepath]');
				if(imagepath.length<4){

					$('#buttonShow').removeAttr("disabled");
				}else{

				}
			}else{
				alert('删除失败');
			}
		}

	})

}

//图片上传
initFileInput("file-0", url);


//初始化fileinput控件（第一次初始化）
function initFileInput(ctrlName, uploadUrl) {
	var control = $('#' + ctrlName);
	control.fileinput({
		language: 'zh', //设置语言
		uploadUrl: uploadUrl, //上传的地址
		allowedFileExtensions : ['jpg', 'png','gif','jpeg'],//接收的文件后缀
		showUpload: true, //是否显示上传按钮
		showCaption: true,//是否显示标题
		showPreview:true,//是否显示文件的预览图。默认值true。
		showRemove:true,//是否显示删除/清空按钮。默认值true。
		browseClass: "btn btn-primary", //按钮样式
		previewFileIcon: "<i class='glyphicon glyphicon-king'></i>",
		maxFileCount: 4,//表示允许同时上传的最大文件个数
		dropZoneEnabled:true,//是否显示拖拽区域

		initialPreviewConfig: 	{
			caption: ctrlName,
			width: '120px',
			url: uploadUrl,
			key: 101,
			success: function() {


			}
		}


	});



}
$("#file-0").on("fileuploaded", function (event, data, previewId, index) {

	var div=$('<div class="input-group " id="imageDelete'+data.response['id']+'" style="margin-top:.5em;margin-right:2em; float:left;"><input type="hidden" name="imagepath[]" class="imagepath" value="'+data.response['id']+'"/><img src="'+data.response['imagepath']+'"; class="img-responsive img-thumbnail" width="150"><a class="close" style="position:absolute; top: 0px; right: 0;background: #ff0000;" title="删除这张图片" onclick="deleteImage('+data.response['id']+')">×</a></div>');
	$('#formimageshow').after(div);
	var imagepath=$('input[class=imagepath]');
	if(imagepath.length>=4){

		$('#buttonShow').attr("disabled","disabled");//禁用上传按钮
		$("#modal-webuploader").fadeIn();//关闭上传
		$("#modal-webuploader").fadeOut('slow');
	}else{

	}



});

KindEditor.ready(function(K) {
	window.editor = K.create('.editor', {
		allowFileManager : true,
		langType : 'zh-CN',
		autoHeightMode : true,
		uploadJson: url, 
	});
});