<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Barang;
use App\Baranglite;
use DataTables;
use App\Http\Resources\BarangCollection;
class BarangController extends Controller
{
	public function json(){
		$data=Baranglite::all();
        return response()->json($data);
	}
	public function index(){
		$data=Barang::where('aktif','1');
		return view('barang.index', compact('data'));
	}
	public function test(){
		return new BarangCollection(Barang::get());
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
