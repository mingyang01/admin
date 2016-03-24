<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8" />
		<title>后台登录</title>
		<meta name="viewport" content="width=device-width, initial-scale=1.0" />

		<!-- basic styles -->
		<link href="/Public/assets/css/bootstrap.min.css" rel="stylesheet" />
		<link rel="stylesheet" href="/Public/assets/css/font-awesome.min.css" />
		<script src='/Public/assets/js/jquery-2.0.3.min.js'></script>

		<link rel="stylesheet" href="http://fonts.googleapis.com/css?family=Open+Sans:400,300" />

		<link rel="stylesheet" href="/Public/assets/css/ace.min.css" />
		<link rel="stylesheet" href="/Public/assets/css/ace-rtl.min.css" />
	</head>

	<!-- validate plugin -->
	<script src="http://static.runoob.com/assets/jquery-validation-1.14.0/lib/jquery.js"></script>
	<script src="http://static.runoob.com/assets/jquery-validation-1.14.0/dist/jquery.validate.min.js"></script>
	<script src="http://static.runoob.com/assets/jquery-validation-1.14.0/dist/localization/messages_zh.js"></script>
	<!-- validate end -->
	<style>
		.alert-msg{
			color:red;
			display: none;
			font-size: 12px;
			padding-left: 4px;
		}
	</style>
	<body class="login-layout">
		<div class="main-container">
			<div class="main-content">
				<div class="row">
					<div class="col-sm-10 col-sm-offset-1">
						<div class="login-container">
							<div class="center">
								<h1>
									<i class="icon-leaf green"></i>
									<span class="red">后台</span>
									<span class="white">管理</span>
								</h1>
								<h4 class="blue">&copy; 云</h4>
							</div>

							<div class="space-6"></div>

							<div class="position-relative">

								<form id="registerForm" action="/Home/user/registerDo" method="post">
									<div id="signup-box" class="signup-box visible widget-box no-border">
										<div class="widget-body">
											<div class="widget-main">
												<h4 class="header green lighter bigger">
													<i class="icon-group blue"></i>
													注册新用户
												</h4>

												<div class="space-6"></div>
												<p> 填写用户信息: </p>

												<form>
													<fieldset>
														<label class="block clearfix">
															<span class="block input-icon input-icon-right">
																<input id="email" type="email" name="email" class="form-control" placeholder="输入邮箱地址" required/>
																<i class="icon-envelope"></i>
															</span>
															<span class="alert-msg"></span>
														</label>

														<label class="block clearfix">
															<span class="block input-icon input-icon-right">
																<input type="text" class="form-control" name="username" placeholder="填写用户名" />
																<i class="icon-user"></i>
															</span>
														</label>

														<label class="block clearfix">
															<span class="block input-icon input-icon-right">
																<input type="password" class="form-control" id="password" name="password" placeholder="填写密码" />
																<i class="icon-lock"></i>
															</span>
														</label>

														<label class="block clearfix">
															<span class="block input-icon input-icon-right">
																<input type="password" class="form-control" name="confirm_password" placeholder="密码确认" />
																<i class="icon-retweet"></i>
															</span>
														</label>

														<label class="block">
															<input type="checkbox" class="ace" />
															<span class="lbl">
																我接受
																<a href="#">用户协议</a>
															</span>
														</label>

														<div class="space-24"></div>

														<div class="clearfix">
															<button type="submit" class="width-100 btn btn-sm btn-success">
																注册
																<i class="icon-arrow-right icon-on-right"></i>
															</button>
														</div>
													</fieldset>
												</form>
											</div>

											<div class="toolbar center">
												<a href="/Home/user/login" class="back-to-login-link">
													<i class="icon-arrow-left"></i>
													返回登录
												</a>
											</div>
										</div><!-- /widget-body -->
									</div><!-- /signup-box -->
								</form>
							</div><!-- /position-relative -->
						</div>
					</div><!-- /.col -->
				</div><!-- /.row -->
			</div>
		</div><!-- /.main-container -->

</body>
</html>
<script>
$(function(){
// 在键盘按下并释放及提交后验证提交表单
	$("#registerForm").validate({
	    rules: {
			username: {
				required: true,
				minlength: 2
			},
			password: {
				required: true,
				minlength: 5
			},
			confirm_password: {
				required: true,
				minlength: 5,
				equalTo: "#password"
			},
			email: {
				required: true,
				email: true
			},
	    },
	    messages: {
			username: {
				required: "请输入用户名",
				minlength: "用户名必需由两个字母组成"
			},
			password: {
				required: "请输入密码",
				minlength: "密码长度不能小于 5 个字母"
			},
			confirm_password: {
				required: "请输入密码",
				minlength: "密码长度不能小于 5 个字母",
				equalTo: "两次密码输入不一致"
			},
			email: "请输入一个正确的邮箱",
	    }
	})
})

$('#email').change(function(){
	var url = "/home/user/checkEmail";
	var _this = $(this)
	var params = {email:$(this).val()}
	$.get(url,params,function(data){
		if(data){
			data = JSON.parse(data)
			if(data.succ==1){
				_this.parent().next().show().html('邮箱已经被注册');
			}else{
				_this.parent().next().hide();
			}
		}
	})
})
</script>