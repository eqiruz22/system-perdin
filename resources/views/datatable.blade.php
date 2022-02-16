@extends('template/main')

@section('content')
    <livewire:user-datatables
        searchable="name, email"
        exportable="name, email"
    />
@endsection