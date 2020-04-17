<table class="table table-striped table-bordered table-hover dataTables-example">
	<thead>
		<tr>
			<th class="no-sort check-all-table text-center"><input type="checkbox" id="master"></th>
			<th class="text-center">Number applicant(s)</th>
			<th class="text-center">Month(s)</th>
			<th class="text-center">Purposes</th>
			<th class="text-center">Special Countries</th>
			<th class="text-center">Fee</th>
			<th class="text-center">Action</th>
		</tr>
	</thead>
	<tbody>
		@foreach($data as $obj)
		<tr>
			<td class="text-center"><input type="checkbox" class="sub_chk" data-id="{{$obj->id}}"></td>
			<td class="text-center">{{ $obj->person_number }}</td>
			<td class="text-center">{{ $obj->month->month_text }}</td>
			<td class="text-center">{{ $obj->urgent->type }}</td>
			<td class="text-center">{{ $obj->country_allow }}</td>
			<td class="text-center">{{ $obj->person_fee }}</td>
			<td class="text-center">
				<a href="{{route('person.edit', ['id'=>$obj->id])}}" class="btn btn-warning btn-circle"><i class="fa fa-edit"></i></a>
				<a 	class="btn btn-danger btn-circle btn-sm delete-button"
					data-action ="{{ route('person.destroy',$obj->id) }}" type="button">
					<i class="fa fa-trash"></i>
				</a>
			</td>
		</tr>
		@endforeach
	</tbody>
</table>
