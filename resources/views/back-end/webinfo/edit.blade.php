@extends('back-end.layouts.main')

@section('title')
Thay đổi thông tin website
@endsection

@section('css')
@endsection

{{-- Page content --}}
@section('content')
<div class="wrapper wrapper-content">
	<div class="row animated fadeInRight">
		<div class="ibox float-e-margins">
			<div class="ibox-title">
				<h5>Thông tin chi tiết</h5>
			</div>
			<div class="ibox-content">
				@include('back-end.partials.alert-msg')
				<form id="form" class="form-horizontal" role="form" action="{{route('webinfo.update',['id'=>$obj->id])}}" 
				enctype="multipart/form-data" method="POST">
				@method('PATCH')
				@csrf
					@include('back-end.webinfo.form')
					<div class="form-group">
						@include('back-end.partials.status')
						<div class="col-sm-4 col-sm-offset-2">
							<button class="btn btn-white" >Làm mới</button>
							<button class="btn btn-primary" type="submit">Cập nhật</button>
						</div>
					</div>
				</form>
			</div>
		</div>
	</div>		
</div>
@endsection
@section('js')
<script>
	$(document).ready(function() {
		settingIframe("#iframe-btn-0", "#thumb_0", "#preview_0");
	});
</script>	
@endsection