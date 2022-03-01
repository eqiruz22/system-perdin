@extends('layout.main')

@section('content')

<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Zone List</h1>
    <a href="/zone/create" class="d-none d-sm-inline-block btn btn-sm btn-info shadow-sm"><i
    class="fas fa-plus fa-sm text-white-50"></i> Created Zone</a>
</div>

<div class="mb-2 mt-2">
    @if (session('success'))
    <div class="alert alert-success">
      <strong>{{ session('success') }}</strong>
    </div>
    @endif
</div>
<form action="/table">
    <div class="input-group mb-3">
      <input type="text" class="form-control" placeholder="Search..." autocomplete="off" name="search" value="{{ request('search') }}">
      <div class="input-group-append">
        <button class="btn btn-outline-secondary" type="submit">
          <i class="fas fa-search"></i>
        </button>
      </div>
    </div>
  </form>
<table class="table table-borderless">
    <thead>
        <tr>
            <th>#</th>
            <th>Name</th>
            <th>Level</th>
            <th>Action</th>
        </tr>
    </thead>
    <tbody>
      @foreach ($data as $item)
            <tr>
              <td>{{ $loop->iteration }}</td>
              <td>{{ Str::replace(['-','Manager','Supervisor','Officer','Sr. Staff','Jr. Staff','Superintendant','Jr. staff','Suervisor'],"",$item->zone_name) }}</td>
              <td>{{ Str::replace(['1','-'],"",$item->level['name_level']) }}</td>
              <td>
                <div class="btn-group-sm" role="group">
                  <a href="/zone/edit/{{ $item->id }}" class="d-flext badge badge-primary" style="background-color: darkgray; color:black"><i class="fas fa-edit"></i> Edit</a>                
                  <a href="#" data-id="{{ $item->id }}" class="d-flext badge badge-danger border-0 delete-zone" style="color: black; background-color: darkgray"><i class="fas fa-trash"></i> Delete</a>
              </div>
              </td>
            </tr>
      @endforeach
    </tbody>
</table>

{{ $data->links() }}

@endsection