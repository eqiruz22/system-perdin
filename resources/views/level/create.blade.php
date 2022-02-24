@extends('layout.main')

@section('content')

<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Create Level</h1>
</div>

<form action="/level/store" method="POST">
    @csrf
    <div class="form-group row">
        <label for="inputName" class="col-sm-2 col-form-label">Name Level</label>
        <div class="col-sm-10">
          <input type="text" name="name_level" class="form-control form-control-sm @error('name_level') is-invalid @enderror" id="inputname_level" value="{{ old('name_level') }}">
        @if ($errors->has('name_level'))
            <div class="invalid-feedback" role="alert">
                <strong>{{ $errors->first('name_level') }}</strong>
            </div>
        @endif
        </div>
    </div>
    <div class="form-group row">
        <label for="inputName" class="col-sm-2 col-form-label">Meals Allowance</label>
        <div class="col-sm-10">
          <input type="text" name="meals_allowance" class="form-control form-control-sm @error('meals_allowance') is-invalid @enderror" id="meals" value="{{ old('meals_allowance') }}">
        @if ($errors->has('meals_allowance'))
            <div class="invalid-feedback" role="alert">
                <strong>{{ $errors->first('meals_allowance') }}</strong>
            </div>
        @endif
        </div>
    </div>
    <div class="form-group row">
        <label for="inputName" class="col-sm-2 col-form-label">Hardship</label>
        <div class="col-sm-10">
          <input type="text" name="hardship" class="form-control form-control-sm @error('hardship') is-invalid @enderror" id="hardship" value="{{ old('hardship') }}">
        @if ($errors->has('hardship'))
            <div class="invalid-feedback" role="alert">
                <strong>{{ $errors->first('hardship') }}</strong>
            </div>
        @endif
        </div>
    </div>
    <div class="form-group row">
        <label for="inputName" class="col-sm-2 col-form-label">Rental House Allowance</label>
        <div class="col-sm-10">
          <input type="text" name="rental_house_allowance" class="form-control form-control-sm @error('rental_house_allowance') is-invalid @enderror" id="rental" value="{{ old('rental_house_allowance') }}">
        @if ($errors->has('rental_house_allowance'))
            <div class="invalid-feedback" role="alert">
                <strong>{{ $errors->first('rental_house_allowance') }}</strong>
            </div>
        @endif
        </div>
    </div>
    <div class="form-group row">
        <label for="inputName" class="col-sm-2 col-form-label">Pulse Allowance</label>
        <div class="col-sm-10">
          <input type="text" name="pulsa_allowance" class="form-control form-control-sm @error('pulsa_allowance') is-invalid @enderror" id="pulsa" value="{{ old('pulsa_allowance') }}">
        @if ($errors->has('pulsa_allowance'))
            <div class="invalid-feedback" role="alert">
                <strong>{{ $errors->first('pulsa_allowance') }}</strong>
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