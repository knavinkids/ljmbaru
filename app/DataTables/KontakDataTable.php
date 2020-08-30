<?php

namespace App\DataTables;
use App\Kontak;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Services\DataTable;

class KontakDataTable extends DataTable
{
	public function ajax(){
		return $this->datatables
		->eloquent($this->query())
		->make(true);
	}
	public function query()
	{
		$kontak = Kontak::select();
		return $this->applyScopes($kontak);
	}

	public function html()
	{
		return $this->builder()
			->setTableId('kontakdatatable-table')
			/* ->columns($this->getColumns()) */
			->columns([
				'id',
				'kode',
				'nama',
				'alamat',
				'desa',
				'kecamatan',
				'kabupaten',
				
			])
			->parameters([
				'dom' => 'Bfrtip',
				'buttons' => ['csv', 'excel', 'pdf', 'print', 'reset', 'reload'],
			])
			->orderBy(1);
	}

	protected function filename()
	{
		return 'Kontak_' . date('YmdHis');
	}
}
