<div class="modal-header">
    <h4 class="modal-title mrAuto" align="center">اضافة فعالية الى المستخدم</h4>
</div>
<form class="form-horizontal" method="post" id="add_day_form">
    <div id="day_result"></div>
    <div class="modal-body">
        <div class="form-group row justify-content-end">
            <div class="col-sm-12">

                <input type="hidden" name="id" value="{{$user->id}}">
                @foreach($days as $value)


                    @php

    $checked =  '' ;

foreach ($user_days as $user_day )
{    if($user_day->day_id==$value->id)
    $checked =  'checked=true' ;
 }                   @endphp
                    <label style="cursor: pointer">
                        <input type="checkbox" name="days[]" value="{{$value->id}}" class="form-controller" {{ $checked }}>
                        {{ $value->name }}
                    </label>
                    <br/>

                @endforeach
            </div>
        </div>

        <!-- submit -->
        <div class="form-group row justify-content-end">
            <div class="col-sm-9">
                <input type="hidden" name="user_id" id="user_id" value="{{ $user->id }}" />
                <input id="day_button" type="submit" name="action_button"  class=" btn btn-primary" value="حفظ"
                       style="padding:8px 40px;" />
                <div id="day_spinner" class="spinner-grow text-secondary m-1 blueColor" role="status" style="display: none">
                    <span class="sr-only">Loading...</span>
                </div>
            </div>
        </div>
    </div>
</form>
