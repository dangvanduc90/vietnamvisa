@if(isset($obj))
<input type="hidden" name="_id" value="{{$obj->id}}">
@endif
<div class="form-group">
    <label class="col-sm-2 control-label">Tên</label>
    <div class="col-sm-4">
        <input type="text" class="form-control" name="name"value="{{$obj->name}}"readonly>
    </div>
</div>
<div class="form-group">
    <label class="col-sm-2 control-label">Số điện thoại</label>
    <div class="col-sm-4">
        <input type="text" class="form-control" name="phone" value="{{$obj->phone}}"readonly>
    </div>
</div>
<div class="form-group">
    <label class="col-sm-2 control-label">Email</label>
    <div class="col-sm-4">
        <input type="text" class="form-control" name="email" value="{{$obj->email}}"readonly>
    </div>
</div>
<div class="form-group">
    <label class="col-sm-2 control-label">Địa chỉ</label>
    <div class="col-sm-4">
        <input type="text" class="form-control" name="email" value="{{$obj->address}}"readonly>
    </div>
</div>
<div class="form-group">
    <label class="col-sm-2 control-label">Tiêu đề</label>
    <div class="col-sm-4">
        <input type="text" class="form-control" name="title" value="{{$obj->title}}"readonly>
    </div>
</div>
<div class="form-group">
    <label class="col-sm-2 control-label">Nội dung</label>
    <div class="col-sm-4">
       <textarea name="content" class="form-control" readonly>{!! $obj->content !!}</textarea>
    </div>
</div>
<div class="form-group">
    <label class="col-sm-2 control-label">Mô hình kinh doanh</label>
    <div class="col-sm-4">
        <input type="text" class="form-control" name="title" value="{{$obj->type}}"readonly>
    </div>
</div>
<div class="form-group">
    <label class="col-sm-2 control-label">Trạng thái</label>
    <div class="col-sm-4">
       <select name="status" class="form-control">
       	<option value="0" {{$obj->status == 0 ? 'selected' : ''}}>Chưa xử lý</option>
       	<option value="1" {{$obj->status == 1 ? 'selected' : ''}}>Đã xử lý</option>
       </select>
    </div>
</div>

