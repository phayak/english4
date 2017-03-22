<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no">
	<meta http-equiv="x-ua-compatible" content="ie=edge">
	<meta name="csrf-token" content="{{ csrf_token() }}">
	<title>English4Speak | เรียนภาษาอังกฤษออนไลน์กับครูชาวต่างชาติ</title>
	<meta content="เรียนภาษาอังกฤษออนไลน์ตัวต่อตัวกับครูชาวต่างชาติ ผ่านโปรแกรม Skype สะดวกสบายมากกว่า เพราะสามารถจัดตารางเรียนและเลือกครูสอนเองได้ด้วยตัวเอง แถมยังไม่ต้องเดินทางออกไปเรียนนอกบ้านให้ลำบาก" name="description" />
	<meta content="เรียนภาษาอังกฤษด้วยตัวเอง,เรียนภาษาอังกฤษ, เรียนภาษาอังกฤษออนไลน์, เรียนภาษาอังกฤษที่ไหนดี, เรียนภาษาอังกฤษที่ไหนดี pantip, เรียนภาษาอังกฤษตัวต่อตัว, ฝึกพูดภาษาอังกฤษ,สอนภาษาอังกฤษ,พูดภาษาอังกฤษ,สอนพูดภาษาอังกฤษ,ฝึกพูดภาษาอังกฤษ,ภาษาอังกฤษออนไลน์, เรียนออนไลน์, เรียนผ่าน skype" name="keywords" />
	<meta name="author" content="ENGLISH4SPEAK CO., LTD.">
	<!-- facebook Meta -->
	<meta property="fb:app_id" content="899935316754525" />
	<meta property="og:url" content="{{url('')}}" />
	<meta property="og:type" content="website" />
	<meta property="og:title" content="ENGLISH4SPEAK CO., LTD." />
	<meta property="og:description" content="เรียนภาษาอังกฤษออนไลน์ตัวต่อตัวกับครูชาวต่างชาติ ผ่านโปรแกรม Skype สะดวกสบายมากกว่า เพราะสามารถจัดตารางเรียนและเลือกครูสอนเองได้ด้วยตัวเอง แถมยังไม่ต้องเดินทางออกไปเรียนนอกบ้านให้ลำบาก" />
	<meta property="og:image" content="{{asset('assets/img/engog.png')}}" />
	<meta property="og:locale" content="th_TH" />

	<link href="img/favicon.144x144.png" rel="apple-touch-icon" type="image/png" sizes="144x144">
	<link href="img/favicon.114x114.png" rel="apple-touch-icon" type="image/png" sizes="114x114">
	<link href="img/favicon.72x72.png" rel="apple-touch-icon" type="image/png" sizes="72x72">
	<link href="img/favicon.57x57.png" rel="apple-touch-icon" type="image/png">
	<link href="{{asset('assets/img/engog.png')}}" type="image/png" sizes="16x16" rel="shortcut icon">

	<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
	<!--[if lt IE 9]>
	<script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
	<script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
	<![endif]-->
	<script>
        window.Laravel = <?php echo json_encode([
            'csrfToken' => csrf_token(),
        ]); ?>
    </script>
    <style type="text/css">
    	@media screen and (min-width: 991px) {
		   .side-menu {
		        display: block;
		   }
		}
		@media screen and (min-width: 991px) {
		   .side-menu {
		        display: none;
		   }
		}
    </style>
    <link rel="stylesheet" href="{{asset('assets/css/bootstrap.min.css')}}" type="text/css">
	@yield('style')
	<link rel="stylesheet" href="{{asset('assets/css/lib/font-awesome/font-awesome.min.css')}}" type="text/css">
    <link rel="stylesheet" href="{{asset('assets/css/main.css')}}" type="text/css">
    <link rel="stylesheet" href="{{asset('assets/css/style.css')}}" type="text/css">
    <link rel="stylesheet" href="{{asset('assets/css/reponsive.css')}}" type="text/css">
    <link rel="stylesheet" href="{{asset('assets/css/animate.css')}}" type="text/css">

