@extends('layout.main')

@section('content')

<div class="mb-2 mt-2">
    @if (session('success'))
    <div class="alert alert-success">
      <strong>{{ session('success') }}</strong>
    </div>
    @endif
</div>


<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Level List</h1>
    <a href="/level/create" class="d-none d-sm-inline-block btn btn-sm btn-info shadow-sm"><i
    class="fas fa-plus fa-sm text-white-50"></i> Create Level</a>
</div>

<table class="table table-responsive">
    <thead>
        <tr>
            <th>No</th>
            <th>Name Level</th>
            <th>Zone</th>
            <th>Meals Allowance</th>
            <th>Hardship</th>
            <th>Rental House Allowance</th>
            <th>Pulsa Allowance</th>
            <th>Hardship Allowance</th>
            <th>Action</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($level as $item)
        <tr>
            <td>{{$loop->iteration}}</td>
            <td>{{ $item->name_level }}</td>
            <td>{{ $item->zone['name'] }}</td>
            <td>{{ number_format($item->meals_allowance,2,',','.') }}</td>
            <td>{{ number_format($item->hardship,2,',','.') }}</td>
            <td>{{ number_format($item->rental_house_allowance,2,',','.') }}</td>
            <td>{{ number_format($item->pulsa_allowance,2,',','.') }}</td>
            <td>{{ number_format($item->hardship_allowance,2,',','.') }}</td>
            <td>
                <div class="btn-group-sm" role="group">
                    <a href="/level/edit/{{ $item->id    }}" class="d-flext badge badge-primary edit-zone" style="background-color: darkgray; color:black"><i class="fas fa-edit"></i> Edit</a>                
                    <a href="#" data-id="{{ $item->id }}" class="d-flext badge badge-danger border-0 delete-level" style="color: black; background-color: darkgray"><i class="fas fa-trash"></i> Delete</a>
                </div>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>

@endsection

