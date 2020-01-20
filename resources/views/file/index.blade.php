@extends('layouts.app')

@section('title', 'Admin | Media Files')

@section('styles')
{{-- <link rel="stylesheet" type="text/css" href="{{ asset('css/dropzone/dropzone.min.css') }}" /> --}}
<link rel="stylesheet" type="text/css" href="{{ asset('dropzone-5.5.0/dist/min/dropzone.min.css') }}" />
@endsection

@section('content')

<div class="modal" id="modal_large" tabindex="-1" role="dialog" aria-labelledby="largeModalHead" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span
                        class="sr-only">Close</span></button>
                <h4><span class="fa fa-download modal-title" id="largeModalHead"></span> Files Upload</h4>
            </div>
            <form action="{{ route('uploadfile') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="modal-body">

                <input name="file[]" type="file" multiple accept=".jpg, .png, .mp4, .mp3, .pdf" />

            </div>
            <div class="modal-footer">
                <button type="submit" class="btn btn-success">Upload</button>
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </div>
            </form>


            {{-- <div class="modal-body">
                <form action="{{ route('dropzone') }}" class="dropzone" id="my-awesome-dropzone">
                @csrf
                </form>
            </div>
            <div class="modal-footer">
                <button type="submit" id="submit-files" class="btn btn-success">Upload</button>
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </div> --}}

        </div>
    </div>
</div>


<div class="row">
    <div class="col-lg-2"></div>
    <div class="col-lg-8">
        @if (session('success'))
        <div class="alert alert-success alert-block">
            <button type="button" class="close" data-dismiss="alert">×</button>
            <strong>{{ session('success') }}</strong>
        </div>
        @endif

        @if (session('danger'))
        <div class="alert alert-danger alert-block">
            <button type="button" class="close" data-dismiss="alert">×</button>
            <strong>{{ session('danger') }}</strong>
        </div>
        @endif

        @if (count($errors) > 0)
        <div class="alert alert-danger alert-block">
            <button type="button" class="close" data-dismiss="alert">×</button>
            <strong>Whoops!</strong> There were some problems with your input.
            <ul>
                @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
        @endif

    </div>
    <div class="col-lg-2"></div>
</div>

<div class="row">
    <div class="col-md-12">

        <!-- START PROJECTS BLOCK -->
        <div class="panel panel-primary">
            <div class="panel-heading">
                <div class="panel-title-box">
                    <h3>Media Files</h3>
                    <span>Media Files activity</span>
                </div>
                <ul class="panel-controls" style="margin-top: 2px;">
                    <button class="btn btn-primary" data-toggle="modal" data-target="#modal_large">Upload File</button>
                    {{-- <div class="pull-right">
                        <a href="" class="btn btn-primery">Upload File</a>
                    </div> --}}
                </ul>
            </div>
            <div class="panel-body panel-body-table">

                <div class="table-responsive">
                    <table class="table table-bordered table-hover">
                        <thead>
                            <tr>
                                <th>Image</th>
                                <th>Name</th>
                                <th>Size</th>
                                <th>Format</th>
                                <th>Type</th>
                                <th>Description</th>
                                <th>User Name</th>
                                <th>Modify</th>
                                <th>Used</th>
                                <th>Download</th>
                                <th>Edit</th>
                                <th>Replase File</th>
                                <th>Delete</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($files as $file)
                            <tr>
                                <td style="text-align:center;">
                                    @switch($file->file_type)
                                    @case(1)

                                    <img src="{{ URL::to('img/Files_icon/video-icon.png') }}"
                                        alt="{{ $file->file_name }}" style="height: auto; width: 100px;" />

                                    @break
                                    @case(2)

                                    <img src="{{ URL::to('img/Files_icon/audio-icon.png') }}"
                                        alt="{{ $file->file_name }}" style="height: auto; width: 100px;" />

                                    @break
                                    @case(3)

                                    <img src="{{ URL::to('img/Files_icon/ebook-icon.png') }}"
                                        alt="{{ $file->file_name }}" style="height: auto; width: 100px;" />

                                    @break
                                    @case(4)

                                    <img src="{{ Storage::url($file->file_address) }}" alt="{{ $file->file_name }}"
                                        style="height: auto; width: 100px;" />

                                    @break
                                    @default

                                    <img src="{{ URL::to('AgroPersianLogo.ico') }}" alt="{{ $file->file_name }}"
                                        style="height: auto; width: 100px;" />

                                    @endswitch
                                </td>
                                <td><strong>{{ $file->file_name }}</strong></td>
                                <td>{{ $file->file_size }}</td>
                                <td>{{ $file->file_format }}</td>
                                <td>
                                    @foreach ($media_type as $row1)
                                    @if(($row1->id) == ($file->file_type) )
                                    {{ $row1->type }}
                                    @endif
                                    @endforeach
                                </td>
                                <td>{{ $file->file_description }}</td>
                                <td>
                                    @foreach ($users as $row2)
                                    @if(($row2->id) == ($file->user_id) )
                                    {{ $row2->username }}
                                    @endif
                                    @endforeach
                                </td>
                                <td>{{ $file->updated_at->diffForHumans() }}</td>
                                <td>
                                    @if($file->used == 1)
                                    <span class="label label-success label-form">used</span>
                                    @else
                                    <span class="label label-danger label-form">Not used</span>
                                    @endif
                                </td>
                                <td>
                                    <a href="{{ route('downloadfile', ['id' => $file->id ]) }}"
                                        class="btn btn-info">Download</a>
                                </td>
                                <td>
                                    <a href="{{ route('editfile', ['id' => $file->id ]) }}"
                                        class="btn btn-warning">Edit</a>
                                </td>
                                <td>
                                    <button class="btn btn-primary" data-toggle="modal"
                                        data-target="#modal_{{ $file->id }}">Replace</button>
                                </td>
                                <td>
                                    <a href="#" class="mb-control btn btn-danger"
                                        data-box="#mb-filedelete{{ $file->id }}">Delete</a>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>

            </div>
        </div>
        <!-- END PROJECTS BLOCK -->

    </div>
