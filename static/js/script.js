window.onload = function(){
	var sidebarHeight = document.getElementById("sidebar");
	sidebarHeight.style.height = document.documentElement.clientHeight + 'px';
	//设置加载按钮
	var btnHeight = document.getElementById("btn-archive");
	var headHeight = document.getElementById("header");
	var contentHeight = document.getElementById("content");
	btnHeight.style.top = headHeight.offsetHeight + contentHeight.offsetHeight + 50 + 'px';
	//设置footer
	var footHeight = document.getElementById("footer");
	var oContent1 = document.getElementById('content1');
	if (oContent1.style.display === "none") {
		footHeight.style.bottom = 0 + 'px';
	}
	else{
		footHeight.style.top = btnHeight.offsetTop + 60 + 'px';
	}
	//登录
	var oLogin = document.getElementById('login');
	oLogin.onclick = loginPage; 
	//显示下拉列表
	var oList = document.getElementById('down-list-btn');
	oList.onclick = downList;
	var oLogout = document.getElementById('log-out');
	oLogout.onclick = logout;
	//导航栏切换
	var oTitle1 = document.getElementById('title1');
	var oTitle2 = document.getElementById('title2');
	// var oContent1 = document.getElementById('content1');
	var oContent2 = document.getElementById('content2');
	oTitle1.onclick = function(){
		this.className = 'active';
		oTitle2.className = '';
		oContent1.style.display = 'block';
		oContent2.style.display = 'none';
	}
	oTitle2.onclick = function(){
		this.className = 'active';
		oTitle1.className = '';
		oContent1.style.display = 'none';
		oContent2.style.display = 'block';
	}
}

function logout(){
	var oLogin = document.getElementById('login');
	var oLoginAfter = document.getElementById('login-after');
	oLogin.style.display = 'block';
	oLoginAfter.style.display = 'none';

}

function downList(){
	var oDown = document.getElementById('down');
	oDown.style.display = 'block';
	this.onclick = hiddenList;
}

function hiddenList(){
	var oDown = document.getElementById('down');
	oDown.style.display = 'none';
	this.onclick = downList;
}

function loginPage(){	
	var oCover = document.getElementById('cover-opacity');
	var oForm = document.getElementById('form-login');
	oCover.style.display = 'block';
	oForm.style.display = 'block';
	//获取可视区高
	var wHeight=document.documentElement.clientHeight;
	var wWidth=document.documentElement.clientWidth;
	//获取页面高
	var sHeight=document.body.scrollHeight;
	oCover.style.height = sHeight + 'px';
	// alert(oForm.offsetHeight);
	oForm.style.top = (wHeight - oForm.offsetHeight)/2 + 'px';
	oForm.style.left = (wWidth - oForm.offsetWidth)/2 + 'px';

	oCover.onclick = function(){
		oCover.style.display = 'none';
		oForm.style.display = 'none';
	}

	var oClose = document.getElementById('close');
	oClose.onclick = function(){
		oCover.style.display = 'none';
		oForm.style.display = 'none';
	}
}