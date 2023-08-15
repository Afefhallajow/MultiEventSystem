@extends('layouts.admin')

@section('title')
    الفعاليات
@endsection

@section('content')
    <div class="page-content">
        <div class="container-fluid">
            <!-- page title -->
        @include('admin.includes.page_title', ['title'=>'الفعاليات','supTitle' => 'الفعاليات'])

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
                                    <th >المعرف</th>
                                    <th >الاسم</th>
                                    <th >التاريخ</th>
                                    <th >الوقت</th>
                                    <th>الوصف</th>
                                    <th >المنطقة</th>
                                    <th >مكان الفعالية</th>
                                    <th ></th>
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

                        <!-- name -->
                        <div class="form-group row mb-3">
                            <label for="name" class="col-sm-3 col-form-label">الاسم (*)</label>
                            <div class="col-sm-9">
                                <input type="text" name="name" class="form-control" id="name">
                            </div>
                        </div>
                        <!-- en name -->
                        <div class="form-group row mb-3">
                            <label for="name" class="col-sm-3 col-form-label">الاسم الأجنبي (*)</label>
                            <div class="col-sm-9">
                                <input type="text" name="name_en" class="form-control" id="name_en">
                            </div>
                        </div>
                        <!-- en name -->

                        <!-- date -->
                        <div class="form-group row mb-3">
                            <label for="date" class="col-sm-3 col-form-label">التاريخ (*)</label>
                            <div class="col-sm-9">
                                <input type="date" name="date" class="form-control" id="date">
                            </div>
                        </div>

                        <!-- time -->
                        <div class="form-group row mb-3">
                            <label for="time" class="col-sm-3 col-form-label">الوقت (*)</label>
                            <div class="col-sm-9">
                                <div class="input-group">
                                    <input class="form-control" type="time" id="time" name="time">
                                </div>
                            </div>
                        </div>

                        <!-- description -->
                        <div class="form-group row mb-3">
                            <label for="description" class="col-sm-3 col-form-label">الوصف (*)</label>
                            <div class="col-sm-9">
                                <input type="text" name="description" class="form-control" id="description">
                            </div>
                        </div>
                        <!-- en description -->
                        <div class="form-group row mb-3">
                            <label for="description" class="col-sm-3 col-form-label">الوصف الأجنبي (*)</label>
                            <div class="col-sm-9">
                                <input type="text" name="description_en" class="form-control" id="description_en">
                            </div>
                        </div>
                        <!-- en description -->
                        <!-- place -->
                        <div class="form-group row mb-3">
                            <label for="place_id" class="col-sm-3 col-form-label">المنطقة (*)</label>
                            <div class="col-sm-9">
                                <select name="place_id" class="form-control" id="place_id">
                                    @foreach ($places as $place)
                                        <option value="{{$place->id}}"> {{$place->name}} </option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="form-group row mb-3">
                            <label for="place_id" class="col-sm-3 col-form-label">مكان الفعالية (*)</label>
                            <div class="col-sm-9">
