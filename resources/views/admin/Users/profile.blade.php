@extends('layouts.admin')

@section('title')
    تعديل معلومات الدخول
@endsection

@section('content')
    <div class="page-content">
        <div class="container-fluid">
            <!-- page title -->
        @include('admin.includes.page_title', ['title'=>'','supTitle' =>  'تعديل معلومات الدخول'])


        <!-- Content -->
            <div class="row">
                <div class="col-lg-8 mrAuto">
                    <div class="card">
                        <div class="card-body">
                            <span id="form_result" style="display:none;"></span>
                            <form id="profile_form" enctype="multipart/form-data" method="post">
                                @csrf
                                <input type="hidden" name="hidden_id" value="{{$admin->id}}">

                                <!-- name -->
                                <div class="form-group row mb-3">
<label>نوع المستخدم</label>
                                <input type="hidden" value="{{$admin->isadmin}}" id="isadmin"   class="form-control" name="isadmin">
                                </input>
                                </div>

                                <div class="form-group row mb-3">
                                    <label for="name" class="col-sm-3 col-form-label">الاسم</label>
                                    <div class="col-sm-9">
                                        <input value="{{$admin->name}}" type="text" name="name" class="form-control" id="name">
                                    </div>
                                </div>

                                <!-- username -->

                                <!-- email -->
                                <div class="form-group row mb-3">
                                    <label for="email" class="col-sm-3 col-form-label">البريد الإلكتروني</label>
                                    <div class="col-sm-9">
                                        <input value="{{$admin->email}}" type="email" name="email" class="form-control" id="email">
                                    </div>
                                </div>

                                <!-- password -->
                                <div class="form-group row mb-3">
                                    <label for="password" class="col-sm-3 col-form-label">كلمة السر</label>
                                    <div class="col-sm-9">
                                        <input placeholder="اترك كلمة السر فارغة إذا كنت لا ترغب بتعديلها" type="password" name="password" class="form-control" id="password">
                                    </div>
                                </div>

                                <!-- password_confirmation -->
                                <div class="form-group row mb-3">
                                    <label for="name" class="col-sm-3 col-form-label">تأكيد كلمة السر</label>
                                    <div class="col-sm-9">
                                        <input type="password" name="password_confirmation" class="form-control" id="password_confirmation">
                                    </div>
                                </div>

                                <!-- Submit Button -->
                                <div class="form-group row justify-content-end">
                                    <div class="col-sm-9">
                                        <input type="hidden" name="action" value="Edit">
                                        <button id="action_button" type="submit" class="btn btn-info w-md">تعديل</button>
                                        <div class="spinner-grow text-info m-1" role="status" style="display: none">
                                            <span class="sr-only">Loading...</span>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('AJAX')
    <script type="text/javascript">
        // Submit Form
        $.ajaxSetup({ headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') } });
        $('#profile_form').on('submit', function (event) {
            event.preventDefault();
            $.ajax({
                url: "{{ route('employees.store') }}",
                method: "POST",
                data: new FormData(this),
                contentType: false,
                cache: false,
                processData: false,
                dataType: "json",
                beforeSend: function () {
                    $('#action_button').hide();
                    $('.spinner-grow').show();
                },
                complete: function () {
                    $('#action_button').show();
                    $('.spinner-grow').hide();
                },
                success: function (data) {
                    if (data.errors) {
                        var result = ResultErrors(data.errors);
                    }
                    if (data.success) {
                        var result = ResultSuccess(data.success);
                    }
                    fadeInResult('#form_result', result);
                },
                error: function(jqXHR, textStatus, errorThrown){
                    var result = ResultAlert(errorThrown);
                    fadeInResult('#form_result', result);
                }
            });
        });

    </script>
@endpush
