<?php

namespace App\Http\Controllers;
use DB;
use Illuminate\Http\Request;
use App\Kontak;
use DataTables;
class KontakController extends Controller
{
  public function json(){
    return DataTables::of(Kontak::where('aktif','1'))->make(true);
  }
  public function index(){
		$data=Kontak::where('aktif','1');
		return view('kontak.index', compact('data'));
	}
  public function daftar(){
    return DataTables::of(Kontak::where('aktif','1'))->make(true);
	}
}
