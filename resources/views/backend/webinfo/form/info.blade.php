<div class="form-group">
    <label class="col-sm-2 control-label">Tên công cty</label>
    <div class="col-sm-4">
        <input type="text" class="form-control" name="name" id="name" value="{{$content != null && isset($content->name) ? $content->name : old('name')}}" placeholder="TRƯỜNG AN SOFT" required>
    </div>
</div>
<div class="form-group">
    <label class="col-sm-2 control-label">Hotline</label>
    <div class="col-sm-4">
        <input type="text" class="form-control" name="hotline" id="hotline" value="{{$content != null && isset($content->hotline) ? $content->hotline : old('hotline')}}" placeholder="08.8631.3186,08.8631.3186" required>
    </div>
</div>
<div class="form-group">
    <label class="col-sm-2 control-label">Email</label>
    <div class="col-sm-4">
        <input type="text" class="form-control" name="email" id="email" value="{{$content != null && isset($content->email) ? $content->email : old('email')}}" placeholder="truongansoft@outlook.com,phanmemtruongan@gmail.com" required>
    </div>
</div>
<div class="form-group">
    <label class="col-sm-2 control-label">Địa chỉ</label>
    <div class="col-sm-4">
        <input type="text" class="form-control" name="address" id="address" value="{{$content != null && isset($content->address) ? $content->address : old('address')}}" placeholder="80, Trần Phú, Phường 7, Tp.Bạc Liêu" required>
    </div>
</div>
<div class="form-group">
    <label class="col-sm-2 control-label">Facebook</label>
    <div class="col-sm-4">
        <input type="text" class="form-control" name="facebook" id="facebook" value="{{$content != null && isset($content->facebook) ? $content->facebook : old('facebook')}}" placeholder="">
    </div>
</div>
<div class="form-group">
    <label class="col-sm-2 control-label">Google</label>
    <div class="col-sm-4">
        <input type="text" class="form-control" name="gg" id="gg" value="{{$content != null && isset($content->gg) ? $content->gg : old('gg')}}" placeholder="">
    </div>
</div>
<div class="form-group">
    <label class="col-sm-2 control-label">Zalo</label>
    <div class="col-sm-4">
        <input type="text" class="form-control" name="zalo" id="zalo" value="{{$content != null && isset($content->zalo) ? $content->zalo : old('zalo')}}" placeholder="">
    </div>
</div>
<div class="form-group">
    <label class="col-sm-2 control-label">Skype</label>
    <div class="col-sm-4">
        <input type="text" class="form-control" name="skype" id="skype" value="{{$content != null && isset($content->skype) ? $content->skype : old('skype')}}" placeholder="">
    </div>
</div>
<div class="form-group">
    <label class="col-sm-2 control-label">Youtube</label>
    <div class="col-sm-4">
        <input type="text" class="form-control" name="youtube" id="youtube" value="{{$content != null && isset($content->youtube) ? $content->youtube : old('youtube')}}" placeholder="">
    </div>
</div>