<?php
namespace App\Http\Controllers\Api;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DataTables;
use App\Piutang;

class PiutangController extends Controller
{
	public function tojson(){
		$data=Piutang::all();
		return response()->json($data);
	}
	public function detail($id){
		// return DataTables::of(Piutang::where('kt', $id))->make(true);
		$data=Piutang::where('kt', $id)->get();
		return response()->json($data); 
	}
}