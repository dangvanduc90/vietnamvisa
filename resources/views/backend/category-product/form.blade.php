@if(isset($obj))
<input type="hidden" name="_id" value="{{$obj->id}}">
@endif
<div class="form-group {{ $errors->has('name') ? 'has-error' : '' }}">
	<label class="col-sm-3 control-label">Tên danh mục (*) </label>
	<div class="col-sm-8">
		<input type="text" class="form-control" name="name" id="name" value="{{isset($obj) ? $obj->name : ''}}" placeholder="Phần cứng" required>
	</div>
</div>
<div class="form-group {{ $errors->has('slug') ? 'has-error' : '' }}">
	<label class="col-sm-3 control-label">Đường dẫn (*)</label>
	<div class="col-sm-8">
		<input type="text" class="form-control" name="slug" id="slug" value="{{isset($obj) ? $obj->slug : ''}}" placeholder="phan-cung">
	</div>
</div>

<div class="form-group">
	<label class="col-sm-3 control-label">Danh mục cha</label>
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
<div class="form-group {{ $errors->has('icon') ? 'has-error' : '' }}">
	<label class="col-sm-3 control-label">Icon</label>
	<div class="col-sm-8 thumb">
		<div class="input-group">
			<span class="input-group-btn">
				<a href="{{env('URL_FILEMANAGE_0', '')}}"
				class="btn btn-primary red iframe-btn" id="iframe-btn-0"><i
				class="fa fa-picture-o"></i>Chọn</a>
			</span>
			@if(isset($obj))
			<input id="thumb_0" class="form-control" type="text" name="icon" value="{{$obj->icon}}">
			@else
			<input id="thumb_0" class="form-control" type="text" name="icon">
			@endif
		</div>

		<div id="preview_0">
			@if(isset($obj))
			<img src="{{$obj->icon}}" style="max-width: 100%;">
			@else
			@endif
		</div>
	</div>
</div>
@include('backend.partials.seo')
