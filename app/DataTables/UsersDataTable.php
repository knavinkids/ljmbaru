<?php
  
namespace App\DataTables;
  
use App\User;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Html\Editor\Editor;
use Yajra\DataTables\Html\Editor\Fields;
use Yajra\DataTables\Services\DataTable;
  
class UsersDataTable extends DataTable
{
	public function ajax(){
    return $this->Datatables
        ->eloquent($this->query())
				->make(true);
	}
	
	public function query(){
    $users = User::select();
		return $this->applyScopes($users);
	}
	public function html(){
    return $this->builder()
			->columns([
					'id',
					'name',
					'email',
					'created_at',
					'updated_at',
			])
			->parameters([
					'dom' => 'Bfrtip',
					'buttons' => ['csv', 'excel', 'pdf', 'print', 'reset', 'reload'],
			]);
	}
}