<?php
$loginedUser = $this->session->userdata('loginedUser');
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml"><head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
  <meta http-equiv="Content-Language" content="zh-CN">
  <title>测试文章2 -  Johnny的博客 - SYSIT个人博客</title>
	<base href="<?php echo site_url(); ?>">
	<link rel="stylesheet" href="assets/css/space2011.css" type="text/css" media="screen">
  <link rel="stylesheet" type="text/css" href="assets/css/jquery.css" media="screen">
	<script src="assets/js/jquery-1.11.3.min.js"></script>

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
	<?php include 'admin_header.php'; ?>
	<div id="OSC_Content"><div class="SpaceChannel">
	<div id="portrait"><a href="#"><img src="images/portrait.gif" alt="Johnny" title="Johnny" class="SmallPortrait" user="154693" align="absmiddle"></a></div>
    <div id="lnks">
		<strong>Johnny的博客</strong>
		<div>
			<a href="#">TA的博客列表</a>&nbsp;|
			<a href="javascript:sendmsg(154693)">发送留言</a>
</span>
		</div>
	</div>
	<div class="clear"></div>
</div>
<div class="Blog">
	

  <div class="BlogTitle">
    <h1><?php echo $row->title?></h1>
    <div class="BlogStat">
					    <span class="admin">
		<em id="p_attention_count">1</em>人收藏此文章，
		<span id="attention_it">
					<a href="javascript:pay_attention(24026,true)">收藏此文章</a>
				</span>
	    </span>
				发表于<?php echo $row->post_date;?> ,
		已有<strong>1</strong>次阅读  
		共<strong><a href="#comments">0</a></strong>个评论
		<strong>1</strong>人收藏此文章
	</div> 
  </div>
  <div class="BlogContent TextContent"><?php echo $row->content?></div>
      <div class="BlogLinks">
	<ul><?php if(isset($prevArticle)){?>
          <li>上篇 <span><?php echo $prevArticle->post_date;?></span>：<a href="admin/get_blog_by_id?id=<?php echo $prevArticle->article_id;?>" class="prev"><?php echo $prevArticle->title;?></a></li>            	</ul>
		  <?php } ?>
		  <?php if(isset($nextArticle)){?>
		  <li>下篇 <span><?php echo $nextArticle->post_date;?></span>：<a href="admin/get_blog_by_id?id=<?php echo $nextArticle->article_id;?>" class="prev"><?php echo $nextArticle->title;?></a></li>
	  		<?php } ?>
	  </div>
    <div class="BlogComments">
    <h2><a name="comments" href="#postform" class="opts">发表评论»</a>共有 0 条网友评论</h2>
			<p class="NoData">尚无网友评论</p>
		<ul id="BlogComments">
			<?php foreach($article_comment as $comment){?>
			<li id='cmt_24027_154693_261665734'>
				<div class='portrait'>
					<a href="#"><img src="assets/images/portrait.gif" align="absmiddle" alt="sw0411" title="sw0411" class="SmallPortrait" user="154693"/></a>
				</div>
				<div class='body'>
					<div class='title'>
						<?php echo $comment->username;?> 发表于<?php echo $comment->post_date;?></div>
					<div class='post'><?php echo $comment->content;?></div>
					<div id='inline_reply_of_24027_154693_261665734' class='inline_reply'></div>
				</div>
				<div class='clear'></div>
			</li>
			<?php }?>
		</ul>
		  </div>  
  <div class="CommentForm">
    <a name="postform"></a>
    <form id="form_comment" action="admin/save_comment" method="POST">
      <textarea id="ta_post_content" name="content" style="width: 450px; height: 100px;"></textarea><br>
	  <input value="发表评论" id="btn_comment" class="SUBMIT" type="submit">
		<input type="hidden" name="id" value="<?php echo $row->article_id;?>">
	  <img id="submiting" style="display: none;" src="images/loading.gif" align="absmiddle">
	  <span id="cmt_tip">文明上网，理性发言</span>
    </form>
	<a href="#" class="more">回到顶部</a>
	<a href="#comments" class="more">回到评论列表</a>
  </div>
  </div>
