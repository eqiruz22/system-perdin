@extends('layout.main')

@section('content')

<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Edit Zone</h1>
</div>

<form action="/zone/update/{{ $data->id }}" method="POST">
    @csrf
    @method('put')
    <div class="form-group row">
        <label for="zone_name" class="col-sm-2 col-form-label">Name</label>
        <div class="col-sm-10">
          <input type="text" name="zone_name" class="form-control form-control-sm @error('zone_name') is-invalid @enderror" id="zone_name" value="{{ old('zone_name', $data->zone_name) }}">
        @if ($errors->has('zone_name'))
            <div class="invalid-feedback" role="alert">
                <strong>{{ $errors->first('zone_name') }}</strong>
            </div>
        @endif
        </div>
    </div>
    <div class="form-group row">
      <label for="level_list" class="col-sm-2 col-form-label">Level List</label>
      <div class="col-sm-10">
        <select class="form-control form-control-sm @error('level_id') is-invalid @enderror" id="level_list" name="level_id">
          <option>-- None --</option>
          @foreach ($level as $item)
          @if (old('level_id', $data->level_id) == $item->id)
          <option value="{{ $item->id }}" selected>{{ $item->name_level }}</option>
          @else
          <option value="{{ $item->id }}">{{ $item->name_level }}</option>
          @endif
          @endforeach
        </select>
          @if ($errors->has('level_id'))
              <div class="invalid-feedback" role="alert">
                  <strong>{{ $errors->first('level_id') }}</strong>
              </div>
          @endif
      </div>
    </div>
    <div class="form-group row">
      <div class="col-sm-10">
        <button type="submit" class="btn btn-primary"><i class="fas fa-save"></i> Save</button>
      </div>
    </div>
  </form>
@endsection