<nav class="header-navbar navbar navbar-expand-lg align-items-center floating-nav navbar-light navbar-shadow">
    <div class="navbar-container d-flex content">
        <div class="bookmark-wrapper d-flex align-items-center">
            <ul class="nav navbar-nav d-xl-none">
                <li class="nav-item"><a class="nav-link menu-toggle" href="javascript:void(0);"><i class="ficon"
                                                                                                   data-feather="menu"></i></a>
                </li>
            </ul>
            <ul class="nav navbar-nav bookmark-icons">
                {{--<li class="nav-item d-none d-lg-block"><a class="nav-link" href="{{url('admin/visit/create')}}" data-toggle="tooltip" data-placement="top" title="تسجيل حركة"><i class="ficon text-success" data-feather="check-circle"></i></a></li>--}}
                {{--<li class="nav-item d-none d-lg-block"><a class="nav-link" href="{{url('admin/visit')}}" data-toggle="tooltip" data-placement="top" title="استعلام الحركات"><i class="ficon text-warning" data-feather="list"></i></a></li>--}}

            </ul>


        </div>
        <ul class="nav navbar-nav align-items-center ml-auto">
            <li class="nav-item dropdown dropdown-language">
                <i class="flag-icon flag-icon-sa"></i>
                {{--<a class="nav-link dropdown-toggle" id="dropdown-flag" href="javascript:void(0);" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="flag-icon flag-icon-us"></i><span class="selected-language">English</span></a>--}}
                {{--<div class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdown-flag"><a class="dropdown-item" href="javascript:void(0);" data-language="en"><i class="flag-icon flag-icon-us"></i> English</a><a class="dropdown-item" href="javascript:void(0);" data-language="fr"><i class="flag-icon flag-icon-fr"></i> French</a><a class="dropdown-item" href="javascript:void(0);" data-language="de"><i class="flag-icon flag-icon-de"></i> German</a><a class="dropdown-item" href="javascript:void(0);" data-language="pt"><i class="flag-icon flag-icon-pt"></i> Portuguese</a></div>--}}
            </li>
            <li class="nav-item d-none d-lg-block"><a class="nav-link nav-link-style"><i class="ficon"
                                                                                         data-feather="moon"></i></a>
            </li>


            <li class="nav-item dropdown dropdown-user">
                <a class="nav-link dropdown-toggle dropdown-user-link"
                   id="dropdown-user" href="javascript:void(0);"
                   data-toggle="dropdown" aria-haspopup="true"
                   aria-expanded="false">
                    <div class="user-nav d-sm-flex d-none">
                        <span
                                class="user-name font-weight-bolder">{{auth()->user()->name}}</span><span
                                class="user-status">{{auth()->user()->type}}</span></div>
                    <span class="avatar"><img class="round"
                                              src="{{asset('public/assets/vuexy/images/avatars/user-avatar.png')}}"
                                              alt="avatar" height="40" width="40"><span
                                class="avatar-status-online"></span></span>
                </a>
                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdown-user">
                    <a class="dropdown-item" href="{{url('admin/logout')}}"
                       onclick="event.preventDefault(); document.getElementById('logout-form').submit();"><i
                                class="mr-50" data-feather="power"></i> تسجيل الخروج</a>
                    <form id="logout-form" action="{{ route('logout')}}" method="POST" style="display: none;">
                        {{ csrf_field() }}
                    </form>
                </div>
            </li>
        </ul>
    </div>
</nav>
