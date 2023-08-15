<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
   <meta charset="utf-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <meta name="description" content="بوابة وزارة الموارد البشرية والتنمية الاجتماعية في المملكة العربية السعودية" />
   <meta name="abstract" content="أنشئت وزارة العمل والتنمية الاجتماعية بموجب المرسوم الملكي الكريم الذي صدر في الشهر الأخير من عام 1380 هـ، وذلك تحت اسم وزارة العمل والشؤون الاجتماعية، وقامت الوزارة منذ نشأتها بتنمية المجتمعات المحلية واهتمت بلجان المجتمع ومجالس المحافظات والمراكز والهجر ورعاية الشباب والأسرة والجمعيات التعاونية، وحددت الوزارة أهدافها" />
   <meta name="keywords" content="العمل,التنمية,الضمان,الرعاية,وزراة العمل" />

   <!-- App favicon -->
   <link rel="shortcut icon" href="{{ asset('images') }}/fav.png">

   <!-- CSRF Token -->
   <meta name="csrf-token" content="{{ csrf_token() }}">

   <title>وزارة الموارد البشرية والتنمية الاجتماعية</title>

   <!-- MATERIAL DESIGN ICONIC FONT -->
   <link rel="stylesheet" href="{{ asset('front') }}/fonts/material-design-iconic-font/css/material-design-iconic-font.css">

   <!-- Bootstrap Css -->
   <link href="{{ asset('admin/css') }}/bootstrap.min.css" id="bootstrap-style" rel="stylesheet" type="text/css" />

   <link rel="preconnect" href="https://fonts.googleapis.com">
   <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
   <link href="https://fonts.googleapis.com/css2?family=Amiri&family=Cairo:wght@200&family=Montserrat:wght@100&family=Poppins:wght@400;500;600&family=Roboto+Serif:opsz,wght@8..144,100&display=swap" rel="stylesheet">

   <!-- Icons Css -->
   <link href="{{ asset('admin/css') }}/icons.min.css" rel="stylesheet" type="text/css" />

   <!-- App Css-->
   <link href="{{ asset('admin/css') }}/app.min.css" id="app-style" rel="stylesheet" type="text/css" />

   <!-- Styles -->
   <link rel="stylesheet" href="{{ asset('front') }}/css/style.css">
</head>

