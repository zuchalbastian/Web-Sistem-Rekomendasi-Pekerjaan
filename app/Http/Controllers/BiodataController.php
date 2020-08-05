<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Biodata;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Auth;
Use App\User;

class BiodataController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $biodata = Biodata::latest()
                    ->where('user_id', Auth::user()->id)
                    ->paginate(5);
        // $biodata = DB::table('biodatas')->paginate(5);
  
        return view('biodata.index',compact('biodata'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('/biodata/create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'user_id' => 'required',
            'nama_depan' => 'required',
            'nama_belakang' => 'required',  
            'profesi' => 'required',
            'usia' => 'required',
            'jenis_kelamin' => 'required',
            'alamat_lengkap' => 'required',
            'kota' => 'required',
            'provinsi' => 'required',
            'kode_pos' => 'required',
            'nomor_hp' => 'required',
            'alamat_email' => 'required',
        ]);
  
        Biodata::create($request->all());
   
        // return redirect()->to('/biodata')
        //                 ->with('success','Biodata created successfully.');
        return redirect()->to('/biodata/create')
                        ->with('success','Biodata created successfully.');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Biodata  $biodata
     * @return \Illuminate\Http\Response
     */
    public function show(Biodata $biodata)
    {
        return view('/biodata/show',compact('biodata'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Biodata  $biodata
     * @return \Illuminate\Http\Response
     */
    public function edit($id_biodata)
    {
        $biodata = Biodata::find($id_biodata);
        return view('/biodata/edit',compact('biodata'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Biodata  $biodata
     * @return \Illuminate\Http\Response
     */
    public function update($id_biodata, Request $request, Biodata $biodata)
    {
        
        $request->validate([
            'id_biodata' => 'required',
            'user_id' => 'required',
            'nama_depan' => 'required',
            'nama_belakang' => 'required',
            'profesi' => 'required',
            'usia' => 'required',
            'jenis_kelamin' => 'required',
            'alamat_lengkap' => 'required',
            'kota' => 'required',
            'provinsi' => 'required',
            'kode_pos' => 'required',
            'nomor_hp' => 'required',
            'alamat_email' => 'required',
        ]);
  
        $biodata->update($request->all());
        $biodata = Biodata::find($id_biodata);
        $biodata->user_id = $request->user_id;
        $biodata->nama_depan = $request->nama_depan;
        $biodata->nama_belakang = $request->nama_belakang;
        $biodata->profesi = $request->profesi;
        $biodata->usia = $request->usia;
        $biodata->jenis_kelamin = $request->jenis_kelamin;
        $biodata->alamat_lengkap = $request->alamat_lengkap;
        $biodata->kota = $request->kota;
        $biodata->provinsi = $request->provinsi;
        $biodata->kode_pos = $request->kode_pos;
        $biodata->nomor_hp = $request->nomor_hp;
        $biodata->alamat_email = $request->alamat_email;
        $biodata->save();
        
        // return redirect()->to('/biodata')
        //                 ->with('success','Biodata update successfully.');
        return redirect()->back()
                        ->with('success','Biodata update successfully.');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Biodata  $biodata
     * @return \Illuminate\Http\Response
     */
    public function destroy($id_biodata, Biodata $biodata)
    {
        $biodata = Biodata::find($id_biodata);
        $biodata->delete();
        return redirect()->to('/biodata')
                        ->with('success','Biodata deleted successfully');
    }
}
