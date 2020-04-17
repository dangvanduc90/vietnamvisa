<div class="main-post col-md-8">
    <div class="form-group {{ $errors->has('month_text') ? 'has-error' : '' }}">
        <label class="control-label">Month text(*)</label>
        <div class="inner">
            <input type="text" class="form-control" name="month_text" id="month_text"
                   value="{{isset($obj) ? $obj->month_text : old('month_text')}}" placeholder="ex: 1 month single" required>
            <input type="hidden" name="_id" id="_id" value="{{isset($obj) ? $obj->id : ''}}">
        </div>
    </div>
    <div class="form-group lb-slug {{ $errors->has('month_number') ? 'has-error' : '' }}">
        <label class="control-label">Month number(*)</label>
        <div class="inner">
            <input type="text" class="form-control" name="month_number" id="month_number"
                   value="{{isset($obj) ? $obj->month_number : old('month_number')}}" placeholder="Month number, write in number" min="0" max="127" required>
        </div>
    </div>
    <div class="form-group lb-slug {{ $errors->has('price') ? 'has-error' : '' }}">
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
</div>
