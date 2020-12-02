<?php

use Illuminate\Support\Facades\Route;
use App\DataTables\UsersDataTable;
use App\DataTables\StokDataTable;
use App\DataTables\KontakDataTable;
use App\Http\Resources\BarangResource;
use App\Barang;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
Route::get('notaaktif/{id}',function($id){
	$sql1 = "select coalesce(sum(t),0) t, coalesce(sum(k),0) k,coalesce(sum(pn),0) pn, coalesce(sum(b),0) b, coalesce(sum(s),0) s from piutanglite where sl = $id and sts < 3";
	$feedbacks1  = DB::select(DB::raw($sql1));
	$sql2 = "select * from piutanglite where sl = $id and sts < 3 order by tg desc";
    $feedbacks2  = DB::select(DB::raw($sql2));
	$datax = array('total' => $feedbacks1, 'detail' => $feedbacks2);
return $datax;
});
Route::get('notaaktif2/{id}',function($id){
	$sql1 = "select coalesce(sum(t),0) t, coalesce(sum(k),0) k,coalesce(sum(pn),0) pn, coalesce(sum(b),0) b, coalesce(sum(s),0) s from piutanglite where sl = $id and sts < 3";
	$feedbacks1  = DB::select(DB::raw($sql1));
	$sql2 = "select id, nobukti n , tanggal tg, idkontak ik, kontak k, qty q, nilaitotal t, status sts  from transaksi where idpegawai = $id and status < 3 and kdtrans = 'PJ' order by tanggal desc";
    $feedbacks2  = DB::select(DB::raw($sql2));
	$datax = array('total' => $feedbacks1, 'detail' => $feedbacks2);
return $datax;
});

Route::get('notaaktif3/{id}',function($id){
	$sql1 = "select coalesce(sum(t),0) t, coalesce(sum(k),0) k,coalesce(sum(pn),0) pn, coalesce(sum(b),0) b, coalesce(sum(s),0) s from piutanglite where sl = $id and sts = 3";
	$feedbacks1  = DB::select(DB::raw($sql1));
	$sql2 = "select id, nobukti n , tanggal tg, idkontak ik, kontak k, qty q, nilaitotal t, status sts  from transaksi where idpegawai = $id and status = 3 and kdtrans = 'PJ' order by tanggal desc";
    $feedbacks2  = DB::select(DB::raw($sql2));
	$datax = array('total' => $feedbacks1, 'detail' => $feedbacks2);
return $datax;
});

Route::get('notaaktif/sebulan/{id}',function($id){
    $periode = "and extract(year from tg) = extract(year from current_date()) and extract(month from tg) = extract(month from current_date())";
    $sql1 = "select coalesce(sum(t),0) t, coalesce(sum(k),0) k,coalesce(sum(pn),0) pn, coalesce(sum(b),0) b, coalesce(sum(s),0) s from piutanglite where sl = $id $periode";
	$feedbacks1  = DB::select(DB::raw($sql1));
	$periode = "and extract(year from tanggal) = extract(year from current_date()) and extract(month from tanggal) = extract(month from current_date())";
    $sql2 = "select id, nobukti n , tanggal tg, idkontak ik, kontak k, qty q, nilaitotal t, status sts  from transaksi where idpegawai = $id and kdtrans = 'PJ' $periode order by tanggal desc";
    $feedbacks2  = DB::select(DB::raw($sql2));
	$datax = array('total' => $feedbacks1, 'detail' => $feedbacks2);
return $datax;
});

Route::get('notaaktif/jatuhtempo/{id}',function($id){
    $periode = "and s > 0";
    $sql1 = "select coalesce(sum(t),0) t, coalesce(sum(k),0) k,coalesce(sum(pn),0) pn, coalesce(sum(b),0) b, coalesce(sum(s),0) s from piutanglite where sl = $id $periode";
	$feedbacks1  = DB::select(DB::raw($sql1));
	$periode = "and saldo > 0)";
    $sql2 = "select id, nobukti n , tanggal tg, idkontak ik, kontak k, qty q, nilaitotal t, status sts  from transaksi where idpegawai = $id and kdtrans = 'PJ' $periode order by tanggal desc";
    $feedbacks2  = DB::select(DB::raw($sql2));
	$datax = array('total' => $feedbacks1, 'detail' => $feedbacks2);
return $datax;
});