<input id="location" type="text" name="location" class="form-control">
                            </div>
                        </div>

                        <!-- Image -->
                        <div class="form-group row mb-3">
                            <label for="description" class="col-sm-3 col-form-label"> صورة الشهادة(*)</label>
                            <div class="col-sm-9">
                                <input type="file" name="image" class="form-control" id="image"><br>
                                <span id="store_image"></span>
                            </div>
                        </div>

                        <!-- BG Image -->
                        <div class="form-group row mb-3">
                            <label for="description" class="col-sm-3 col-form-label"> الصورة الخاصة بالطباعة (*) </label>
                            <div class="col-sm-9">
                                <input type="file" name="bg_image" class="form-control" id="bg_image"><br>
                                <p class="text-muted">يفضل اختيار صورة أبعادها *</p>
                                <span id="store_bg_image"></span>
                            </div>

                        </div>
                        <!-- Email Image -->

                        <!-- Footer print Image -->

                        <!-- submit -->
                        <div class="form-group row justify-content-end">
                            <div class="col-sm-9">
                                <input type="hidden" name="action" id="action" />
                                <input type="hidden" name="hidden_id" id="hidden_id" />
                                <input type="submit" name="action_button" id="action_button" class="btn btn-primary " value="Add"
                                       style="padding:8px 40px;" />
                                <div class="spinner-grow text-secondary m-1 blueColor" role="status" style="display: none">
                                    <span class="sr-only">Loading...</span>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal: authentication -->
    <div id="authModal" class="modal fade" role="dialog">
        <div class="modal-dialog" style="max-width: 45%;">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <div class="modal-body">
                    <span class="form_result"></span>
                    <form method="post" id="auth_form" class="form-horizontal" enctype="multipart/form-data">

                        <!-- name -->
                        <div class="form-group row mb-3">
                            <label for="auth_name" class="col-sm-3 col-form-label">الاسم</label>
                            <div class="col-sm-9">
                                <input type="text" name="name" class="form-control" id="auth_name">
                            </div>
                        </div>

                        <!-- username -->
                        <div class="form-group row mb-3">
                            <label for="auth_username" class="col-sm-3 col-form-label">اسم المستخدم</label>
                            <div class="col-sm-9">
                                <input type="text" name="username" class="form-control" id="auth_username">
                            </div>
                        </div>

                        <!-- email -->
                        <div class="form-group row mb-3">
                            <label for="auth_email" class="col-sm-3 col-form-label">البريد الإلكتروني</label>
                            <div class="col-sm-9">
                                <input type="email" name="email" class="form-control" id="auth_email">
                            </div>
                        </div>

                        <!-- password -->
                        <div class="form-group row mb-3">
                            <label for="auth_password" class="col-sm-3 col-form-label">كلمة السر</label>
                            <div class="col-sm-9">
                                <input type="password" name="password" class="form-control" id="auth_password">
                            </div>
                        </div>

                        <!-- password_confirmation -->
                        <div class="form-group row mb-3">
                            <label for="auth_password_confirmation" class="col-sm-3 col-form-label">تأكيد كلمة السر</label>
                            <div class="col-sm-9">
                                <input type="password" name="password_confirmation" class="form-control" id="auth_password_confirmation">
                            </div>
                        </div>

                        <!-- submit -->
                        <div class="form-group row justify-content-end">
                            <div class="col-sm-9">
                                <input type="hidden" name="hidden_id" class="hidden_id" />
                                <input type="submit" name="action_button" class="action_button blueColor btn btn-light" value="حفظ" style="padding:8px 40px;" />
                                <div class="action_spinner spinner-grow text-secondary m-1 blueColor" role="status" style="display: none">
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

    <!-- Modal: For Update Images -->
    <div id="updateImagesModal" class="modal fade" role="dialog">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title mrAuto" align="center">تعديل الصور الخاصة بالفعالية </h4>
                </div>
                <form action="{{route('updateimage')}}" method="post" id="updateDayImage">
                    <div class="modal-body">
                        <input type="hidden" id="day_img_id" name="day_id"/>
                        <label>نوع الصورة</label>
                        <select class="form-control" name="img_type">
                            <option value="1">
                               صورة الشهادة
                            </option>
                            <option value="2">
                                الصورة الخاصة بالطباعة
                            </option>
                              </select>
                        <label>الصورة</label>
                        <input type="file" class="form-control" name="newImage" required/>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" name="ok_button" id="ok_button" class="btn btn-primary mrAR">حفظ</button>
                        <button type="button" class="btn btn-light" data-dismiss="modal">إلغاء</button>
                    </div>
                </form>
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
                    url: "{{ route('days.index') }}",

                },
                columns: [
                    {
                        data: 'id',
                        render: function (data, type, full, meta) {
                            return `<strong>${data}</strong>`;
                        },
                    },
                    {data: 'name'},
                    {data: 'date'},
                    {data: 'time'},
                    {data: 'description'},
                    {data: 'place'},
                    {data: 'location'},

                    {data: 'action', orderable: false, searchable: false}
                ],
            });

            // Add Button
            $('#create_record').click(function () {
                $('#action_button').val("إضافة");
                $('#action').val("Add");
                $('#form_result').html('');
                $('#formModal').modal('show');
                $('#sample_form')[0].reset();

                emptyStoredImg()
            });

            // click on authentication buttom

            // Edit Button
            $(document).on('click', '.edit', function () {
                $('#sample_form')[0].reset();
                emptyStoredImg()

                var id = $(this).attr('data');
var s="{{ route('days.index') }}" + '/' + id +'/edit' ;
 console.log(s)
                $.ajax({
                    url: "{{ route('days.index') }}" + '/' + id +'/edit',
                    dataType: "json",
                    success: function (json) {
                        $('#name').val(json.data.name);
                        $('#name_en').val(json.data.name_en);
                        $('#date').val(json.data.date);
                        $('#time').val(json.data.time);
                        $('#description').val(json.data.description);
                        $('#description_en').val(json.data.description_en);
                        $('#place_id').val(json.data.place_id);
                        $('#location').val(json.data.location);

                        $('#hidden_id').val(json.data.id);

                        if(json.data.image != null){
                            $('#store_image').html(`<img src="storage/images/${json.data.image}" width='80' class='img-thumbnail' />`);
                        }else{
                            $('#store_image').html("");
                        }

                        if(json.data.bg_image != null){
                            $('#store_bg_image').html(`<img src="storage/images/${json.data.bg_image}" width='80' class='img-thumbnail' />`);
                        }else{
                            $('#store_bg_image').html("");
                        }
                    }
                })
                $('#action').val("Edit");
                $('#action_button').val("تعديل");
                $('#form_result').html('');
                $('#formModal').modal('show');
            });

            // Submit Form
            $('#sample_form').on('submit', function (event) {
                event.preventDefault();
                $.ajax({
                    url: "{{ route('days.store') }}",
                    beforeSend: function () {
                        $('#action_button').hide();
                        $('.spinner-grow').show();
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
                        $('.spinner-grow').hide();
                    },
                    error: function(jqXHR, textStatus, errorThrown){
                        $('#form_result').html(errorThrown);
                        $('#action_button').show();
                        $('.spinner-grow').hide();
                    }
                });
            });

            var record_id;
            // Button Delete
            $(document).on('click', '.delete', function () {
                record_id = $(this).attr('data');
                $('.modal-title').text('حذف: ' + record_id);
                $('#confirmModal').modal('show');
            });

            // Delete Confirmation
            $('#ok_button').click(function () {
console.log(record_id);

                $.ajax({
                    url: "{{ route('days.index') }}" + '/' + record_id,
                    beforeSend: function () {
                        $('#ok_button').text('جاري الحذف');
                    },
                    method : "DELETE",
                    success: function (data) {
                        console.log('asd');
                        setTimeout(function () {
                            $('#confirmModal').modal('hide');
                            $('#records_table').DataTable().ajax.reload();
                        }, 1000);
                        $('#ok_button').text('نعم');
                    },
                    error: function (xhr) {
console.log(xhr);
                    }
                })
            });

            // Submit Update Images Form
            $('#updateDayImage').on('submit', function (event) {
                event.preventDefault();
                $.ajax({
                    url: "",
                    beforeSend: function () {
                        $('#action_button').hide();
                        $('.spinner-grow').show();
                    },
                    method: "POST",
                    data: new FormData(this),
                    contentType: false,
                    cache: false,
                    processData: false,
                    dataType: "json",
                    success: function (data) {
                        $('#updateImagesModal').modal('hide');
                        $('#updateDayImage input').val('');
                        $('#action_button').show();
                        $('.spinner-grow').hide();
                    }
                });
            });

        });
    </script>
    <script>

        function updateImages(id){
            document.getElementById('day_img_id').value = id;
            $('#updateImagesModal').modal('show');
        }

        function emptyStoredImg(){
            $('#store_image').html("");
            $('#store_bg_image').html("");
            $('#store_emailImage').html("");
            $('#store_image_loader').html("");
        }
    </script>
@endpush
