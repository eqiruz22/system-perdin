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
    <h1 class="h3 mb-0 text-gray-800">Zone List</h1>
    <a href="#" data-toggle="modal" data-target="#zoneModal" class="d-none d-sm-inline-block btn btn-sm btn-info shadow-sm"><i
    class="fas fa-plus fa-sm text-white-50"></i> Create Zone</a>
</div>

<!-- Create Zone Modal-->
<div class="modal fade" id="zoneModal" tabindex="-1" role="dialog">
<div class="modal-dialog" role="document">
    <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Create Zone</h5>
            <button class="close" type="button" data-dismiss="modal">
                <span aria-hidden="true">×</span>
            </button>
        </div>
        <form action="/zone/store" method="POST">
            @csrf
            <div class="modal-body">
                <div class="form-group">
                    <label for="zone_name">Name Zone</label>
                    <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" value="{{ old('name') }}">
                    @error('name')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div>
            <div class="modal-footer">
                <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                <button type="submit" class="btn btn-primary">Create</button>
            </div>
        </form>
    </div>
</div>
</div>

<!-- update Zone Modal-->
<div class="modal fade" id="edit-modal" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Update Zone</h5>
                <button class="close" type="button" data-dismiss="modal">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
           <div class="modal-data">

           </div>
        </div>
    </div>
    </div>

<table class="table">
    <thead>
        <tr>
            <th>#</th>
            <th>Name</th>
            <th>Action</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($data as $item)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $item->name }}</td>
                <td>
                    <div class="btn-group-sm" role="group">
                        <a href="#" data-toggle="modal" data-target="#edit-modal" data-id="{{ $item->id }}" class="d-flext badge badge-primary edit-zone" style="background-color: darkgray; color:black"><i class="fas fa-edit"></i> Edit</a>                
                        <a href="#" data-id="{{ $item->id }}" class="d-flext badge badge-danger border-0 delete-zone" style="color: black; background-color: darkgray"><i class="fas fa-trash"></i> Delete</a>
                    </div>
                </td>
            </tr>
        @endforeach
    </tbody>
</table>

@endsection

@section('scripts')
    <script type="text/javascript">
        $('#zoneModal').click(function(){
            $('#zoneModal').modal('show');
        });

        $('.edit-zone').click(function(){
            var id = $(this).data('id');
            $.ajax({
                url: `/zone/edit/${id}`,
                method: 'GET',
                success: function(data){
                    $('#edit-modal').find('.modal-data').html(data);
                    $('#edit-modal').modal('show');
                },
                errors: function(data){
                    console.log(data);
                }
            });
        });

        $('.update-zone').click(function(){
           var id = $('#form-edit').find('input[name="id"]').val();
           var name = $('#form-edit').find('input[name="name"]').val();
              $.ajax({
                 url: `/zone/update/${id}`,
                 method: 'POST',
                 data: {
                      name: name
                 },
                 success: function(data){
                        console.log(data);
                        location.reload();
                 },
                 errors: function(data){
                      console.log(data);
                 }
               });
        });
    </script>
@stop