<body style="display: flex; flex-direction: column;">

	@php
		if(!isset($lang)) $lang = 'ar';
		$style_lang = $lang == 'en' ? 'direction: ltr; text-align: left; ' : 'direction: rtl; text-align: right; ';
	@endphp

   <nav class="navbar navbar-expand-lg navbar-dark hr_black_back bg-dark">
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
         <span class="navbar-toggler-icon"></span>
      </button>

      <div class="collapse navbar-collapse" id="navbarSupportedContent">
         <ul class="navbar-nav mr-auto" style="font-size: 20px; margin: auto;direction: rtl; width: 40%;
         display: flex;
         justify-content: space-evenly;
         align-items: center">

            {{-- يوم الحفل --}}
            <li class="nav-item active">
               <a class="nav-link" href="{{ route('day_party', 'حفل-إطلاق-مبادرات-وكالة-المهارات-والتدريب') }}" >يوم الحفل</a>
            </li>

            {{-- تسجيل --}}
            <li class="nav-item active">
               <a class="nav-link" href="{{ route('external-register.invitation', 'حفل-إطلاق-مبادرات-وكالة-المهارات-والتدريب') }}">طلب دعوة</a>
            </li>

            {{-- تسجيل كمدرب --}}
            <li class="nav-item active">
               <a class="nav-link" href="{{ route('register_trainer') }}" >تسجيل كمدرب</a>
            </li>

            {{-- اللغة --}}
            {{-- <li class="nav-item">
               @if($lang == 'ar')
                  <a href="{{ route('external-register.invitation', ['حفل-إطلاق-مبادرات-وكالة-المهارات-والتدريب', 'en'])}}" class="nav-link">EN</a>
               @else
                  <a href="{{ route('external-register.invitation', ['حفل-إطلاق-مبادرات-وكالة-المهارات-والتدريب', 'ar'])}}" class="nav-link">AR</a>
               @endif
            </li> --}}

            {{-- <li class="nav-item active">
               <a class="nav-link" target="_blank" href="https://www.ithra.com/ar/about-ithra">أكاديمية إثراء</a>
            </li>

            <li class="nav-item active">
               <a class="nav-link" target="_blank" href="https://tvtc.gov.sa/ar/Pages/default.aspx">المؤسسة العامة للتدريب التقني والمهني</a>
            </li> --}}


            {{-- <li class="nav-item dropdown">
               <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                  تواصل مع الوزارة
               </a>
               <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                  <a class="dropdown-item" href="#">Action</a>
                  <a class="dropdown-item" href="#">Another action</a>
                  <div class="dropdown-divider"></div>
                  <a class="dropdown-item" href="#">Something else here</a>
               </div>
            </li> --}}
         </ul>

         <img style="width: auto; height: 70px" class=" my-2 my-lg-0" src="{{ asset('images/Arabic Logo Dark packground1.png') }}"/>
      </div>
   </nav>

   <div>
      @yield('content')
   </div>

	<div class="hr_black_back" style="flex-direction: column;direction: rtl; margin-top: auto; text-align: center; display: flex;justify-content: center; align-items: center;">

      <div class="footer1" style=" ">
         <div class="footer-col">
            <h2 class="header-footer">نظرة عامة</h2>
            <a href="https://hrsd.gov.sa/ar">عن الوزارة</a>
            <a href="{{ route('day_party', 'حفل-إطلاق-مبادرات-وكالة-المهارات-والتدريب') }}" >عن يوم الحفل</a>
         </div>
         <div class="footer-col">
            <h2 class="header-footer">روابط مهمة</h2>
            <a target="_blank" href="https://www.ithra.com/ar/about-ithra">أكاديمية إثراء</a>
            <a target="_blank" href="https://tvtc.gov.sa/ar/Pages/default.aspx">المؤسسة العامة للتدريب التقني والمهني</a>
         </div>
         <div class="footer-col">
            <h2 class="header-footer">تابعنا على</h2>
            <ul style="display: flex;">
               <li class="node-type-scards-footer__link">
                   <a aria-label="twitter" href="https://twitter.com/HRSD_SA" rel="me nofollow"> <span class="fab fa-twitter"> </span> <span class="sr-only"> twitter</span></a></li>
               <li class="node-type-scards-footer__link">
                   <a aria-label="facebook" href="https://www.facebook.com/HRSDSA/?__tn__=%2Cd%2CP-R&amp;eid=ARAkQWY4SHdGq6-DlHg7uj-w3LHemF6dSdYOYt2xRyziC8czHwsOtnXuzY3IV4ynyRJCsD5kZ" rel="me nofollow"> <span class="fab fa-facebook-f"> </span> <span class="sr-only"> facebook</span></a></li>
               <li class="node-type-scards-footer__link">
                   <a aria-label="instagram" href="https://instagram.com/hrsd_sa?igshid=1qy75xgi9iegc" rel="me nofollow"> <span class="fab fa-instagram"> </span> <span class="sr-only"> instagram</span></a></li>
               <li class="node-type-scards-footer__link">
                   <a aria-label="youtube" href="https://m.youtube.com/user/MinistryOfLabor/videos" rel="me nofollow"> <span class="fab fa-youtube"> </span> <span class="sr-only"> youtube</span></a></li>
               <li class="node-type-scards-footer__link">
                   <a aria-label="snapchat" href="https://www.snapchat.com/add/hrsd_sa" rel="me nofollow"> <span class="fab fa-snapchat"> </span> <span class="sr-only"> snapchat</span></a></li>
               <li class="node-type-scards-footer__link">
                   <a aria-label="linkedin" href="https://sa.linkedin.com/company/ministry-of-human-resources-and-social-development-ksa?trk=public_profile_topcard_current_compan" rel="me nofollow"> <span class="fab fa-linkedin"> </span> <span class="sr-only"> linkedin</span></a></li>
            </ul>
         </div>
      </div>
      <p style="margin: auto;  color: #fff; font-size: 16px; padding: 25px;">
         <script> document.write(new Date().getFullYear()) </script> ©
         جميع الحقوق محفوظة لوزارة الموارد البشرية والتنمية الاجتماعية
		</p>
   </div>

   <!-- JQUERY -->
   <script src="{{ asset('front') }}/js/jquery-3.3.1.min.js"></script>
   <script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.10.3/jquery-ui.min.js"></script>

   <!-- JQUERY STEP -->
   <script src="{{ asset('front') }}/js/jquery.steps.js"></script>

   <script src="{{ asset('admin') }}/libs/bootstrap/js/bootstrap.bundle.min.js"></script>
   <script src="{{ asset('front') }}/js/main.js"></script>

   @stack('AJAX')

</body>

</html>
