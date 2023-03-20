<table>
    <thead>
        <tr>
            <th>#</th>
            <th>Date</th>
            <th>Amount</th>
            <th>Bank Account</th>
            <th>Customer Name</th>
            <th>Payment Method</th>
            <th>Category</th>
            <th>Description</th>
            <th>Server</th>
        </tr>
    </thead>
    <tbody>
        @php
            $i = 1;
        @endphp
        @foreach ($revenues as $rev)
            <tr>
                <td>{{ $i }}</td>
                <td>{{ $rev->date }}</td>
                <td>{{ $rev->amount }}</td>
                <td>{{ $rev->account_id }}</td>
                <td>{{ $rev->customer_id }}</td>
                <td>{{ $rev->payment_method }}</td>
                <td>{{ $rev->category_id }}</td>
                <td>{{ $rev->description }}</td>
                <td>{{ $rev->served_by }}</td>
            </tr>
            @php
                $i++;
            @endphp
        @endforeach
    </tbody>
</table>
