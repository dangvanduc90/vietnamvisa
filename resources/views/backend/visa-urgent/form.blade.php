<div class="main-post col-md-12">
    <div class="form-group lb-slug {{ $errors->has('purpose_id') ? 'has-error' : '' }}">
        <label class="control-label">Purpose(*)</label>
        <div class="inner">
            <select class="form-control m-b" name="purpose_id" id="purpose_id" required>
                <option label=""></option>
                @foreach($purposes as $p)
                    <option value="{{$p->id}}" {{(isset($obj) ? $obj->purpose_id : old('purpose_id')) == $p->id ? "selected" : ""}}>{{$p->type}}</option>
                @endforeach
            </select>
        </div>
    </div>
    <div class="form-group {{ $errors->has('day_text') ? 'has-error' : '' }}">
        <label class="control-label">Day processing</label>
        <div class="inner">
            <input type="text" class="form-control" name="day_text" id="day_text"
                   value="{{isset($obj) ? $obj->day_text : old('day_text')}}" placeholder="ex: 1 month single" required>
            <input type="hidden" name="_id" id="_id" value="{{isset($obj) ? $obj->id : ''}}">
        </div>
    </div>
    <div class="form-group lb-slug {{ $errors->has('day_number') ? 'has-error' : '' }}">
        <label class="control-label">Day number(*)</label>
        <div class="inner">
            <input type="text" class="form-control" name="day_number" id="day_number"
                   value="{{isset($obj) ? $obj->day_number : old('day_number')}}" placeholder="Month number, write in number" required>
        </div>
    </div>
    <div class="form-group lb-slug {{ $errors->has('fee') ? 'has-error' : '' }}">
        <label class="control-label">Fee(*)</label>
        <div class="inner">
            <input type="text" class="form-control" name="fee" id="fee"
                   value="{{isset($obj) ? $obj->fee : old('fee')}}" placeholder="Month number, write in number" required>
        </div>
    </div>
</div>
