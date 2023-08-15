
@extends('layouts.appprizzes')

@section('cssFile')
/dashboard.css
@endsection


@section('content')
<div class="gray-back back-img" style="clor: #868281; position: relative;z-index: 1;width: 100%; min-height: 100vh; padding: 50px 0">
<div class="row" style="width: 70%; margin: auto">
<img class="col-lg-5 col-md-5 col-sm-12" src="{{ asset('public/TawuniyaMailLogo.png') }}" style="width:70%; height: auto; margin:auto"/>
</div>

<div class="row" style="width: 95%; margin: auto">
<div class="col-lg-12 p-0 col-md-4 col-sm-12 card text-center" style="margin: 25px auto auto auto; background-image: linear-gradient( 40deg, #1f71bc 0%, #4395d5 45%, #868281 100% ); border: 0">
<div class="card-body" style="direction: rtl;height:100px">
<div class="row">
<div class="col-md-12" style="display: flex; justify-content: center; align-items: center;">
<h1 id="headerNames" winner="" style="direction: ltr; color: #fff">?</h1>
</div>
</div>
</div>
</div>
<div class="col-lg-12 p-0 col-md-7 col-sm-12 card text-center" style="margin: 25px auto auto auto; border: 0">
<div class="card-header" style="color: #fff; font-size: 26px;
border: 0; background-image: linear-gradient( 40deg, #1f71bc 0%, #4395d5 45%, #868281 100% );">
<div style="display: flex; justify-content: space-between; align-items: center;">
<b><span class="ml-2 mr-2" style="text-center"> All Winners </span></b>

</div>
</div>
<div class="card-body" style="overflow-y:scroll; max-height: 65vh">
<table class="table" id="all_winners">
<tr style="background-color: #eee;">
<td>Prize</td>
<td>Select</td>
<td>Winner</td>
<td>Reset</td>
<td>Amount</td>
</tr>
@foreach ($prizes as $pirze)
<tr>
<td style="text-align:start">{{ $pirze->name }}</td>
<td>
@foreach($pirze->winners as $winner)
<div style="margin:.2rem">
<a onclick="selectPrize({{$pirze->id}},{{$winner->winner_order}})" class="btn btn-primary" style="color:#fff">
Select
</a>
</div>
@endforeach
</td>
<td>
@foreach($pirze->winners as $winner)
<div id="win_{{$pirze->id}}_{{$winner->winner_order}}" style="margin:.2rem">
@if($winner->member_id != null )
<button class="btn btn-success" style="color:#fff">{{ $winner->member_id }}</button>
@else
<button class="btn btn-success" style="color:#fff;visibility:hidden">NoName</button>
@endif
</div>
@endforeach
</td>
<td>
@foreach($pirze->winners as $winner)
<div style="margin:.2rem">
<a onclick="resetPrize({{$pirze->id}},{{$winner->winner_order}})" class="btn btn-danger" style="color:#fff">
Reset
</a>
</div>
@endforeach
</td>
<td>{{$pirze->amount}}</td>
</tr>
@endforeach
</table>

</div>
</div>

</div>

</div>

@endsection

@push('AJAX')

<script type="text/javascript">
var arr = []
var i=1
for( i=1; i<=1500;i++)
{arr[i]=i;}
let myInterval  =null;
let random  =null;
let winner_name = 0;
let winner_id = 0;

console.log(arr);
$(document).ready(function () {

});

function selectPrize(prizeid,order)
{
if(arr.length > 0){
myInterval = setInterval(()=>{

random = arr[Math.floor(Math.random() * arr.length)];

winner_name = document.getElementById('headerNames').innerHTML = random.qrcode;
winner_id = random.id;

}, 1);

setTimeout(()=>{
clearInterval(myInterval);

var url = '/tawuniya/set_winner/'+prizeid+'/'+order+'/'+winner_id;

$.ajaxSetup({
headers: {
'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
}
});

$.ajax({
'url': url,
'type': 'GET',
data: '',
cache:false,
contentType: false,
processData: false,
success: function (response) {
$('#win_'+prizeid+'_'+order).html('<button class="btn btn-success" style="color:#fff">'+winner_id+'</button>');
}
});


},2000);
}else{
winner_name = document.getElementById('headerNames').innerHTML = 'The List of attenders is empty';
}
}

function resetPrize(prizeid,order)
{
var url = '/tawuniya/reset_winner/'+prizeid+'/'+order;

$.ajaxSetup({
headers: {
'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
}
});

$.ajax({
'url': url,
'type': 'GET',
data: '',
cache:false,
contentType: false,
processData: false,
success: function (response) {
//                    arr = response;
$('#win_'+prizeid+'_'+order).html('<button class="btn btn-success" style="color:#fff;visibility:hidden">NoName</button>');
}
});
}
</script>
@endpush
