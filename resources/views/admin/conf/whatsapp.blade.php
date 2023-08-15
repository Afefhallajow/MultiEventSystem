@extends('layouts.admin')

@section('title')
    إعدادات رسالة الواتس
@endsection

@section('content')
    <div class="page-content">
        <div class="container-fluid">
            <!-- page title -->
            @include('admin.includes.page_title', ['title'=>'الفعاليات','supTitle' => 'إعدادات رسالة الواتس'])
            <!-- Content -->
            <form action="{{url()->current()}}" method="post" enctype="multipart/form-data">
                @csrf
                <input type="hidden" class="form-control" name="type" id="" value="1"/>
                <input type="hidden" class="form-control" name="id" id="" />

                <label> السطر الأول من الرسالة</label>
                <input type="text" class="form-control" name="row1" value="{{$day->row1}}" id="whatsappMSGContent" />
                <label> السطر الثاني من الرسالة</label>
                <input type="text" class="form-control" name="row2" value="{{$day->row2}}" id="whatsappMSGlink" />
                <label> السطر الثالث من الرسالة</label>
                <input type="text" class="form-control" name="row3" value="{{$day->row3}}" id="whatsappMSGlink" />
                <label> السطر الرابع من الرسالة</label>
                <input type="text" class="form-control" name="row4" value="{{$day->row4}}" id="whatsappMSGlink" />
                <label> السطر الخامس من الرسالة</label>
                <input type="text" class="form-control" name="row5" value="{{$day->row5}}" id="whatsappMSGlink" />


                <label>Instance </label>
                <input type="text" class="form-control" dir="rtl" value="{{$day->instance}}" name="instance" id="whatsInstance" />
                <label>Token</label>
                <input type="text" class="form-control" dir="rtl"value="{{$day->token}}" name="token" id="whatsToken" /><br>

                <button class="btn btn-primary" type="submit">حفظ</button>
            </form>

        </div>
    </div>


@endsection

@push('AJAX')
    <script src="https://cdn.ckeditor.com/4.19.0/standard/ckeditor.js"></script>
    <script type="text/javascript">
        $(document).ready(function () {
            $.ajaxSetup({ headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') } });


        });
    </script>
    <script>
        CKEDITOR.replace( 'content' );
        CKEDITOR.replace( 'contentEn' );
    </script>
@endpush
