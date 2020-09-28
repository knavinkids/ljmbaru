<?php
namespace App\Http\Controllers\Api;
use App\Employee;
use App\Baranglite;
use App\Barang;
use App\Produk;
use App\Kontak;
use App\Kontaklite;
use App\Stoklite;
use App\Stok;
use DataTables;

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
	public function produkshow($id){
		$data=Produk::find($id);
		return response()->json($data);
	}
	public function produktojson(){
		$data=Produk::all();
	return response()->json($data);
	}
	public function employeetojson(){
		return DataTables::of(Employee::all())->make(true);
	}
	public function updateemployee(Request $request){
		$id = $request->$id;
		$employee = Employee::find($id);
		$employee_name = $request->$employee_name;
		$employee_salary = $request->$employee_salary;
		$employee_age = $request->$employee_age;
		$produk->save();
		return ['message' => 'OK','code' => 200,];
	}
	public function addemployee(Request $request){
		$employee = new Employee;
		$employee_name = $request->$employee_name;
		$employee_salary = $request->$employee_salary;
		$employee_age = $request->$employee_age;
		$produk->save();
		return ['message' => 'OK','code' => 200,];
	}
	public function updateproduk(Request $request){
		$id = $request->$id;
		$produk = Produk::find($id);
		$nama = $request->$nama;
		$namaproduk = $request->$namaproduk;
		$qty = $request->$qty;
		$harga = $request->$harga;
		$produk->save();
		return ['message' => 'OK','code' => 201,];
	}
	public function simpanproduk(Request $request){
		$produk = new Produk;
		$produk->$nama = $request->$nama;
		$produk->$namaproduk = $request->$namaproduk;
		$produk->$qty = $request->$qty;
		$produk->$harga = $request->$harga;
		$produk->save();
		//return ['message' => 'OK','code' => 201,];
	}
	public function destroyproduk(Produk $Produk){
		if ($produk->delete()) {
			return ['message' => 'OK','code' => 204,];
		} else {
			return ['message' => 'Bad Request','code' => 400,];
		}
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