<table class="table table-striped table-bordered table-hover dataTables-example">
	<thead>
		<tr>
			<th class="no-sort check-all-table text-center"><input type="checkbox" id="master"></th>
			<th class="text-center">Number applicant(s)</th>
			<th class="text-center">Month(s)</th>
			<th class="text-center">Special Countries</th>
			<th class="text-center">Fee</th>
			<th class="text-center">Options</th>
			<th class="text-center">Action</th>
		</tr>
	</thead>
	<tbody>
		@foreach($data as $obj)
		<tr>
			<td class="text-center"><input type="checkbox" class="sub_chk" data-id="{{$obj->id}}"></td>
			<td class="text-center">{{$obj->person_text}}</td>
			<td class="text-center">{{config('admin.base_url').'san-pham/'.$obj->slug}}</td>
			<td class="text-center"><img src="{{$obj->image}}" style="max-width: 200px;" alt="{{$obj->name}}"></td>
			<td class="text-center">{{ $obj->Category != null ? $obj->Category->name : '' }}</td>
			<td class="text-center">
				@if ($obj->status == 1)
				<span class="label label-success">Đang sử dụng</span>
				@else
				<span class="label label-danger">Ngừng sử dụng</span>
				@endif
			</td>
			<td class="text-center">
				<a href="{{route('post.edit', ['id'=>$obj->id])}}" class="btn btn-warning btn-circle"><i class="fa fa-edit"></i></a>
				<a 	class="btn btn-danger btn-circle btn-sm delete-button"
					data-action ="{{ route('post.destroy',$obj->id) }}" type="button">
					<i class="fa fa-trash"></i>
				</a>
			</td>
		</tr>
		@endforeach
	</tbody>
</table>
