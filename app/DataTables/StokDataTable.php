<?php

namespace App\DataTables;

use App\Stok;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Html\Editor\Editor;
use Yajra\DataTables\Html\Editor\Fields;
use Yajra\DataTables\Services\DataTable;

class StokDataTable extends DataTable
{
   
	public function dataTable($query)
	{
		return datatables()
			->eloquent($query)
			->addColumn('action', 'stok.action');
	}

	/**
	 * Get query source of dataTable.
	 *
	 * @param \App\Stok $model
	 * @return \Illuminate\Database\Eloquent\Builder
	 */
	public function query(Stok $model)
	{
		return $model->newQuery();
	}

	/**
	 * Optional method if you want to use html builder.
	 *
	 * @return \Yajra\DataTables\Html\Builder
	 */
	public function html()
	{
		return $this->builder()
					->setTableId('stok-table')
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
			Column::make('idbarang'),
			Column::make('idlokasi'),
			Column::make('stok'),
		];
	}

	protected function filename()
	{
		return 'Stok_' . date('YmdHis');
	}
}
