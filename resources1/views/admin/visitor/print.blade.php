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
                                <a class="btn" data-toggle="modal" data-target="#exampleModal" style="font-weight:bold;float:right;font-size:1.2rem">  المسجلين / طباعة البادج </a>
                            </h6>
                            <!--<div class="row">-->
                            <!--        <div class="col-md-6">-->
                            <!--            <h4 style="text-align:center">الفئة </h4>-->
                            <!--            <span id="category_filter"></span>-->
                            <!--        </div>-->
                            <!--        <div class="col-md-6">-->
                            <!--            <h4 style="text-align:center">الشركة </h4>-->
                            <!--            <span id="company"></span>-->
                            <!--        </div>-->
                            <!--</div>-->
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered yajra-datatable"  width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>Employee No</th>
                                            <th>Name</th>
                                            <th>QrCode  </th>
                                            <th>Action</th>
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
            ajax: "{{ route('allRegistration') }}",
            
                // "initComplete": function() {
                //   // Select the column whose header we need replaced using its index(0 based)
                //   this.api().column(3).every(function() {
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
                 
                //     this.api().column(4).every(function() {
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
                // },
            
            
            
            
            columns: [
                {data: 'employee_no', name: 'employee_no'},
                {data: 'name', name: 'name'},
                {data: 'qrcode', name: 'qrcode'},
                
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
                // Actions
                targets: -1,
                render: function (data, type, full, meta) {
                    var code = full['code'];
                        return (
                            // '<div class="d-flex align-items-center col-actions">' +
                            // '<div class="dropdown">' +
                            // '<a class="btn btn-sm btn-icon px-0" data-toggle="dropdown">' +
                            //     '<i class="fa fa-ellipsis-v"></i>'+
                            // '</a>' +
                            '<div>' +
                            '<a target="_blank" title="طباعة بدون خلفية" style="text-align:center;margin:0 .1rem" class="btn btn-warning btn-sm" href="printBadge/0/'+ code + '"  class="dropdown-item">   <i class="fa fa-print"></i></a>'+
                            // '<a target="_blank" title="طباعة مع خلفية" style="text-align:center;margin:0 .1rem" class="btn btn-info btn-sm" href="printBadge/1/'+ code + '"  class="dropdown-item"> <i class="fa fa-print"></i></a>'+
                            '</div>' 
                            // '</div>' +
                            // '</div>'
                        );
                }
                }
            ]
        });

        $('#myModal').on('shown.bs.modal', function () {
            $('#myInput').trigger('focus')
        });
        
    });
    </script>
    @endpush

@endsection
