<?php
namespace App\Http\Controllers\Api;
use App\Baranglite;
use App\Barang;
use App\Kontak;
use App\Kontaklite;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
class DataController extends Controller
{
	public function barangtojson(){
		$data=Baranglite::all();
    return response()->json($data);
	}
	public function barangshow($id){
		$data=Barang::find($id);
		return response()->json($data);
  }
	public function kontaktojson(){
		$data=Kontaklite::all();
    return response()->json($data);
	}
	public function kontakshow($id){
		$data=Kontak::find($id);
		return response()->json($data);
  }
	
}