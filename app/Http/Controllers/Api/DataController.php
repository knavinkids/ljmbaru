<?php
namespace App\Http\Controllers\Api;
use App\Baranglite;
use App\Barang;
use App\Kontak;
use App\Kontaklite;
use App\Stoklite;
use App\Stok;
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
	public function stoktojson(){
		$data=Stok::whereRaw('idlokasi = 6 and stok > 0')->get();
		//$data=Stoklite::all();
	return response()->json($data);
	}
	public function stoklitetojson(){
		$data=Stoklite::whereRaw('l = 6 and s > 0')->get();
		//$data=Stoklite::all();
	return response()->json($data);
	}
	
	
}