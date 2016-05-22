<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<title>梦遥的个人博客</title>
	<link rel="icon" type="image/x-icon" href="static/images/icon.png">
	<link rel="stylesheet" type="text/css" href="static/lib/bootstrap-3.3.5-dist/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="static/css/style.css">
	<script type="text/javascript" src="static/js/script.js"></script>
</head>
<body>
<div id="main">

{block name="sidebar"}{/block}
<div id="left-bg">
	<div id="cover"></div>
	<div id="user">
		<div class="user-icon"><img src="static/images/icon.jpg"></div>
		<p>xiaopangzhu</p>
		<p><p id="mycircle"><span class="glyphicon glyphicon-music"></p></a>再不疯狂，我们就老了</p>
	</div>
	<div id="btn-edit">
			<button type="button" class="btn btn-success"><span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>&nbsp;&nbsp;提笔写文章</button>
	</div>
</div>
<div id="header">
	<ul class="nav nav-tabs">
		<li id="title1" class="active"><a href="#">最新</a></li>
		<li id="title2"><a href="#">文章列表</a></li>
		<li>
			<form id="search" action="#" method="post">
				<input type="text" id="search-text" placeholder="输入关键字搜索"></input>
				<span class="glyphicon glyphicon-search"></span>
			</form>
		</li>
	</ul>
</div>
<div id="login">
	<a href="#"><span class="glyphicon glyphicon-log-in"></span>&nbsp;&nbsp;登录</a>
</div>
<div id="cover-opacity"></div>
<div id="form-login">
	<p id="login-header"><span>登录</span><span id="close" class="glyphicon glyphicon-remove-circle close"></span></p>
	<form id="form-input" action="login.php" method="post">
		<input type="text" class="input1" name="username" placeholder="用户名或邮箱"></input><br>
		<input type="password" class="input2" name="pw" placeholder="密码"></input><br>
		<div id="form-middle">
			<input type="checkbox" name="#" checked="checked"><span>下次自动登录</span>&nbsp;&nbsp;|&nbsp;&nbsp;<a href="#">忘记密码</a>
		</div>
		<input type="submit" class="input3" value=""></input>
	</form>
</div>
<div id="content1">
	<div id="content">
		{foreach item=essay from=$essays}	
		<article id="essay">
			<div id="left-image"><a href=""></a></div>
			<div id="article-head">
				<div id="article-host"><a href="#"><strong>xiaopangzhu</strong></a><span>·2016年5月6日</span></div>
				<a class="article-title" href="">{$essay.title}</a>
				<div id="article-meta">
					<a href="">阅读：{$essay.reader}</a><em>·</em>
					<a href="">评论：{3}</a><em>·</em>
					<span>喜欢：{$essay.vote}</span>
				</div>
				<div id="article-content">{$essay.content}</div>
			</div>
			<hr><p></p></hr>
		</article>
		{/foreach}
	</div>
	<div id="btn-archive" class="pad">
		<div class="btn"><button type="button" class="btn btn-info">点击查看更多</button></div>
	</div>
	</script>
</div>
<div id="content2">
	<div class="title">	
		<h3>前端开发</h3>
			<a href="#">html5实战编程</a>
			<a href="#">div+css网页布局</a>
			<a href="#">jQuery基础入门</a>
	</div>
	<div class="title">	
		<h3>mysql数据库使用</h3>
			<a href="#">html5实战编程</a>
			<a href="#">div+css网页布局</a>
			<a href="#">jQuery基础入门</a>
	</div>
	<div class="title">	
		<h3>java后台开发</h3>
			<a href="#">html5实战编程</a>
			<a href="#">div+css网页布局</a>
			<a href="#">jQuery基础入门</a>
	</div>
</div>
<div id="footer">
	<p>
		<a href="#">个人博客系统</a>
		<a href="#">留言</a>
		<a href="#">链接</a>
		<a href="#">关于</a>
	</p>
	<p>
		<span>当前版本： v1.0.0</span><a href="#"> GitHub 仓库</a>
	</p>
</div>

{block name="login_status"}{/block}
</div>
</body>
</html>