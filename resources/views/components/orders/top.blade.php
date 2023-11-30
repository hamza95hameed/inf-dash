<div class="card">
    <div class="card-header">
        <h4>Top 5 orders</h4>
    </div>
    <div class="card-body">
        @foreach ($orders as $order)
            <div class="mb-4">
                <div class="text-small float-right font-weight-bold text-muted">{{ @$order->commission }}</div>
                <div class="font-weight-bold mb-1">{{ @$order->order_no }}</div>
                <div class="progress" data-height="3">
                    <div class="progress-bar" role="progressbar" data-width="{{ $percent ?? 50 }}%" aria-valuenow="{{ $percent ?? 50 }}" aria-valuemin="0" aria-valuemax="100"></div>
                </div>
            </div>            
        @endforeach
    </div>
</div>
