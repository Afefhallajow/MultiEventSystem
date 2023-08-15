@extends('layouts.admin')

@section('title')
    جميع الدعوات
@endsection

@section('content')
    <div class="page-content">
        <div class="">
            <!-- page title -->
        @include('admin.includes.page_title', ['title'=>'الفعالية','supTitle' => 'جميع الدعوات'])

        <!-- Filter | Excel | Add -->
            <div class="row">
                <div class="col-lg-12">
                    <form action="" method="post" id="filter_form" class="form-horizontal" enctype="multipart/form-data">
                        @csrf
                        <button type="button" name="create_record" id="create_record" class="btn btn-success blueColor waves-effect waves-light" style="margin-bottom: 15px;">
                            <i class="bx bx-plus font-size-16 align-middle mr-1"></i>
                            إضافة
                        </button>

                    </form>

                </div>
            </div>

            <!-- Content -->
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body">
                            <table id="records_table" class="table dt-responsive table-bordered table-striped table-hover nowrap text-center"
                                   style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                                <thead>
                                <tr>
                                    <th>المعرف</th>
                                    <th>الاسم</th>
                                    <th>رقم الجوال</th>
                                    <th>البريد الإلكتروني</th>

                                    <th>المنطقة</th>
                                    <th>الهوية الوطنية</th>
                                    <th>العمر</th>
                                    <th>العمل</th>
                                    <th>الفعالية</th>

                                    <th>نوع الدعوة</th>
                                    <th>هل حضر الفعالية</th>

                                    <th></th>
                                </tr>
                                </thead>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal: Edit Chair -->
    <div id="editChairModal" class="modal fade" role="dialog">
        <div class="modal-dialog" style="max-width: 45%;">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <div class="modal-body" id="edit_chair">
                </div>
            </div>
        </div>
    </div>

    <!-- Modal: View -->
    <div id="viewModal" class="modal fade" role="dialog">
        <div class="modal-dialog" style="max-width: 45%;">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <div class="modal-body" id="view_info">
                </div>
            </div>
        </div>
    </div>

    <!-- Modal: Changes History -->
    <div id="changesHistoryModel" class="modal fade" role="dialog">
        <div class="modal-dialog" style="max-width: 80%;">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <div class="modal-body" id="changes_history">
                </div>
            </div>
        </div>
    </div>

    <!-- Modal: Add | Edit -->
    <div id="formModal" class="modal fade" role="dialog">
        <div class="modal-dialog" style="max-width: 60%;">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <div class="modal-body">
                    <span id="form_result"></span>
                    <form method="post" id="sample_form" class="form-horizontal" enctype="multipart/form-data">
                        <input type="hidden" name="invitation_type" id="invitation_type" value="invited">
                        <input type="hidden" name="source" id="source" value="internal">
                        <!-- day_id -->
                        <div class="form-group row mb-3">
                            <div class="col-sm-6">
                                <label for="day_id" class="col-sm-3 col-form-label">الفعالية</label>
                                <select name="day_id" class="form-control" id="day_id">
                                    <option value="">الرجاء الاختيار</option>
                                    @foreach ($days as $day)
                                        <option value="{{$day->id}}"> {{$day->name}} </option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <!-- first surname | second surname -->

                        <!-- second surname -->

                        <!-- name | mobile -->
                        <div class="form-group row mb-3">
                            <!-- name -->
                            <div class="col-sm-6">
                                <label for="name" class="col-form-label">الاسم</label>
                                <input type="text" name="name" class="form-control" id="name">
                            </div>

                            <!-- mobile -->
                            <div class="col-sm-6">
                                <label for="mobile" class="col-form-label">رقم الجوال</label>
                                <input type="text" name="mobile" class="form-control" id="mobile">
                            </div>
                        </div>

                        <!-- email | organization -->
                        <div class="form-group row mb-3">
                            <!-- email -->
                            <div class="col-sm-6">
                                <label for="email" class="col-form-label">البريد الإلكتروني</label>
                                <input type="email" name="email" class="form-control" id="email">
                            </div>

                            <!-- gender -->
                            <div class="col-sm-6">
                                <label for="id_number" class="form-label">الهوية الوطنية</label>
                                <input  name="id_number" class="form-control" id="id_number" >
                            </div>
                            <div class="col-sm-6">
                                <label for="area" class="form-label">المنطقة</label>
                                <select  name="area" class="form-control" id="area" >
                                    @foreach($places as $day)
                                        <option value="{{$day->name}}">{{$day->name}}</option>
                                    @endforeach
                                </select>                            </div>
                            <div class="col-sm-6">
                                <label for="gender" class="form-label">الجنس</label>
                                <select  name="gender" class="form-control" id="gender" >
                                    <option value="ذكر" >ذكر</option>
                                    <option value="انثى" >انثى</option>


                                </select>                            </div>



                        </div>

                        <!-- position -->
                        <!-- category | send_email -->
                        <div class="form-group row mb-3">
                            <!-- category -->


                            <div class="col-6">
                                <label for="id_number" class="form-label">العمر</label>
                                <select  name="age" class="form-control" id="age" >
                                    <option value="15-20" >15-20سنة </option>
                                    <option value="25-35" >25-35سنة </option>
                                    <option value="35-45" >35-45سنة </option>
                                    <option value="45-55" >45-55سنة </option>
                                    <option value="55-65" >55-65سنة </option>
                                </select>
                            </div>

                            <div class="col-6 ">
                                <label for="work" class="form-label">العمل</label>
                                <select  name="work" class="form-control" id="work" >
                                    <option value="أعمل">أعمل</option>
                                    <option value=" لا أعمل"> لا أعمل</option>
                                    <option value="أخرى">أخرى</option>

                                </select>      </div>
                        </div>
                        <!-- send_email -->
                        <div id="sent">
                            <div class="col-sm-5">
                                <label for="send_email" class="col-form-label">إرسال بريد </label>
                                <div class="custome_blue_radio">
                                    <fieldset class="radio btn-radio btn-group" data-toggle="buttons">
                                        <label for="send_email_1" id="send_email_for_1" class="for_radio_1 btn-default btn active">
                                            <input class="input_radio_1" type="radio" name="send_email" id="send_email_1" value=1 checked="checked">
                                            <span>نعم</span>
                                        </label>

                                        <label for="send_email_0" id="send_email_for_0" class="btn-default btn">
                                            <input type="radio" name="send_email" id="send_email_0" value=0>
                                            <span>لا</span>
                                        </label>
                                    </fieldset>
                                </div>
                            </div>
                            <!-- attendance_party -->
                            <div class="col-sm-5">
                                <label for="attendance_party" class="col-form-label">ارسال واتساب</label>
                                <div class="custome_blue_radio">
                                    <fieldset class="radio btn-radio btn-group" data-toggle="buttons">
                                        <label for="attendance_party_1" id="attendance_party_for_1" class="for_radio_1 btn-default btn active">
                                            <input type="radio" class="input_radio_1" name="send_whats" id="attendance_party_1" value=1 checked="checked">
                                            <span>نعم</span>
                                        </label>

                                        <label for="attendance_party_0" id="attendance_party_for_0" class="btn-default btn">
                                            <input type="radio" name="send_whats" id="attendance_party_0" value=0>
                                            <span>لا</span>
                                        </label>
                                    </fieldset>
                                </div>
                            </div>
                        </div>


                        <!-- attendance_party | order_status -->
                        <div class="form-group row mb-3">
                            <!-- attendance_party -->

                            <!-- order_status -->
                        </div>

                        <!-- submit -->
                        <div class="form-group row justify-content-end">
                            <div class="col-sm-9">
                                <input type="hidden" name="hidden_id" id="hidden_id" />
                                <input type="submit" name="action_button" id="action_button" class=" btn btn-primary" value="Add"
                                       style="padding:8px 40px;" />
                                <div id="action_spinner" class="spinner-grow text-secondary m-1 blueColor" role="status" style="display: none">
                                    <span class="sr-only">Loading...</span>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal: Confirm Delete -->
    <div id="confirmModal" class="modal fade" role="dialog">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title mrAuto" align="center">تأكيد الحذف</h4>
                </div>
                <div class="modal-body">
                    <h5 align="center" style="margin:0;">هل تريد بالتأكيد حذف البيانات؟</h5>
                </div>
                <div class="modal-footer">
                    <button type="button" name="ok_button" id="ok_button" class="btn btn-danger mrAR">نعم</button>
                    <button type="button" class="btn btn-light" data-dismiss="modal">إلغاء</button>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal: View Chairs Chart -->
    <div id="chairChartModal" class="modal fade" role="dialog">
        <div class="modal-dialog" style="max-width: 90%;">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <div class="modal-body" id="content_chairs_chart">
                </div>
            </div>
        </div>
    </div>

