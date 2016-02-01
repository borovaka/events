@extends('ticketsadmin::layouts.master')

@section('content')
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            {!! Form::model($user,['method'=>'PATCH','route' => ['admin.users.update',$user->id]]) !!}
                @include('ticketsadmin::users.form',['defaultType' => $user->type ,'submitText' => 'Update'])
            {!! Form::close() !!}
        </div>
    </div>
@endsection