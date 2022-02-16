<div>
    <ul>
        @foreach ($data as $item)
            <li>{{ $item->name }}</li>
            <li>{{ $item->email }}</li>
            <li>{{ $item->created_at }}</li>
            <hr>
        @endforeach
    </ul>
</div>
