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
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">
                                <a class="btn" data-toggle="modal" data-target="#exampleModal" style="font-weight:bold;float:right;font-size:1.2rem;">  جدول الفيز</a>
                            </h6>
                            <div>
                                <h4 style="text-align:center">الاسم </h4>
                                <span id="name"></span>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered yajra-datatable"  width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>التسلسل</th>
                                            <th>العضو المسجل</th>
                                            <th>الإيميل</th>
                                            <th> البلد</th>
                                            <th>الجنسية</th>
                                            <th>الفيزا</th>
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
        <script type="text/javascript">
        var serialNumber = 0;
    $(function () {

        $.ajaxSetup({
                  headers: {
                      'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                  }
        });
        
        var table = $('.yajra-datatable').DataTable({
            processing: true,
            serverSide: true,
            ajax: "{{ route('getVisaMembers') }}",
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
                },
            columns: [
                {data: 'id', name: 'id'},
                {data: 'name', name: 'name'},
                {data: 'email', name: 'email'},
                {data: 'address', name: 'address'},
                {data: 'nationality', name: 'nationality'},
                {data: 'visaFile', name: 'visaFile'},
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
                        return ++serialNumber;

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
                    targets: 2,
                    render: function (data, type, full) {
                        var text = full['email'];
                        return text;

                    }
                },
                {
                    targets: 3,
                    render: function (data, type, full) {
                        var text = full['address'];
                        return text;

                    }
                },
                {
                    targets: 4,
                    render: function (data, type, full) {
                        var text = full['nationality'];
                        return text;

                    }
                },
                {
                    targets: 5,
                    render: function (data, type, full) {
                        var text = full['visaFile'];
                        if(text != null)
                            return '<a taget="_blank" href="https://festival-gcc.org/storage/app/public/Visa/'+ text + '""><i class="fa fa-download"></i></a>';
                        
                        return '-';

                    }
                },
                {
                // Actions
                targets: 6,
                render: function (data, type, full, meta) {
                    var id = full['id'];
                    var name = full['name'];
                    var visa = full['visaFile'];
                    if(visa  == null){
                            return (
                            // '<div class="d-flex align-items-center col-actions">' +
                            // '<div class="dropdown">' +
                            // '<a class="btn btn-sm btn-icon px-0" data-toggle="dropdown">' +
                            //     '<i class="fa fa-ellipsis-v"></i>'+
                            // '</a>' +
                            '<div>' +
                            '<a title="إرفاق فيزا" style="text-align:center" class="btn btn-info btn-sm" href="/approve/'+ id + '" data-toggle="modal" data-target="#updateModal'+id+'" class="dropdown-item"> <i class="fa fa-edit"></i></a>'+
                            '</div>' +
                            // '</div>' +
                            // '</div>' +
                            '<div class="modal fade" id="updateModal'+id+'" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">'+
                                '<div class="modal-dialog" role="document">'+
                                    '<div class="modal-content">'+
                                    '<div class="modal-header">'+
                                        '<h5 class="modal-title" id="exampleModalLabel"> إرفاق فيزا ل'+name+' </h5>'+
                                    '</div>'+
                                    '<form action="https://festival-gcc.org/admin/addVisa/'+id+'" method="post" id="updateLeader" enctype="multipart/form-data">'+
                                        '@csrf'+ 
                                        '<div class="modal-body">'+
                                               '<input type="file" id="visaFile" name="visaFile" required class="form-control"> '+ 
                                        '</div>'+
                                        '<div class="modal-footer">'+
                                            '<button type="button" class="btn btn-secondary closeAdd" data-dismiss="modal">Close</button>'+
                                            '<button type="submit" class="btn btn-primary">Save </button>'+
                                       '</div>'+
                                    '</form>'+
                                    '</div>'+
                                '</div>'+
                               '</div>'
                            );
                    }else{
                            return (
               
                            '<div>' +
                            '<a style="text-align:center" class="btn btn-success btn-sm"  class="dropdown-item"> <i class="fa fa-check"></i></a>'+
                            '</div>' 
        
                            );
                    }
                        
                }
                }
            ]
        });

        $('#myModal').on('shown.bs.modal', function () {
            $('#myInput').trigger('focus')
        });
        
        // $(document).on('submit', '#updateLeader', function (e) {
        //     e.preventDefault();

        //     var id = $(this).attr('action');
        //     var visaFile = $('#visaFile')[0].files;
        //     var fd = new FormData();
        //     fd.append('visaFile',visaFile[0]);
        //     $.ajaxSetup({
        //           headers: {
        //               'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        //           }
        //     });
        //     $.ajax({
        //         'url': '/admin/addVisa/'+id,
        //         'type': 'post',
        //         'dataType': 'json',
        //          data: fd,
        //          cache:false,
        //          contentType: false,
        //          processData: false,
        //         success: function (response) {
        //             toastr.success('تمت عملية الإرفاق بنجاح');
        //             table.ajax.reload();
        //             $(".closeAdd").click();
        //         },
        //         error: function (xhr) {
        //             toastr.error('حدث خطأ ما');
        //             $(".closeAdd").click();
        //         }
        //     });

        // });
        
    });
    </script>
    @endpush

@endsection