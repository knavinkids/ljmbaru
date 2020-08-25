<?php

namespace App\Http\Controllers;
use DB;
use Illuminate\Http\Request;
use App\Barang;
use DataTables;
class BarangController extends Controller
{
	public function json(){
		return DataTables::of(Barang::where('aktif','1'))->make(true);
	}
	public function index(){
		$data=Barang::where('aktif','1');
		return view('barang.index', compact('data'));
	}
	
	public function daftar(){
		return DataTables::of(Barang::where('aktif','1'))->make(true);
	  }
	public function create()
	{
		//
	}

	public function store(Request $request)
	{
		//
	}

	public function show($id)
	{
		//
	}

	public function edit($id)
	{
		//
	}

	public function update(Request $request, $id)
	{
		//
	}

	public function destroy($id)
	{
		//
	}
}
