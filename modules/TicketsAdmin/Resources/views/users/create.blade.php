@extends('ticketsadmin::layouts.master')

@section('content')
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            {!! Form::open(['route' => 'admin.users.store']) !!}
                @include('ticketsadmin::users.form',['defaultType' => null, 'submitText' => 'Create'])
            {!! Form::close() !!}
        </div>
    </div>
@endsection