@extends('layouts.admin')

@section('title')
الحضور ضمن الفعالية
@endsection

@section('content')
    <div class="page-content">
        <div class="">
            <!-- page title -->
        @include('admin.includes.page_title', ['title'=>'الحضور','supTitle' => 'الحضور ضمن الفعالية'])

        <!-- Filter | Excel | Add -->
            <div class="row">
                <div class="col-4"></div>

                <div  class="col-4" style="width: 20%; float: left ;text-align: center">
                    <div id="result"></div>

                    <label for="sear">الفعاليات</label>
                    <br>
                    <select class="form-control"  id="sear"  style="float: left;min-width: 50px">
                        <option value="All">All </option>

                        @foreach($days as $day)
                            <option value="{{$day->name}}">{{$day->name}} </option>
                        @endforeach
                    </select>
                </div>
                <div class="col-4"></div>

                <br>
            </div>
            <div class="row">

                <div class="col-lg-12">
                    <form action="" method="post" id="filter_form" class="form-horizontal" enctype="multipart/form-data">
                        @csrf

                         </form>

                </div>
            </div>
<br>            <!-- Content -->
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
                                    <th>اسم الفعالية</th>

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
                                <label for="mobile" class="col-form-label">رقم االجوال</label>
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

                            <!-- send_email -->
                            <div class="col-sm-6">
                                <label for="send_email" class="col-form-label">إرسال بريد مع تغيير حالة الطلب</label>
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
                        </div>

                        <!-- attendance_party | order_status -->
                        <div class="form-group row mb-3">
                            <!-- attendance_party -->
                            <div class="col-sm-6">
                                <label for="attendance_party" class="col-form-label">هل حضر الفعالية</label>
                                <div class="custome_blue_radio">
                                    <fieldset class="radio btn-radio btn-group" data-toggle="buttons">
                                        <label for="attendance_party_1" id="attendance_party_for_1" class="for_radio_1 btn-default btn active">
                                            <input type="radio" class="input_radio_1" name="attendance_party" id="attendance_party_1" value=1 checked="checked">
                                            <span>نعم</span>
                                        </label>

                                        <label for="attendance_party_0" id="attendance_party_for_0" class="btn-default btn">
                                            <input type="radio" name="attendance_party" id="attendance_party_0" value=0>
                                            <span>لا</span>
                                        </label>
                                    </fieldset>
                                </div>
                            </div>

                            <!-- order_status -->
                            <div class="col-sm-6">
                                <label for="order_status" class="col-form-label">حالة الطلب</label>
                                <select name="order_status" class="form-control" id="order_status">
                                    <option value="">الرجاء الاختيار</option>
                                    <option value="under_study">قيد الدراسة</option>
                                    <option value="confirmed">تم التأكيد</option>
                                    <option value="apology">تم الاعتذار</option>
                                </select>
                            </div>
                        </div>

                        <!-- submit -->
                        <div class="form-group row justify-content-end">
                            <div class="col-sm-9">
                                <input type="hidden" name="hidden_id" id="hidden_id" />
                                <input type="submit" name="action_button" id="action_button" class="blueColor btn btn-light" value="Add"
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
    <script src="http://cdnjs.cloudflare.com/ajax/libs/toastr.js/2.0.2/js/toastr.min.js">
    </script>
    <script type="text/javascript">
        $(document).ready(function () {

            $.ajaxSetup({ headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') } });
            // Show tabel
          var table=  $('#records_table').DataTable({
                processing: true,
                serverSide: true,
                retrieve: true,
                "order": [[ 0, "asc" ]],
              dom: 'Blfrtip',
              buttons: [
                  {
                      extend: 'excel',
                  },
                  {
                      extend: 'print',
                  }
              ],
                ajax: {
                    url:" {{route('presencedata')}}"
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
                    {data: 'day'},
                    {data: 'action', orderable: false, searchable: false}
                ]
            });

            $('#sear').on('change',function (){
                var s=document.getElementById('sear');
                console.log(s.value);
                table.column(4).search(s.value).draw();
                if(s.value == 'All')
                {console.log('s.value');

                    table.column(4).search('').draw();

                }
            })


            // Add Button
            $(document).on('click', '.sendcer', function () {
                var        id = $(this).attr('data');
console.log(id);
                $.ajax({
                    url:'sendcer/'+id,
                    method : "get",
                    success: function (data) {
                        console.log('asdsa');
if(data.errors)
var alert= "<div class='alert alert-danger'>"+data.errors[0]+"</div>"
else
    var alert= "<div class='alert alert-success'>تمت العملية بنجاح</div>"

                        $('#result').html(alert);
                        $('#result').show();

                        setTimeout(function () {
                            $('#result').hide();
                        }, 1000);

                    }
                })
            });


               $('#create_record').click(function () {
                FormReset();

                $('#action_button').val("إضافة");

                $('#formModal').modal('show');
            });

            // View Chairs Chart

            // View Changes History

            // Edit Button

            // Edit Chair Button

            // View Button

            // Print Button without background

            // Print Button  with background

            // Submit Form

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
                    url: "{{ route('presence.index') }}" + '/' + record_id,
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


        });



    </script>

@endpush