@endsection

@push('AJAX')

    <script type="text/javascript">
        $(document).ready(function () {
            $.ajaxSetup({ headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') } });

            // Show tabel
            load_invitation("{{ route('invites.index') }}");

            // Add Button
            $('#create_record').click(function () {
                FormReset();

                $('#action_button').val("إضافة");

                $('#formModal').modal('show');
            });

            // View Chairs Chart

            // View Changes History

            // Edit Button
            $(document).on('click', '.edit', function () {
                var id = $(this).attr('data');
                $.ajax({
                    url: "{{ route('invites.index') }}" + '/' + id + '/edit',
                    dataType: "json",
                    success: function (json) {
                        $('#name').val(json.data.name);
                        $('#mobile').val(json.data.mobile);
                        $('#email').val(json.data.email);
                        $('#gender').val(json.data.gender);
                        $('#area').val(json.data.area);
                        $('#id_number').val(json.data.id_number);
                        $('#age').val(json.data.age);
                        $('#work').val(json.data.work);
                        $('#day_id').val(json.data.day_id);
                        $('#invitation_type').val(json.data.invitation_type);
                        $('#send_email').val(1);
                        $('#hidden_id').val(json.data.id);

                        $('.custome_blue_radio label').removeClass('active');
                        $('#attendance_party_for_' + json.data.attendance_party).addClass('active');
                        $('#send_email_for_' + json.data.send_email).addClass('active');
                        $('#sent').hide();

                        $('#attendance_party_' + json.data.attendance_party).prop('checked', true);
                        $('#send_email_' + json.data.send_email).prop('checked', true);
                    }
                })
                $('#action_button').val("تعديل");
                $('#formModal').modal('show');
                ClearAlert();
            });

            // Edit Chair Button

            // View Button

            // Print Button without background

            // Print Button  with background

            // Submit Form
            $('#sample_form').on('submit', function (event) {
                event.preventDefault();
                $.ajax({
                    url: "{{ route('invites.store') }}",
                    beforeSend: function () {
                        $('#action_button').hide();
                        $('#action_spinner').show();
                    },
                    method: "POST",
                    data: new FormData(this),
                    contentType: false,
                    cache: false,
                    processData: false,
                    dataType: "json",
                    success: function (data) {
                        var html = '';
                        if (data.errors) {
                            html = '<div class="alert alert-danger">';
                            for (var count = 0; count < data.errors.length; count++) {
                                html += '<p><i class="bx bx-error font-size-16 align-middle mr-1"></i>' + data.errors[count] + '</p>';
                            }
                            html += '</div>';
                        }
                        if (data.success) {
                            html = '<div class="alert alert-success"><i class="bx bx-check-double font-size-16 align-middle mr-1"></i>' + data.success +
                                '</div>';
                            $('#sample_form')[0].reset();
                            $('#records_table').DataTable().ajax.reload();
                            setTimeout(function(){$('#formModal').modal('hide');}, 1000);
                        }
                        ClearAlert();
                        $('#form_result').html(html);
                    },
                    error: function(errors){
                        ClearAlert();
                        errors_list = print_errors(errors.responseJSON.errors);
                        // ResultAlert(errors_list);
                    }
                });
            });

            // Edit Chair Form

            var record_id;
            // Button Delete
            $(document).on('click', '.delete', function () {
                record_id = $(this).attr('data');
                $('.modal-title').text('حذف: ' + record_id);
                $('#confirmModal').modal('show');
            });
            // Delete Confirmation
            $('#ok_button').click(function () {
                $.ajax({
                    url: "{{ route('invites.index') }}" + '/' + record_id,
                    beforeSend: function () {
                        $('#ok_button').text('جاري الحذف');
                    },
                    method : "DELETE",
                    success: function (data) {
                        setTimeout(function () {
                            $('#confirmModal').modal('hide');
                            $('#records_table').DataTable().ajax.reload();
                        }, 1000);
                        $('#ok_button').text('نعم');
                    }
                })
            });

            // Filter Results

            // clear filter inputs

            function load_invitation(url) {
                $('#records_table').DataTable({
                    processing: true,
                    serverSide: true,
                    retrieve: true,
                    dom: 'Blfrtip',
                    buttons: [
                        {
                            extend: 'excel',
                        },
                        {
                            extend: 'print',
                        }
                    ],


                    "order": [[ 0, "asc" ]],
                    ajax: {
                        url: url,
                    },
                    columns: [
                        {
                            data: 'id',
                            render: function (data, type, full, meta) {
                                return `<strong>${data}</strong>`;
                            },
                        },
                        {data: 'name'},
                        {data: 'mobile'},
                        {data: 'email'},
                        {data: 'area'},

                        {data: 'id_number'},
                        {data: 'age'},
                        {data: 'work'},
                        {data: 'dayname'},

                        {data: 'invitation_type'    ,                        render: function (data, type, full, meta) {


                                if(full['invitation_type']==1)
                                    return `<strong>تسجيل</strong>`;
                                else  return `<strong>دعوة</strong>`;

                            },
                    },
                        {  data: 'isPresence',
                            render: function (data, type, full, meta) {


                                if(full['isPresence']==1)
                                    return `<strong>نعم</strong>`;
                                else  return `<strong>لا</strong>`;

                            }},


                        {data: 'action', orderable: false, searchable: false}
                    ]
                });
            }

            function load_changes_history(url) {
                $('#changes_history_table').DataTable({
                    processing: true,
                    serverSide: true,
                    retrieve: true,
                    "order": [[ 0, "asc" ]],
                    ajax: {
                        url: url,
                    },
                    columns: [
                        {data: 'created_at'},
                        {data: 'chair'},
                        {data: 'invited'},
                        {data: 'user'},
                    ]
                });
            }
        });
    </script>
@endpush

