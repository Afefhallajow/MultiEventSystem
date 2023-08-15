<!-- charts -->
<div class="col-md-12">
    <div class="row" style="margin: 0 auto 20px auto">
        <span>عدد الدعوات: </span>
        <span>{{ $num_invited }}</span>
    </div>
</div>

<div class="row mrB20">
    <!-- invitation_type -->
    <div class="col-lg-6 text-center">
        <div class="card">
            <div class="card-body" style="text-align: center">
                <h4 class="card-title mb-4" style="float: right">جميع السجلات</h4>
                <div class="apex-charts" style="margin-right: 20%;text-align: center"  id="invitation_type" ></div>
            </div>
        </div>
    </div>

    <!-- invitation_type -->
    <div class="col-lg-6 text-center mrAuto">
        <div class="card" style="height:19.5rem">
            <div class="card-body" style="padding-bottom: 40px">
                <table class="table dt-responsive table-bordered table-striped table-hover nowrap text-center">
                    <thead>
                    <tr>
                        <th  class="gray_font bold_font">الاسم</th>
                        <th  class="gray_font bold_font">تحميل إكسل</th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr>
                        <td class="gray_font">دعوة</td>
                        <td>
                            <form action="{{route('exportExcel')}}" method="post" id="invitation_type_invited" class="form-horizontal">
                                @csrf
                                @if($day_id)
                                    <input type="hidden" name="day_id" value="{{ $day_id }}">
                                @endif
                                <input type="hidden" name="invitation_type" value="2">

                                <span class="span_submit" onclick="document.getElementById('invitation_type_invited').submit();">تحميل</span>
                            </form>
                        </td>
                    </tr>

                    <tr>
                        <td  class="gray_font">تسجيل</td>
                        <td>
                            <form action="{{route('exportExcel')}}" method="post" id="invitation_type_registered" class="form-horizontal">
                                @csrf
                                @if($day_id)
                                    <input type="hidden" name="day_id" value="{{ $day_id }}">
                                @endif
                                <input type="hidden" name="invitation_type" value="1">

                                <span class="span_submit" onclick="document.getElementById('invitation_type_registered').submit();">تحميل</span>
                            </form>
                        </td>
                    </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
    <!-- Send Invitaions -->
<div class="row mrB20">
    <!-- registered -->
    <div class="col-lg-6 text-center mrAuto">
        <div class="card">
            <div class="card-body" style="text-align: center">
                <h4 class="card-title mb-4" style="float: right">تسجيل</h4>
                <div  id="registrations" style="margin-right: 20%" class="apex-charts" dir="ltr"></div>
            </div>
        </div>
    </div>

    <!-- registrations -->
    <div class="col-lg-6 text-center mrAuto">
        <div class="card" style="height:19.5rem">
            <div class="card-body" style="padding-bottom: 40px">
                <table class="table dt-responsive table-bordered table-striped table-hover nowrap text-center">
                    <thead>
                    <tr>
                        <th  class="gray_font bold_font">الاسم</th>
                        <th  class="gray_font bold_font">تحميل إكسل</th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr>
                        <td class="gray_font">حضر</td>
                        <td>
                            <form action="{{route('exportExcel')}}" method="post" id="order_status_under_study" class="form-horizontal">
                                @csrf
                                @if($day_id)
                                    <input type="hidden" name="day_id" value="{{ $day_id }}">
                                @endif
                                <input type="hidden" name="invitation_type" value="1">
                                <input type="hidden" name="isPresence" value="1">

                                <span class="span_submit" onclick="document.getElementById('order_status_under_study').submit();">تحميل</span>
                            </form>
                        </td>
                    </tr>

                    <tr>
                        <td class="gray_font">لم يحضر </td>
                        <td>
                            <form action="{{route('exportExcel')}}" method="post" id="order_status_confirmed" class="form-horizontal">
                                @csrf
                                @if($day_id)
                                    <input type="hidden" name="day_id" value="{{ $day_id }}">
                                @endif
                                <input type="hidden" name="invitation_type" value="1">
                                <input type="hidden" name="isPresence" value="0">

                                <span class="span_submit" onclick="document.getElementById('order_status_confirmed').submit();">تحميل</span>
                            </form>
                        </td>
                    </tr>

                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<div class="row mrB20">
    <!-- registered -->
    <div class="col-lg-6 text-center mrAuto">
        <div class="card">
            <div class="card-body" style="text-align: center">
                <h4 class="card-title mb-4" style="float: right">الدعوات</h4>
                <div  id="invite" style="margin-right: 20%" class="apex-charts" dir="ltr"></div>
            </div>
        </div>
    </div>

    <!-- registrations -->
    <div class="col-lg-6 text-center mrAuto">
        <div class="card" style="height:19.5rem">
            <div class="card-body" style="padding-bottom: 40px">
                <table class="table dt-responsive table-bordered table-striped table-hover nowrap text-center">
                    <thead>
                    <tr>
                        <th  class="gray_font bold_font">الاسم</th>
                        <th  class="gray_font bold_font">تحميل إكسل</th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr>
                        <td class="gray_font">حضر</td>
                        <td>
                            <form action="{{route('exportExcel')}}" method="post" id="order_status_under_study1" class="form-horizontal">
                                @csrf
                                @if($day_id)
                                    <input type="hidden" name="day_id" value="{{ $day_id }}">
                                @endif
                                <input type="hidden" name="invitation_type" value="2">

                                <input type="hidden" name="isPresence" value="1">

                                <span class="span_submit" onclick="document.getElementById('order_status_under_study1').submit();">تحميل</span>
                            </form>
                        </td>
                    </tr>

                    <tr>
                        <td class="gray_font">لم يحضر </td>
                        <td>
                            <form action="{{route('exportExcel')}}" method="post" id="order_status_confirmed1" class="form-horizontal">
                                @csrf
                                @if($day_id)
                                    <input type="hidden" name="day_id" value="{{ $day_id }}">
                                @endif
                                <input type="hidden" name="invitation_type" value="2">
                                <input type="hidden" name="isPresence" value="0">

                                <span class="span_submit" onclick="document.getElementById('order_status_confirmed1').submit();">تحميل</span>
                            </form>
                        </td>
                    </tr>

                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

    @include('admin.includes.home_charts_init')

