<?php
namespace App\Http\Controllers\Api;
use App\Baranglite;
use App\Kontaklite;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
class DataController extends Controller
{
	public function barangtojson(){
		$data=Baranglite::all();
    return response()->json($data);
	}
	public function kontaktojson(){
		$data=Kontaklite::all();
    return response()->json($data);
	}
}