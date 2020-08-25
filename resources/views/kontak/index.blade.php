@extends('adminlte::page')

@section('title', 'Daftar Pelanggan')

@section('content')
	<table class="table table-borderless table-hover table-sm" id="kontak-table">
		<thead>
			<tr>
				<th>KODE</th>
				<th>NAMA</th>
				<th>ALAMAT</th>
				<th>DESA</th>
				<th>KECAMATAN</th>
			</tr>
		</thead>
	</table>
@stop
@section('css')
<link rel="stylesheet" href="css/bootstrap.css"> 
<link rel="stylesheet" href="css/dataTables.bootstrap4.css"> 
<link rel="stylesheet" href="css/responsive.bootstrap4.css">  

@stop
@section('js')
<script src="js/jquery-3.5.1.js"></script> 
<script src="vendor/datatables/dataTables.js"></script> 
<script src="vendor/datatables/Buttons-1.6.3/js/dataTables.buttons.min.js"></script> 
<script src="vendor/datatables/Buttons-1.6.3/js/buttons.bootstrap.min.js"></script> 
<script src="js/dataTables.bootstrap4.js"></script> 
<script src="js/dataTables.responsive.js"></script> 
<script src="js/responsive.bootstrap4.js"></script> 
<script>
$(document).ready(function() {
	$('#kontak-table').dataTable({
		
		serverSide: true,
		paging: true,
		fixedHeader: true,
		ajax: '{!! route('kontak.data') !!}',
		columns: [
			{ data: 'kode', name: 'kode' },
			{ data: 'nama', name: 'nama' },
			{ data: 'alamat', name: 'alamat' },
			{ data: 'desa', name: 'desa'  },
			{ data: 'kecamatan', name: 'kecamatan' } 
		], 
		scrollY: 500,
		scroller: {
			loadingIndicator: true
		},
		
		 dom: "<'row'<'col-sm-6'B><'col-sm-6'f>>tr<'row'<'col-sm-6'i><'col-sm-6'>>",
		 buttons: ['copy', 'excel', 'pdf']
	});
});
</script>
@stop