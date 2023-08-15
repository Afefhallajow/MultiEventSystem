
<!-- HEADER -->
<header id="page-topbar">
<div class="navbar-header">
<div class="d-flex">
{{-- Languages --}}
{{-- <div class="dropdown d-inline-block">
<button type="button" class="btn header-item waves-effect" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
<img id="header-lang-img" src="assets/images/flags/us.jpg" alt="Header Language" height="16">
</button>
<div class="dropdown-menu dropdown-menu-right" style="">

<!-- item-->
<a href="javascript:void(0);" class="dropdown-item notify-item language" data-lang="eng">
<img src="assets/images/flags/us.jpg" alt="user-image" class="mr-1" height="12"> <span class="align-middle">English</span>
</a>
<!-- item-->
<a href="javascript:void(0);" class="dropdown-item notify-item language" data-lang="ru">
<img src="assets/images/flags/russia.jpg" alt="user-image" class="mr-1" height="12"> <span class="align-middle">Russian</span>
</a>
</div>
</div> --}}

<div class="dropdown d-inline-block">
<button type="button" class="btn header-item waves-effect" id="page-header-user-dropdown" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
<span id="header_img">
<img style="background-color: #e9e9e9" class="rounded-circle header-profile-user" src="{{ asset('images')}}/fav.png" alt="Header Avatar">
</span>
<span class="d-none d-xl-inline-block ml-1" key="t-henry" style="font-size: 1rem">{{ auth()->user()->name }}</span>
<i class="mdi mdi-chevron-down d-none d-xl-inline-block"></i>
</button>
<div class="dropdown-menu dropdown-menu-right <?php echo \Lang::locale() == 'ar' ? ' arabic' : ' english'; ?>">
<a href="{{route('myprofile')}}" class="dropdown-item d-block" >
<i class="bx bx-wrench font-size-16 align-middle mr-1"></i>
<span key="t-settings">تعديل معلومات الدخول</span>
</a>
<div class="dropdown-divider"></div>
<a class="dropdown-item text-danger" href="{{ route('logout') }}"
onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
<i class="bx bx-power-off font-size-16 align-middle mr-1 text-danger"></i>
<span key="t-logout">تسجيل الخروج</span>
</a>
<form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
@csrf
</form>
</div>
</div>
</div>

<div class="d-flex">
<!-- LOGO -->
<div class="navbar-brand-box">
<div class="navbar-brand-box">
<a href="{{ route('home') }}" class="logo logo-light">
<span class="logo-sm">
<img src="{{ asset('images') }}/Arabic Logo.png" alt="" height="22">
</span>
<span class="logo-lg">
<img src="{{ asset('images') }}/Arabic Logo.png" style="background-color: #fff; width: auto; height: 71px;" alt="" height="19">
</span>
</a>
</div>
</div>
</div>
</div>
</header>
