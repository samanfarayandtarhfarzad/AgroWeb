@extends('layouts.app')


@section('title', 'Admin | User Edit')


@section('styles')

@endsection


@section('content')
<div class="row">
    <div class="col-md-12">

        <form class="form-horizontal" method="POST" action="{{ route('admin.user-update', ['id' => $users->id ]) }}">
            @csrf
            {{ method_field('PUT') }}
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h3 class="panel-title">Edit User Information<strong> {{ $users->username }}</strong></h3>
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
                                <label class="col-md-3 control-label">{{ __('E-Mail Address') }}</label>
                                <div class="col-md-9">
                                    <div class="input-group">
                                        <span class="input-group-addon"><span class="fa fa-pencil"></span></span>
                                        <input id="email" type="email"
                                            class="form-control @error('email') is-invalid @enderror" name="email"
                                            value="{{ $users->email }}" required autocomplete="email">
                                    </div>
                                    @error('email')
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
                                        <option value="{{ $row->role_id }}" 

                                            @if($users->roleid == $row->role_id)
                                            selected
                                            @endif

                                            >{{ $row->role_name }}</option>
                                        @endif
                                        @endforeach
                                    </select>
                                    @error('roleid')
                                    <span class="help-block" style="color:red;" role="alert">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            @if(Auth::user()->id == $users->id)
                                
                            @else
                            <div class="form-group">
                                <label class="col-md-3 control-label">{{ __('User Status') }}</label>
                                <div class="col-md-9">
                                    <select name="status" id="status"
                                        class="form-control @error('status') is-invalid @enderror" required
                                        autocomplete="status" autofocus>
                                        <option value="0" @if($users->status == 0)
                                            selected
                                            @endif>Disable User</option>
                                        <option value="1" @if($users->status == 1)
                                            selected
                                            @endif>Activate User</option>
                                    </select>
                                    @error('status')
                                    <span class="help-block" style="color:red;" role="alert">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            @endif

                        </div>

                        <div class="col-md-6">

                            <div class="form-group">
                                <label class="col-md-3 control-label">{{ __('Firstname') }}</label>
                                <div class="col-md-9">
                                    <div class="input-group">
                                        <span class="input-group-addon"><span class="fa fa-pencil"></span></span>
                                        <input id="firstname" type="text"
                                            class="form-control @error('firstname') is-invalid @enderror"
                                            name="firstname" value="{{ $users->firstname }}" required
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
                                            value="{{ $users->lastname }}" required autocomplete="lastname" autofocus>
                                    </div>
                                    @error('lastname')
                                    <span class="help-block" style="color:red;" role="alert">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>

                        </div>

                    </div>

                </div>
                <div class="panel-footer">
                    {{-- <button class="btn btn-default">Clear Form</button> --}}
                    <a href="{{ route('admin.user') }}" class="btn btn-danger">Cancel</a>
                    <button type="submit" class="btn btn-success pull-right">Update</button>
                </div>
            </div>
        </form>

    </div>
</div>
@endsection


@section('scripts')

@endsection