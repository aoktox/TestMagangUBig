<?php

namespace App\Http\Controllers;

use App\Siswa;
use Carbon\Carbon;
use Illuminate\Http\Request;

use App\Http\Requests;
use Yajra\Datatables\Datatables;

class PagesController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function starter(){
        $page_data=[
            "title" => "Starter Page",
            "description" => "Description",
            "current" => "Data siswa"
        ];
        return view('master.layout',$page_data);
    }

    public function dataSiswa(){
        $page_data=[
            "title" => "Data Siswa",
            "description" => "Siswa yang terdaftar di sekolah",
            "current" => "Data siswa"
        ];
        return view('dataSiswa',$page_data);
    }

    public function addDataSiswa(Requests\StoreSiswaRequest $request){
        $input = $request->all();
        $input['tgl_lahir']=Carbon::createFromFormat('Y/m/d',$input['tgl_lahir'])->toDateTimeString();
        Siswa::create($input);

        return redirect()->back()->with('status', 'Data siswa '.$input['nama'].' berhasil ditambahkan');
    }

    public function grafik(){
        $page_data=[
            "title" => "Grafik",
            "description" => "Grafik data siswa",
            "current" => "Grafik"
        ];
        return view('grafik',$page_data);
    }

    public function getDataSiswa()
    {
        return Datatables::of(Siswa::query())
            ->addColumn('action', function ($user) {
                return '
                    <button onclick="hapusSiswa('.$user->nis.')" class="btn btn-xs btn-danger delete"><i class="glyphicon glyphicon-remove-circle"></i> Hapus</a>
                ';
            })
            ->editColumn('tgl_lahir', '{{ Carbon\Carbon::parse($tgl_lahir)->format("d/m/y")}}')
            ->make(true);
    }

    public function deleteDataSiswa(Request $request){
        if(Siswa::where('nis',$request->nis)->count()){
            Siswa::where('nis',$request->nis)->delete();
            return "1";
        }
        else
            return "0";
    }

    public function editDataSiswa(Request $request){
        if(Siswa::where('nis',$request->nis)->count()==0){
            return "0";
        }
        else
            $siswa = Siswa::where('nis',$request->nis)->first();
            return $siswa;
    }

    public function editDataSiswaPost(Request $request){
        if(Siswa::where('nis',$request->nis)->count()==0){
            return redirect()->back()->with('gagal', 'NIS siswa '.$request->nis.' tidak ditemukan');
        }
        Siswa::where('nis',$request->nis)->update($request->except(['_token','nis']));
        return redirect()->back()->with('status', 'Data NIS '.$request->nis.' berhasil diperbarui');
    }
}
