@extends('adminlte::page')

@section('title', 'Daftar Barang')

@section('content')
	<table class="table table-borderless table-hover table-sm display responsive nowrap" cellspacing="0" width="100%" id="barang-table">
		<thead>
			<tr>
				<th>KODE</th>
				<th>NAMA</th>
				<th>MERK</th>
				<th>PARTAI</th>
				<th>SPESIAL</th>
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
<script src="vendor/datatables/Buttons-1.6.3/js/buttons.semanticui.min.js"></script> 
<script src="vendor/datatables/Buttons-1.6.3/js/buttons.colVis.min.js"></script> 
<script src="vendor/datatables/Buttons-1.6.3/js/buttons.html5.min.js"></script> 
<script src="vendor/datatables/Buttons-1.6.3/js/buttons.flash.min.js"></script> 
<script>
$(document).ready(function() {
	$('#barang-table').dataTable({
		processing: true,
		serverSide: true,
		paging: true,
		deferRender:    true,
		scrollY:        500,
	scroller:       true,
	order: [ 1, "asc" ],
		fixedHeader: true,
		ajax: "{!! route('barang.data') !!}",
		columns: [
			{ data: 'kode', name: 'kode' },
			{ data: 'nama', name: 'nama' },
			{ data: 'merk', name: 'merk' },
			{ data: 'jual2', name: 'jual2' , render: $.fn.dataTable.render.number( '.', ',', 0, ''), className: "text-right" },
			{ data: 'jual4', name: 'jual4' , render: $.fn.dataTable.render.number( '.', ',', 0, ''), className: "text-right" } 
		], 
		
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