@extends('layouts.app')


@section('title', 'Admin | Media Files')


@section('styles')

@endsection


@section('content')
@if ($message = Session::get('success'))
<div class="alert alert-success alert-block">
    <button type="button" class="close" data-dismiss="alert">×</button>
    <strong>{{ $message }}</strong>
</div>
@endif

@if (count($errors) > 0)
<div class="alert alert-danger">
    <strong>Whoops!</strong> There were some problems with your input.
    <ul>
        @foreach ($errors->all() as $error)
        <li>{{ $error }}</li>
        @endforeach
    </ul>
</div>
@endif

<div class="row">
    <div class="col-md-12">

        <form class="form-horizontal" method="POST" action="{{ route('updatefileinfo', ['id' => $files->id ]) }}">
            @csrf
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h3 class="panel-title">Edit File Information<strong>
                            ({{ $files->file_name }}.{{ $files->file_format }})</strong></h3>
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

                            <div class="profile-image">
                                @switch($files->file_type)
                                @case(1)

                                <video class="video" width="100%" height="auto" controls
                                    poster="{{ URL::to('img/Files_icon/video-icon-preview.png') }}">
                                    <source src="{{ Storage::url($files->file_address) }}" type="video/mp4">
                                    {{-- <source src="movie.ogg" type="video/ogg"> --}}
                                    Your browser does not support the video tag.
                                </video>

                                @break
                                @case(2)


                                <audio controls style="margin:20%;">
                                    {{-- <source src="horse.ogg" type="audio/ogg"> --}}
                                    <source src="{{ Storage::url($files->file_address) }}" type="audio/mpeg">
                                  Your browser does not support the audio element.
                                  </audio> 

                                {{-- <img src="{{ URL::to('img/Files_icon/audio-icon.png') }}" alt="{{ $files->file_name }}"
                                    style="height: auto; width: 100%;" /> --}}

                                @break
                                @case(3)


                                <embed src="{{ Storage::url($files->file_address) }}" width="100%" height="375">

                                {{-- <img src="{{ URL::to('img/Files_icon/ebook-icon.png') }}" alt="{{ $files->file_name }}"
                                    style="height: auto; width: 100%;" /> --}}

                                @break
                                @case(4)

                                <img src="{{ Storage::url($files->file_address) }}" alt="{{ $files->file_name }}"
                                    style="height: auto; width: 100%;" />

                                @break
                                @default

                                <img src="{{ URL::to('AgroPersianLogo.ico') }}" alt="{{ $files->file_name }}"
                                    style="height: auto; width: 100%;" />

                                @endswitch
                            </div>

                        </div>

                        <div class="col-md-6">

                            <div class="form-group">
                                <label class="col-md-3 control-label">FileName</label>
                                <div class="col-md-9">
                                    <div class="input-group">
                                        <span class="input-group-addon"><span class="fa fa-pencil"></span></span>
                                        <input id="filename" type="text"
                                            class="form-control @error('filename') is-invalid @enderror" name="filename"
                                            value="{{ $files->file_name }}" required autocomplete="filename" autofocus>
                                    </div>
                                    @error('filename')
                                    <span class="help-block" style="color:red;" role="alert">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-md-3 control-label">Description</label>
                                <div class="col-md-9">
                                    <div class="input-group">
                                        <span class="input-group-addon"><span class="fa fa-pencil"></span></span>
                                        <input id="description" type="text"
                                            class="form-control @error('description') is-invalid @enderror"
                                            name="description" value="{{ $files->file_description }}" required
                                            autocomplete="description" autofocus>
                                    </div>
                                    @error('description')
                                    <span class="help-block" style="color:red;" role="alert">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>

                        </div>

                    </div>

                </div>
                <div class="panel-footer">
                    {{-- <button class="btn btn-default">Clear Form</button> --}}
                    <a href="{{ route('viewfile') }}" class="btn btn-danger">Cancel</a>
                    <button type="submit" class="btn btn-success pull-right">Update</button>
                </div>
            </div>
        </form>

    </div>
</div>
@endsection


@section('scripts')

@endsection