<div class="main-menu menu-fixed menu-light menu-accordion menu-shadow" data-scroll-to-active="true">
    <div class="navbar-header">
        <ul class="nav navbar-nav flex-row">
            <li class="nav-item mr-auto"><a class="navbar-brand" href="{{url('/admin/home')}}">
                    {{--                    <img src="{{asset('assets/vuexy/images/logo/logo2.png')}}" width="80px;">--}}
                    <span class="brand-logo">
                            </span>
                    <h2 class="brand-text">التعاونية </h2>
                </a></li>
            <li class="nav-item nav-toggle"><a class="nav-link modern-nav-toggle pr-0" data-toggle="collapse"><i class="d-block d-xl-none text-primary toggle-icon font-medium-4" data-feather="x"></i><i class="d-none d-xl-block collapse-toggle-icon font-medium-4  text-primary" data-feather="disc" data-ticon="disc"></i></a></li>
        </ul>
    </div>
    <div class="shadow-bottom"></div>
    <div class="main-menu">
        <ul class="navigation navigation-main" id="main-menu-navigation" data-menu="menu-navigation" >
            @if(Auth::user()->is_admin == 1)
            <!--<li class="br-menu-item ">-->
            <!--    <a href="" class="br-menu-link with-sub ">-->
            <!--        <i data-feather="edit" class="text-success"></i>-->
            <!--        <span class="menu-item-label"> نماذج التسجيل</span>-->
            <!--    </a>-->
            <!--    <ul class="br-menu-sub">-->
            <!--        <li class="sub-item"><a href="{{url('admin/create/visitor')}}" class="sub-link "><i data-feather="user" class="text-success"></i>تسجيل الزوار </a></li>-->
            <!--        <li class="sub-item"><a href="{{url('admin/create/exheb')}}" class="sub-link  {{ (\Request::route()->getName() == "new") ? 'active' : '' }} "><i data-feather="user" class="text-success"></i>تسجيل العارضين </a></li>-->
            <!--    </ul>-->
            <!--</li>-->
            @endif
            @if(Auth::user()->is_admin == 1)
            <li class="br-menu-item">
                <a href="" class="br-menu-link with-sub {{ (\Request::route()->getName() == "new") ? 'active' : '' }}">
                    <i data-feather="user" class="text-primary"></i>
                    <span class="menu-item-label"> بيانات المسجلين</span>
                </a>
                <ul class="br-menu-sub">
                    <li class="sub-item"><a href="{{url('admin/show/visitors')}}" class="sub-link  {{ (\Request::route()->getName() == "new") ? 'active' : '' }} "> <i data-feather="circle" class="text-primary"></i> المسجلين في الفعالية </a></li>
                    
                    <!--<li class="sub-item"><a href="{{url('admin/register_member')}}" class="sub-link  {{ (\Request::route()->getName() == "new") ? 'active' : '' }} "> <i data-feather="circle" class="text-primary"></i>  تسجيل عضو جديد  </a>-->
                    <!--<li class="sub-item"><a href="{{url('admin/show/workshop-visitor')}}" class="sub-link  {{ (\Request::route()->getName() == "new") ? 'active' : '' }} "> <i data-feather="circle" class="text-primary"></i>الورش </a></li>-->
                </ul>
            </li>
            @endif
            
            <!--<li class="br-menu-item">-->
            <!--    <a href="{{ url('admin/remittance') }}" class="br-menu-link" >-->
            <!--        <i data-feather="circle" class="text-primary"></i>-->
            <!--        <span class="menu-item-label">الحوالات  </span>-->
            <!--    </a><!-- br-menu-link -->
            <!--</li>-->
            
            <li class="br-menu-item">
                <a href="#" class="br-menu-link with-sub " >
                    <i data-feather="log-in" class="text-primary"></i>
                    <span class="menu-item-label">تسجيل الحضور</span>
                </a><!-- br-menu-link -->
                <ul class="br-menu-sub">
                    @if(Auth::user()->is_admin == 1 || Auth::user()->is_admin == 2)
                    <li class="sub-item"><a href="{{ url('admin/attend') }}" class="sub-link   "><i data-feather="circle" class="text-primary"></i>    تسجيل حضور للفعالية </a></li>
                    @endif
                    @if(Auth::user()->is_admin == 1 || Auth::user()->is_admin == 3)
                    <!--<li class="sub-item"><a href="{{ url('admin/attendWorkShop') }}" class="sub-link   "><i data-feather="circle" class="text-primary"></i>تسجيل حضور الورش </a></li>-->
                    @endif
                    @if(Auth::user()->is_admin == 1 || Auth::user()->is_admin == 2)
                    <li class="sub-item"><a href="{{ url('admin/attend&print') }}" class="sub-link   "><i data-feather="circle" class="text-primary"></i> تسجيل حضور مع طباعة </a></li>
                    @endif
                </ul>
            </li>
            @if(Auth::user()->is_admin == 1 || Auth::user()->is_admin == 2)
            <li class="br-menu-item">
                <a href="{{ url('admin/print/visitor') }}" class="br-menu-link" >
                    <i data-feather="printer" class="text-primary"></i>
                    <span class="menu-item-label">طباعة البادج</span>
                </a><!-- br-menu-link -->

            </li>
            @endif
            <li class="br-menu-item">
                <a href="#" class="br-menu-link with-sub " >
                    <i data-feather="layers" class="text-primary"></i>
                    <span class="menu-item-label">الاحصائيات</span>
                </a><!-- br-menu-link -->
                <ul class="br-menu-sub">
                    @if(Auth::user()->is_admin == 1 || Auth::user()->is_admin == 2)
                    <li class="sub-item"><a href="{{ url('admin/attends-per-day') }}" class="sub-link  {{ (\Request::route()->getName() == "new") ? 'active' : '' }} "><i data-feather="circle" class="text-primary"></i> الحضور حسب اليوم</a></li>
                     @endif
                     @if(Auth::user()->is_admin == 1 || Auth::user()->is_admin == 3)
                     <!--<li class="sub-item"><a href="{{ url('admin/attends-per-workshop') }}" class="sub-link  {{ (\Request::route()->getName() == "new") ? 'active' : '' }} "><i data-feather="circle" class="text-primary"></i> الحضور حسب الورشة</a></li>-->
                     <!--<li class="sub-item"><a href="{{ url('admin/interested-in-workshop') }}" class="sub-link  {{ (\Request::route()->getName() == "new") ? 'active' : '' }} "><i data-feather="circle" class="text-primary"></i> المهتمين في الورش والندوات  </a></li> -->
                     @endif
                </ul>
            </li>
            @if(Auth::user()->is_admin == 1 || Auth::user()->is_admin == 3)
            <li class="br-menu-item">
                <a href="#" class="br-menu-link with-sub " >
                    <i data-feather="settings" class="text-primary"></i>
                    <span class="menu-item-label">الاعدادات</span>
                </a><!-- br-menu-link -->
                <ul class="br-menu-sub">
                    <!--<li class="sub-item"><a href="{{ url('admin/workshop') }}" class="sub-link   "><i data-feather="circle" class="text-primary"></i> الورش </a></li>-->
                    @if(Auth::user()->is_admin == 1)
                    <li class="sub-item"><a href="{{ url('admin/allUsers') }}" class="sub-link   "><i data-feather="circle" class="text-primary"></i> المستخدمين </a></li>
                    @endif
                </ul>
            </li>

            @endif
            <li class="br-menu-item">
                <a target="_blank" href="{{ route('prizzes') }}" class="br-menu-link" >
                    <i data-feather="gift" class="text-primary"></i>
                    <span class="menu-item-label">سحب الجوائز </span>
                </a><!-- br-menu-link -->

            </li>
        <!-- br-menu-item -->
        </ul>
    </div>
</div>