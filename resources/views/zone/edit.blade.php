<form action="/zone/update/{{ $data->id }}" method="POST" id="form-edit">
    @csrf
        <div class="modal-body">
            <div class="form-group">
                <input type="hidden" name="id" value="{{ $data->id }}" id="id_data">
                <label for="zone_name">Name Zone</label>
                <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" value="{{ old('name', $data->name ) }}">
                @error('name')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
        </div>
        <div class="modal-footer">
            <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
            <button type="button" class="btn btn-primary update-zone">Save</button>
        </div>
    </form>
