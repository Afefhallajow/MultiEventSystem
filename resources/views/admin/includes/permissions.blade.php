<div class="modal-header">
    <h4 class="modal-title mrAuto" align="center">تعديل الصلاحيات</h4>
</div>
<form class="form-horizontal" method="post" id="permission_form">
    <div id="permission_result"></div>
    <div class="modal-body">
        <div class="form-group row justify-content-end">
            <div class="col-sm-12">
                @foreach($permission as $value)
                    @php
                        $checked = $user->hasPermissionTo($value->id) ? 'checked=true' : '';
                    @endphp
                    <label style="cursor: pointer">
                        <input type="checkbox" name="permission[]" value="{{$value->id}}" class="form-controller" {{ $checked }}>
                        {{ __('dashboard.'.$value->name) }}
                    </label>
                    <br/>
                @endforeach
            </div>
        </div>

        <!-- submit -->
        <div class="form-group row justify-content-end">
            <div class="col-sm-9">
                <input type="hidden" name="user_id" id="user_id" value="{{ $user->id }}" />
                <input type="submit" name="action_button" id="permission_button" class="blueColor btn btn-light" value="حفظ"
                       style="padding:8px 40px;" />
                <div id="permission_spinner" class="spinner-grow text-secondary m-1 blueColor" role="status" style="display: none">
                    <span class="sr-only">Loading...</span>
                </div>
            </div>
        </div>
    </div>
</form>
