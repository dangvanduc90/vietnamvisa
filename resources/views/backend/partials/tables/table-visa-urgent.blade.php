<table class="table table-striped table-bordered table-hover dataTables-example">
	<thead>
		<tr>
			<th class="no-sort check-all-table text-center"><input type="checkbox" id="master"></th>
			<th class="text-center">Proccessing</th>
			<th class="text-center">Purpose</th>
			<th class="text-center">Fee</th>
			<th class="text-center">Action</th>
		</tr>
	</thead>
	<tbody>
		@foreach($data as $obj)
		<tr>
			<td class="text-center"><input type="checkbox" class="sub_chk" data-id="{{$obj->id}}"></td>
			<td class="text-center">{{$obj->day_text}}</td>
            <td class="text-center">{{$obj->purpose->type}}</td>
            <td class="text-center">{{$obj->fee}} $</td>
			<td class="text-center">
				<a 	class="btn btn-danger btn-circle btn-sm delete-button"
					data-action ="{{ route('urgent.destroy',$obj->id) }}" type="button">
					<i class="fa fa-trash"></i>
				</a>
			</td>
		</tr>
		@endforeach
	</tbody>
</table>
