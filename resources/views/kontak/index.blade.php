@extends('adminlte::page')

@section('title', 'Daftar Pelanggan')

@section('content')
	<table class="table table-borderless table-hover table-sm display responsive nowrap" cellspacing="0" width="100%"  id="kontak-table">
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
<link rel="stylesheet" href="css/dataTables.bootstrap4.css"> 
<link rel="stylesheet" href="vendor/datatables/Buttons-1.6.3/css/buttons.dataTables.min.css">  
<link rel="stylesheet" href="vendor/datatables/Buttons-1.6.3/css/buttons.semanticui.min.css">   

@stop
@section('js')
<script src="vendor/datatables/datatables.js"></script> 
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
		
		language: {
				buttons: {
					colvis : 'show / hide',
					colvisRestore: "Reset Kolom"
				}
		},
		 dom: "<'row'<'col-sm-6'B><'col-sm-6'f>>tr<'row'<'col-sm-6'i><'col-sm-6'l>>",
		 buttons: [
			{extend: 'colvis', postfixButtons: [ 'colvisRestore' ] },
			{extend: 'pdfHtml5',  title: 'Daftar Barang', "text":'<i class="fa fa-copy" />' },
			{
				extend: 'collection',
				text: 'Export',
				buttons: [
					'copy',
					'excel',
					'csv',
					{
				extend: 'pdfHtml5',
				exportOptions: {
					page: 'all',
					columns: ':visible',
					order: 'applied',
					search: 'none'
				},
				customize: function (doc) {
					var now = new Date();
					var jsDate = now.getDate()+'-'+(now.getMonth()+1)+'-'+now.getFullYear();
					doc['footer']=(function(page, pages) {
						return {
							columns: [
								{alignment: 'left',text: ['Dibuat: ', { text: jsDate.toString() }]},
								{alignment: 'right',text: ['Halaman ', { text: page.toString() },	' dari ',	{ text: pages.toString() }]}
							],margin: 20
						}
					});
				}
			},
					'print'
				],
				initComplete: function() {
					$('.buttons-copy').html('<i class="fa fa-copy" />')
					$('.buttons-csv').html('<i class="fa fa-file-text-o" />')
					$('.buttons-excel').html('<i class="fa fa-file-excel-o" />')
					$('.buttons-pdf').html('<i class="fa fa-file-pdf-o" />')
					$('.buttons-print').html('<i class="fa fa-print" />')
				}
			}
		],
	
	});
});
</script>
@stop