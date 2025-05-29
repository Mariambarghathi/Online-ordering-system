<x-layout>

<h1 style="text-align: center" class="mb-5 fw-bold">Orders List</h1>

<div class="d-flex justify-content-center">
    <div class="table-responsive" style="width: 100%; font-size: 0.9rem; font-weight: 400; text-align: left;">
        <table class="table table-striped table-hover">
            <thead>
                <tr>
                    <th>ID</th>
                    <th class="text-center">Customer</th>
                    <th class="text-center">Phone Number</th>
                    <th class="text-center">Location</th>
                    <th class="text-center">Date</th>
                    <th class="text-center">Status</th>
                    <th class="text-center">Total price</th>
                    <th class="text-center">View</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($orders as $order)
                <tr>
                    <td>{{ $order->id }}</td>
                    <td class="text-center">{{ $order->customer->name }}</td>
                    <td class="text-center">{{ $order->customer->phone_number }}</td>
                    <td class="text-center">{{ $order->customer->location }}</td>
<td class="text-center">
    {{ $order->created_at ? $order->created_at->format('Y-m-d H:i') : 'N/A' }}
</td>                    <td class="text-center">{{ $order->status }}</td>
                    <td class="text-center">{{ $order->total_price }} LYD</td>
                    <td class="text-center"> <a href="{{ route('orders.details', $order->id) }}" class="btn btn-sm "> <i class="bi bi-cart"></i> </a></td>
                </tr>
                @endforeach
            </tbody>
        </table>
        
    <div class="d-flex justify-content-end mt-4">
    {{ $orders->links() }}
</div>
    </div>
</div>

</x-layout>
