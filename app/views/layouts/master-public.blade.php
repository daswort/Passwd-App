<!DOCTYPE html>
<html lang="en-us">
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">

		<title> {{ Config::get('app.name') }} </title>
		<meta name="description" content="">
		<meta name="author" content="">

		<!-- Use the correct meta names below for your web application
			 Ref: http://davidbcalhoun.com/2010/viewport-metatag 
			 
		<meta name="HandheldFriendly" content="True">
		<meta name="MobileOptimized" content="320">-->
		
		<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
		<link rel="stylesheet" type="text/css" media="screen" href="/assets/stylesheets/backend.css">
		<link rel="stylesheet" type="text/css" media="screen" href="/assets/css/smartadmin-production.css">	
		<link rel="stylesheet" type="text/css" media="screen" href="/assets/css/smartadmin-skins.css">	
		<link rel="stylesheet" type="text/css" media="screen" href="/assets/css/demo.css">

		<!-- FAVICONS -->
		<link rel="shortcut icon" href="img/favicon/favicon.ico" type="image/x-icon">
		<link rel="icon" href="img/favicon/favicon.ico" type="image/x-icon">

		<!-- GOOGLE FONT -->
		<link rel="stylesheet" href="http://fonts.googleapis.com/css?family=Open+Sans:400italic,700italic,300,400,700">

	</head>
	<body id="login" class="animated fadeInDown">
		<!-- possible classes: minified, no-right-panel, fixed-ribbon, fixed-header, fixed-width-->
		<header id="header">
			<!--<span id="logo"></span>-->

			<div id="logo-group">
				<span id="logo"> <img src="img/logo.png" alt="{{ Config::get('app.name') }}"> </span>

				<!-- END AJAX-DROPDOWN -->
			</div>

			<span id="login-header-space"> <span class="hidden-mobile">{{ Lang::get('misc.need_account') }}</span> <a href="/user/register" class="btn btn-danger">{{ Lang::get('misc.create_account') }}</a> </span>

		</header>

		<div id="main" role="main">
			<div id="content" class="container">
				<div class="row">
					@if(Session::has('success'))
						<div class="alert alert-success alert-block">
							<a class="close" data-dismiss="alert" href="#">×</a>
							<h4 class="alert-heading">{{ Lang::get('misc.success_msg') }}</h4>
							{{ Session::get('success') }}
						</div>
					@endif
					<div class="col-xs-12 col-sm-12 col-md-7 col-lg-8 hidden-xs hidden-sm">
						<h1 class="txt-color-red login-header-big">{{ Config::get('app.name') }}</h1>
						<div class="hero">
							<div class="pull-left login-desc-box-l">
								<h4 class="paragraph-header">{{ Lang::get('misc.subtitle') }}</h4>
								<div class="login-app-icons">
									<a href="http://es.wikipedia.org/wiki/Contraseña" target="_blank" class="btn btn-danger btn-sm">{{ Lang::get('misc.about_pass') }}</a>
									<a href="https://github.com/daswort" target="_blank" class="btn btn-danger btn-sm">{{ Lang::get('misc.about_dev') }}</a>
								</div>
							</div>
							<img src="/assets/img/demo/iphoneview.png" class="pull-right display-image" alt="" style="width:210px">
						</div>
						<div class="row">
							<div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
								<h5 class="about-heading">{{ Lang::get('misc.about_title') }}</h5>
								<p>{{ Lang::get('misc.about_text') }}</p>
							</div>
							<div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
								<h5 class="about-heading">{{ Lang::get('misc.info_title') }}</h5>
								<p>{{ Lang::get('misc.info_text') }}</p>
							</div>
						</div>
					</div>
					@yield('content')	
				</div>
			</div>
		</div>

		<!--================================================== -->
		<script type="text/javascript" src="/assets/javascript/backend.js"></script>

		<!-- JS TOUCH : include this plugin for mobile drag / drop touch events 		
		<script src="js/plugin/jquery-touch/jquery.ui.touch-punch.min.js"></script> -->
		
		<!--[if IE 7]>
			<h1>Your browser is out of date, please update your browser by going to www.microsoft.com/download</h1>
		<![endif]-->

		<script type="text/javascript">
			runAllForms();

			$(function() {
				// Validation
				$("#login-form").validate({
					// Rules for form validation
					rules : {
						email : {
							required : true,
							email : true
						},
						password : {
							required : true,
							minlength : 3,
							maxlength : 20
						}
					},

					// Messages for form validation
					messages : {
						email : {
							required : 'Please enter your email address',
							email : 'Please enter a VALID email address'
						},
						password : {
							required : 'Please enter your password'
						}
					},

					// Do not change code below
					errorPlacement : function(error, element) {
						error.insertAfter(element.parent());
					}
				});
			});
		</script>

		<!-- Your GOOGLE ANALYTICS CODE Below -->
		<script type="text/javascript">
		
		  var _gaq = _gaq || [];
		  _gaq.push(['_setAccount', 'UA-43548732-3']);
		  _gaq.push(['_trackPageview']);
		
		  (function() {
		    var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
		    ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
		    var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
		  })();
		
		</script>

	</body>
</html>
<!-- Localized -->