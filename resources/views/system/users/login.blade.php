<!DOCTYPE html>
<!-- 
Template Name: Metronic - Responsive Admin Dashboard Template build with Twitter Bootstrap 3.3.4
Version: 3.9.0
Author: KeenThemes
Website: http://www.keenthemes.com/
Contact: support@keenthemes.com
Follow: www.twitter.com/keenthemes
Like: www.facebook.com/keenthemes
Purchase: http://themeforest.net/item/metronic-responsive-admin-dashboard-template/4021469?ref=keenthemes
License: You must have a valid license purchased only from themeforest(the above link) in order to legally use the theme for your project.
-->
<!--[if IE 8]> <html lang="en" class="ie8 no-js"> <![endif]-->
<!--[if IE 9]> <html lang="en" class="ie9 no-js"> <![endif]-->
<!--[if !IE]><!-->
<html lang="en">
<!--<![endif]-->
<!-- BEGIN HEAD -->
<head>
	<meta charset="utf-8"/>
	<title>{{$pageTitle}}</title>
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta content="width=device-width, initial-scale=1.0" name="viewport"/>
	<meta http-equiv="Content-type" content="text/html; charset=utf-8">
	<meta content="" name="description"/>
	<meta content="" name="author"/>
	<!-- BEGIN GLOBAL MANDATORY STYLES -->
	<link href="http://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700&subset=all" rel="stylesheet" type="text/css"/>
	<link href="{{url('assets/global/plugins/font-awesome/css/font-awesome.min.css')}}" rel="stylesheet" type="text/css"/>
	<link href="{{url('assets/global/plugins/simple-line-icons/simple-line-icons.min.css')}}" rel="stylesheet" type="text/css"/>
	<link href="{{url('assets/global/plugins/bootstrap/css/bootstrap.min.css')}}" rel="stylesheet" type="text/css"/>
	<link href="{{url('assets/global/plugins/uniform/css/uniform.default.css')}}" rel="stylesheet" type="text/css"/>
	<!-- END GLOBAL MANDATORY STYLES -->
	<!-- BEGIN PAGE LEVEL STYLES -->
	<link href="{{url('assets/global/plugins/select2/select2.css')}}" rel="stylesheet" type="text/css"/>
	<link href="{{url('assets/admin/pages/css/login-soft.css')}}" rel="stylesheet" type="text/css"/>
	<!-- END PAGE LEVEL SCRIPTS -->
	<!-- BEGIN THEME STYLES -->
	<link href="{{url('assets/global/css/components.css')}}" id="style_components" rel="stylesheet" type="text/css"/>
	<link href="{{url('assets/global/css/plugins.css')}}" rel="stylesheet" type="text/css"/>
	<link href="{{url('assets/admin/layout/css/layout.css')}}" rel="stylesheet" type="text/css"/>
	<link id="style_color" href="{{url('assets/admin/layout/css/themes/darkblue.css')}}" rel="stylesheet" type="text/css"/>
	<link href="{{url('assets/admin/layout/css/custom.css')}}" rel="stylesheet" type="text/css"/>
	<!-- END THEME STYLES -->
	<!--link rel="shortcut icon" href="favicon.ico"/-->
	<link rel="shortcut icon" href="{{ url('images/LIFESOFT.png')}}" type="image/x-icon">
</head>
<!-- END HEAD -->
<!-- BEGIN BODY -->
<body class="login">
<!-- BEGIN LOGO -->
<div class="logo">
	<a href="">
		<img src="{{ url('images/LIFESOFT.png')}}"  width="250" alt="Công ty TNHH phát triển phần mềm Cuộc Sống"/>
	</a>
</div>
<!-- END LOGO -->
<!-- BEGIN SIDEBAR TOGGLER BUTTON -->
<div class="menu-toggler sidebar-toggler">
</div>
<!-- END SIDEBAR TOGGLER BUTTON -->
<!-- BEGIN LOGIN -->
<div class="content">
	<!-- BEGIN LOGIN FORM -->
		{!! Form::open(['url'=>'/signin','id' => 'form-login', 'class'=>'form-horizontal form-validate']) !!}
		<h3 class="form-title">Login</h3>
		<div class="alert alert-danger display-hide">
			<button class="close" data-close="alert"></button>
			<span>
			Nhập thông tin username và password. </span>
		</div>
		<div class="form-group">
			<!--ie8, ie9 does not support html5 placeholder, so we just show field title for that-->
			<label class="control-label visible-ie8 visible-ie9">Username</label>
			<div class="input-icon">
				<i class="fa fa-user"></i>
				<input class="form-control placeholder-no-fix" type="text" autocomplete="off" placeholder="Username" name="username" autofocus/ >
			</div>
		</div>
		<div class="form-group">
			<label class="control-label visible-ie8 visible-ie9">Password</label>
			<div class="input-icon">
				<i class="fa fa-lock"></i>
				<input class="form-control placeholder-no-fix" type="password" autocomplete="off" placeholder="Password" name="password" id="password"/>
			</div>
		</div>
		<div class="form-actions">
			<button type="submit" class="btn blue pull-right" id="login_button">
				Login <i class="m-icon-swapright m-icon-white"></i>
			</button>
			<br>
		</div>
		{!! Form::close() !!}
		<!--div class="create-account">
			<p>
				Bạn chưa có tài khoản?&nbsp; <a data-target="#dangky-doanhnghiep" data-toggle="modal">
					Đăng ký tài khoản </a>
			</p>
		</div-->
