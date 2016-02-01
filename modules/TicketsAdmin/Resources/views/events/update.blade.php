@extends('ticketsadmin::layouts.master')

@section('content')
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            {!! Form::model($event,['method'=>'PATCH','route' => ['admin.events.update',$event->id]]) !!}
                @include('ticketsadmin::events.form',['submitText' => 'Update'])
            {!! Form::close() !!}
        </div>
    </div>
@endsection