<div class="BlogMenu"><div class="RecentBlogs SpaceModule">
	<strong>最新博文</strong><ul>
    		<li><a href="#">测试文章2</a></li>
				<li><a href="#">测试文章1</a></li>
			<li class="more"><a href="index.htm">查看所有博文»</a></li>
    </ul>
</div>

<div class="RelatedBlogs SpaceModule">
<strong>相关博文</strong>
<ul>
<li><a href="#">drupal  文章节点表 添加字段 </a></li>
<li><a href="#">软件测试中的43个功能测试点总结</a></li>
<li><a href="#">软件测试理论知识学习</a></li>
<li><a href="#">测试工程师的学习之旅</a></li>
<li><a href="#">ApacheBench 压力测试</a></li>
<li><a href="#">Web自动化测试-实战项目通关版</a></li>
<li><a href="#">给大家介绍下 Topo研发管理系统中对 测试管理 的支持</a></li>
<li><a href="#">awk, c, java 的IO速度测试</a></li>
<li><a href="#">解决基于 Eclipse 的应用程序测试自动化脚本的回放问题</a></li>
<li><a href="#">Ubuntu Server系列各项服务的安装和维护 Apache压力测试</a></li>
<li class="more"><a href="#">搜索更多»</a></li>
</ul>
</div>
</div>
<div class="clear"></div>

<div id="inline_reply_editor" style="display:none;">
<div class="CommentForm">
	<form id="form_inline_comment" action="/xxx" method="POST">
	  <input id="inline_reply_id" name="reply_id" value="" type="hidden">          
      <textarea name="content" style="width: 450px; height: 60px;"></textarea><br>
	  <input value="回复" id="btn_comment" class="SUBMIT" type="submit"> 
	  <input value="关闭" class="SUBMIT" id="btn_close_inline_reply" type="button"> 文明上网，理性发言
    </form>
</div>
</div>
<script type="text/javascript" src="js/blog.htm" defer="defer"></script>
<script type="text/javascript" src="js/brush.js"></script>
<link type="text/css" rel="stylesheet" href="assets/css/shCore.css">
<link type="text/css" rel="stylesheet" href="assets/css/shThemeDefault.css">
<script type="text/javascript"><!--
$(document).ready(function(){
	SyntaxHighlighter.config.clipboardSwf = '/js/syntax-highlighter-2.1.382/scripts/clipboard.swf';
	SyntaxHighlighter.all();
});
//-->
</script>
<script type="text/javascript">
<!--
var posting = false;
function delete_c(nid,uid,cid){
  if(confirm("您确认要删除此篇评论？")){
    var args = "cmt="+cid+"#"+uid+"#"+nid;
    ajax_post("/action/blog/delete_blog_comments?space=154693",args,function(){$("#cmt_"+nid+"_"+uid+"_"+cid).fadeOut();});
  }
}
function delete_blog(blog_id){
if(!confirm("文章删除后无法恢复，请确认是否删除此篇文章？")) return;
ajax_post("/action/blog/delete?id="+blog_id,"",function(html){
	location.href="index.htm";
});
}
function ReplyInline(blog,user,reply){
	$('.inline_reply').empty();
	var div_id = '#inline_reply_of_'+blog+'_'+user+'_'+reply;
	$('#inline_reply_id').val(user+'_'+reply);
	$(div_id).html($('#inline_reply_editor').html());
	$('#txt_focus').focus();
	$('#btn_close_inline_reply').click(function(){
		$(div_id).empty();
	});
	$('#form_inline_comment').ajaxForm({
		dataType: 'json',
    	success: function(json) {
        	if(json.msg){
        		alert(json.msg);
        	}
        	else if(json.id){
    			location.reload();
        	}
    	}
	});
}
//-->
</script>
</div>
	<div class="clear"></div>
	<div id="OSC_Footer">© 唯创网讯</div>
</div>
<script type="text/javascript" src="js/space.htm" defer="defer"></script>
<script type="text/javascript">
<!--
$(document).ready(function() {
	$('a.fancybox').fancybox({titleShow:false});
});

function pay_attention(pid,concern_it){
	alert("必须登录后才能收藏文章");
}
//-->
</script>
</body></html>