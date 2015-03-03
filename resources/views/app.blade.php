<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>AskMe!</title>

	<link href="/css/app.css" rel="stylesheet">
	<link href="/css/multi-select.css" rel="stylesheet">
	<link href="/css/dropzone.css" rel="stylesheet">
	<link href="/css/slimbox2.css" rel="stylesheet">


	<!-- Fonts -->
	<link href='//fonts.googleapis.com/css?family=Roboto:400,300' rel='stylesheet' type='text/css'>

	<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
	<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
	<!--[if lt IE 9]>
		<script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
		<script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
	<![endif]-->
</head>
<body>
	<style type="text/css">
		.notice{
			position: fixed;
			top: 10%;
			left: 30%;
			width: 40%;
			line-height: 40px;
			text-align: center;
			overflow: auto;
			z-index: 4000;
			color:#fff;
			font-family: MyriadPro,Geneva,Arial,sans-serif;
			font-size:30px;
			padding:10px 10px 10px 10px;
			border-radius: 5px;
		}
		.notice-success{
			background-color: rgba(62,201,179,0.7);
		}
		.notice-fail{
			background-color: rgba(246,81,136,0.7);
		}
	</style>
	@if(Session::has('success'))
	<div id="notice" class="notice notice-success">
        {{ Session::get('success') }}
    </div>
  	@elseif(Session::has('fail'))
    <div id="notice" class="notice notice-fail">
        {{ Session::get('fail') }}
    </div>
	@endif
	<nav class="navbar navbar-default">
		<div class="container-fluid">
			<div class="navbar-header">
				<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
					<span class="sr-only">Toggle Navigation</span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				</button>
				<a class="navbar-brand" href="#">AskMe!</a>
			</div>

			<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
				<ul class="nav navbar-nav">
					<li><a href="/">หน้าแรก</a></li>
					@if (!Auth::guest())
						<li class="dropdown">
							<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">บริการ <span class="caret"></span></a>
							<ul class="dropdown-menu" role="menu">
								<li><a href="/actions/">รายการบริการทั้งหมด</a></li>
							</ul>
						</li>
						<li class="dropdown">
							<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">เอกสาร <span class="caret"></span></a>
							<ul class="dropdown-menu" role="menu">
								<li><a href="/documents/">รายการเอกสารทั้งหมด</a></li>
							</ul>
						</li>
						<li class="dropdown">
							<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">สำนักงานเขต <span class="caret"></span></a>
							<ul class="dropdown-menu" role="menu">
								<li><a href="/places/">แผนที่</a></li>
							</ul>
						</li>
						<li><a href="{{ route('image' )}}">อัพโหลดรูป</a></li>
					@endif
				</ul>

				<ul class="nav navbar-nav navbar-right">
					@if (Auth::guest())
						<li><a href="/auth/login">เข้าสู่ระบบ</a></li>
						<li><a href="/auth/register">สมัครสมาชิก</a></li>
					@else
						<li class="dropdown">
							<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">{{ Auth::user()->name }} <span class="caret"></span></a>
							<ul class="dropdown-menu" role="menu">
								<li><a href="/auth/logout">ออกจากระบบ</a></li>
							</ul>
						</li>
					@endif
				</ul>
			</div>
		</div>
	</nav>

	<!-- Scripts -->
	
	<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
	<script src="//cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.1/js/bootstrap.min.js"></script>
	<script src="/js/jquery.multi-select.js"></script>
	<script src="/js/dropzone.js"></script>
	<script src="/js/jquery.quicksearch.js"></script>
	<script src="/js/slimbox2.js"></script>
	<script type="text/javascript">
		if(document.getElementById("notice")!== null)
	        $('#notice').delay(3000).fadeOut(1000);
	    $(document).ready(function(){
		  $('.alert').fadeOut( 3000 );
	});
	</script>
	@yield('content')

</body>
</html>
