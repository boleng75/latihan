<?php
use App\Mahasiswa;
use App\Wali;
use App\Dosen;
use App\Hobi;
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

Route::get('/', function () {
    return view('welcome');
});

//Route One to One
Route::get('relasi-1',function()
{
    $mhs = Mahasiswa::where('nim','=','6677676765')->first();

    return $mhs->wali->nama;

});

Route::get('relasi-2',function()
{
    $mhs = Mahasiswa::where('nim','=','56234523486')->first();

    return $mhs->dosen->nama;

});

Route::get('relasi-3',function()
{
    $dosen = Dosen::where('nama','=','Abdul Mustofa')->first();

    foreach ($dosen->mahasiswa as $temp)
    echo '<li> Nama : ' . $temp->nama .
        '<strong>' . $temp->nim . '</strong>
        </li>';
});

Route::get('relasi-4',function()
{
    $dadan = Mahasiswa::where('nama','=','Dadan')->first();

    foreach ($dadan->hobi as $temp)
    echo '<li> Nama : ' . $temp->hobi . '</li>';
});

Route::get('relasi-5',function()
{
    $dadan = Hobi::where('hobi','=','Mancing Keributan')->first();
    foreach ($dadan->mahasiswa as $data)
    echo '<li> Nama : ' . $data->nama . '<strong>' .
        $data->nim . '</strong></li>';
});

Route::get('relasi-join',function()
{
    $sql = DB::table('mahasiswas')
    ->select('mahasiswas.nama','mahasiswas.nim','walis.nama as nama_wali')
    ->join('walis','walis.id_mahasiswa','=','mahasiswas.id')
    ->get();
    dd($sql);
});

Route::get('eloquent',function()
{
    $mahasiswa = Mahasiswa::with('wali','dosen','hobi')->get();
    return view('eloquent',compact('mahasiswa'));
});

Route::get('eloquent2',function()
{
    $mahasiswa = Mahasiswa::with('wali','dosen','hobi')->get()->take(1);
    return view('eloquent',compact('mahasiswa'));
});