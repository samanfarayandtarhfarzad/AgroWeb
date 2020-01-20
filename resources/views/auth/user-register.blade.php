@extends('layouts.app')

@section('title', 'Agro Persian | Register')

@section('content')
<div class="row">
    <div class="col-md-12">

        <form class="form-horizontal" method="POST" action="{{ route('auth.user-register') }}">
            @csrf
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h3 class="panel-title"><strong>Register</strong> a new user</h3>
                    <ul class="panel-controls">
                        <li><a href="#" class="panel-remove"><span class="fa fa-times"></span></a></li>
                    </ul>
                </div>
                {{-- <div class="panel-body">
                <p>This is non libero bibendum, scelerisque arcu id, placerat nunc. Integer ullamcorper rutrum dui eget porta. Fusce enim dui, pulvinar a augue nec, dapibus hendrerit mauris. Praesent efficitur, elit non convallis faucibus, enim sapien suscipit mi, sit amet fringilla felis arcu id sem. Phasellus semper felis in odio convallis, et venenatis nisl posuere. Morbi non aliquet magna, a consectetur risus. Vivamus quis tellus eros. Nulla sagittis nisi sit amet orci consectetur laoreet. Vivamus volutpat erat ac vulputate laoreet. Phasellus eu ipsum massa.</p>
            </div> --}}
                <div class="panel-body">

                    <div class="row">

                        <div class="col-md-6">

                            <div class="form-group">
                                <label class="col-md-3 control-label">{{ __('Username') }}</label>
                                <div class="col-md-9">
                                    <div class="input-group">
                                        <span class="input-group-addon"><span class="fa fa-pencil"></span></span>
                                        <input id="username" type="text"
                                            class="form-control @error('username') is-invalid @enderror" name="username"
                                            value="{{ old('username') }}" required autocomplete="username" autofocus>
                                    </div>
                                    @error('username')
                                    <span class="help-block" style="color:red;" role="alert">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-md-3 control-label">{{ __('E-Mail Address') }}</label>
                                <div class="col-md-9">
                                    <div class="input-group">
                                        <span class="input-group-addon"><span class="fa fa-pencil"></span></span>
                                        <input id="email" type="email"
                                            class="form-control @error('email') is-invalid @enderror" name="email"
                                            value="{{ old('email') }}" required autocomplete="email">
                                    </div>
                                    @error('email')
                                    <span class="help-block" style="color:red;" role="alert">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-md-3 control-label">{{ __('Password') }}</label>
                                <div class="col-md-9 col-xs-12">
                                    <div class="input-group">
                                        <span class="input-group-addon"><span class="fa fa-unlock-alt"></span></span>
                                        <input id="password" type="password"
                                            class="form-control @error('password') is-invalid @enderror" name="password"
                                            required autocomplete="new-password">
                                    </div>
                                    @error('password')
                                    <span class="help-block" style="color:red;" role="alert">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-md-3 control-label">{{ __('Confirm Password') }}</label>
                                <div class="col-md-9 col-xs-12">
                                    <div class="input-group">
                                        <span class="input-group-addon"><span class="fa fa-unlock-alt"></span></span>
                                        <input id="password-confirm" type="password" class="form-control"
                                            name="password_confirmation" required autocomplete="new-password">
                                    </div>
                                </div>
                            </div>

                        </div>

                        <div class="col-md-6">

                            <div class="form-group">
                                <label class="col-md-3 control-label">{{ __('Firstname') }}</label>
                                <div class="col-md-9">
                                    <div class="input-group">
                                        <span class="input-group-addon"><span class="fa fa-pencil"></span></span>
                                        <input id="firstname" type="text"
                                            class="form-control @error('firstname') is-invalid @enderror"
                                            name="firstname" value="{{ old('firstname') }}" required
                                            autocomplete="firstname" autofocus>
                                    </div>
                                    @error('firstname')
                                    <span class="help-block" style="color:red;" role="alert">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-md-3 control-label">{{ __('Lastname') }}</label>
                                <div class="col-md-9">
                                    <div class="input-group">
                                        <span class="input-group-addon"><span class="fa fa-pencil"></span></span>
                                        <input id="lastname" type="text"
                                            class="form-control @error('lastname') is-invalid @enderror" name="lastname"
                                            value="{{ old('lastname') }}" required autocomplete="lastname" autofocus>
                                    </div>
                                    @error('lastname')
                                    <span class="help-block" style="color:red;" role="alert">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-md-3 control-label">{{ __('User Role') }}</label>
                                <div class="col-md-9">
                                    <select name="roleid" id="roleid"
                                        class="form-control @error('roleid') is-invalid @enderror" required
                                        autocomplete="roleid" autofocus>
                                        <option value="0">Choose a role for this user</option>
                                        @foreach ($roles as $row)
                                        @if($row->role_id == 1)

                                        @else
                                        <option value="{{ $row->role_id }}">{{ $row->role_name }}</option>
                                        @endif
                                        @endforeach
                                    </select>
                                    @error('roleid')
                                    <span class="help-block" style="color:red;" role="alert">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>

                        </div>

                    </div>

                </div>
                <div class="panel-footer">
                    {{-- <button class="btn btn-default">Clear Form</button> --}}
                    <button type="submit" class="btn btn-primary pull-right">{{ __('Register') }}</button>
                </div>
            </div>
        </form>

    </div>
</div>
@endsection


@section('scripts')

@endsection