Route::get('notacustomer/{id}',function($id){
	$sql1 = "select count(*)jml, coalesce(sum(p.t),0) t, coalesce(sum(p.k),0) k,coalesce(sum(p.pn),0) pn, coalesce(sum(p.b),0) b, coalesce(sum(p.s),0) s, plafon pl, if(coalesce(plafon,0)=0,1,if(coalesce(sum(p.s),0) < plafon,1,0)) ok from piutanglite p inner join kontak ktk on ktk.id = p.kt where (p.s <> 0 or p.sts < 3) and p.kt = $id";
	$feedbacks1  = DB::select(DB::raw($sql1));
	$sql2 = "select * from piutanglite where (s <> 0 or sts < 3) and kt = $id order by tg desc";
    $feedbacks2  = DB::select(DB::raw($sql2));
	$datax = array('total' => $feedbacks1, 'detail' => $feedbacks2);
return $datax;
});
Route::get('allnotacustomer/{id}',function($id){
	$sql1 = "select count(*)jml, coalesce(sum(p.t),0) t, coalesce(sum(p.k),0) k,coalesce(sum(p.pn),0) pn, coalesce(sum(p.b),0) b, coalesce(sum(p.s),0) s, plafon pl, if(coalesce(plafon,0)=0,1,if(coalesce(sum(p.s),0) < plafon,1,0)) ok from piutanglite p inner join kontak ktk on ktk.id = p.kt where kt = $id";
	$feedbacks1  = DB::select(DB::raw($sql1));
	$sql2 = "select * from piutanglite where kt = $id order by tg desc";
    $feedbacks2  = DB::select(DB::raw($sql2));
	$datax = array('total' => $feedbacks1, 'detail' => $feedbacks2);
return $datax;
});
Route::get('ambilnotaku/{id}',function($id){
    $sql1 = "select nobukti, coalesce(sum(d.total),0) nilai, coalesce(sum(d.poin),0) p, t.idlokasi, t.lokasi, k.plafon, coalesce(t.jharga,'JUAL2') jharga from transaksi t inner join kontak k on k.id = t.idkontak left join d on d.idtrans = t.id where t.id = $id";
	$feedbacks1  = DB::select(DB::raw($sql1));
	$sql2 = "select id, count(*) over (order by urut) as n, idbarang, kode, nama, merk, satuan, proses, qtynota, pesan, harga, diskon, total, poin from detail where idtrans = $id order by urut";
    $feedbacks2  = DB::select(DB::raw($sql2));
	$datax = array('total' => $feedbacks1, 'data' => $feedbacks2);
	return $datax;
});
Route::get('chartsales/{id}',function($id){
    $sql1 = "call periodicomsetsales($id)";
	$feedbacks1  = DB::select(DB::raw($sql1));
	$sql2 = "call periodicpelunasansales($id)";
    $feedbacks2  = DB::select(DB::raw($sql2));
	$sql3 = "call periodictemposales($id)";
    $feedbacks3  = DB::select(DB::raw($sql3));
	$datax = array('omset' => $feedbacks1, 'pelunasan' => $feedbacks2, 'tempo' => $feedbacks3);
	return $datax;
});
Route::get('rinciannota/{id}',function($id){
    $statistics_sql = "select sum(d.total) nilai, lokasi from d inner join transaksi t on t.id= d.idtrans where d.idtrans = $id";
    $feedbacks  = DB::select(DB::raw($statistics_sql));
	return $feedbacks;
});

Route::get('listmutasi/{id}',function($id){
    $statistics_sql = "call mutasilite($id)";
    return DB::select(DB::raw($statistics_sql));

});
Route::get('lokasi/{id}',function($id){
    $statistics_sql = "select * from lokasi where aktif = $id";
    $feedbacks  = DB::select(DB::raw($statistics_sql));
    return $feedbacks;

});

