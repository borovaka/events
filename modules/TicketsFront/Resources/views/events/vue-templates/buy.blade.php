<template id="buy-template">
    {{--@{{eventData | json}}--}}

            <!-- Modal -->
    <div class="modal fade" id="buyModal" tabindex="-1" role="dialog" aria-labelledby="buyModalLabel">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                                aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title" id="buyModalLabel">Buy Ticket</h4>
                </div>
                <div class="modal-body">
                    <h2>Event: @{{ eventData.event_name }}</h2>
                    <hr/>
                    <article>
                        @{{ eventData.event_desc }}
                    </article>
                    {{--<input type="text" name="name" id="eventName" class="form-control" v-model="eventData.event_name" title="" required="required" >--}}
                    <hr/>

                    <div class="row">
                        <div class="col-md-2">
                            Quantity: @{{ userData.quantity }}
                        </div>
                        <div class="col-md-2">
                            <span>Price: @{{ getUserPrice }}</span>
                        </div>
                        <div class="col-md-2">
                            <span>Discount: @{{ getUserDiscount }}</span>
                        </div>

                    </div>
                    <hr/>
                    <div class="row">
                        <form class="form-inline col-md-10 col-md-offset-1">
                            <div class="form-group">
                                <label class="sr-only" for="quantity">Quantity</label>
                                <input type="number" min="0" step="1" class="form-control" id="quantity" placeholder="Quantity" v-model="userData.quantity">
                            </div>
                            <div class="form-group">
                                <label class="sr-only" for="promocode">Promo code</label>
                                <input type="text" class="form-control" id="promocode"
                                       placeholder="Promo code" v-model="userData.promocode" :disabled="userData.discount > 0">
                            </div>
                            <button  class="btn btn-default" @click="applyPromo" v-if="!userData.discount">Apply</button>
                        </form>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary" v-if="userData.quantity > 0" @click="buyTicket">Buy</button>
                </div>
            </div>
        </div>
    </div>
</template>