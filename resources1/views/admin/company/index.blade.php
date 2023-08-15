@extends('layouts.appp')
@section('css')
    <style>
        .red{
            color:red;
        }
        .error{
            color:red;
        }
        .alert-danger {
            background-color: red !important;
        }
    </style>
    @endsection
@section('content')
<div id="content">
                <!-- Begin Page Content -->
                <div class="container-fluid">
                    <!-- DataTales Example -->
                    <div class="card shadow mb-2">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">
                                <a class="btn" data-toggle="modal12" data-target="#exampleModal12" style="font-weight:bold;float:right;font-size:1.2rem">  جدول الشركات</a>
                                
                            </h6>
                            <!-- Button trigger modal -->
                                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal" style="float:left">
                                 شركة جديدة <i class="fa fa-plus"></i>
                                </button>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered yajra-datatable"  width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>التسلسل</th>
                                            <th> اسم الشركة</th>
                                            <th> اسم الفئة</th>
                                            <th> رابط التسجيل </th>
                                            <th> العدد المسموح  </th>
                                            <th> عدد المسجلين </th>
                                            <th> الرمز </th>
                                            <th>الإجراء</th>
                                        </tr>
                                    </thead>
                                    <tbody>

                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>

            </div>
            <!-- /.container-fluid -->

            </div>
            
<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">إضافة شركة جديدة</h5>
      </div>
      <form action="{{ route('companies.store') }}" method="post" id="addNewCategory">
          @csrf
          <div class="modal-body">
            <label for="name">اسم الشركة</label>
            <input type="text" dir="trl" class="form-control" name="name" id="name" required/>
            <label for="name">العدد المسموح للتسجيل </label>
            <input type="number" dir="trl" class="form-control" name="allowed_count" id="allowed_count" required/>
            <labe for="category_id">الفئة</labe>
            <select name="category_id" class="form-control">
                @foreach($categories as $categorty)
                <option value="{{$categorty->id}}">{{$categorty->name}}</option>
                @endforeach
            </select>
            <label>الرمز</label>
            <input type="text" class="form-control" name="label" required/>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary closeAdd" data-dismiss="modal">إغلاق</button>
            <button type="submit" class="btn btn-primary">حفظ </button>
          </div>
      </form>
    </div>
  </div>
</div>

<!-- Modal -->
<div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">تعديل شركة</h5>
      </div>
      <form action="" method="post" id="editCompany">
          @csrf
          @method('put')
          <div class="modal-body">
            <label for="name">اسم الشركة</label>
            <input type="text" dir="trl" class="form-control" name="name" id="name" required/>
            <label for="name">العدد المسموح للتسجيل </label>
            <input type="number" dir="trl" class="form-control" name="allowed_count" id="allowed_count" required/>
            <labe for="category_id">الفئة</labe>
            <select name="category_id" class="form-control">
                @foreach($categories as $categorty)
                <option value="{{$categorty->id}}">{{$categorty->name}}</option>
                @endforeach
            </select>
            <label>الرمز</label>
            <input type="text" class="form-control" name="label" required/>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary closeAdd" data-dismiss="modal">إغلاق</button>
            <button type="submit" class="btn btn-primary">حفظ </button>
          </div>
      </form>
    </div>
  </div>
</div>

