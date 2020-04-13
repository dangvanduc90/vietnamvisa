<div class="main-post col-md-8">
	<div class="form-group {{ $errors->has('name') ? 'has-error' : '' }}">
		<label class="control-label">Tên sản phẩm(*)</label>
		<div class="inner">
			<input type="text" class="form-control" name="name" id="name"
			value="{{isset($obj) ? $obj->name : old('name')}}" placeholder="Nhập tiêu đề" required>
			<input type="hidden" name="_id" id="_id" value="{{isset($obj) ? $obj->id : ''}}">
		</div>
	</div>
	<div class="form-group lb-slug {{ $errors->has('slug') ? 'has-error' : '' }}">
		<label class="control-label">Đường dẫn tĩnh(*)</label>
		<div class="inner">
			<input type="text" class="form-control" name="slug" id="slug" value="{{isset($obj) ? $obj->slug : old('slug')}}" required>
		</div>
	</div>
	<div class="form-group lb-slug {{ $errors->has('link_demo') ? 'has-error' : '' }}">
		<label class="control-label">Link demo</label>
		<div class="inner">
			<input type="text" class="form-control" name="link_demo" id="link_demo" value="{{isset($obj) ? $obj->link_demo : old('link_demo')}}">
		</div>
	</div>
	<div class="form-group lb-slug {{ $errors->has('price') ? 'has-error' : '' }}">
		<label class="control-label">Giá(*)</label>
		<div class="inner">
			<input type="text" class="form-control" name="price" id="price" value="{{isset($obj) ? $obj->price : old('price')}}" required>
		</div>
	</div>
	<div class="form-group lb-slug {{ $errors->has('price') ? 'has-error' : '' }}">
		<label class="control-label">Đánh giá</label>
		<div class="inner">
			<select class="form-control" name="sosao">
				<option value="1" {{isset($obj) && $obj->sosao == 1 ? 'selected' : '' }}>1 sao</option>
				<option value="2" {{isset($obj) && $obj->sosao == 2 ? 'selected' : '' }}>2 sao</option>
				<option value="3" {{isset($obj) && $obj->sosao == 3 ? 'selected' : '' }}>3 sao</option>
				<option value="4" {{isset($obj) && $obj->sosao == 4 ? 'selected' : '' }}>5 sao</option>
				<option value="5" {{isset($obj) && $obj->sosao == 5 ? 'selected' : '' }}>5 sao</option>
			</select>
		</div>
	</div>
	<div class="box box-primary">
		<div class="form-group {{ $errors->has('des_s') ? 'has-error' : '' }}">
			<label class="control-label">Miêu tả ngắn(*)</label>
			<div>
				<textarea rows="5" placeholder="" class="form-control" name="des_s">{{isset($obj) ? $obj->des_s : ''}}</textarea>
			</div>
		</div>
		<div class="form-group {{ $errors->has('content') ? 'has-error' : '' }}">
			<label class="control-label">Nội dung(*)</label>
			<div class="noi-dung">
				<textarea name="content" id="content" class="form-control my-editor" rows="40" required>
					{{isset($obj) ? $obj->content : old('content')}}
				</textarea>
			</div>
		</div>
	</div>
	<div class="box box-primary">
		@include('backend.partials.seo',['type_form'=>1])
	</div>
</div>
<div class="sidebar-post col-md-4">
	<div class="box box-primary">
		<div class="box-body box-profile">
			<div class="form-group {{ $errors->has('image') ? 'has-error' : '' }}">
				<label class="control-label">Ảnh đại diện(*)</label>
				<div class="thumb">
					<div class="input-group">
						<span class="input-group-btn">
							<a href="{{env('URL_FILEMANAGE_0', '')}}"
							class="btn btn-primary red iframe-btn" id="iframe-btn-0"><i
							class="fa fa-picture-o"></i>Chọn</a>
						</span>
						@if(isset($obj))
						<input id="thumb_0" class="form-control" type="text" name="image" value="{{$obj->image}}" required>
						@else
						<input id="thumb_0" class="form-control" type="text" name="image" required>
						@endif
					</div>

					<div id="preview_0">
						@if(isset($obj))
						<img src="{{$obj->image}}" style="max-width: 100%;">
						@else
						@endif
					</div>
				</div>
			</div>
		</div>
		<!-- /.box-body -->
	</div>
	<div class="form-group">
		<label class="control-label">Danh mục(*)</label>
		<div class="inner">
			@if(!isset($obj))
			<select class="form-control m-b" name="cat_id" id="cat_id" required>
				<option label=""></option>
				@foreach($cats as $p)
				<option value="{{$p->id}}" {{old('cat_id') == $p->id ? "selected" : ""}}>{{$p->name}}</option>
				@endforeach
			</select>
			@else
			<select class="form-control m-b" name="cat_id" id="cat_id" required>
				<option label=""></option>
				@foreach($cats as $p)
				<option value="{{$p->id}}" {{$obj->cat_id == $p->id ? "selected" : ""}}>{{$p->name}}</option>
				@endforeach
			</select>
			@endif
		</div>
	</div>
	<div class="form-group">
		<label class="control-label">Trạng thái (*)</label>
		<div class="inner">
			@if(!isset($obj))
			<select class="form-control m-b" name="status">
				<option value="1" {{old('status') == "1" ? "selected" : ""}}>Sử dụng</option>
				<option value="0" {{old('status') == "0" ? "selected" : ""}}>Chưa sử dụng</option>
			</select>
			@else
			<select class="form-control m-b" name="status">
				<option value="1" {{$obj->status == "1" ? "selected" : ""}}>Sử dụng</option>
				<option value="0" {{$obj->status == "0" ? "selected" : ""}}>Chưa sử dụng</option>
			</select>
			@endif
		</div>
	</div>
</div>

