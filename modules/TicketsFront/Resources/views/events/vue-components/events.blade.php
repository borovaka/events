<script>
    var eventListComponent = Vue.extend({
        template: '#events-template',
        data: function () {
            return {
                events: {},
                eventsResource: null,
                searchTerms: '',
                pagination: {
                    page: 1,
                    previous: false,
                    next: false
                }
            }
        },

        methods: {
            fetchEvents: function (direction) {
                if (direction === 'previous') {
                    --this.pagination.page;
                }
                else if (direction === 'next') {
                    ++this.pagination.page;
                }


                this.ticketsResource.get({
                    page: this.pagination.page,
                    search: this.searchTerms
                }).then(function (response) {
                    this.events = response.data.data;
                    this.pagination.next = response.data.next_page_url;
                    this.pagination.previous = response.data.prev_page_url;
                });
            },
            doSearch: function () {
                this.fetchEvents();
                this.resetSearch();
            },
            resetSearch: function () {
                this.searchTerms = '';
                this.pagination = {
                    page: 1,
                    previous: false,
                    next: false
                };
                this.fetchEvents();
            },



        },
        ready: function () {
            this.ticketsResource = this.$resource('{{ url('getEvents') }}');
            this.fetchEvents();
        }


    });
</script>