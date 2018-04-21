KindEditor.ready(function(K) {
	window.editor = K.create('.editor', {
		allowFileManager : true,
		langType : 'zh-CN',
		autoHeightMode : true,
		uploadJson: url, 
	});
});