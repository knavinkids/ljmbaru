<?php
namespace App\Http\Controllers;

use App\DataTables\KontakDataTable;
use App\Http\Requests;

class KontakController extends Controller
{
    public function index(KontakDataTable $dataTable)
    {
        return $dataTable->render('kontak');
    }
}