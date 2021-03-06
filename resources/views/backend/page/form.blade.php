@if(isset($obj))
<input type="hidden" name="_id" value="{{$obj->id}}">
@endif
<div class="form-group {{ $errors->has('name') ? 'has-error' : '' }}">
    <label class="col-sm-3 control-label">Tên trang (*) </label>
    <div class="col-sm-8">
        <input type="text" class="form-control" name="name" id="name" value="{{isset($obj) ? $obj->name : ''}}" placeholder="Trang chủ" required>
    </div>
</div>
<div class="form-group {{ $errors->has('slug') ? 'has-error' : '' }}">
    <label class="col-sm-3 control-label">Đường dẫn (*)</label>
    <div class="col-sm-8">
    	<input type="text" class="form-control" name="link" id="link" value="{{isset($obj) ? config('admin.base_url').$obj->slug : ''}}" placeholder="{{config('admin.base_url')}}trang-chu" required>
        <input type="hidden" class="form-control" name="slug" id="slug" value="{{isset($obj) ? $obj->slug : ''}}" placeholder="trang-chu" required>
    </div>
</div>
<div class="form-group {{ $errors->has('type') ? 'has-error' : '' }}">
	<label class="col-sm-3 control-label">Loại trang (*)</label>
    <div class="col-sm-8">
    	<select class="form-control" name="type" required>
    		@foreach(config('common.type_page') as $key=>$value)
    		<option value="{{$key}}" {{isset($obj) && $obj->type == $key ? 'selected' : (old('type') == $key ? 'selected' : '') }}>{{$value}}</option>
    		@endforeach
    	</select>
    </div>
</div>
@include('backend.partials.seo')
