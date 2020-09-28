<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DataTables;
use App\Minikontak;

class MinikontakController extends Controller
{
	public function tojson(){
		$data=Minikontak::all();
		return response()->json($data);
	}
	public function detail($id){
		// return DataTables::of(Piutang::where('kt', $id))->make(true);
		$data=Minikontak::where('id', $id)->get();
		return response()->json($data);
	}

}
