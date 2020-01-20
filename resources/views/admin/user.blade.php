@extends('layouts.app')


@section('title', 'Admin | Users')


@section('styles')

@endsection


@section('content')
<div class="row">
    <div class="col-md-12">
        <!-- START PROJECTS BLOCK -->
        <div class="panel panel-default">
            <div class="panel-heading">
                <div class="panel-title-box">
                    <h3>Users</h3>
                    <span>Users activity</span>
                </div>
                {{-- <button data-toggle="modal" data-target="#modal_basic" type="button"
                    class="panel-controls btn btn-info pull-right" style="margin-top: 2px;">
                    <span class="fa fa-plus-square"></span> Add New User</button> --}}
                <ul class="panel-controls" style="margin-top: 2px;">
                    <li><a href="#" class="panel-fullscreen"><span class="fa fa-expand"></span></a></li>
                    {{-- <li><a href="#" class="panel-refresh"><span class="fa fa-refresh"></span></a></li> --}}
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown"><span class="fa fa-cog"></span></a>
                        <ul class="dropdown-menu">
                            <li><a href="#" class="panel-collapse"><span class="fa fa-angle-down"></span> Collapse</a>
                            </li>
                            <li><a href="#" class="panel-remove"><span class="fa fa-times"></span> Remove</a></li>
                        </ul>
                    </li>
                </ul>
            </div>
            <div class="panel-body panel-body-table">

                <div class="table-responsive">
                    <table class="table table-bordered table-hover">
                        <thead class=" text-primary">
                            <th> ID </th>
                            <th> Username </th>
                            <th> Firstname </th>
                            <th> Lastname </th>
                            <th> Role </th>
                            <th> Email </th>
                            <th> Status </th>
                            <th> Edit </th>
                            <th> Delete </th>
                        </thead>
                        <tbody>
                            @foreach ($users as $row)
                            <tr>
                                <td>{{ $row->id }}</td>
                                <td>{{ $row->username }}</td>
                                <td>{{ $row->firstname }}</td>
                                <td>{{ $row->lastname }}</td>
                                <td>
                                    @foreach ($roles as $row1)
                                    @if(($row1->role_id) == ($row->roleid) )
                                    {{ $row1->role_name }}
                                    @endif
                                    @endforeach
                                </td>
                                <td>{{ $row->email }}</td>
                                <td>
                                    @if($row->status == 1)
                                    <span class="label label-success label-form">active</span>
                                    @else
                                    <span class="label label-danger label-form">Inactive</span>
                                    @endif
                                </td>
                                <td>
                                    <a href="{{ route('admin.user-edit', ['id' => $row->id ]) }}"
                                        class="btn btn-info">Edit</a>
                                </td>
                                <td>
                                    <a href="#" class="mb-control btn btn-danger" data-box="#mb-userdelete{{ $row->id }}">Delete</a>
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



@foreach ($users as $row)
<!-- danger with sound -->
<div class="message-box message-box-danger animated fadeIn" data-sound="fail" id="mb-userdelete{{ $row->id }}">
    <div class="mb-container">
        <div class="mb-middle">
            <div class="mb-title"><span class="fa fa-times"></span> Warning!</div>
            <div class="mb-content">
                <p style="font-size: 20px;">Are you sure you want to remove this user ({{ $row->username }}) ?</p>
                {{-- <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec at tellus sed mauris mollis
                    pellentesque nec a ligula. Quisque ultricies eleifend lacinia. Nunc luctus quam pretium massa semper
                    tincidunt. Praesent vel mollis eros. Fusce erat arcu, feugiat ac dignissim ac, aliquam sed urna.
                    Maecenas scelerisque molestie justo, ut tempor nunc.</p> --}}
            </div>
            <div class="mb-footer">
                <div class="pull-right">
                    <a href="{{ route('admin.user-delete', ['id' => $row->id ]) }}"
                        class="btn btn-success btn-lg">Yes</a>
                    <button class="btn btn-default btn-lg mb-control-close">No</button>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- end danger with sound -->
@endforeach



@endsection


@section('scripts')

@endsection