@push('style')

    <link href="{{ asset('assets/SmartWizard/bootstrap.css')}}" rel="stylesheet" type="text/css" />
    {{--<link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-rtl/3.4.0/css/bootstrap-rtl.css" rel="stylesheet" type="text/css" />--}}
    {{--<link href="{{ asset('assets/admin/lib/SmartWizard/dist/css/smart_wizard.css')}}" rel="stylesheet" type="text/css" />--}}
    {{--<link href="{{ asset('assets/admin/lib/SmartWizard/dist/css/smart_wizard_theme_arrows.css')}}" rel="stylesheet" type="text/css" />--}}
    {{--<link href="{{ asset('assets/SmartWizard/theme_new.css')}}" rel="stylesheet" type="text/css" />--}}
    <link href="{{ asset('assets/SmartWizard/theme-ar.css')}}" rel="stylesheet" type="text/css" />

@endpush

@push('script')

    <script src="{{ asset('assets/SmartWizard/jquery.min.js')}}"></script>

    <script src="{{ asset('assets/SmartWizard/bootstrap.js')}}"></script>
    <script src="{{ asset('assets/SmartWizard/custom_js.js')}}"></script>

    <script src="{{ asset('assets/SmartWizard/validator.min.js')}}"></script>
    <script type="text/javascript" src="{{ asset('assets/admin/lib/SmartWizard/dist/js/jquery.smartWizard.js')}}"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-validator/0.5.3/js/bootstrapValidator.js"></script>
    <script type="text/javascript">
    $(function () {

        $.ajaxSetup({
                  headers: {
                      'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                  }
        });
        
        var table = $('.yajra-datatable').DataTable({
            processing: true,
            serverSide: true,
            ajax: "{{ route('companies.getData') }}",
            columns: [
                {data: 'id', name: 'id'},
                {data: 'name', name: 'name'},
                {data: 'category_name', name: 'category_name'},
                {data: 'reg_link', name: 'reg_link'},
                {data: 'allowed_count', name: 'allowed_count'},
                {data: 'members_count', name: 'members_count'},
                {data: 'label', name: 'label'},
                {
                    data: 'action', 
                    name: 'action', 
                    orderable: true, 
                    searchable: true
                },
            ] ,
            columnDefs: [
                {
                // For Responsive
                responsivePriority: 13,
                targets: 0
                },
                {
                    targets: 0,
                    render: function (data, type, full) {
                        var text = full['id'];
                        return text;

                    }
                },
                {
                    targets: 1,
                    render: function (data, type, full) {
                        var text = full['name'];
                        return text;

                    }
                },
                {
                    targets: 3,
                    render: function (data, type, full) {
                        var text = full['reg_link'];
                        return '<a target="_blank" href="'+text+'">'+text+'</a>';

                    }
                },
                {
                // Actions
                targets: 7,
                render: function (data, type, full, meta) {
                    var id = full['id'];
		            var delUrl = "{{ route('companies.destroy', [':id']) }}";
		              var editUrl = "{{ route('companies.show', [':id']) }}";
		            delUrl = delUrl.replace(':id', id);
		             editUrl = editUrl.replace(':id', id);
                    return (
                        '<div>' +
                          '<a title="تعديل" style="text-align:center" class="btn btn-info btn-sm " href="'+ editUrl + '" data-toggle="modal" data-target="#editModal"  id="edit_btn" class="dropdown-item"> <i class="fa fa-pencil"></i></a>'+
                        '<a title="حذف" style="text-align:center" class="btn btn-danger btn-sm" href="'+ delUrl + '" id="delete_btn" class="dropdown-item"> <i class="fa fa-trash"></i></a>'+
                        '</div>'
                    );
                }
                }
            ]
        });

        $(document).on('click', '#delete_btn', function (e) {
            e.preventDefault();

            var url = $(this).attr('href');
            bootbox.confirm('سيتم حذف الفئة ,هل أنت متأكد ؟', function (res) {

                if (res) {
                    $.ajaxSetup({
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        }
                    });

                    $.ajax({
                        'url': url,
                        'type': 'DELETE',
                        'dataType': 'json',
                        data: {
                            '_token': $('meta[name="csrf-token"]').attr('content')
                        },
                        success: function (response) {
                            toastr.options = {
                                "debug": false,
                                position: { X: 'Left', Y: 'Top' },
                                "fadeIn": 300,
                                "fadeOut": 1000,
                                "timeOut": 5000,
                                "extendedTimeOut": 1000
                            }
                            table.ajax.reload();
                        },
                        error: function (xhr) {
                            
                        }
                    });
                }

            });
        });

        $('#myModal').on('shown.bs.modal', function () {
            $('#myInput').trigger('focus')
        });

        $(document).on('submit', '#addNewCategory', function (e) {
            e.preventDefault();

            var url = $(this).attr('action');
            var name = $(this).serialize();
            $.ajaxSetup({
                  headers: {
                      'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                  }
            });
            $.ajax({
                'url': url,
                'type': 'POST',
                'dataType': 'json',
                data: name,
                success: function (response) {
                    toastr.success('Category has been added successfully');
                    table.ajax.reload();
                    $('input[name="name"]').val('');
                    $(".closeAdd").click();
                },
                error: function (xhr) {
                    toastr.error('Something went wrong !');
                    $(".closeAdd").click();
                }
            });

        });
        
      $(document).on('click', '#edit_btn', function (e) {
        e.preventDefault();
        var url = $(this).attr('href');
        
                
        $.ajax({
    
              'url' : url,
              'type' : 'GET',
              'datatype':'json',
          }).done(function(response) {
            $('#editModal input[name="name"]').val(response.name);
             $('#editModal input[name="allowed_count"]').val(response.allowed_count);
                  $('#editModal select[name="category_id"]').val(response.category_id);
                       $('#editModal input[name="label"]').val(response.label);
                       var urlEdit = '{{ route("companies.update", ":id") }}';
                
                        urlEdit = urlEdit.replace(':id', response.id);

                       $('#editCompany').attr('action',urlEdit)
           
    
          })
  
      });
        
    });
    </script>
    @endpush

@endsection
