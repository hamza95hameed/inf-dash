<div class="card">
    <div class="card-header">
        <h4>Doughnut Chart</h4>
        <div class="card-header-action dropdown">
            <a href="#" data-toggle="dropdown" class="btn btn-danger dropdown-toggle">Month</a>
            <ul class="dropdown-menu dropdown-menu-sm dropdown-menu-right">
                <li class="dropdown-title">Select Period</li>
                <li><a href="#" data-start="" data-end="" class="duration dropdown-item">Today</a></li>
                <li><a href="#" data-start="" data-end="" class="duration dropdown-item">Week</a></li>
                <li><a href="#" data-start="" data-end="" class="duration dropdown-item active">Month</a></li>
                <li><a href="#" data-start="" data-end="" class="duration dropdown-item">This Year</a></li>
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
       
        $(document).on('click', '.duration', function(){
            let start = '2023-12-01'; //$(this).attr('data-start');
            let end   = '2023-12-31'; //$(this).attr('data-end');

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
        })


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