Route::post('opr',function(Request  $req){
    $id = $req->id;
    $statistics_sql = "select * from inet where email = '$id'";
    $feedbacks  = DB::select(DB::raw($statistics_sql));
    return $feedbacks;

});
Route::get('getstok/{id}',function($id){
    $statistics_sql = "select b.id i, kode k, nama n, merk m,
    coalesce(jual1,0) j1,
    coalesce(jual2,0) j2,
    coalesce(jual3,0) j3,
    coalesce(jual4,0) j4,
    coalesce(jual5,0) j5,
    s.stok s from barang b inner join s on s.idbarang = b.id
    and idlokasi = $id
    where coalesce(s.stok,0) > 0 ";
    $feedbacks  = DB::select(DB::raw($statistics_sql));
    return $feedbacks;

});
Route::get('getstoklite/{id}',function($id){
    $statistics_sql = "select idbarang i, idlokasi l,  stok s from s
    where coalesce(stok,0) > 0 and idlokasi = $id";
    $feedbacks  = DB::select(DB::raw($statistics_sql));
    return $feedbacks;

});
Route::get('getomsetsales/{id}',function($id){
    $statistics_sql = "call omsetsales($id)";
    $feedbacks  = DB::select(DB::raw($statistics_sql));
    return $feedbacks['0']->total;

});
Route::get('getstoklite/raw/{id}',function($id){
    $i = 0;
    if($id == 0){
    $statistics_sql = "select idbarang i, idlokasi l, coalesce(stok,0) s from s where coalesce(stok,0) > 0";
    }else{
    $statistics_sql = "select idbarang i, idlokasi l, coalesce(stok,0) s from s where coalesce(stok,0) > 0 and idlokasi = $id";
    }
    $feedbacks  = DB::select(DB::raw($statistics_sql));
     $dataawal = "INSERT OR REPLACE INTO stok (i, l, s) \n  VALUES \n";
     $data = "INSERT OR REPLACE INTO  stok (i, l, s) \n  VALUES \n";
     $datax = array(array('key' => 'CREATE TABLE IF NOT EXISTS stok(i bigint NOT NULL PRIMARY KEY, l bigint, s float)'));
    foreach ($feedbacks as $row){
        $i++;
        $data = $data . "(" . $row->i . ", " .$row->l . ", " . $row->s . "), \n";
        if($i >= 100){
            $i = 0;
            $data = $data . ",,";
            $data = str_replace(", \n,,", '; ', $data);
            $data = str_replace("\n", '', $data);
            array_push($datax, array('key' => $data));
            $data = $dataawal;
        }
    }
    $data = $data . ",,";
    $data = str_replace(", \n,,", '; ', $data);
    $data = str_replace("\n", '', $data);
    array_push($datax, array('key' => $data));
    return $datax;

});
Route::get('getstok/raw/{id}',function($id){
    $i = 0;
    $statistics_sql = "select idbarang i, stok s from s where coalesce(stok,0) > 0 and idlokasi = $id";
    $feedbacks  = DB::select(DB::raw($statistics_sql));
     $dataawal = "INSERT OR REPLACE INTO stok (i, s) \n  VALUES \n";
     $data = "INSERT OR REPLACE INTO  stok (i, s) \n  VALUES \n";
     $datax = array(array('key' => 'CREATE TABLE IF NOT EXISTS stok(i bigint NOT NULL PRIMARY KEY, s float)'));
     foreach ($feedbacks as $row){
        $i++;
        $data = $data . "(" . $row->i . ", " . $row->s . "), \n";
        if($i >= 100){
            $i = 0;
            $data = $data . ",,";
            $data = str_replace(", \n,,", '; ', $data);
            $data = str_replace("\n", '', $data);
            array_push($datax, array('key' => $data));
            $data = $dataawal;
        }
    }
    $data = $data . ",,";
    $data = str_replace(", \n,,", '; ', $data);
    $data = str_replace("\n", '', $data);
    array_push($datax, array('key' => $data));
    return $datax;

});
Route::get('getbarang/raw',function( ){
    $i = 0;
    $statistics_sql = "select id i, kode k, nama n, merk m, coalesce(jual1,0) j1, coalesce(jual2,0) j2, coalesce(jual3,0) j3, coalesce(jual4,0) j4, coalesce(jual5,0) j5, coalesce(stok,0) s from barang where aktif = 1";
    $feedbacks  = DB::select(DB::raw($statistics_sql));
    $dataawal = "INSERT OR REPLACE INTO barang (i, k, n, m, j1, j2, j3, j4, j5, s) \n  VALUES \n";
    $data = $dataawal;
    $datax = array(array('key' => 'CREATE TABLE IF NOT EXISTS barang(i BIGINT NOT NULL PRIMARY KEY,k TEXT,j TEXT,n TEXT,m TEXT,j1 int,j2 int,j3 int,j4 int,j5 int,s float);'));
    foreach ($feedbacks as $row){
        $i++;
        $nama = str_replace("'", '`',$row->n); $kode = str_replace("'", '`',$row->k); $merk = str_replace("'", '`',$row->m);
        $data = $data . "(" . $row->i . ", '" . $kode. "', '" . $nama. "', '" . $merk . "', " . $row->j1 . ", " . $row->j2 . ", " . $row->j3 . ", " . $row->j4 . ", " . $row->j5 . ", " . $row->s . "), \n";
        if($i >= 500){
            $i = 0;
            $data = $data . ",,";
            $data = str_replace(", \n,,", '; ', $data);
            $data = str_replace("\n", '', $data);
            // $data = str_replace("", '', $data);
            array_push($datax, array('key' => $data));
            $data = $dataawal;
        }
    }
    $data = $data . ",,";
    $data = str_replace(", \n,,", '; ', $data);
    $data = str_replace("\n", '', $data);
    array_push($datax, array('key' => $data));
    return $datax;
});


