<template id="events-template">

    <div class="row">
        <div class="col-md-6 col-md-offset-3">
            <div class="input-group">
                <input type="text" class="form-control" placeholder="Search for..." v-model="searchTerms">
                <span class="input-group-btn">
                <button class="btn btn-default" type="button" @click="doSearch">Go!</button>
                    <button class="btn btn-warning" type="button" @click="resetSearch">Reset</button>
             </span>
            </div><!-- /input-group -->
        </div><!-- /.col-lg-6 -->
    </div>

    <div class="row">
        <table class="table table-condensed">
            <tr>
                <th>Name</th>
                <th>Description</th>
                <th>Start</th>
                <th>Quantity</th>
                <th>Price</th>
                <th>Promoter</th>
                @if(!Auth::guest())
                    <th>Buy</th>
                @endif
            </tr>
            <tr v-for="event in events">
                <td>@{{ event.event_name }}</td>
                <td>@{{ event.event_desc }}</td>
                <td>@{{ event.start_date }}</td>
                <td>@{{ event.quantity }}</td>
                <td>@{{ event.price }}</td>
                <td>@{{ event.user.name }}</td>
                @if(!Auth::guest())
                    <td><a class="btn btn-success btn-xs" v-link="{ path: '/buyticket/'+event.id }"><i
                                    class="glyphicon glyphicon-shopping-cart"></i></a></td>
                    {{--<td><button class="btn btn-success btn-xs" @click="showModal(event.id)"><i
                                    class="glyphicon glyphicon-shopping-cart" ></i></button></td>--}}
                @endif

            </tr>

        </table>
    </div>
    <div class="row">
        <div class="col-md-4 col-md-offset-4">
            <ul class="pager">
                <li class="previous" v-show="pagination.previous">
                    <a class="page-scroll" @click="fetchEvents('previous')">Previous</a>
                </li>
                <li class="next" v-show="pagination.next">
                    <a class="page-scroll" @click="fetchEvents('next')">Next</a>
                </li>
            </ul>
        </div>
    </div>




</template>