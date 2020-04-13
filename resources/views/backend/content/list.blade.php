@extends('backend.layouts.main')

@section('title')
Danh sách content
@parent
@stop

@section('css')
<link href="{{asset('backend/css/plugins/dataTables/datatables.min.css')}}" rel="stylesheet">
@stop

{{-- Page content --}}
@section('content')
<div class="wrapper wrapper-content animated fadeInRight">
	<div class="row">
		<div class="col-lg-12">
			<div class="ibox float-e-margins">
				{{-- Header table --}}
				<div class="ibox-title">
					<h5>Bảng danh sách</h5>
				</div>
				{{-- END Header table --}}
				<div class="ibox-content">
					@include('backend.partials.alert-msg')
					@include('backend.partials.select-box-update')
					<div class="table-responsive">
						@include('backend.partials.tables.table-content')
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
@include('backend.partials.modals.delete')
@include('backend.partials.modals.mutile-update')
{{-- END Main content --}}
@stop
@section('js')
<!-- iCheck -->
<script src="{{asset('js/select-all.js')}}"></script>
<script src="{{asset('backend/js/plugins/dataTables/datatables.min.js')}}"></script>
<script src="{{asset('js/delete-modal.js')}}"></script>
<script src="{{asset('js/mutile-update.js')}}"></script>
<script>
	$(document).ready(function(){
		$('.dataTables-example').DataTable({
			pageLength: 10,
			responsive: true,
			dom: '<"html5buttons"B>lTfgitp',
			buttons: [
			{extend: 'excel', title: 'ExampleFile'},
		]
	});
	});
</script>
@stop