</div>

@foreach ($files as $file)
<div class="modal" id="modal_{{ $file->id }}" tabindex="-1" role="dialog" aria-labelledby="largeModalHead"
    aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span
                        class="sr-only">Close</span></button>
                <h4><span class="fa fa-download modal-title" id="largeModalHead"></span> Replace File
                    <strong>{{ $file->file_name }}</strong></h4>
            </div>
            <form action="{{ route('updatefile', ['id' => $file->id ]) }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="modal-body">

                    <input name="file" type="file" accept=".jpg, .png, .mp4, .mp3, .pdf" />

                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-success">Upload</button>
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                </div>
            </form>

            {{-- <form action="{{ route('dropzone') }}" method="POST" enctype="multipart/form-data" class="dropzone">
            @csrf
            <div class="fallback">
                <input name="file" type="file" multiple />
            </div>
            </form> --}}
        </div>
    </div>
</div>
@endforeach




@foreach ($files as $file)
<!-- danger with sound -->
<div class="message-box message-box-danger animated fadeIn" data-sound="fail" id="mb-filedelete{{ $file->id }}">
    <div class="mb-container">
        <div class="mb-middle">
            <div class="mb-title"><span class="fa fa-times"></span> Warning!</div>
            <div class="mb-content">
                <p style="font-size: 20px;">Are you sure you want to remove this File
                    ({{ $file->file_name }}.{{ $file->file_format }}) ?</p>
                {{-- <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec at tellus sed mauris mollis
                    pellentesque nec a ligula. Quisque ultricies eleifend lacinia. Nunc luctus quam pretium massa semper
                    tincidunt. Praesent vel mollis eros. Fusce erat arcu, feugiat ac dignissim ac, aliquam sed urna.
                    Maecenas scelerisque molestie justo, ut tempor nunc.</p> --}}
            </div>
            <div class="mb-footer">
                <div class="pull-right">
                    <form action="{{ route('deletefile', ['id' => $file->id] ) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-success btn-lg">Yes</button>
                        <button class="btn btn-default btn-lg mb-control-close">No</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- end danger with sound -->
@endforeach




@endsection


@section('scripts')
{{-- <script type="text/javascript" src="{{ URL::to('js/dropzone.js') }}"></script> --}}
{{-- <script type="text/javascript" src="{{ URL::to('js/plugins/dropzone/dropzone.min.js') }}"></script> --}}
<script type="text/javascript" src="{{ URL::to('dropzone-5.5.0/dist/dropzone.js') }}"></script>
<script type="text/javascript" >
    Dropzone.autoDiscover = false;
    var myDropzone = new Dropzone(".dropzone",{
        autoProcessQueue: false,
        parallelUploads:100,
        chunking: true,
        forceChunking: true,
        chunkSize: 2000000,
        maxFilesize: 1000,
        //maxFiles: (limit) ? limit : 25,
        maxFiles : 100,
        addRemoveLinks: true,
        acceptedFiles: ".png, .jpeg, .jpg, .mp3, .mpeg, .mp4, .mkv, .mpeg4, .pdf, .txt"
    });

    $('#submit-files').click(function(){
        myDropzone.processQueue();
    });
    </script>
@endsection