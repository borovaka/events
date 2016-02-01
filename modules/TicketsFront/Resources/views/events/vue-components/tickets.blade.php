<script>
    var ticketsListComponent = Vue.extend({
        template: '#tickets-template',
        data: function () {
            return {
                tickets: {},
                ticketsResource: null,
                pagination: {
                    page: 1,
                    previous: false,
                    next: false
                }
            }
        },

        methods: {
            fetchTickets: function (direction) {
                if (direction === 'previous') {
                    --this.pagination.page;
                }
                else if (direction === 'next') {
                    ++this.pagination.page;
                }


                this.ticketsResource.get({page: this.pagination.page}).then(function (response) {
                    this.tickets = response.data.data;
                    this.pagination.next = response.data.next_page_url;
                    this.pagination.previous = response.data.prev_page_url;
                });
            }
        },
        ready: function () {
            this.ticketsResource = this.$resource('{{ url('getTickets') }}');
            this.fetchTickets();
        }


    });
</script>