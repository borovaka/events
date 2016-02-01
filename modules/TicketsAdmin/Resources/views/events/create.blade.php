@extends('ticketsadmin::layouts.master')

@section('content')
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            {!! Form::open(['route' => 'admin.events.store']) !!}
                @include('ticketsadmin::events.form',['submitText' => 'Create'])
            {!! Form::close() !!}
        </div>
    </div>
@endsection