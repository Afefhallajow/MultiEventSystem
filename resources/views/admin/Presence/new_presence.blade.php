@extends('layouts.admin')

@section('title')
    التسجيل ضمن الفعالية
@endsection
@section('css')
<style>   .card{

    max-width: 500px;
    margin: auto;
margin-top: 2%;
    }
</style>
@endsection
@section('content')
    <div class="page-content">
            <!-- DataTales Example -->
                <div class="card shadow mb-2">
    <div class="card-body" style="text-align: center">
        <form style="text-align: center" method="post" action="{{route('presence.store')}}" >
            @csrf
            <div style="text-align: center" class="mb-5">
                <h3 align="center"> التسجيل ضمن الفعالية</h3>
            </div>
            <div class="row">
                <h5>اختر الفعالية</h5>
                <select class="form-control mb-2 " name="day" >
@foreach($days as $day)
                    <option value="{{$day->id}}" >{{$day->name}} </option>
                    @endforeach
                </select>

            </div>
<div class="row">
    <h5> الرجاء ادخال المعرف الخاص بلمستخدم</h5>
    <input type="text" class="form-control" name="id">

</div>
            <br>
            <div class="">
            <BUTTON type="submit" class="btn btn-primary"> تسجيل</BUTTON>
            </div>

        </form>
    </div>

            </div></div>




@endsection
