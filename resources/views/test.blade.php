@extends('layouts.admin')


@section('title')
    لوحة التحكم

@endsection

@section('css')

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Noto+Sans+Arabic&display=swap" rel="stylesheet">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Noto+Naskh+Arabic&display=swap" rel="stylesheet">
<style>


</style>




@endsection


@section('content')
    <div class="page-content">
        @include('admin.includes.page_title', ['title'=>'لوحة التحكم'])
<div class="row">
    <div class="col-6">

        <div class="row" style="margin: 0 auto 30px auto">
            <div class="col-md-4 m-auto">
                <select class="form-control" id="change_day">
                    <option value="0">الكل</option>
                    @foreach ($days as $day)
                        <option value="{{ $day->id }}">{{ $day->name }}</option>
                    @endforeach
                </select>
            </div>
        </div>


    </div>

</div>
            <!-- name -->

        <div id="home_charts">
            @include('admin.includes.homecharts')
        </div>

    </div>
@endsection
@push('AJAX')

    </script>    <script type="text/javascript">
        $(document).ready(function () {
            $.ajaxSetup({ headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')} });

            //------------ Change Day ------------
            $(document).on('change', '#change_day', function () {
                var day_id = $(this).val();
                var url_loadCharts = "{{ route('home') }}";

                // Before Send
                $('#home_charts').css({'filter': 'blur(8px)'});

                // load filtered results
                $.get(url_loadCharts, {'day_id': day_id}, function( data ) {


                    $( "#home_charts" ).html( data );
                    $('#home_charts').css({'filter': 'none'});
                });
            });
        });
    </script>




@endpush
