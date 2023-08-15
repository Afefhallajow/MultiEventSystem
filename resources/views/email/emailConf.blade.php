@extends('layouts.admin')

@section('title')
    إعدادات الإيميل
@endsection

@section('content')
    <div class="page-content">
        <div class="container-fluid">
            <!-- page title -->
            @include('admin.includes.page_title', ['title'=>'الفعاليات','supTitle' => 'إعدادات الإيميل'])
            <h4>{{ $day->name }}</h4>
            <!-- Content -->
            <form action="{{ url()->current() }}" method="post">
                @csrf
                <label>عنوان الإيميل</label>
                <input type="text" class="form-control" name="subject" id="subject" value="{{ $config->subject }}"/>
                <label>عنوان الإيميل الأجنبي</label>
                <input type="text" class="form-control" name="subjectEn" id="subjectEn" value="{{ $config->subjectEn }}"/>
<br>
                <label>محتوى إيميل الشهادة</label>
                <textarea name="content">{!! $config->confirm_content !!}</textarea>
            <!--<input type="text" class="form-control" name="content" id="content" value="{{ $config->confirm_content }}"/>-->
                <br>
                <label>محتوى إيميل  التسجيل الخارجي</label>
                <textarea name="contentEn">{!! $config->confirm_content_en !!}</textarea>
            <!--<input type="text" class="form-control" name="contentEn" id="contentEn" value="{{ $config->confirm_content_en }}" /><br>--><br>
                <br>
                <label>محتوى إيميل الدعوة</label>
                <textarea name="invite_content">{!! $config->invite_content !!}</textarea>
                التسجيل الخارجي

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

            $(document).on('change', 'select', function () {
                let id = {{$day->id }};
                let url = "/getEmailConfig/"+id
                $.ajax({
                    url: url,
                    method : "GET",
                    success: function (data) {

                            document.getElementById('subject').value = data.confirm_subject;
                            document.getElementById('subjectEn').value = data.confirm_subject_en;
                            CKEDITOR.instances['content'].setData(data.confirm_content);
                            CKEDITOR.instances['contentEn'].setData(data.confirm_content_en);
                        CKEDITOR.instances['invite_content'].setData(data.invite_content);

                        }

                });
            });

        });
    </script>
    <script>
        CKEDITOR.replace( 'content' );
        CKEDITOR.replace( 'contentEn' );
        CKEDITOR.replace( 'invite_content' );

    </script>
@endpush
