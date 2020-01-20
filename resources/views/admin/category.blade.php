@extends('layouts.app')


@section('title', 'Admin | Categorys')


@section('styles')

@endsection


@section('content')

    <div class="modal" id="modal_large" tabindex="-1" role="dialog" aria-labelledby="largeModalHead" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <form class="form-horizontal" method="POST" action="{{ route('create_category') }}">
                    @csrf
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span
                                class="sr-only">Close</span></button>
                        <h4><span class="fa fa-download modal-title" id="largeModalHead"></span> Create New Category</h4>
                    </div>
                    <div class="modal-body">

                        <div class="form-group">
                            <label class="col-md-3 control-label">Title</label>
                            <div class="col-md-9">
                                <div class="input-group">
                                    <span class="input-group-addon"><span class="fa fa-pencil"></span></span>
                                    <input id="title" type="text"
                                           class="form-control @error('title') is-invalid @enderror"
                                           name="title" required
                                           autocomplete="title" autofocus>
                                </div>
                                @error('title')
                                <span class="help-block" style="color:red;" role="alert">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-md-3 control-label">Text</label>
                            <div class="col-md-9">
                                <div class="input-group">
                                    <span class="input-group-addon"><span class="fa fa-pencil"></span></span>
                                    <input id="text" type="text"
                                           class="form-control @error('text') is-invalid @enderror" name="text" required autocomplete="text" autofocus>
                                </div>
                                @error('text')
                                <span class="help-block" style="color:red;" role="alert">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-md-3 control-label">Privilege</label>
                            <div class="col-md-9">
                                <div class="input-group">
                                    <span class="input-group-addon"><span class="fa fa-pencil"></span></span>
                                    <input id="privilege" type="number"
                                           class="form-control @error('privilege') is-invalid @enderror" name="privilege" required autocomplete="privilege" autofocus>
                                </div>
                                @error('privilege')
                                <span class="help-block" style="color:red;" role="alert">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-md-3 control-label">Select Image</label>
                            <div class="col-md-9">
                                <select name="file_id" id="file_id"
                                        class="form-control @error('file_id') is-invalid @enderror" required
                                        autocomplete="file_id" autofocus>
                                    <option value="1">Select the image you want</option>
                                    @foreach ($files as $row2)
                                        <option value="{{ $row2->id }}" >{{ $row2->file_name }}.{{ $row2->file_format }}</option>
                                    @endforeach

{{--                                    <option value="1" @if($users->status == 1)--}}
{{--                                    selected--}}
{{--                                        @endif>Activate User</option>--}}

                                </select>
                                @error('file_id')
                                <span class="help-block" style="color:red;" role="alert">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>

                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-success">Create</button>
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    </div>

                </form>

            </div>
        </div>
    </div>


    <div class="row">
    <div class="col-md-12">

        <!-- START PROJECTS BLOCK -->
        <div class="panel panel-default">
            <div class="panel-heading">
                <div class="panel-title-box">
                    <h3>Categorys</h3>
                    <span>Categorys activity</span>
                </div>
                <ul class="panel-controls" style="margin-top: 2px;">
                    <button class="btn btn-primary" data-toggle="modal" data-target="#modal_large">Create Category</button>
{{--                    <li><a href="#" class="panel-fullscreen"><span class="fa fa-expand"></span></a></li>--}}
{{--                    <li><a href="#" class="panel-refresh"><span class="fa fa-refresh"></span></a></li> --}}
{{--                    <li class="dropdown">--}}
{{--                        <a href="#" class="dropdown-toggle" data-toggle="dropdown"><span class="fa fa-cog"></span></a>--}}
{{--                        <ul class="dropdown-menu">--}}
{{--                            <li><a href="#" class="panel-collapse"><span class="fa fa-angle-down"></span> Collapse</a>--}}
{{--                            </li>--}}
{{--                            <li><a href="#" class="panel-remove"><span class="fa fa-times"></span> Remove</a></li>--}}
{{--                        </ul>--}}
{{--                    </li>--}}
                </ul>
            </div>
            <div class="panel-body panel-body-table">

                <div class="table-responsive">
                    <table class="table table-bordered table-hover">
                        <thead>
                            <tr>
                                <th>Image</th>
                                <th>Title</th>
                                <th>Text</th>
                                <th>Privilege</th>
                                <th>Status</th>
                                <th>Modify</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($category as $row)
                                <tr>
                                    <td>
                                        @foreach ($files as $row1)
                                            @if(($row1->id) == ($row->file_id) )
                                                <img src="{{ Storage::url($row1->file_address) }}" alt="{{ $row1->file_name }}"
                                                     style="height: auto; width: 100px;" />
                                            @endif
                                        @endforeach
                                    </td>
                                    <td>{{ $row->category_title }}</td>
                                    <td>{{ $row->category_text }}</td>
                                    <td><strong>{{ $row->category_Privilege }}</strong></td>
                                    <td>
                                        @if($row->category_status == 1)
                                            <span class="label label-success label-form">used</span>
                                        @else
                                            <span class="label label-danger label-form">Not used</span>
                                        @endif
                                    </td>
                                    <td>{{ $row->updated_at }}</td>
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


@endsection


@section('scripts')

@endsection
