<template id="tickets-template">
    <div class="row">
        <table class="table table-condensed">
            <tr>
                <th>Name</th>
                <th>Description</th>
                <th>Start</th>
                <th>Quantity</th>
                <th>Ordered Price</th>
            </tr>
            <tr v-for="ticket in tickets">
                <td>@{{ ticket.event.event_name }}</td>
                <td>@{{ ticket.event.event_desc }}</td>
                <td>@{{ ticket.event.start_date }}</td>
                <td>@{{ ticket.quantity }}</td>
                <td>@{{ ticket.price }}</td>
            </tr>

        </table>
    </div>
    <div class="row">
        <div class="col-md-4 col-md-offset-4">
            <ul class="pager">
                <li class="previous" v-show="pagination.previous">
                    <a class="page-scroll" @click="fetchTickets('previous')">Previous</a>
                </li>
                <li class="next" v-show="pagination.next">
                    <a class="page-scroll" @click="fetchTickets('next')">Next</a>
                </li>
            </ul>
        </div>
    </div>

</template>