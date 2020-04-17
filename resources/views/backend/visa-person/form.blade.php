<div class="main-post col-md-8">
    <div class="form-group lb-slug {{ $errors->has('month_id') ? 'has-error' : '' }}">
        <label class="control-label">Purpose(*)</label>
        <div class="inner">
            <select class="form-control m-b" name="month_id" id="month_id" required>
                <option label=""></option>
                @foreach($visaMonth as $p)
                    <option value="{{$p->id}}" {{(isset($obj) ? $obj->month_id : old('month_id')) == $p->id ? "selected" : ""}}>{{$p->month_text}}</option>
                @endforeach
            </select>
        </div>
    </div>
    <div class="form-group lb-slug {{ $errors->has('urgent_id') ? 'has-error' : '' }}">
        <label class="control-label">Purpose(*)</label>
        <div class="inner">
            <select class="form-control m-b" name="urgent_id" id="urgent_id" required>
                <option label=""></option>
                @foreach($visaPurpose as $p)
                    <option value="{{$p->id}}" {{(isset($obj) ? $obj->urgent_id : old('urgent_id')) == $p->id ? "selected" : ""}}>{{$p->type}}</option>
                @endforeach
            </select>
        </div>
    </div>
    <div class="form-group {{ $errors->has('person_text') ? 'has-error' : '' }}">
        <label class="control-label">Applicant group</label>
        <div class="inner">
            <input type="text" class="form-control" name="person_text" id="person_text"
                   value="{{isset($obj) ? $obj->person_text : old('person_text')}}" placeholder="Only 1 applicant" />
            <input type="hidden" name="_id" id="_id" value="{{isset($obj) ? $obj->id : ''}}">
        </div>
    </div>
    <div class="form-group lb-slug {{ $errors->has('person_number') ? 'has-error' : '' }}">
        <label class="control-label"></label>
        <div class="inner">
            <input type="text" class="form-control" name="person_number" id="person_number"
                   value="{{isset($obj) ? $obj->person_number : old('person_number')}}" placeholder="Person number, write in number" />
        </div>
    </div>
    <div class="form-group lb-slug {{ $errors->has('country_allow') ? 'has-error' : '' }}">
        <label class="control-label">Apply for country</label>
        <div class="inner">
            <input type="text" class="form-control" name="country_allow" id="country_allow"
                   value="{{isset($obj) ? $obj->country_allow : old('country_allow')}}" placeholder="" />
        </div>
    </div>
    <div class="form-group lb-slug {{ $errors->has('person_fee') ? 'has-error' : '' }}">
        <label class="control-label">Fee</label>
        <div class="inner">
            <input type="text" class="form-control" name="person_fee" id="person_fee"
                   value="{{isset($obj) ? $obj->person_fee : old('person_fee')}}" placeholder="USD" />
        </div>
    </div>
</div>