</div>
<!-- END LOGIN -->
<!-- BEGIN COPYRIGHT -->
<div class="copyright">
	2016 &copy; LifeSoft <a href="" >Tiện ích hơn - Hiệu quả hơn</a>
</div>
<!--Modal đăng ký-->
<div id="dangky-doanhnghiep" tabindex="-1" role="dialog" aria-hidden="true" class="modal fade">
	<div class="modal-dialog">
		{!! Form::open(['url'=>'reports/dvlt/BC1','target'=>'_blank' , 'id' => 'frm_BC1', 'class'=>'form-horizontal form-validate']) !!}
		<div class="modal-content">
			<div class="modal-header modal-header-primary">
				<button type="button" data-dismiss="modal" aria-hidden="true"
						class="close">&times;</button>
				<h4 id="modal-header-primary-label" class="modal-title">Doanh nghiệp của bạn cung cấp dịch vụ???</h4>
			</div>
			<div class="modal-body">
				<div class="form-horizontal">
					<div class="form-group">
						<div class="col-md-12" align="center">
							<a class="btn btn-primary" data-toggle="modal" href="{{url('register/dich-vu-luu-tru')}}">
								Dịch vụ lưu trú </a>
							<a class="btn btn-success" data-toggle="modal" href="{{url('register/dich-vu-van-tai')}}">
								Dịch vụ vận tải </a>
						</div>
					</div>

				</div>
			</div>
			<div class="modal-footer">
				<button type="button" data-dismiss="modal" class="btn btn-default">Hủy thao tác</button>
			</div>
			{!! Form::close() !!}
		</div>
	</div>
</div>
<!--end Modol-->


<!-- END COPYRIGHT -->
<!-- BEGIN JAVASCRIPTS(Load javascripts at bottom, this will reduce page load time) -->
<!-- BEGIN CORE PLUGINS -->
<!--[if lt IE 9]>
<script src="{{url('assets/global/plugins/respond.min.js')}}"></script>
<script src="{{url('assets/global/plugins/excanvas.min.js')}}"></script>
<![endif]-->
<script src="{{url('assets/global/plugins/jquery.min.js')}}" type="text/javascript"></script>
<script src="{{url('assets/global/plugins/jquery-migrate.min.js')}}" type="text/javascript"></script>
<script src="{{url('assets/global/plugins/bootstrap/js/bootstrap.min.js')}}" type="text/javascript"></script>
<script src="{{url('assets/global/plugins/jquery.blockui.min.js')}}" type="text/javascript"></script>
<script src="{{url('assets/global/plugins/uniform/jquery.uniform.min.js')}}" type="text/javascript"></script>
<script src="{{url('assets/global/plugins/jquery.cokie.min.js')}}" type="text/javascript"></script>
<!-- END CORE PLUGINS -->
<!-- BEGIN PAGE LEVEL PLUGINS -->
<script src="{{url('assets/global/plugins/jquery-validation/js/jquery.validate.min.js')}}" type="text/javascript"></script>
<script src="{{url('assets/global/plugins/backstretch/jquery.backstretch.min.js')}}" type="text/javascript"></script>
<script type="text/javascript" src="{{url('assets/global/plugins/select2/select2.min.js')}}"></script>
<!-- END PAGE LEVEL PLUGINS -->
<!-- BEGIN PAGE LEVEL SCRIPTS -->
<script src="{{url('assets/global/scripts/metronic.js')}}" type="text/javascript"></script>
<script src="{{url('assets/admin/layout/scripts/layout.js')}}" type="text/javascript"></script>
<script src="{{url('assets/admin/layout/scripts/demo.js')}}" type="text/javascript"></script>
<script src="{{url('assets/admin/pages/scripts/login-soft.js')}}" type="text/javascript"></script>
<!-- END PAGE LEVEL SCRIPTS -->
<script>
	jQuery(document).ready(function() {
		Metronic.init(); // init metronic core components
		Layout.init(); // init current layout
		Login.init();
		Demo.init();
		// init background slide images
		$.backstretch([
					"{{url('assets/admin/pages/media/bg/3.jpg')}}",
					"{{url('assets/admin/pages/media/bg/2.jpg')}}",
					"{{url('assets/admin/pages/media/bg/1.jpg')}}",
					"{{url('assets/admin/pages/media/bg/4.jpg')}}"
				], {
					fade: 1000,
					duration: 8000
				}
		);
	});
</script>
<script>
	$("#password").keydown(function(event){
		if(event.keyCode == 13){
			$("#login_button").click();
		}
	});
</script>
</body>
<!-- END BODY -->
</html>