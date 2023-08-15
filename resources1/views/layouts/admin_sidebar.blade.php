<!-- ########## START: LEFT PANEL ########## -->
<div class="br-logo">
        <img  src="{{ asset('assets/logoar.png') }}" alt="logo" class="wd-100" alt="">
    <a class="tx-bold tx-16 " href="#"><span>{{ config('app.name') }}</span></a>
</div>
    <div class="br-sideleft overflow-y-auto">
      <label class="sidebar-label pd-x-10 mg-t-20 op-3">{{__('config.navigation')}}</label>
      <ul class="br-sideleft-menu">

                <li class="br-menu-item">
                    <a href="" class="br-menu-link with-sub {{ (\Request::route()->getName() == "visitor.create") ? 'active' : '' }}">
                        <i class="menu-item-icon icon fa-home tx-22"></i>
                        <span class="menu-item-label"> نماذج التسجيل</span>
                    </a>
                    <ul class="br-menu-sub">
                        <li class="sub-item"><a href="{{url('admin/create/visitor')}}" class="sub-link  {{ (\Request::route()->getName() == "visitor.createvis") ? 'active' : '' }} ">تسجيل الزوار </a></li>

                    </ul>
                </li>
                <li class="br-menu-item">
                    <a href="" class="br-menu-link with-sub {{ (\Request::route()->getName() == "visitor.create") ? 'active' : '' }}">
                        <i class="menu-item-icon icon fa-home tx-22"></i>
                        <span class="menu-item-label"> بيانات الزوار</span>
                    </a>
                    <ul class="br-menu-sub">
                        <li class="sub-item"><a href="{{url('admin/visitor')}}" class="sub-link  {{ (\Request::route()->getName() == "new") ? 'active' : '' }} ">عرض المسجلين</a></li>
                        <li class="sub-item"><a href="{{url('admin/attend')}}" class="sub-link  {{ (\Request::route()->getName() == "new") ? 'active' : '' }} ">عرض الحضور</a></li>
                         <li class="sub-item"><a href="{{url('admin/wshop/reg/')}}" class="sub-link  {{ (\Request::route()->getName() == "new") ? 'active' : '' }} "> المسجلين في الورش</a></li>
                        <li class="sub-item"><a href="{{url('admin/wshop/attend/')}}" class="sub-link  {{ (\Request::route()->getName() == "new") ? 'active' : '' }} ">عرض حضور الورش</a></li>

                    </ul>
                </li>
          <li class="br-menu-item">
              <a href="#" class="br-menu-link with-sub " >
                  <i class="menu-item-icon icon fa-home tx-22"></i>
                  <span class="menu-item-label">تسجيل الحضور</span>
              </a><!-- br-menu-link -->
              <ul class="br-menu-sub">
                  <li class="sub-item"><a href="{{ url('admin/attend/event') }}" class="sub-link  {{ (\Request::route()->getName() == "new") ? 'active' : '' }} "> تسجيل الحضور للمؤتمر </a></li>
                                    <li class="sub-item"><a href="{{ url('admin/attend/print') }}" class="sub-link  {{ (\Request::route()->getName() == "new") ? 'active' : '' }} "> تسجيل الحضور وطباعة </a></li>

                  <li class="sub-item"><a href="{{ url('admin/attend/workshop') }}" class="sub-link  {{ (\Request::route()->getName() == "new") ? 'active' : '' }} ">تسجيل حضور الورش </a></li>
              </ul>
          </li><!-- br-menu-item -->
          <li class="br-menu-item">
              <a href="{{ url('admin/print/visitor') }}" class="br-menu-link" >
                  <i class="menu-item-icon icon fa-home tx-22"></i>
                  <span class="menu-item-label">طباعة البادج</span>
              </a><!-- br-menu-link -->

          </li>
          <li class="br-menu-item">
              <a href="#" class="br-menu-link with-sub " >
                  <i class="menu-item-icon icon fa-home tx-22"></i>
                  <span class="menu-item-label">الاحصائيات</span>
              </a><!-- br-menu-link -->
              <ul class="br-menu-sub">
                  <li class="sub-item"><a href="{{ url('admin/report/byday') }}" class="sub-link  {{ (\Request::route()->getName() == "new") ? 'active' : '' }} "> الحضور حسب اليوم</a></li>
                  <li class="sub-item"><a href="{{ url('admin/report/workshop') }}" class="sub-link  {{ (\Request::route()->getName() == "new") ? 'active' : '' }} ">المسجلون في الورش </a></li>
                  <li class="sub-item"><a href="{{ url('admin/report/attedworkshop') }}" class="sub-link  {{ (\Request::route()->getName() == "new") ? 'active' : '' }} "> الحضور حسب الورشة</a></li>
              </ul>
          </li><!-- br-menu-item -->
          {{--<li class="br-menu-item">--}}
              {{--<a href="{{ url('admin/report/evaluation') }}" class="br-menu-link" >--}}
                  {{--<i class="menu-item-icon icon fa-home tx-22"></i>--}}
                  {{--<span class="menu-item-label">نتائج التقييم</span>--}}
              {{--</a><!-- br-menu-link -->--}}
          {{--</li>--}}
          <!-- br-menu-item -->
                <li class="br-menu-item">
                        <a href="#" class="br-menu-link with-sub " >
                          <i class="menu-item-icon icon fa-home tx-22"></i>
                          <span class="menu-item-label">الاعدادات</span>
                        </a><!-- br-menu-link -->
                        <ul class="br-menu-sub">
                                <li class="sub-item"><a href="{{ url('admin/workshop') }}" class="sub-link  {{ (\Request::route()->getName() == "new") ? 'active' : '' }} "> الورش </a></li>
                                <li class="sub-item"><a href="{{ url('admin/user') }}" class="sub-link  {{ (\Request::route()->getName() == "new") ? 'active' : '' }} ">المستخدمين</a></li>
                        </ul>
                </li><!-- br-menu-item -->


      </ul><!-- br-sideleft-menu -->

    </div><!-- br-sideleft -->
    <!-- ########## END: LEFT PANEL ########## -->
