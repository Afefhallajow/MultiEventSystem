@extends('layouts.appp')
@section('content')
    @push('style')
        <link href="https://cdn.datatables.net/1.10.18/css/dataTables.bootstrap4.min.css" rel="stylesheet">
        <link href="https://cdn.datatables.net/buttons/1.5.4/css/buttons.bootstrap4.min.css" rel="stylesheet">
        <link href="https://cdn.datatables.net/responsive/2.2.2/css/responsive.bootstrap4.min.css" rel="stylesheet">
@endpush
        <div class="row ">
        <div class="col-md-12">
            <div class="card shadow-base bd-0 overflow-hidden">
                <div class="card-header">
                    {{--<a  class="btn btn-secondary pull-left" href="">{{ __('config.back') }}  <i class="icon ion-android-arrow-back"> </i>  </a>--}}
                    <h5 class="card-title mt-2">إحصائيات الحضور </h5>
{{--                    <p class="card-subtitle">{{ __('admin/slider.title.insert.sub_value') }}</p>--}}
                </div>
                <div class="card-body  pt-10">
                    <!--section-about -->
                    <section class="section section-new-user">
                        <table  class="datatable table display responsive nowrap">
                            <thead>
                            <tr>
                                <th>#</th>
                                <th> التاريخ </th>
                                <th>  العدد </th>
                                <th>  # </th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach ($workshos as $key => $val)
                                <tr>
                                    <td>
                                        {{$key+1}}
                                    </td>
                                    <td>{{$val->datee}}</td>
                                    <td>{{$val->total}}</td>
                                    <td style="padding-left:1rem">
                                        <a title="عرض الزوار" class="btn btn-primary btn-sm" style="margin:.1rem" href="{{ url('admin/BrowseEventAttenders/'.$val->datee) }}"> 
                                            <i class="fa fa-eye"></i>
                                        </a>
                                        <a title="تصدير إلى إكسل" class="btn btn-success btn-sm" style="margin:.1rem" href="{{ url('export/'.$val->datee) }}">
                                            <i class="fa fa-file-excel-o"></i>
                                        </a>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                        <h6 class=" mt-2 text-center">   اجمالي العدد [{{$count}}] </h6>
                    </section>
                    <!--end section-about-->
                </div>
            </div>
        </div>
    </div>

        @push('script')
        

            <script>
                $(function () {

                    $('#datetimepicker1').datetimepicker({
                        locale: 'ar',
                        format: 'DD/MM/YYYY',
                        defaultDate: '{{Date("Y-m-d")}}',

                    });
                    $('#datetimepicker2').datetimepicker({
                        locale: 'ar',
                        format: 'DD/MM/YYYY',
                        defaultDate: '{{Date("Y-m-d")}}',

                        useCurrent: false
                    });

                    $(document).on('click', '#delete_btn', function (e) {
                        e.preventDefault();

                        var url = $(this).attr('href');
                        bootbox.confirm('تأكيد عملية الحذف !', function (res) {

                            if (res) {

                                $.ajax({
                                    'url': url,
                                    'type': 'DELETE',
                                    'dataType': 'json',
                                    data: {
                                        '_token': $('meta[name="csrf-token"]').attr('content')
                                    },
                                    success: function (response) {
                                        toastr.success(response.message);
                                        location.reload();
                                    },
                                    error: function (xhr) {

                                    }
                                })
                            }

                        });
                    });

                });
            </script>
    @endpush
@endsection