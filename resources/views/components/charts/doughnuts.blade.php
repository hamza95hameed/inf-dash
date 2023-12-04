<div class="card">
    <div class="card-header">
        <h4>Orders by days</h4>
        <div class="card-header-action dropdown">
            <a href="javascript:void(0)" data-toggle="dropdown" class="btn btn-danger dropdown-toggle filterDate">7J</a>
            <ul class="dropdown-menu dropdown-menu-sm dropdown-menu-right">
                <li class="dropdown-title">Select Period</li>
                <li><a href="javascript:void(0)" data-end="{{ date('Y-m-d') }}" data-start="{{ date('Y-m-d', strtotime('-7 days')) }}" class="duration dropdown-item active">7J</a></li>
                <li><a href="javascript:void(0)" data-end="{{ date('Y-m-d') }}" data-start="{{ date('Y-m-d', strtotime('-15 days')) }}" class="duration dropdown-item">15J</a></li>
                <li><a href="javascript:void(0)" data-end="{{ date('Y-m-d') }}" data-start="{{ date('Y-m-d', strtotime('-30 days')) }}" class="duration dropdown-item">1M</a></li>
                <li><a href="javascript:void(0)" data-end="{{ date('Y-m-d') }}" data-start="{{ date('Y-m-d', strtotime('-180 days')) }}" class="duration dropdown-item">6M</a></li>
                <li><a href="javascript:void(0)" data-end="{{ date('Y-m-d') }}" data-start="{{ date('Y-01-01') }}" class="duration dropdown-item">YTD</a></li>
            </ul>
        </div>
    </div>
    <div class="card-body">
        <canvas id="myChart3"></canvas>
    </div>
</div>
@push('script')
    <script src="{{ asset('assets/modules/chart.min.js') }}"></script>
    <script>

        let start = $('.duration.active').attr('data-start');
        let end   = $('.duration.active').attr('data-end');
        ordersChartByAjax(start, end)

        $(document).on('click', '.duration', function(){
            let start = $(this).attr('data-start');
            let end   = $(this).attr('data-end');
            let text  = $(this).text();

            $('.filterDate').text(text)
            $('.duration').removeClass('active');
            $(this).addClass('active');

            ordersChartByAjax (start, end)
        })

        function ordersChartByAjax (start, end) {  
            $.ajax({
                type: "POST",
                url: "{{ route('orders.chart') }}",
                data: {_token:"{{ csrf_token() }}", start:start, end:end},
                success: function (response) {           
                    let data   = Object.values(response.data);
                    let labels = Object.keys(response.data);
                    doughnuts(labels, data)
                }
            });
        }

        function doughnuts(labels, data){
            var ctx = document.getElementById("myChart3").getContext('2d');
            var myChart = new Chart(ctx, {
                type: 'doughnut',
                data: {
                    datasets: [{
                        data: data,
                        backgroundColor: [
                            '#191d21',
                            '#63ed7a',
                            '#ffa426',
                            '#fc744b',
                            '#fc244b',
                            '#fc544b',
                            '#6777ef',
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
