@extends('layouts.appp')
@push('css')
<style>
   h4{
      color: white;
      font-weight:bold;
   }
   h2{
      color: white;
      font-weight:bold;
   }
</style>
@endpush
@section('content')

    <div class="row ">
        <div class="col-sm-6 col-lg-12">
          <div class="card shadow-base bg-default card-img-holder text-white">
             <div class="card-body text-center">
                <img src="{{asset('public/TawuniyaMailLogo.png')}}">
                
             </div>
          </div>
       </div>
       <div class="col-sm-6 col-lg-6">
          <div class="card shadow-base card-img-holder text-white" style="background:#6b47f5">
             <div class="card-body">
                <h4 class=" mb-2 text-center">
                   عدد المسجلين
                </h4>
                <h2 class="mb-0 text-center">
                     {{ $members }}
                </h2>
             </div>
          </div>
       </div>
        <div class="col-sm-6 col-lg-6">
          <div class="card shadow-base card-img-holder text-white" style="background:#a8a9cf">
             <div class="card-body">
                <h4 class=" mb-2 text-center">
                   عدد الحضور
                </h4>
                <h2 class="mb-0 text-center">
                     {{ $attenders }}
                </h2>
             </div>
          </div>
       </div>

    </div>
@endsection

@push('script')

@endpush
