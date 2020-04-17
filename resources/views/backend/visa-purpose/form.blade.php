<div class="main-post col-md-8">
    <div class="form-group {{ $errors->has('type') ? 'has-error' : '' }}">
        <label class="control-label">Tên thể loại(*)</label>
        <div class="inner">
            <input type="text" class="form-control @error('type') is-invalid @enderror" name="type" id="type"
                   value="{{isset($obj) ? $obj->type : old('type')}}" placeholder="Tourist" required>
            @error('type')
            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
            @enderror
            <input type="hidden" name="_id" id="_id" value="{{isset($obj) ? $obj->id : ''}}">
        </div>
    </div>
</div>

