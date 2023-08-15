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
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-9">
            <div class="card">
                <div class="card-header text-center"><h4> بيانات زائر </h4></div>
                <div class="card-body">
                     @if(Session::has('msg'))
                    <p style="background: #2cc52c;color: #fff;padding: 0 1rem;" class="alert alert-succrdd">{{ Session::get('msg') }}</p>
                    @endif
                    <!--<form method="POST" enctype="multipart/form-data" action="{{ url()->current() }}">-->
                        <!--@csrf-->
                        <div>

                            {{--<div class="text-center m-2">--}}
                            {{--<span class='text-danger text-center'>يرجى تعبئة كافة الحقول</span>--}}
                            {{--</div>--}}
                            {{--                                    <h2>   {{ __('userInfo.wizard.basic_info') }}   </h2>--}}
                            @if ($errors->any())

                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="alert alert-danger" role="alert">
                                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                                <span aria-hidden="true">×</span>
                                            </button>
                                            <div class="d-flex align-items-center justify-content-start">
                                                <i class="icon ion-ios-checkmark alert-icon tx-32 mg-t-5 mg-xs-t-0"></i>
                                                <ul>
                                                    @foreach ($errors->all() as $key => $error)
                                                        <h6 class="text-dark"> {!!($key+1) .": ". $error !!}</h6>
                                                    @endforeach
                                                </ul>
                                            </div><!-- d-flex -->
                                        </div><!-- alert -->
                                    </div>
                                </div>

                            @endif
                            <div id="form-step-1" role="form" data-toggle="validator">
                                <div class="form-group mt-2col-12">
                                    <label class="form-label" for="fname">الاسم
                                    
                                    </label>
                                    <input type="text" id="fname" name="name" value="{{ $member->name }}" readonly class="form-control"  required/>
                                </div>
                                <div class="form-group mt-2col-12">
                                    <label for="company">جهة العمل
                                    </label>
                                    <input type="text" id="company" name="company" value="{{$member->side}}" class="form-control" readonly  required/>
                                </div>
                                <div class="form-group mt-2col-12">
                                    <label for="position">المسمى الوظيفي
                                    </label>
                                    <input type="text" id="position" name="position" value="{{ $member->job }}" class="form-control" readonly required/>
                                </div>
                               <div class="form-group mt-2col-12">
                                    <label for="position">الجنس 
                                    </label>
                                    <input type="text" id="position" name="position" value="{{ $member->gender }}" class="form-control" readonly required/>
                                </div>
                                <div class="form-group mt-2col-12">
                                    <label class="form-label" for="mobile">رقم الجوال
                                    </label>
                                    <input type="text" id="mobile" name="mobile" value="{{ $member->mobile }}" class="form-control" readonly required/>
                                </div>
                                <div class="form-group mt-2col-12">
                                    <label class="form-label" for="email">البريدالالكتروني
                                    </label>
                                    <input type="text" id="email" name="email" value="{{ $member->email }}" class="form-control" readonly required/>
                                </div>

                                <div class="form-group mt-2col-12">
                                    <label for="country">الدولة
                                    </label>
                                    <input type="text" id="country" name="country" value="{{ $member->address }}" class="form-control" readonly required/>
                                </div>
                                <div class="form-group mt-2col-12">
                                    <label for="howYouKnow">كيف علم بالمعرض
                                    </label>
                                    <input type="text" id="howYouKnow" name="howYouKnow" value="{{ $member->howYouKnow }}" class="form-control" readonly required/>
                                </div>
                              <div class="form-group mt-2col-12">
                                    <label for="city"> هل هو فرد من مجلس التعاون الخليجي؟
                                    </label>
                                    <input type="text" id="member" name="member" value="{{ ($member->member == 'No') ? 'لا': 'نعم' }}" class="form-control" readonly required/>
                                </div> 
                                <div class="form-group mt-2col-12">
                                    <label for="inBahreen">هل يقيم في البحرين ؟
                                    </label>
                                    <input type="text" id="inBahreen" name="inBahreen" value="{{ ($member->inBahreen == 'No') ? 'لا': 'نعم' }}" class="form-control" readonly required/>
                                </div> 
                                <div class="form-group mt-2col-12">
                                    <label for="city"> الجنسية
                                    </label>
                                    <input type="text" name="nationality" value="{{ $member->nationality }}"  class="form-control" readonly required>
                                </div> 
                                <div class="form-group mt-2col-12">
                                    <label for="interested">رابط الفيزا   
                                    </label><br>
                                    @if($member->visaFile != null)
                                    <a href="https://festival-gcc.org/storage/app/public/Visa/{{ $member->visaFile }}">
                                        https://festival-gcc.org/storage/app/public/Visa/{{ $member->visaFile }}
                                    </a>
                                    @else
                                    لايوجد
                                    @endif
                                </div> 
                                <h1 style="text-align:center">معلومات البادج</h1>
                                <div class="form-group mt-2col-12">
                                    <label class="form-label" for="badgeName">الاسم
                                    </label>
                                    <input type="text" id="badgeName" name="badgeName" value="{{ $member->badgeName }}" class="form-control" readonly  required/>
                                </div>
                                <div class="form-group mt-2col-12">
                                    <label class="form-label" for="badgeSide">جهة العمل
                                    </label>
                                    <input type="text" id="badgeSide" name="badgeSide" value="{{ $member->badgeSide }}" class="form-control" readonly  required/>
                                </div>
                                 <div class="form-group mt-2col-12">
                                    <label class="form-label" for="badgeJob">المسمى الوظيفي
                                    </label>
                                    <input type="text" id="badgeJob" name="badgeJob" value="{{ $member->badgeJob }}" class="form-control" readonly  required/>
                                </div>
                                



                            </div>
                            <!--<div id="form-step-2" role="form" data-toggle="validator">-->
                            <!--    <div class="form-material">-->

                            <!--        <div class="form-group text-center">-->
                            <!--            <input type="submit" name="approve" value='تسجيل'-->
                            <!--                   class="btn btn-info pull-left ml-2">-->
                            <!--            <div id="error_msg" class="alert alert-danger p-2 m-2" style="display: none">-->
                            <!--            </div>-->

                            <!--        </div>-->
                            <!--    </div>-->
                            <!--</div>-->
                        </div>
                    <!--</form>-->
                </div>
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

    <script src="{{ asset('assets/SmartWizard/jquery.min.js')}}"></script>

    <script src="{{ asset('assets/SmartWizard/bootstrap.js')}}"></script>
    <script src="{{ asset('assets/SmartWizard/custom_js.js')}}"></script>

    <script src="{{ asset('assets/SmartWizard/validator.min.js')}}"></script>
    <script type="text/javascript" src="{{ asset('assets/admin/lib/SmartWizard/dist/js/jquery.smartWizard.js')}}"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-validator/0.5.3/js/bootstrapValidator.js"></script>
@endpush

@endsection
