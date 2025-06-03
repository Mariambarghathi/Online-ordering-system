<x-layout>

 
<h1 style="text-align: center" class="mb-5 fw-bold">Customers List</h1>

    <div class="table-responsive" style="width: 100%;">
        <table class="table table-striped table-hover text-start">
            <thead>
                <tr>
                    <th class="ps-5 ">Name</th>
                    <th class="text-center">Phone Number</th>
                    <th class="text-center">Location</th>
                </tr>
            </thead>

            <tbody>
                @foreach ($customers as $customer)
                <tr>
                    <td class="ps-5 ">{{ $customer->name }}</td>
                    <td class="text-center">{{ $customer->phone_number }}</td>
                    <td class="text-center">{{ $customer->location }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>

        <!--pagination-->
           <div class="d-flex justify-content-end mt-4">
    {{ $customers->links() }}
</div>
    </div>
</div>

</x-layout>
