@extends('layouts.admin')

@section('title')
    الموظفين
@endsection

@section('content')
    <div class="page-content">
        <div class="container-fluid">
            <!-- page title -->
        @include('admin.includes.page_title', ['title'=>'لوحة التحكم','supTitle' =>  'الموظفين'])

        <!-- Content -->
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body">
                            <button type="button" name="create_record" id="create_record" class="btn btn-success waves-effect waves-light" style="margin-bottom: 15px;">
                                <i class="bx bx-plus font-size-16 align-middle mr-1"></i>
                                إضافة
                            </button>
                            <table id="records_table" class="table dt-responsive nowrap text-center"
                                   style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                                <thead>
                                <tr>
                                    <th>المعرف</th>
                                    <th>الاسم</th>
                                    <th>البريد الإلكتروني</th>
                                    <th>النوع</th>

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

    <!-- Modal: Add | Edit -->
    <div id="formModal" class="modal fade" role="dialog">
        <div class="modal-dialog" style="max-width: 45%;">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <div class="modal-body">
                    <span id="form_result"></span>
                    <form method="post" id="sample_form" class="form-horizontal" enctype="multipart/form-data">
                        <div class="form-group row mb-3">
                            <label for="name" class="col-sm-3 col-form-label">نوع المستخدم</label>
                            <div class="col-sm-9">
<select id="isadmin"  class="form-control" name="isadmin">
    <option value="1">admin</option>
    <option value="0">مستخدم عادي</option>

</select>
                            </div>
                        </div>

                        <!-- name -->
                        <div class="form-group row mb-3">
                            <label for="name" class="col-sm-3 col-form-label">الاسم</label>
                            <div class="col-sm-9">
                                <input type="text" name="name" class="form-control" id="name">
                            </div>
                        </div>

                        <!-- username -->

                        <!-- email -->
                        <div class="form-group row mb-3">
                            <label for="email" class="col-sm-3 col-form-label">البريد الإلكتروني</label>
                            <div class="col-sm-9">
                                <input type="email" name="email" class="form-control" id="email">
                            </div>
                        </div>

                        <!-- password -->
                        <div class="form-group row mb-3">
                            <label for="password" class="col-sm-3 col-form-label">كلمة السر</label>
                            <div class="col-sm-9">
                                <input type="password" name="password" class="form-control" id="password">
                            </div>
                        </div>

                        <!-- password_confirmation -->
                        <div  class="form-group row mb-3">
                            <label for="name" class="col-sm-3 col-form-label">تأكيد كلمة السر</label>
                            <div class="col-sm-9">
                                <input type="password" name="password_confirmation" class="form-control" id="password_confirmation">
                            </div>
                        </div>
                        <div id="adddaytouser">
                        <p>اضافة فعاليات للمستخدم</p>

                        <div style="border: 1px solid whitesmoke" class="form-group row mb-3">
    @foreach($days as $day)
<div class="col-12">
        <label  class="col-sm-10 col-form-label" for="day[]" >{{$day->name}}</label>
        <input class="col-sm-1" type="checkbox" id="days[]" name="days[]" value="{{$day->id}} " >
</div>
    @endforeach
</div>
                        </div><!-- submit -->
                        <div class="form-group row justify-content-end">
                            <div class="col-sm-9">
                                <input type="hidden" name="action" id="action" />
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

    <!-- Modal: Edit Permissions -->
    <div id="permissionModal" class="modal fade" role="dialog">
        <div class="modal-dialog">
            <div class="modal-content" id="permissionModalContent">

            </div>
        </div>
    </div>




    <div id="dayModal" class="modal fade" role="dialog">
        <div class="modal-dialog">
            <div class="modal-content" id="dayModalContent">

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
@endsection

