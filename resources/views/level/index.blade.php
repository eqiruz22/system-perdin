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
    <a href="#" data-toggle="modal" data-target="#levelCreate" class="d-none d-sm-inline-block btn btn-sm btn-info shadow-sm"><i
    class="fas fa-plus fa-sm text-white-50"></i> Create Level</a>
</div>

<!-- Create Level-->
<div class="modal fade" id="levelCreate" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Create Level</h5>
                <button class="close" type="button" data-dismiss="modal">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <form action="/level/store" method="POST">
                @csrf
                <div class="modal-body">
                    <div class="form-group">
                            <label for="validationDefault04">State</label>
                            <select name="zone_id" class="custom-select @error('zone_id') is-invalid @enderror" id="validationDefault04" required>
                              <option selected disabled value="">Choose...</option>
                              @foreach ($zone as $item)
                                  <option value="{{$item->id}}">{{$item->name}}</option>
                              @endforeach
                            </select>
                            @error('zone_id')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                    </div>
                    <div class="form-group">
                        <label>Name Level</label>
                        <input type="text" name="name_level" class="form-control @error('name_level') is-invalid @enderror" value="{{ old('name_level') }}" required>
                        @error('name_level')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label>Meals Allowance</label>
                        <input type="text" id="meals_allowance" name="meals_allowance" class="form-control @error('meals_allowance') is-invalid @enderror" value="{{ old('meals_allowance') }}" required>
                        @error('meals_allowance')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label>Hardship</label>
                        <input type="text" id="hardship" name="hardship" class="form-control @error('hardship') is-invalid @enderror" value="{{ old('hardship') }}" required>
                        @error('hardship')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label>Rental House Allowance</label>
                        <input type="text" id="rental_house_allowance" name="rental_house_allowance" class="form-control @error('rental_house_allowance') is-invalid @enderror" value="{{ old('rental_house_allowance') }}" required>
                        @error('rental_house_allowance')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label>Pulsa Allowance</label>
                        <input type="text" id="pulsa_allowance" name="pulsa_allowance" class="form-control @error('pulsa_allowance') is-invalid @enderror" value="{{ old('pulsa_allowance') }}" required>
                        @error('pulsa_allowance')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label>Hardship Allowance</label>
                        <input type="text" id="hardship_allowance" name="hardship_allowance" class="form-control @error('hardship_allowance') is-invalid @enderror" value="{{ old('hardship_allowance') }}" required>
                        @error('hardship_allowance')
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

<table class="table">
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
            <td>{{$item->name_level}}</td>
            <td></td>
            <td>{{$item->meals_allowance}}</td>
            <td>{{$item->hardship}}</td>
            <td>{{$item->rental_house_allowance}}</td>
            <td>{{$item->pulsa_allowance}}</td>
            <td>{{$item->hardship_allowance}}</td>
            <td>
                <a href="#" data-toggle="modal" data-target="#levelEdit{{$item->id}}" class="btn btn-info btn-sm"><i class="fas fa-pencil-alt"></i></a>
                <a href="#" data-toggle="modal" data-target="#levelDelete{{$item->id}}" class="btn btn-danger btn-sm"><i class="fas fa-trash"></i></a>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>

@endsection

@section('script')
    <script type="text/javascript">
        $('#levelCreate').click(function(){
            $('#levelCreate').modal('show');
        });
    </script>

@stop