<div class="card">
    <div class="card-header">
        <h4>{{ __('messages.orders-by-days') }}</h4>
        <div class="card-header-action dropdown">
            <a href="javascript:;" class="btn btn-primary daterange-btn icon-left btn-icon"><i class="fas fa-calendar"></i>
                Choose Date</a>
        </div>
    </div>
    <div class="card-body">
        <canvas id="myChart3"></canvas>
    </div>
</div>
@push('script')
    <script src="{{ asset('assets/modules/chart.min.js') }}"></script>
    <script>

        $('.daterange-btn').daterangepicker({
            ranges: {
                'Today': [moment(), moment()],
                'Yesterday': [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
                'Last 7 Days': [moment().subtract(6, 'days'), moment()],
                'Last 30 Days': [moment().subtract(29, 'days'), moment()],
                'This Month': [moment().startOf('month'), moment().endOf('month')],
                'Last Month': [moment().subtract(1, 'month').startOf('month'), moment().subtract(1, 'month').endOf('month')]
            },
            "alwaysShowCalendars": true,
            "startDate": moment().subtract(29, 'days'),
            "endDate": moment(),
            "maxDate":moment(),
        }, function(start, end, label) {
            start = start.format('YYYY-MM-DD');
            end   = end.format('YYYY-MM-DD');
            ordersChartByAjax(start, end)
        });

        let date = new Date();
        date.setDate(date.getDate() - 29);

        let formatDate = (date) => {
            const year = date.getFullYear();
            const month = (date.getMonth() + 1).toString().padStart(2, '0');
            const day = date.getDate().toString().padStart(2, '0');
            return `${year}-${month}-${day}`;
        };

        let start = formatDate(date);
        let end = formatDate(new Date());

        ordersChartByAjax(start, end)

        function ordersChartByAjax(start, end) {
            $.ajax({
                type: "POST",
                url: "{{ route('orders.chart') }}",
                data: {
                    _token: "{{ csrf_token() }}",
                    start: start,
                    end: end
                },
                success: function(response) {
                    let data = Object.values(response.data);
                    let labels = Object.keys(response.data);
                    doughnuts(labels, data)
                }
            });
        }

        function doughnuts(labels, data) {
            var ctx = document.getElementById("myChart3").getContext('2d');
            var myChart = new Chart(ctx, {
                type: 'doughnut',
                data: {
                    datasets: [{
                        data: data,
                        backgroundColor: [
                            '#000000',
                            '#A1BFA4',
                            '#B89270',
                            '#8A9F80',
                            '#EBE6DA',
                            '#F4DDAC',
                            '#F3B372',
                        ],
                        label: 'Dataset 1'
                    }],
                    labels: labels,
                },
                options: {
                    responsive: true,
                    legend: {
                        position: 'bottom',
                    },
                }
            });
        }
    </script>
@endpush
