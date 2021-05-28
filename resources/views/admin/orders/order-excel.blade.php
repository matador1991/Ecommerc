<table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
    <thead>
    <tr>
        <th class="text-center">Order Number</th>
        <th class="text-center">Title</th>
        <th class="text-center">Customer Name</th>
        <th class="text-center">Date</th>
    </tr>
    </thead>
    <tbody>
    @if($order->IsNotEmpty())
        @foreach($order as $l)
            <tr>
                <td class="text-center">{{$l->id}}</td>
                <td class="text-center">{{$l->title}}</td>
                <td class="text-center">{{$l->admin->name}}</td>
                <td class="text-center">{{ $l->created_at->format('d-m-Y h:i a') }}</td>
            </tr>
        @endforeach
    @endif
    </tbody>
</table>
