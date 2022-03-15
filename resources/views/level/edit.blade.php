@extends('layout.main')

@section('content')

<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Edit Level</h1>
</div>

<form action="/level/update/{{ $level->id }}" method="POST">
    @csrf
    @method('put')
<div class="form-group row">
    <label for="zone_id" class="col-sm-2 col-form-label">State</label>
    <div class="col-sm-10">
        <select name="zone_id" class="custom-select @error('zone_id') is-invalid @enderror" id="zone_id">
            <option disabled value="">Choose...</option>
            @foreach ($zone as $item)
            @if (old('zone_id', $level->zone_id) == $item->id)
              <option selected value="{{$item->id}}">{{$item->name}}</option>  
            @else   
              <option value="{{$item->id}}">{{$item->name}}</option>
            @endif
            @endforeach
          </select>
          @error('zone_id')
        <div class="invalid-feedback" role="alert">
          <strong>{{ $message }}</strong>
        </div>
      @enderror
    </div>
    <span class="text-danger error-text zone_id_error"></span>
</div>
<div class="form-group row">
    <label for="name_level" class="col-sm-2 col-form-label">Name Level</label>
    <div class="col-sm-10">
      <input type="text" name="name_level" value="{{ old('name_level', $level->name_level) }}" class="form-control @error('name_level') is-invalid @enderror" id="name_level">
      @error('name_level')
        <div class="invalid-feedback" role="alert">
          <strong>{{ $message }}</strong>
        </div>
      @enderror
    </div>
  </div>
  <div class="form-group row">
    <label for="meals_allowance" class="col-sm-2 col-form-label">Meals Allowance</label>
    <div class="col-sm-10">
      <input type="text" name="meals_allowance" class="form-control @error('meals_allowance') is-invalid @enderror" value="{{ old('meals_allowance', $level->meals_allowance) }}" id="meals_allowance">
      @error('meals_allowance')
      <div class="invalid-feedback" role="alert">
        <strong>{{ $message }}</strong>
      </div>
    @enderror
    </div>
  </div>
  <div class="form-group row">
    <label for="hardship" class="col-sm-2 col-form-label">Hardship</label>
    <div class="col-sm-10">
      <input type="text" name="hardship" value="{{ old('hardship', $level->hardship) }}" class="form-control @error('hardship') is-invalid @enderror" id="hardship">
      @error('hardship')
        <div class="invalid-feedback" role="alert">
          <strong>{{ $message }}</strong>
        </div>
      @enderror
    </div>
  </div>
  <div class="form-group row">
    <label for="rental_house_allowance" class="col-sm-2 col-form-label">Rental House Allowance</label>
    <div class="col-sm-10">
      <input type="text" name="rental_house_allowance" value="{{ old('rental_house_allowance', $level->rental_house_allowance) }}" class="form-control @error('rental_house_allowance') is-invalid @enderror" id="rental_house_allowance">
      @error('rental_house_allowance')
      <div class="invalid-feedback" role="alert">
        <strong>{{ $message }}</strong>
      </div>
    @enderror
    </div>
  </div>
  <div class="form-group row">
    <label for="pulsa_allowance" class="col-sm-2 col-form-label">Pulsa Allowance</label>
    <div class="col-sm-10">
      <input type="text" name="pulsa_allowance" value="{{ old('pulsa_allowance', $level->pulsa_allowance) }}" class="form-control @error('pulsa_allowance') is-invalid @enderror" id="pulsa_allowance">
      @error('pulsa_allowance')
        <div class="invalid-feedback" role="alert">
          <strong>{{ $message }}</strong>
        </div>
      @enderror
    </div>
  </div>
  <div class="form-group row">
    <label for="hardship_allowance" class="col-sm-2 col-form-label">Hardship Allowance</label>
    <div class="col-sm-10">
      <input type="text" name="hardship_allowance" value="{{ old('hardship_allowance', $level->hardship_allowance) }}" class="form-control @error('hardship_allowance') is-invalid @enderror" id="hardship_allowance">
      @error('hardship_allowance')
        <div class="invalid-feedback" role="alert">
          <strong>{{ $message }}</strong>
        </div>
      @enderror
    </div>
  </div>
  <div class="form-group">
    <button type="submit" class="btn btn-primary create-level">Save</button>
  </div>
</form>
@endsection