Route::get('getkontak/raw',function( ){
    $i = 0;
    $statistics_sql = "select id, kode, nama, alamat_kirim alamat, coalesce(devisi,'-') devisi, coalesce(aktif,0) aktif from kontak where c = 1";
    $feedbacks  = DB::select(DB::raw($statistics_sql));
    $dataawal = "INSERT OR REPLACE INTO kontak (id, kode, nama, alamat, devisi, aktif)   VALUES ";
    $data = $dataawal;
    $datax = array(array('key' => 'CREATE TABLE IF NOT EXISTS kontak(id bigint NOT NULL PRIMARY KEY, kode text, nama text, alamat text, devisi text, aktif int);'));
    foreach ($feedbacks as $row){
        $i++;
        $data = $data . "(" . $row->id . ", '" .
        str_replace("'", "`", trim($row->kode)). "', '" .
        str_replace("'", "`", trim($row->nama)) . "', '" .
        str_replace("'", "`", trim($row->alamat)) . "', '".
        $row->devisi . "', " . $row->aktif . " ), ";
        if($i >= 500){
            $i = 0;
            $data = $data . ",,";
            $data = str_replace(", ,,", '; ', $data);
            // $data = str_replace("\n", '', $data);
            // $data = str_replace("'", '"', $data);
            // $data = str_replace("", '', $data);
            array_push($datax, array('key' => $data));
            $data = $dataawal;
        }
    }
    $data = $data . ",,";
    $data = str_replace(", ,,", '; ', $data);
    //$data = str_replace("\n", '', $data);

    array_push($datax, array('key' => $data));
    return $datax;
});


Route::get('lokasi', function( ) {
$statistics_sql = "select id i, kode k, nama n from lokasi where aktif = 1";
    $feedbacks  = DB::select(DB::raw($statistics_sql));
    $data = "insert or replace into lokasi (i, k, n)\n";
    $data = $data . "VALUES\n";
    foreach($feedbacks as $d) {
        $data = $data . '(';
        foreach($d as $k=>$v) {
            $v = str_replace("'", "",$v);
            if($k != 'i') {$data = $data . "'" .$v. "'";}
            else{$data = $data . $v;}
            if($k != 'n') {$data=$data . ", ";}
        }
        $data = $data . "),\n";
    };
    $data = $data ."xxx";
    $data = str_replace(",\nxxx", ";\n",$data);
    $data = "CREATE TABLE IF NOT EXISTS lokasi(i BIGINT NOT NULL PRIMARY KEY, k TEXT, TEXT);\n" . $data;
    return $data;

});
Route::get('lokasijs', function( ) {
  $statistics_sql = "select id i, kode k, nama n from lokasi where aktif = 1";
  $feedbacks  = DB::select(DB::raw($statistics_sql));
  return $feedbacks;
});
Route::get('hargajs', function( ) {
  $statistics_sql = "select kode k, nama n from harga where coalesce(nama,'') not in ('','BELI','JUAL')";
  $feedbacks  = DB::select(DB::raw($statistics_sql));
  return $feedbacks;
});
Route::get('/', function () {
	return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('stok', function(StokDataTable $dataTable) {
	return $dataTable->render('stok.index');
});

Route::get('barang-data', 'BarangController@daftar')->name('barang.data');
Route::get('brg-data', 'BarangController@json')->name('barang.json');
Route::get('getbarang', 'Api\DataController@barangtojson')->name('barang.json');
Route::get('getbarang/{idbr}', 'Api\DataController@barangshow');
Route::get('getstok', 'Api\DataController@stoktojson');
Route::get('getstoklite', 'Api\DataController@stoklitetojson')->name('stoklite.json');
Route::get('getkontak', 'Api\DataController@kontaktojson')->name('kontak.json');
Route::get('getkontak/{idkt}', 'Api\DataController@kontakshow');
Route::get('/btest2', function(){
	return new BarangResource(Barang::all());
});

Route::get('barang-json', function() {
	$model = App\Barang::query();
	$modelx = DataTables::eloquent($model)->only(['id','jual2','stok']);
	return response()->json(  $modelx );
});
Route::get('getemployee','Api\DataController@employeetojson');
Route::resource('kontak', 'KontakController');
Route::resource('barang', 'BarangController');
Route::put('updateproduk','Api\DataController@updateproduk');
Route::post('addemployee','Api\DataController@addemployee');
Route::post('updateemployee','Api\DataController@updateemployee');
Route::get('/simpanproduk','Api\DataController@simpanproduk');
Route::get('getproduk','Api\DataController@produktojson');
Route::get('getpiutangjs','Api\PiutangController@tojson');
Route::get('getpiutangjs/{id}','Api\PiutangController@detail');
Route::get('getkontakjs','Api\MinikontakController@tojson');
Route::get('getkontakjs/{id}','Api\MinikontakController@detail');