</head>
<body class="with-side-menu">
	<header class="site-header">
        <div class="container">
            <a href="{{url('/')}}" class="site-logo">
                <img class="hidden-md-down logo-menu-bar" src="{{asset('assets/img/eng200.png')}}" alt="">
                <img class="hidden-lg-up" src="{{asset('assets/img/logo-2-mob.png')}}" alt="">
            </a>
            <button class="hamburger hamburger--htla">
                <span>toggle menu</span>
            </button>
            <div class="site-header-content">
                <div class="site-header-content-in">
                	<a href="{{url('/aboutus')}}" class="menu-top">เกี่ยวกับเรา</a>
                	<a href="{{url('/teacher')}}" class="menu-top">ครูของเรา</a>
                	<a href="{{url('/course')}}" class="menu-top">หลักสูตร</a>
                	<a href="{{url('/package')}}" class="menu-top">แพ็คเกจ</a>
                	<a href="{{url('/club')}}" class="menu-top">English4Speak Club</a>

                    <div class="site-header-shown">
                    	@if (Auth::guest())
                       	<a href="{{url('/login')}}" class="menu-top">เข้าสู่ระบบ</a>
                        <a href="{{url('/register')}}" class="menu-top">เรียนฟรี</a>
                        @else
                        <a href="{{url('/profile')}}" class="menu-top">  {{ Auth::user()->name }} ||</a>
                        <a href="{{ url('/logout') }}"><i class="fa fa-btn fa-sign-out"></i>ออกจากระบบ</a>
                        
                        @endif
                        <!-- <div class="dropdown user-menu">
                            <button class="dropdown-toggle" id="dd-user-menu" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <img src="{{asset('assets/img/avatar-2-64.png')}}" alt="">
                            </button>
                            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dd-user-menu">
                                <a class="dropdown-item" href="#"><span class="font-icon glyphicon glyphicon-user"></span>Profile</a>
                                <a class="dropdown-item" href="#"><span class="font-icon glyphicon glyphicon-cog"></span>Settings</a>
                                <a class="dropdown-item" href="#"><span class="font-icon glyphicon glyphicon-question-sign"></span>Help</a>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="#"><span class="font-icon glyphicon glyphicon-log-out"></span>Logout</a>
                            </div>
                        </div> -->

                        <button type="button" class="burger-right">
                            <i class="font-icon-menu-addl"></i>
                        </button>
                    </div><!--.site-header-shown-->

                    
                    
                </div><!--site-header-content-in-->
            </div><!--.site-header-content-->
        </div><!--.container-fluid-->
    </header><!--.site-header-->
    <br><br><br>
	@yield('content')
	<br>
	<div class="bg-top-footer"></div>
	<div class="navbar navbar-bottom bg-footer">
		<div class="container" style="margin-top:30px;">
			<div class="row">
				<div class="col-md-5 footer-dash">
					<div class="col-md-6">
						<center><img src="{{asset('assets/img/logofooter.png')}}" alt=""></center>
					</div>
					<div class="col-md-6" style="line-height: 30px;">
						<div class="f18"><a href="{{url('aboutus')}}">เกี่ยวกับเรา</a></div>
						<div class="f18"><a href="{{url('teacher')}}">ครูของเรา</a></div>
						<div class="f18"><a href="{{url('course')}}">หลักสูตร</a></div>
						<div class="f18"><a href="{{url('package')}}"></a>แพ็คเกจ</div>
						<div class="f18"><a href="{{url('club')}}"></a>English4Speak Club</div>
						<div style="margin-top:15px; margin-left:-5px;">
						<a class="dropdown-toggle f19 change-language-footer" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false"><i class="fa fa-globe" aria-hidden="true"></i> ถาษาไทย <span class="caret"></span></a>
						    <ul class="dropdown-menu">
						      <li>ภาษาไทย</li>
						      <li>ENGLISH</li>
						    </ul>
						</div>
					</div>
					<div class="col-md-12" style="margin-top:20px;">
						<div><i class="fa fa-quote-left fa-lg fa-pull-left" aria-hidden="true"></i><font style="font-size:23px;">เรียนภาษาอังกฤษ</font></div>
						<div style="padding-right:70px;"><span style="font-size:23px;margin-left:10px;">ตัวต่อตัว</span> <span style="font-size:30px;line-height: 40px;">กับครูชาวต่างชาติ</span><i class="fa fa-quote-right fa-lg fa-pull-right" aria-hidden="true"></i></div>
					</div>
				</div>
				<div class="col-md-7">
					<div class="col-md-6" style="line-height: 30px;">
						<div class="f20" style="color:#85C3CE;">CONTACT US</div>
						<div class="f18"><img src="{{asset('assets/img/img-email.png')}}" width="35" height="35" alt=""> hello@english4speak.com </div>
						<div class="f18"><img src="{{asset('assets/img/img-skype.png')}}" width="35" height="35" alt=""> English4Speak</div>
						<div class="f18"><img src="{{asset('assets/img/img-line.png')}}" width="35" height="35" alt=""> @English4Speak</div>
						
					</div>
					<div class="col-md-6">
						<div class="row">
							<div class="footer-facebook">
								<div class="fb-page" data-href="https://www.facebook.com/englishforspeak/" data-tabs="timeline" data-height="200" data-small-header="false" data-adapt-container-width="true" data-hide-cover="false" data-show-facepile="true"><blockquote cite="https://www.facebook.com/englishforspeak/" class="fb-xfbml-parse-ignore"><a href="https://www.facebook.com/englishforspeak/">English4Speak : เก่งอังกฤษต้องติด &quot;เล่น&quot;</a></blockquote></div>
							</div>
						</div>
					</div>
					<div class="col-md-7">
						<div><a href="{{url('contact')}}" class="btn btn-footer-contact"><i class="fa fa-exclamation" aria-hidden="true"></i> แนะนำ ติชม ติดต่อเรา</a>
						</div>
						<div class="avatar-english-footer">
							<img src="{{asset('assets/img/avatar-english.png')}}" width="120" height="auto" alt="">
						</div>
					</div>
					<div class="col-md-5">
						<div class="row">
							<div class="call-center">
								<div class="call-name"><i class="fa fa-phone-square fa-lg" aria-hidden="true"></i> CALL CENTER</div>
								<div class="call-tel">097 178 9598</div>
							</div>
							<div class="call-center-shadow"></div>
						</div>
					</div>

					
				</div>
				
			</div>
		</div>
		<div class="container" style="margin-top:30px;"></div>
	</div>
	<div class="bg-bottom-footer">
		<div class="row">
			ENGLISH4SPEAK CO., LTD. © ALL RIGHTS RESERVED
		</div>
	</div>
	<!-- JavaScripts -->
	@include('layouts.slide-menu-user', ['some' => 'data'])
    <script src="{{asset('assets/js/lib/jquery/jquery.min.js')}}"></script>
    <script src="{{asset('assets/js/bootstrap.min.js')}}"></script>
    <script src="{{asset('assets/js/lib/tether/tether.min.js')}}"></script>
    <script src="{{asset('assets/js/plugins.js')}}"></script>
    <script src="{{asset('assets/js/app.js')}}"></script>
    @yield('script')
    <script>(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = "//connect.facebook.net/th_TH/sdk.js#xfbml=1&version=v2.8&appId=1584048194945672";
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));</script>

    
</body>
</html>