@push('AJAX')

    <script type="text/javascript">
        $(document).ready(function () {
            $.ajaxSetup({ headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') } });

            // Show tabel
            $('#records_table').DataTable({
                processing: true,
                serverSide: true,
                retrieve: true,
                "order": [[ 0, "asc" ]],
                ajax: {
                    url: "{{ route('employees.index') }}",
                },
                columns: [
                    {
                        data: 'id',
                        render: function (data, type, full, meta) {
                            return `<strong>${data}</strong>`;
                        },
                    },
                    {data: 'name'},
                    {data: 'email'},
                    {data: 'isadmin',
                    render:function (data, type, full, meta) {
                      if(data ==1 )
                        return `<strong>admin</strong>`;
else
                          return '<strong>مستخدم</strong>';
                    }},

                    {data: 'action', orderable: false, searchable: false}
                ]
            });

            // Add Button
            $('#create_record').click(function () {
                $('#action_button').val("إضافة");
                $('#action').val("Add");
                $('#adddaytouser').hide();

                $('#form_result').html('');
                $('#formModal').modal('show');
                $('#sample_form')[0].reset();
                $('#password').attr('placeholder', '');
            });

            // Edit Button
            $(document).on('click', '.edit', function () {
                var id = $(this).attr('data');
                $.ajax({
                    url: "{{ route('employees.index') }}" + '/' + id + '/edit',
                    dataType: "json",
                    success: function (json) {
                        $('#isadmin').val(json.data.isadmin);

                        $('#name').val(json.data.name);
                        $('#username').val(json.data.username);
                        $('#email').val(json.data.email);
                        $('#hidden_id').val(json.data.id);
                        $('#password').attr('placeholder', 'اترك كلمة السر فارغة إذا كنت لا ترغب بتعديلها');
                    }
                })
                $('#action').val("Edit");
                $('#action_button').val("تعديل");
                $('#form_result').html('');
                $('#adddaytouser').hide();

                $('#formModal').modal('show');
            });
//////////////////////////
            $(document).on('click', '.permission', function () {
                $('#permission_result').html('');

                var id = $(this).attr('data');
                var url = "{{ route('view_permission', ':id') }}";
                url = url.replace(':id', id);
                $.ajax({
                    url: url,
                    success: function (json) {
                        $('#permissionModalContent').html(json);
                    }
                })
                $('#permissionModal').modal('show');
            });

            // add day to user Button
            $(document).on('click', '.add_days', function () {
                $('#day_result').html('');

                var id = $(this).attr('data');
                var url = "{{ route('view_days_user', ':id') }}";
                url = url.replace(':id', id);
                $.ajax({
                    url: url,
                    success: function (json) {
                        $('#dayModalContent').html(json);
                    }
                })
                $('#dayModal').modal('show');
            });
///////////
$(document).on('submit', '#permission_form', function (event) {
            event.preventDefault();
            $('#permission_result').html('');

            $.ajax({
                url: "{{ route('employees.permission') }}",
                beforeSend: function () {
                    $('#permission_button').hide();
                    $('#permission_spinner').show();
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
                        setTimeout(function(){$('#permissionModal').modal('hide');}, 1000);
                    }
                    $('#permission_result').html(html);
                    $('#permission_button').show();
                    $('#permission_spinner').hide();
                }
            });
        });


        //add day to user form
            $(document).on('submit', '#add_day_form', function (event) {
                event.preventDefault();
                $.ajax({
                    url: "{{ route('store_day_to_user') }}",

                    beforeSend: function () {
                        $('#day_button').hide();
                        $('#day_spinner').show();
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
                            $('#add_day_form')[0].reset();
                            $('#records_table').DataTable().ajax.reload();
                            setTimeout(function(){$('#dayModal').modal('hide');}, 1000);
                        }
                        $('#day_result').html(html);
                        $('#day_button').show();
                        $('#day_spinner').hide();
                    }
                });

            });



            $('#isadmin').on('change', function (event) {
if($('#isadmin').val()==1 && $('#action').val()== 'Add')
{
    $('#adddaytouser').hide();



}
if($('#isadmin').val()==0 && $('#action').val()=="Add")
    $('#adddaytouser').show();

            });
            // Submit Form
            $('#sample_form').on('submit', function (event) {
                event.preventDefault();
                $.ajax({
                    url: "{{ route('employees.store') }}",
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
                        $('#form_result').html(html);
                        $('#action_button').show();
                        $('#action_spinner').hide();
                    }
                });
            });

            // Submit Permission Form

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
                    url: "{{ route('employees.index') }}" + '/' + record_id,
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
        });
    </script>
@endpush

