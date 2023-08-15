@extends('layouts.admin')

@section('title')
    أماكن الفعالية
@endsection

@section('content')
    <div class="page-content">
        <div class="container-fluid">
            <!-- page title -->
        @include('admin.includes.page_title', ['title'=>'الفعاليات','supTitle' => 'أماكن الفعالية'])

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
        <div class="modal-dialog" style="max-width: 50%;">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <div class="modal-body">
                    <span id="form_result"></span>
                    <form method="post" id="sample_form" class="form-horizontal" enctype="multipart/form-data">

                        <!-- name -->
                        <div class="form-group row mb-3">
                            <label for="name" class="col-sm-3 col-form-label">الاسم</label>
                            <div class="col-sm-9">
                                <input type="text" name="name" class="form-control" id="name">
                            </div>
                        </div>

                        <!-- en name -->
                        <div class="form-group row mb-3">
                            <label for="name" class="col-sm-3 col-form-label">الاسم الأجنبي</label>
                            <div class="col-sm-9">
                                <input type="text" name="name_en" class="form-control" id="name_en">
                            </div>
                        </div>


                        <!-- image -->

                        <!-- submit -->
                        <div class="form-group row justify-content-end">
                            <div class="col-sm-9">
                                <input type="hidden" name="action" id="action" />
                                <input type="hidden" name="hidden_image" id="hidden_image" />
                                    <input type="hidden" name="hidden_id" id="hidden_id" />
                                <input type="submit" name="action_button" id="action_button" class="blueColor btn btn-light" value="Add"
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
                    url: "{{ route('places.index') }}",
                },
                columns: [
                    {
                        data: 'id',
                        render: function (data, type, full, meta) {
                            return `<strong>${data}</strong>`;
                        },
                    },
                    {data: 'name'},
                    {data: 'action', orderable: false, searchable: false}
                ]
            });

            // Add Button
            $('#create_record').click(function () {
                $('#action_button').val("إضافة");
                $('#action').val("Add");
                $('#form_result').html('');
                $('#store_image').html('');
                $('#formModal').modal('show');
                $('#sample_form')[0].reset();

                $('#chart_seats').val("square");
                seats_square();
            });

            // Edit Button
            $(document).on('click', '.edit', function () {
                var id = $(this).attr('data');
                $('#chart_seats').val("square");
                seats_square();

                $.ajax({
                    url: "{{ route('places.index') }}" + '/' + id + '/edit',
                    dataType: "json",
                    success: function (json) {
                        $('#name').val(json.data.name);
                        $('#name_en').val(json.data.name_en);

                        if(json.data.chart_seats == 'circle'){
                            seats_circle();
                            genTables(json.data.tables_count, json.tables);
                        }
                        if(json.data.chart_seats == 'square') seats_square();

                        $('#chart_seats').val(json.data.chart_seats);
                        $('#rows_count').val(json.data.rows_count);
                        $('#columns_count').val(json.data.columns_count);
                        $('#tables_count').val(json.data.tables_count);

                        $('#hidden_id').val(json.data.id);

                        if(json.data.image != null){
                            $('#store_image').html(`<img src="${json.data.image}" width='70' class='img-thumbnail' />`);
                            $('#hidden_image').val(json.originImage);
                        }
                        else{
                            $('#store_image').html("");
                            $('#hidden_image').val("");
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
                    url: "{{ route('places.store') }}",
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
                    }
                });
            });
            $("#records_table_filter").addClass("col-12");
            $(document).on('change', '#chart_seats', function () {
                var chart_seats = $(this).val();

                if(chart_seats == 'circle') {
                    seats_circle();
                    genTables(1);
                }
                if(chart_seats == 'square') seats_square();
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
                $.ajax({
                    url: "{{ route('places.index') }}" + '/' + record_id,
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

            $(document).on("input",'#tables_count' ,function() {
                var num_tables = $(this).val();
                genTables(num_tables);
            });
        });

        function seats_square(){
            var square_chart = `
      <div class="form-group row mb-3">
         <label for="name" class="col-sm-3 col-form-label"></label>

         <label for="name" class="col-sm-2 col-form-label">عدد الصفوف</label>
         <div class="col-sm-2">
            <input type="number" name="rows_count" class="form-control" id="rows_count"  min="1" value="1" required>
         </div>

         <label for="name" class="col-sm-2 col-form-label">عدد الأعمدة</label>
         <div class="col-sm-2">
            <input type="number" name="columns_count" class="form-control" id="columns_count"  min="1"  value="1" required>
         </div>
      </div>
   `;

            $('#chart_seats_data').html(square_chart);
        }

        function seats_circle(){
            var circle_chart = `
      <div class="form-group row mb-3">
         <label for="name" class="col-sm-3 col-form-label"></label>

         <label for="name" class="col-sm-3 col-form-label">عدد الطاولات</label>
         <div class="col-sm-6">
            <input type="number" name="tables_count" class="form-control" id="tables_count" min="1"  value="1" required>
         </div>
      </div>

      <div id="chairs_circle"></div>
   `;

            $('#chart_seats_data').html(circle_chart);
        }

        function genTables(tables, values = null){
            var chairs = ``;
            var ch = ``;
            for (let index = 1; index <= tables; index++) {
                var val = 1;
                if(values && Object.keys(values).length > 0) var val = values[index];

                ch = `
         <div class="form-group row mb-3">
            <label for="name" class="col-sm-3 col-form-label"></label>

            <label for="name" class="col-sm-3 col-form-label">عدد كراسي الطاولة ${index}</label>
            <div class="col-sm-6">
               <input type="number" name="chairs[]" class="form-control" min="1"  value="${val}" required>
            </div>
         </div>
      `;
                chairs += ch;
            }

            $('#chairs_circle').html(chairs);
        }


        // preview image before upload it
        var loadFile = function(event) {
            $('#store_image').html(`<img src="${URL.createObjectURL(event.target.files[0])}" width='70' class='img-thumbnail' />`);
        };
    </script>
@endpush

