<li class="list-group-item user-info-container @if ($user->is_active == false) user-info-red @endif">
    <div class="row user-info-title">
        <div class="col-12">
            {{$user->name}}
        </div>
    </div>
    <div class="row mt-3 user-info-content">
        <div class="col-12">
            <div class="user-info-email">
                {{$user->email}}
            </div>
            <div class="user-info-date">
                Member since {{$user->created_at}}
            </div>
        </div>
    </div>
    <div class="row user-info-editable mt-2">
        <div class="col col-md-2">
            <b>Plan:</b>
            <span>
                @foreach($pay_plans as $pay_plan)
                    @if($user->user_plan == $pay_plan->id)  {{$pay_plan->name}} @endif
                @endforeach
            </span>
        </div>

        <div class="col col-md-2">
            <b>Level:</b>
            <span>
                {{$user->user_level}}
            </span>
        </div>
        <div class="col col-md-2">
            <b>Status: </b>
            <span>
                @if ($user->is_active == true)
                    Active
                @else
                    Inactive
                @endif
            </span>
        </div>
    </div>
    <form method="post" action="{{route('admin/users/update', ['id' => $user->id])}}">
        {{ csrf_field() }}
        <div class="row user-info-edit mt-2" style="display:none;">
            <div class="col col-md-3">
                <b>Plan:</b>
                <div class="default-select">
                    <select name="user_plan">
                        @foreach($pay_plans as $pay_plan)
                            <option value="{{$pay_plan->id}}"
                                    @if($user->user_plan == $pay_plan->id) selected @endif>{{$pay_plan->name}}</option>
                        @endforeach
                    </select>
                </div>
            </div>

            <div class="col col-md-3">
                <b>Level:</b>

                <div class="default-select">
                    <select name="user_level">
                        @foreach($user_levels as $user_level)
                            <option value="{{$user_level}}"
                                    @if($user->user_level == $user_level) selected @endif>
                                {{$user_level}}
                            </option>
                        @endforeach
                    </select>
                </div>
            </div>

            <div class="col col-md-3">
                <b>Status: </b>

                <div class="switch-wrap form-inline">
                    <div class="primary-switch">
                        <input name="is_active" type="checkbox" id="switch-{{$user->id}}" value="1"
                               autocomplete="off" @if ($user->is_active == 1) checked @endif>
                        <label for="switch-{{$user->id}}"></label>
                    </div>
                    <span>&nbsp;Is active</span>
                </div>
            </div>
            <div class="col col-md-3">
                <button class="btn btn-primary" data-action="saveUser">
                    <i class="fa fa-save"></i> Save
                </button>
            </div>
        </div>
    </form>

    <div class="user-info-actions">
        <a href="javascript:void(0)" data-user-id="{{$user->id}}" data-action="editUser" class="text-primary">
            <i class="fa fa-pencil" aria-hidden="true"></i>
        </a>
        <a href="javascript:void(0)" data-user-id="{{$user->id}}" data-action="cancelEditUser" class="text-danger"
           style="display: none">
            <i class="fa fa-times" aria-hidden="true"></i>
        </a>
    </div>
</li>