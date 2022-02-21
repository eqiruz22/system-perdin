@extends('layout.main')

@section('content')

<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Create User</h1>
</div>

<form action="/user/store" method="POST">
    @csrf
    <div class="form-group row">
        <label for="inputName" class="col-sm-2 col-form-label">Name</label>
        <div class="col-sm-10">
          <input type="text" name="name" class="form-control form-control-sm @error('name') is-invalid @enderror" id="inputName" autocomplete="off" value="{{ old('name') }}">
        @if ($errors->has('name'))
            <div class="invalid-feedback" role="alert">
                <strong>{{ $errors->first('name') }}</strong>
            </div>
        @endif
        </div>
    </div>
    <div class="form-group row">
      <label for="inputEmail3" class="col-sm-2 col-form-label">Email</label>
      <div class="col-sm-10">
        <input type="email" name="email" class="form-control form-control-sm @error('email') is-invalid @enderror" id="inputEmail3" autocomplete="off" value="{{ old('email') }}">
        @if ($errors->has('email'))
            <div class="invalid-feedback" role="alert">
                <strong>{{ $errors->first('email') }}</strong>
            </div>
        @endif
      </div>
    </div>
    <div class="form-group row">
      <label for="inputPassword3" class="col-sm-2 col-form-label">Password</label>
      <div class="col-sm-10">
        <input type="password" name="password" class="form-control form-control-sm @error('password') is-invalid @enderror" id="inputPassword3" autocomplete="off">
        @if ($errors->has('password'))
            <div class="invalid-feedback" role="alert">
                <strong>{{ $errors->first('password') }}</strong>
            </div>
        @endif
      </div>
    </div>
    <div class="form-group row">
      <div class="col-sm-10">
        <button type="submit" class="btn btn-primary">create</button>
      </div>
    </div>
  </form>
@endsection