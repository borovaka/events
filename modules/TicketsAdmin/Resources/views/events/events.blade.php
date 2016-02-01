@extends('ticketsadmin::layouts.master')

@section('content')
    <div class="row">
        <table class="table table-condensed">
            <tr>
                <th>Name</th>
                <th>Description</th>
                <th>Start</th>
                <th>Quantity</th>
                <th>Price</th>
                <th>Discount</th>
                <th>Promocode</th>
                <th>Promoter</th>
                <th>Actions</th>
            </tr>
            @foreach ($events as $event)
                <tr>
                    <td>{{ $event->event_name }}</td>
                    <td>{{ $event->event_desc }}</td>
                    <td>{{ $event->start_date }}</td>
                    <td>{{ $event->quantity }}</td>
                    <td>{{ $event->price }}</td>
                    <td>{{ $event->discount }}</td>
                    <td>{{ $event->promocode }}</td>
                    <td>{{ $event->user->name }}</td>
                    <td class="actions" id="{{ $event->id }}">
                        @include('ticketsadmin::partials.action_buttons',["delete_link" => route('admin.events.destroy',$event->id ),"update_link" => route('admin.events.edit',$event->id)])
                    </td>
                </tr>
            @endforeach

        </table>
    </div>
    <div class="row">
        <div class="col-md-6 col-md-offset-4">
            {!! $events->render() !!}
        </div>
    </div>

@endsection