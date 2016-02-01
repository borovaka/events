@extends('ticketsfront::layouts.master')

@section('content')

        <router-view></router-view>
    @include('ticketsfront::events.vue-templates.events')
    @include('ticketsfront::events.vue-templates.buy')
    @include('ticketsfront::events.vue-templates.tickets')
@stop
@section('js')

<script>var App = Vue.extend();</script>
    @include('ticketsfront::events.vue-components.buy')
    @include('ticketsfront::events.vue-components.events')
    @include('ticketsfront::events.vue-components.tickets')
    <script>


        var router = new VueRouter();
        router.map({
            /*'*': {
                component: eventListComponent,
            },*/
            '/': {
                component: eventListComponent,
            },
            '/list/': {
                component: eventListComponent,
            },
            '/buyticket/:event_id': {
                component: ticketBuyComponent
            },
            '/myTickets/' : {
                component: ticketsListComponent
            }
        });



        router.start(App, '#app');

    </script>


@endsection