<?php
 $loginedUser = $this->session->userdata('loginedUser');
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xml:lang="zh-CN" xmlns="http://www.w3.org/1999/xhtml" lang="zh-CN"><head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
  <meta http-equiv="Content-Language" content="zh-CN">
  <title>Johnny的博客 - SYSIT个人博客</title>
	<base href="<?php echo site_url();?>">
      <link rel="stylesheet" href="assets/css/space2011.css" type="text/css" media="screen">
  <link rel="stylesheet" type="text/css" href="assets/css/jquery.css" media="screen">

  <style type="text/css">
    body,table,input,textarea,select {font-family:Verdana,sans-serif,宋体;}	
  </style>
</head>
<body>
<!--[if IE 8]>
<style>ul.tabnav {padding: 3px 10px 3px 10px;}</style>
<![endif]-->
<!--[if IE 9]>
<style>ul.tabnav {padding: 3px 10px 4px 10px;}</style>
<![endif]-->
<div id="OSC_Screen"><!-- #BeginLibraryItem "/Library/OSC_Banner.lbi" -->
	<?php include'admin_header.php'?>

	<div id="OSC_Content">
<div id="AdminScreen">
    <div id="AdminPath">
        <a href="index_logined.htm">返回我的首页</a>&nbsp;»
    	<span id="AdminTitle">管理首页</span>
    </div>
	<?php include'admin_menu.php'?>

    <div id="AdminContent">
<p style="margin-top:150px;text-align:center;color:#666;">欢迎来到个人空间管理页面，请从左边菜单中选择</p></div>
	<div class="clear"></div>
</div>
<script type="text/javascript">
<!--
$(document).ready(function() {
	$('#AdminTitle').text('管理首页');
});
$('.AutoCommitForm').ajaxForm({
    success: function(html) {
		$('#error_msg').hide();
		if(html.length>0)
			$('#error_msg').html("<span class='error_msg'>"+html+"</span>");
		else
			$('#error_msg').html("<span class='ok_msg'>操作已成功完成</span>")
		$('#error_msg').show("fast");
    }
});
$('.AutoCommitJSONForm').ajaxForm({
	dataType: 'json',
    success: function(json) {
		$('#error_msg').hide();
		if(json.error==0){
			if(json.msg)
				$('#error_msg').html("<span class='ok_msg'>"+json.msg+"</span>");
			else
				$('#error_msg').html("<span class='ok_msg'>操作已成功完成</span>");
		}
		else {
			if(json.msg)
				$('#error_msg').html("<span class='error_msg'>"+json.msg+"</span>");
			else
				$('#error_msg').html("<span class='error_msg'>操作已成功完成</span>");
		}
		$('#error_msg').show("fast");
    }
});
//-->
</script>
</div>
	<div class="clear"></div>
	<div id="OSC_Footer">© 唯创网讯</div>
</div>
<script type="text/javascript" src="assets/js/space.htm" defer="defer"></script>
<script type="text/javascript">
<!--
$(document).ready(function() {
	$('a.fancybox').fancybox({titleShow:false});
});

function pay_attention(pid,concern_it){
	if(concern_it){
		$("#p_attention_count").load("/action/favorite/add?mailnotify=true&type=3&id="+pid);
		$('#attention_it').html('<a href="javascript:pay_attention('+pid+',false)" style="color:#A00;">取消关注</a>');
	}
	else{
		$("#p_attention_count").load("/action/favorite/cancel?type=3&id="+pid);
		$('#attention_it').html('<a href="javascript:pay_attention('+pid+',true)" style="color:#3E62A6;">关注此文章</a>');
	}
}
//-->
</script>
</body></html>