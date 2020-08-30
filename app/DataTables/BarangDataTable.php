<?php

namespace App\DataTables;

use App\Barang;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Html\Editor\Editor;
use Yajra\DataTables\Html\Editor\Fields;
use Yajra\DataTables\Services\DataTable;

class BarangDataTable extends DataTable
{
	
	public function dataTable($query)
	{
		return datatables()
			->eloquent($query)
			->addColumn('action', 'barang.action');
	}

	public function query(Barang $model)
	{
		return $model->newQuery();
	}
	public function html()
	{
		return $this->builder()
					->setTableId('barang-table')
					->columns($this->getColumns())
					->minifiedAjax()
					->dom('Bfrtip')
					->orderBy(1)
					->buttons(
						Button::make('create'),
						Button::make('export'),
						Button::make('print'),
						Button::make('reset'),
						Button::make('reload')
					);
	}

	protected function getColumns()
	{
		return [
			Column::computed('action')
				  ->exportable(false)
				  ->printable(false)
				  ->width(60)
				  ->addClass('text-center'),
			Column::make('id'),
			Column::make('kode'),
			Column::make('nama'),
			Column::make('jual2'),
		];
	}

	/**
	 * Get filename for export.
	 *
	 * @return string
	 */
	protected function filename()
	{
		return 'Barang_' . date('YmdHis');
	}
}
