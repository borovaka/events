@extends('ticketsadmin::layouts.master')

@section('content')

    <div class="row">
        <table class="table table-condensed">
            <tr>
                <th>Name</th>
                <th>Email</th>
                <th>Type</th>
                <th><a href="{{route('admin.users.create')}}" class="btn btn-success btn-xs" >Add &nbsp;<i class="glyphicon glyphicon-plus-sign"></i></a></th>
            </tr>
            @foreach ($users as $user)
                <tr>
                    <td>{{ $user->name }}</td>
                    <td>{{ $user->email }}</td>
                    <td>{{ $user->type_string }}</td>
                    <td>@include('ticketsadmin::partials.action_buttons',["delete_link" => route('admin.users.destroy',$user->id ),"update_link" => route('admin.users.edit',$user->id)])</td>
                </tr>
            @endforeach

        </table>
    </div>
    <div class="row">
        <div class="col-md-4 col-md-offset-5">
            {!! $users->render() !!}
        </div>
    </div>

@endsection