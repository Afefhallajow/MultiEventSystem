@extends('layouts.appp')
@section('content')
        <div class="row ">
        <div class="col-md-12">
            <div class="card shadow-base bd-0 overflow-hidden">
                <div class="card-header">
                    {{--<a  class="btn btn-secondary pull-left" href="">{{ __('config.back') }}  <i class="icon ion-android-arrow-back"> </i>  </a>--}}
                    <h5 class="card-title mt-2"> تسجيل الحضور للورش </h5>
{{--                    <p class="card-subtitle">{{ __('admin/slider.title.insert.sub_value') }}</p>--}}

                </div>

                <div class="card-body  pt-10">
                    <!--section-about -->
                    <section class="section section-new-user">
                        <form id="add-form" method="POST" enctype="multipart/form-data" action="{{url()->current()}}" class="needs-validation">
                            @csrf
                            <div class="form-material my-5">
                                <div class="row justify-content-center">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <h4 id="memberName" style="text-align:center"></h4> <br>
                                            <label for="title" class="form-label "> اسم الورشة </label>
                                            <select class="form-control" name="name">
                                                @foreach($workshops as $workshop)
                                                    <option value="{{ $workshop->id }}">{{$workshop->name}}</option>
                                                @endforeach
                                            </select> <br>
                                            <input type="text" class="form-control text-center" name="qrcode" id="qrcode" value="{{ old('badge_no') }}"
                                                   data-required-error ="required" required placeholder="ادخل رقم البادج">
                                            <div class="invalid-feedback"> مطلوب </div>
                                        </div>

                                    </div>

                                </div>
                                <div class="row justify-content-center pt-4">
                                    <div class="col-md-6 text-center">
                                        <button type="submit" class="btn btn-success " style="width: 50%;">   تسجيل الحضور  </button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </section>
                    <!--end section-about-->
                </div>
            </div>
        </div>
    </div>

        @push('script')
            <script>
                $(function () {


                    $("#add-form").submit(function (e) {
                        e.preventDefault();

                        var url = $(this).attr('action');
                        // bootbox.confirm('تأكيد العملية !', function (res) {
                        //
                        //     if (res) {

                                $.ajax({
                                    'url': url,
                                    'type': 'POST',
                                    'dataType': 'json',
                                    data: $("#add-form").serializeArray(),
                                    success: function (response) {
                                        if(response == 0){
                                            $('#memberName').text('غير مسجل في الورش');
                                            document.getElementById("qrcode").value="";
                                        }else{
                                            toastr.success('تم الحفظ بنجاح');
                                            document.getElementById("qrcode").value="";
                                            document.getElementById("qrcode").focus();
                                            // $(this).reset();
                                            $('#memberName').text(response.name);
                                        }
                                        
                                    },
                                    error: function (response) {
                                        $('#memberName').text('');
                                        toastr.error('هناك خطأ ما');
                                        document.getElementById("qrcode").value="";
                                        document.getElementById("qrcode").focus();
                                    }
                                })
                            // }
                        // });
                    });

                });
            </script>
    @endpush
@endsection