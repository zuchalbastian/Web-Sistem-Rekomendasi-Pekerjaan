<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Degree;
use App\School;
use Auth;
Use App\User;

class SchoolController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $school = \App\School::with('get_degree')
                ->orderBy('id_school', 'DESC')
                ->where('user_id', Auth::user()->id)
                ->latest()
                ->paginate(5);
        
        $rank = $school->firstItem();
  
        return view('pendidikan.index',compact('school','degree','rank'));
            // ->with('i', (request()->input('page', 1) - 1) * 5);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $school = Degree::pluck('name_degrees', 'id_degrees');
        return view('/pendidikan/create',compact('school'));
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
            'nama_sekolah' => 'required',
            'alamat_sekolah' => 'required',
            'gelar' => 'required',
            'ipk' => 'nullable',
            'bidang_studi' => 'nullable',
            'tgl_mulai_kelulusan' => 'required',
            'tgl_akhir_kelulusan' => 'required',
        ]);
        

        School::create($request->all());
   
        // return redirect()->to('/pendidikan')
        //                 ->with('success','Pendidikan created successfully.');
        return redirect()->to('/pendidikan/create')
                        ->with('success','Pendidikan created successfully.');
        // dd(request()->all());
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\School  $school
     * @return \Illuminate\Http\Response
     */
    public function show(School $school)
    {
        return view('/pendidikan/show',compact('school'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\School  $school
     * @return \Illuminate\Http\Response
     */
    public function edit($id_school)
    {
        // $school = School::select('schools.*', 'degrees.id_degrees as degree', 'degrees.name_degrees')
        //           ->leftJoin('degrees', 'schools.gelar', '=', 'degrees.id_degrees' )
        //           ->where('schools.id_school', $id_school)
        //           ->first();
        $school = School::find($id_school);
        $degree = Degree::pluck('name_degrees', 'id_degrees');
        return view('/pendidikan/edit',compact('school','degree'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\School  $school
     * @return \Illuminate\Http\Response
     */
    public function update($id_school, Request $request, School $school)
    {
        $request->validate([
            'id_school' => 'required',
            'user_id' => 'required',
            'nama_sekolah' => 'required',
            'alamat_sekolah' => 'required',
            'gelar' => 'required',
            'ipk' => 'nullable',
            'bidang_studi' => 'nullable',
            'tgl_mulai_kelulusan' => 'required',
            'tgl_akhir_kelulusan' => 'required',

        ]);
  
        $school->update($request->all());
        $school = School::find($id_school);
        $school->user_id = $request->user_id;
        $school->nama_sekolah = $request->nama_sekolah;
        $school->alamat_sekolah = $request->alamat_sekolah;
        $school->gelar = $request->gelar;
        $school->ipk = $request->ipk;
        $school->bidang_studi = $request->bidang_studi;
        $school->tgl_mulai_kelulusan = $request->tgl_mulai_kelulusan;
        $school->tgl_akhir_kelulusan = $request->tgl_akhir_kelulusan;
        $school->save();
        
        return redirect()->to('/pendidikan')
                        ->with('success','Pendidikan update successfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\School  $school
     * @return \Illuminate\Http\Response
     */
    public function destroy($id_school, School $school)
    {
        $school = School::find($id_school);
        $school->delete();
        return redirect()->to('/pendidikan')
                        ->with('success','Pendidikan deleted successfully');
    }
}
