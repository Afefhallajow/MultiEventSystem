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
        .dtsb-criteria{
            width:100%;
            margin:auto;
            text-align:center;
        }
        .dtsb-inputCont{
            display: initial;
        }
        div.dtsb-searchBuilder {
            margin-bottom: -2rem;
        }
        
        td{
            direction :ltr;
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
                                <a class="btn" data-toggle="modal" data-target="#exampleModal" style="font-weight:bold;float:right;font-size:1.2rem">  جدول المسجلين في الفعالية  </a>
                            </h6>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered yajra-datatable"  width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>Action</th>
                                            <th>Employee No.</th>
                                            <th>Name</th>
                                            <th>Email</th>
                                            <th>Mobile</th>>
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
    <script src="https://nightly.datatables.net/searchbuilder/js/dataTables.searchBuilder.js?_=40f0e1a3ea332af586366e40955c1713"></script>
    <script type="text/javascript">
    var serialNumber = 0;
    $(function () {

        $.ajaxSetup({
                  headers: {
                      'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                  }
        });
        
        var table = $('.yajra-datatable').DataTable({
            
            
            ajax: "{{ route('registeredMembers') }}",
            "initComplete": function() {
                  // Select the column whose header we need replaced using its index(0 based)
                //   this.api().column(10).every(function() {
                //     var column = this;
                //     // Put the HTML of the <select /> filter along with any default options 
                //     var select = $('<select class="form-control input-sm"><option value="">All</option></select>')
                //       // remove all content from this column's header and 
                //       // append the above <select /> element HTML code into it 
                //       .appendTo($('#company'))
                //       // execute callback when an option is selected in our <select /> filter
                //       .on('change', function() {
                //         // escape special characters for DataTable to perform search
                //         var val = $.fn.dataTable.util.escapeRegex(
                //           $(this).val()
                //         );
                //         // Perform the search with the <select /> filter value and re-render the DataTable
                //         column
                //           .search(val ? '^' + val + '$' : '', true, false)
                //           .draw();
                //       });
                //     // fill the <select /> filter with unique values from the column's data
                //     column.data().unique().sort().each(function(d, j) {
                //       select.append("<option value='" + d + "'>" + d + "</option>")
                //     });
                //   });
                //   this.api().column(7).every(function() {
                //     var column = this;
                //     // Put the HTML of the <select /> filter along with any default options 
                //     var select = $('<select class="form-control input-sm"><option value="">All</option></select>')
                //       // remove all content from this column's header and 
                //       // append the above <select /> element HTML code into it 
                //       .appendTo($('#status'))
                //       // execute callback when an option is selected in our <select /> filter
                //       .on('change', function() {
                //         // escape special characters for DataTable to perform search
                //         var val = $.fn.dataTable.util.escapeRegex(
                //           $(this).val()
                //         );
                //         // Perform the search with the <select /> filter value and re-render the DataTable
                //         column
                //           .search(val ? '^' + val + '$' : '', true, false)
                //           .draw();
                //       });
                //     // fill the <select /> filter with unique values from the column's data
                //     column.data().unique().sort().each(function(d, j) {
                //       select.append("<option value='" + d + "'>" + d + "</option>")
                //     });
                //   });
                //     this.api().column(11).every(function() {
                //     var column = this;
                //     // Put the HTML of the <select /> filter along with any default options 
                //     var select = $('<select class="form-control input-sm"><option value="">All</option></select>')
                //       // remove all content from this column's header and 
                //       // append the above <select /> element HTML code into it 
                //       .appendTo($('#category_filter'))
                //       // execute callback when an option is selected in our <select /> filter
                //       .on('change', function() {
                //         // escape special characters for DataTable to perform search
                //         var val = $.fn.dataTable.util.escapeRegex(
                //           $(this).val()
                //         );
                //         // Perform the search with the <select /> filter value and re-render the DataTable
                //         column
                //           .search(val ? '^' + val + '$' : '', true, false)
                //           .draw();
                //       });
                //     // fill the <select /> filter with unique values from the column's data
                //     column.data().unique().sort().each(function(d, j) {
                //       select.append("<option value='" + d + "'>" + d + "</option>")
                //     });
                //   });
                },
            columns: [
                {
                    data: 'action', 
                    name: 'action', 
                    orderable: true, 
                    searchable: true
                },
                {data: 'employee_no', name: 'employee_no'},
                {data: 'name', name: 'name'},
                {data: 'email', name: 'email'},
                {data: 'mobile', name: 'mobile'},
                
            ] ,
            columnDefs: [
                {
                // For Responsive
                responsivePriority: 13,
                targets: 0
                },
                {
                // Actions
                targets: 0,
                render: function (data, type, full, meta) {
                    var id = full['id'];
                    var code = full['qrcode'];
                    var randomCode = full['code'];
                    var printLink = '{{ route("badge.print") }}';
                    var attendLink = '{{ route("vis.attend") }}';
                    var deleteLink = '{{ route("vis.del") }}';
                            return (
                            // '<div class="d-flex align-items-center col-actions">' +
                            // '<div class="dropdown">' +
                            // '<a class="btn btn-sm btn-icon px-0" data-toggle="dropdown">' +
                            //     '<i class="fa fa-ellipsis-v"></i>'+
                            // '</a>' +
                            '<div style="width:200px">' +
                            '<a title="حذف" class="btn btn-danger btn-sm" style="text-align:right;margin: .1rem" href="'+deleteLink+'/'+ id + '" id="delete_btn" > <i class="fa fa-trash"></i></a>'+
                            '<a title="تسجيل حضور" class="btn btn-success btn-sm" style="text-align:right;margin: .1rem" href="'+attendLink+'/'+ code + '" id="attend_btn" >  <i class="fa fa-check"></i></a>'+
                            '<a title="طباعة خلفية" class="btn btn-warning btn-sm" target="_blank" style="text-align:right;margin: .1rem" href="'+printLink+'/0/'+ randomCode + '" >  <i class="fa fa-print"></i></a>'+
                            // '<a title="طباعة مع خلفية" class="btn btn-primary btn-sm" style="text-align:right;margin: .1rem" href="/r/admin/print/printBadge/1/'+ randomCode + '" >  <i class="fa fa-print"></i></a>'
                            // '<br><a class="btn btn-success btn-sm" style="text-align:right;margin: .1rem" href="'+full['qrcode']+'" id="confirmBTN"> تأكيد</a>'+
                            // '<a class="btn btn-warning btn-sm" style="text-align:right;margin: .1rem" href="'+full['qrcode']+'" id="issueBTN"> رفض الصورة </a>'+
                            // '<a class="btn btn-warning btn-sm" style="text-align:right;margin: .1rem" href="'+full['qrcode']+'" id="issueBTNReject"> رفض بالكامل  </a>'+
                            '</div>' 
                            // '</div>' +
                            // '</div>'
                        );
                    

                }
                }
            ]
        });

        $(document).on('click', '#delete_btn', function (e) {
            e.preventDefault();

            var url = $(this).attr('href');
            bootbox.confirm('سيتم حذف بيانات العضو المسجل ,هل أنت متأكد ؟', function (res) {

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
                $(document).on('click', '#attend_btn', function (e) {
            e.preventDefault();

            var url = $(this).attr('href');
            bootbox.confirm('سيتم تأكيد الحضور هل أنت متأكد ؟',function (res) {

                if (res) {
                    $.ajaxSetup({
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        }
                    });

                    $.ajax({
                        'url': url,
                        'type': 'GET',
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
                            };
                            toastr.success('تم تأكيد الحضور بنجاح');
                            table.ajax.reload();
                        },
                        error: function (xhr) {
                            
                        }
                    });
                }

            });
        });
        
        $(document).on('click', '#confirmBTN', function (e) {
            e.preventDefault();

            var qrcode = $(this).attr('href');
            bootbox.confirm('هل أنت متأكد؟',function (res) {

                if (res) {
                    $.ajaxSetup({
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        }
                    });

                    $.ajax({
                        'url': '{{ route("confirm") }}'+'/'+qrcode,
                        'type': 'GET',
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
                            };
                            toastr.success(' تم التأكيد بنجاح');
                            table.ajax.reload();
                        },
                        error: function (xhr) {
                           toastr.error('حدث خطأ ما'); 
                        }
                    });
                }

            });
        });
        
                $(document).on('click', '#issueBTN', function (e) {
            e.preventDefault();

            var qrcode = $(this).attr('href');
            bootbox.confirm('هل أنت متأكد؟',function (res) {

                if (res) {
                    $.ajaxSetup({
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        }
                    });

                    $.ajax({
                        'url': '{{ route("reject") }}'+'/'+qrcode,
                        'type': 'GET',
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
                            };
                            toastr.success('تم عملية الرفض بنجاح');
                            table.ajax.reload();
                        },
                        error: function (xhr) {
                           toastr.error('حدث خطأ ما'); 
                        }
                    });
                }

            });
        });
        
        
        
            $(document).on('click', '#issueBTNReject', function (e) {
            e.preventDefault();

            var qrcode = $(this).attr('href');
            bootbox.confirm('هل أنت متأكد؟',function (res) {

                if (res) {
                    $.ajaxSetup({
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        }
                    });

                    $.ajax({
                        'url': '{{ route("reject-all") }}'+'/'+qrcode,
                        'type': 'GET',
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
                            };
                            toastr.success('تم عملية الرفض بنجاح');
                            table.ajax.reload();
                        },
                        error: function (xhr) {
                           toastr.error('حدث خطأ ما'); 
                        }
                    });
                }

            });
        });
        
        

        $(document).on('submit', '#updateLeader', function (e) {
            e.preventDefault();

            var id = $(this).attr('action');
            var name = $(this).serialize();
            $.ajaxSetup({
                  headers: {
                      'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                  }
            });
            $.ajax({
                'url': 'leads/'+id,
                'type': 'PUT',
                'dataType': 'json',
                data: name,
                success: function (response) {
                    toastr.success('Leader updated successfully');
                    table.ajax.reload();
                    $(".closeAdd").click();
                },
                error: function (xhr) {
                    toastr.error('Something went wrong !');
                    $(".closeAdd").click();
                }
            });

        });

        $('#myModal').on('shown.bs.modal', function () {
            $('#myInput').trigger('focus')
        });

        $(document).on('submit', '#addNewLeader', function (e) {
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
                    toastr.success('Leader added successfully');
                    table.ajax.reload();
                    $(".closeAdd").click();
                },
                error: function (xhr) {
                    toastr.error('Something went wrong !');
                    $(".closeAdd").click();
                }
            });

        });
        
    });
    </script>
    @endpush

@endsection
