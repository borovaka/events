<script>
    var ticketBuyComponent = Vue.extend({
        template: '#buy-template',
        data: function () {
            return {
                eventResouse: null,
                eventData: {},
                event_id: this.$router.event_id,
                userData: {
                    quantity: 1,
                    promocode: '',
                    discount: 0
                }
            }
        },
        methods: {
            loadData: function() {
                this.eventResouse.get({event_id:this.event_id}).then(function(response){
                    this.eventData = response.data;
                })
            },
            showModal: function() {
                $('#buyModal').modal();
                $('#buyModal').on('hide.bs.modal',function (e) {
                    router.go({path:'/'});
                })
            },
            applyPromo: function() {

                this.$http({url: '{{ url('applyPromo') }}', method: 'GET',data: {event_id:this.event_id,promocode:this.userData.promocode}}).then(function (response) {
                    this.userData.discount = response.data.discount;
                }, function (response) {

                    //TODO: Implement error handling
                    alert(response.data.message);
                });
            },
            buyTicket: function() {

                var ticketData = {
                    event_id : this.event_id,
                    quantity: this.userData.quantity,
                    promocode: this.userData.promocode

                };

                this.$http({url: '{{ url('buyTicket') }}', method: 'POST',data: ticketData}).then(function (response) {
                    $('#buyModal').on('hide.bs.modal',function (e) {
                        router.go({path:'/myTickets'});
                    })
                    $('#buyModal').modal('hide');

                }, function (response) {
                    //TODO: Implement error handling
                });
            }

        },
        computed: {
            getUserPrice: function () {
                var price = (this.userData.quantity * this.eventData.price) - (this.userData.quantity * this.userData.discount);
                return + Math.abs(price.toFixed(2));
            },
            getUserDiscount: function() {
                var discount = (this.userData.quantity * this.userData.discount);
                return + Math.abs(discount.toFixed(2));
            }
        },

        props: [],
        ready: function () {
            this.event_id = router.app.$route.params.event_id;
            this.eventResouse = this.$resource('{{ url('getEvent') }}');
            this.loadData();
            this.showModal();
        }

    });
</script>