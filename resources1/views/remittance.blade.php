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
    </style>
    @endsection
@section('content')
            <div id="content">
                <!-- Begin Page Content -->
                <div class="container-fluid">
                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">
                                <a class="btn" data-toggle="modal" data-target="#exampleModal" style="font-weight:bold;float:right;font-size:1.2rem;">  جدول الحوالات</a>
                            </h6>
                             <div class="row">
                                  <div class="col-md-6">
                                        <h4 style="text-align:center">الاسم </h4>
                                        <span id="name"></span>
                                  </div>
                                   <div class="col-md-6">
                                        <h4 style="text-align:center">الحالة </h4>
                                        <span id="status"></span>
                                  </div>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered yajra-datatable"  width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>التسلسل</th>
                                            <th>العضو المسجل</th>
                                            <th>المبلغ</th>
                                            <th> المرسل</th>
                                            <th>التاريخ</th>
                                            <th>البنك </th>
                                            <th>الحالة </th>
                                            <th>المرفق </th>
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
            <!-- End of Main Content -->

            <!-- Footer -->
            <footer class="sticky-footer bg-white">
                <div class="container my-auto">
                    <div class="copyright text-center my-auto">
                        <span>Copyright &copy; Your Website 2021</span>
                    </div>
                </div>
            </footer>
            <!-- End of Footer -->

        </div>
        <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>

    <!-- Logout Modal-->
    <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                    <a class="btn btn-primary" href="login.html">Logout</a>
                </div>
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
    <script src="{{ asset('assets/loginPage/vendor/jquery/jquery.min.js') }}"></script>
    <script src="{{ asset('assets/loginPage/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('assets/loginPage/vendor/jquery-easing/jquery.easing.min.js') }}"></script>
    <script src="{{ asset('assets/loginPage/js/sb-admin-2.min.js') }}"></script>
    <script src="{{ asset('assets/loginPage/vendor/chart.js/Chart.min.js') }}"></script>
    <script src="{{ asset('assets/loginPage/vendor/datatables/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('assets/loginPage/vendor/datatables/dataTables.bootstrap4.min.js') }}"></script>
    <script src="{{ asset('assets/loginPage/js/demo/datatables-demo.js') }}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootbox.js/5.5.2/bootbox.js" integrity="sha512-K3MtzSFJk6kgiFxCXXQKH6BbyBrTkTDf7E6kFh3xBZ2QNMtb6cU/RstENgQkdSLkAZeH/zAtzkxJOTTd8BqpHQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js" integrity="sha512-VEd+nq25CkR676O+pLBnDW09R7VQX9Mdiij052gVCp5yVH3jGtH70Ho/UUv4mJDsEdTvqRCFZg0NKGiojGnUCw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.13.18/js/bootstrap-select.min.js" integrity="sha512-yDlE7vpGDP7o2eftkCiPZ+yuUyEcaBwoJoIhdXv71KZWugFqEphIS3PU60lEkFaz8RxaVsMpSvQxMBaKVwA5xg==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://nightly.datatables.net/searchbuilder/js/dataTables.searchBuilder.js?_=40f0e1a3ea332af586366e40955c1713"></script>
    <script type="text/javascript">
    $(function () {

        $.ajaxSetup({
                  headers: {
                      'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                  }
        });
        
        var table = $('.yajra-datatable').DataTable({
            ajax: "{{ route('MembersRemittance') }}",
                                    "initComplete": function() {
                  // Select the column whose header we need replaced using its index(0 based)
                  this.api().column(1).every(function() {
                    var column = this;
                    // Put the HTML of the <select /> filter along with any default options 
                    var select = $('<select class="form-control input-sm"><option value="">All</option></select>')
                      // remove all content from this column's header and 
                      // append the above <select /> element HTML code into it 
                      .appendTo($('#name'))
                      // execute callback when an option is selected in our <select /> filter
                      .on('change', function() {
                        // escape special characters for DataTable to perform search
                        var val = $.fn.dataTable.util.escapeRegex(
                          $(this).val()
                        );
                        // Perform the search with the <select /> filter value and re-render the DataTable
                        column
                          .search(val ? '^' + val + '$' : '', true, false)
                          .draw();
                      });
                    // fill the <select /> filter with unique values from the column's data
                    column.data().unique().sort().each(function(d, j) {
                      select.append("<option value='" + d + "'>" + d + "</option>")
                    });
                  });
                this.api().column(6).every(function() {
                    var column = this;
                    // Put the HTML of the <select /> filter along with any default options 
                    var select = $('<select class="form-control input-sm"><option value="">All</option></select>')
                      // remove all content from this column's header and 
                      // append the above <select /> element HTML code into it 
                      .appendTo($('#status'))
                      // execute callback when an option is selected in our <select /> filter
                      .on('change', function() {
                        // escape special characters for DataTable to perform search
                        var val = $.fn.dataTable.util.escapeRegex(
                          $(this).val()
                        );
                        // Perform the search with the <select /> filter value and re-render the DataTable
                        column
                          .search(val ? '^' + val + '$' : '', true, false)
                          .draw();
                      });
                    // fill the <select /> filter with unique values from the column's data
                    column.data().unique().sort().each(function(d, j) {
                      select.append("<option value='" + d + "'>" + d + "</option>")
                    });
                  });
                },
            columns: [
                {data: 'id', name: 'id'},
                {data: 'memeber_id', name: 'memeber_id'},
                {data: 'money', name: 'money'},
                {data: 'sender', name: 'sender'},
                {data: 'datee', name: 'datee'},
                {data: 'bank', name: 'bank'},
                {data: 'is_accept', name: 'is_accept'},
                {data: 'remittanceFile', name: 'remittanceFile'},
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
                        var text = full['memeber_id'];
                        return text;

                    }
                },
                {
                    targets: 2,
                    render: function (data, type, full) {
                        var text = full['money'];
                        return text;

                    }
                },
                {
                    targets: 3,
                    render: function (data, type, full) {
                        var text = full['sender'];
                        return text;

                    }
                },
                {
                    targets: 4,
                    render: function (data, type, full) {
                        var text = full['datee'];
                        return text;

                    }
                },
                {
                    targets: 5,
                    render: function (data, type, full) {
                        var text = full['bank'];
                        return text;

                    }
                },
                {
                    targets: 6,
                    render: function (data, type, full) {
                        var text = full['is_accept'];
                        return text;
                    }
                },
                {
                    targets: 7,
                    render: function (data, type, full) {
                        var text = full['remittanceFile'];
                        
                        return '<a href="https://festival-gcc.org/storage/app/public/remittances/'+text+'"><i class="fa fa-download"></i></a>'

                    }
                },
                {
                // Actions
                targets: 8,
                render: function (data, type, full, meta) {
                    var id = full['id'];
                    var accepted = full['is_accept'];
                        if(accepted == 'لم يتم التأكيد بعد'){
                            return (
                            // '<div class="d-flex align-items-center col-actions">' +
                            // '<div class="dropdown">' +
                            // '<a class="btn btn-sm btn-icon px-0" data-toggle="dropdown">' +
                            //     '<i class="fa fa-ellipsis-v"></i>'+
                            // '</a>' +
                            '<div style="width:100px">' +
                            '<a title="حذف" style="text-align:center;margin:0 .1rem" class="btn btn-danger btn-sm" href="/deleteRemittance/'+ id + '" id="delete_btn" class="dropdown-item"> <i class="fa fa-trash"></i></a>'+
                            '<a title="تأكيد" style="text-align:center;margin:0 .1rem" class="btn btn-success btn-sm" href="/approve/'+ id + '" id="approve_btn" class="dropdown-item"> <i class="fa fa-check"></i></a>'+
                            '</div>'
                            // '</div>' +
                            // '</div>'
                            );
                        }else{
                            return (
                            // '<div class="d-flex align-items-center col-actions">' +
                            // '<div class="dropdown">' +
                            // '<a class="btn btn-sm btn-icon px-0" data-toggle="dropdown">' +
                            //     '<i class="fa fa-ellipsis-v"></i>'+
                            // '</a>' +
                            '<div >' +
                            '<a title="حذف" style="text-align:center" class="btn btn-danger btn-sm" href="/deleteRemittance/'+ id + '" id="delete_btn" class="dropdown-item"> <i class="fa fa-trash"></i></a>'+
                            '</div>' 
                            // '</div>' +
                            // '</div>'
                        );
                        }
                        
                }
                }
            ],
           
        });

        $(document).on('click', '#delete_btn', function (e) {
            e.preventDefault();

            var url = $(this).attr('href');
            bootbox.confirm('هل أنت متأكد ؟', function (res) {

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
                            toastr.success('تم الحذف بنجاح');
                            table.ajax.reload();
                        },
                        error: function (xhr) {
                            toastr.error('هناك خطأ ما');
                        }
                    });
                }

            });
        });

        $(document).on('click', '#approve_btn', function (e) {
            e.preventDefault();

            var url = $(this).attr('href');
            bootbox.confirm('هل أنت متأكد ؟', function (res) {

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
                            }
                            toastr.success('تم القبول بنجاح ');
                            table.ajax.reload();
                        },
                        error: function (xhr) {
                            toastr.error('هناك خطأ ما');
                        }
                    });
                }

            });
        });

     

        $('#myModal').on('shown.bs.modal', function () {
            $('#myInput').trigger('focus')
        });
        
    });
    </script>
    @endpush

@endsection