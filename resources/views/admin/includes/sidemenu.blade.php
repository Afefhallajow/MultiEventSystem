<!--- SIDEMENU -->
<div class="topnav">
    <div class="container-fluid">
        <nav class="navbar navbar-light navbar-expand-lg topnav-menu">
            <div class="collapse navbar-collapse" id="topnav-menu-content">
                <ul class="navbar-nav">
                    {{-- لوحة التحكم --}}
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle arrow-none" href="#" id="topnav-dashboard" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <i class="bx bx-home-circle ml-2"></i><span key="t-dashboards">لوحة التحكم</span> <div class="arrow-down mr-2"></div>

                        </a>
                        <div class="dropdown-menu <?php echo \Lang::locale() == 'ar' ? 'arabic' : 'english'; ?>" aria-labelledby="topnav-event">
                            <a href="{{route('employees.index')}}"class="dropdown-item">الموظفون</a>
                        </div>

                    </li>

                    @role('admin')
                    {{-- الفعاليات --}}

                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle arrow-none" href="#" id="topnav-event" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <i class="fas fa-calendar-check ml-2"></i><span key="t-events">الفعاليات</span> <div class="arrow-down mr-2"></div>
                        </a>
                        <div class="dropdown-menu <?php echo \Lang::locale() == 'ar' ? 'arabic' : 'english'; ?>" aria-labelledby="topnav-event">
                            <a href="{{route('days.index')}}"class="dropdown-item">الفعاليات</a>
                            <a href="{{route('places.index')}}" class="dropdown-item">المناطق</a>
                            <a href="{{route('invites.index')}}" class="dropdown-item">جميع الدعوات</a>
                        </div>
                    </li>
@else
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle arrow-none" href="#" id="topnav-event" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="fas fa-calendar-check ml-2"></i><span key="t-events">الفعاليات</span> <div class="arrow-down mr-2"></div>
                            </a>
                            <div class="dropdown-menu <?php echo \Lang::locale() == 'ar' ? 'arabic' : 'english'; ?>" aria-labelledby="topnav-event">
                                <a href="{{route('days.index')}}"class="dropdown-item">الفعاليات</a>
                                <a href="{{route('places.index')}}" class="dropdown-item">المناطق</a>
                                <a href="{{route('getInvited')}}" class="dropdown-item">جميع الدعوات</a>
                            </div>
                        </li>

                    @endrole
                    {{-- الحضور --}}
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle arrow-none" href="#" id="topnav-event" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="fas fa-calendar-check ml-2"></i><span key="t-events">تسجيل الحضور</span> <div class="arrow-down mr-2"></div>
                            </a>
                            <div class="dropdown-menu <?php echo \Lang::locale() == 'ar' ? 'arabic' : 'english'; ?>" aria-labelledby="topnav-event">
                                <a href="{{route('presencenew')}}"class="dropdown-item">تسجيل الحضور</a>
                                <a href="{{route('presence.index')}}" class="dropdown-item">الحضور ضمن الفعاليات</a>
                            </div>
                        </li>
                    {{-- Qr Code --}}
                    <li class="nav-item dropdown">
                        <a href="{{route('qrcode.index')}}" class="nav-link dropdown-toggle arrow-none">
                            <i class="fas fa-qrcode ml-2"></i><span>QR Code</span>
                        </a>
                    </li>

                </ul>
            </div>
        </nav>
    </div>
</div>
