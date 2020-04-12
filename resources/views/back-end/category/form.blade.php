@if(isset($obj))
<input type="hidden" name="_id" value="{{$obj->id}}">
@endif
<div class="form-group {{ $errors->has('name') ? 'has-error' : '' }}">
	<label class="col-sm-3 control-label">Tên chuyên mục (*) </label>
	<div class="col-sm-8">
		<input type="text" class="form-control" name="name" id="name" value="{{isset($obj) ? $obj->name : ''}}" placeholder="Giải pháp" required>
	</div>
</div>
<div class="form-group {{ $errors->has('slug') ? 'has-error' : '' }}">
	<label class="col-sm-3 control-label">Đường dẫn (*)</label>
	<div class="col-sm-8">
		<input type="text" class="form-control" name="slug" id="slug" value="{{isset($obj) ? $obj->slug : ''}}" placeholder="giai-phap">
	</div>
</div>

<div class="form-group">
	<label class="col-sm-3 control-label">Chuyên mục cha</label>
	<div class="col-sm-8">
		@if(!isset($obj))
		<select class="form-control m-b" name="cat_id" id="cat_id">
			<option label=""></option>
			@foreach($cats as $p)
			<option value="{{$p->id}}" {{old('cat_id') == $p->id ? "selected" : ""}}>{{$p->name}}</option>
			@endforeach
		</select> 
		@else
		<select class="form-control m-b" name="cat_id" id="cat_id">
			<option label=""></option>
			@foreach($cats as $p)
			<option value="{{$p->id}}" {{$obj->cat_id == $p->id ? "selected" : ""}}>{{$p->name}}</option>
			@endforeach
		</select>
		@endif                                           
	</div>
</div>
<div class="form-group">
	<label class="col-sm-3 control-label">Loại chuyên mục</label>
	<div class="col-sm-8">
		<select class="form-control m-b" name="type" id="type" required>
			<option label=""></option>
			@foreach(config('common.type_category') as $key=>$value)
			<option value="{{$key}}" {{isset($obj) && $obj->type == $key ? 'selected' : (old('type') == $key ? 'selected' : '')}}>{{$value}}</option>
			@endforeach
		</select>                                       
	</div>
</div>
@include('back-end.partials.seo')
