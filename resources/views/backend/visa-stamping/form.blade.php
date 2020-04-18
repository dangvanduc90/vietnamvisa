<div class="main-post col-md-12">
    <div class="form-group lb-slug {{ $errors->has('month_id') ? 'has-error' : '' }}">
        <label class="control-label">Purpose(*)</label>
        <div class="inner">
            <select class="form-control m-b" name="month_id" id="month_id" required>
                <option label=""></option>
                @foreach($visaMonth as $p)
                    <option value="{{$p->id}}" {{(isset($obj) ? $obj->month_id : old('month_id')) == $p->id ? "selected" : ""}}>{{$p->month_text. " ({$p->purpose->type})"}}</option>
                @endforeach
            </select>
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
