<?php

namespace App\Http\Controllers;

use App\CurriculumVitae;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use App\Biodata;
use App\School;
use App\Degree;
use App\Rating;
use App\Ability;
use App\Experience;
use App\Programming;
use App\Transform;
use Auth;
Use App\User;

class CurriculumVitaeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $biodata = DB::table('biodatas')
                    ->where('user_id', Auth::user()->id)
                    ->get();
        $school = \App\School::with('get_degree')
                    ->where('user_id', Auth::user()->id)
                    ->get();
        $skill = \App\Rating::with('get_ability')
                    ->where('user_id', Auth::user()->id)
                    ->get();
        $experience = \App\Experience::with('get_programming')
                    ->where('user_id', Auth::user()->id)
                    ->get();

        return view('cv.index', compact('biodata','school','degree','skill', 'ability','experience','programming'));


    }

    public function convert()
    {
        $biodata = DB::table('biodatas')
                    ->where('user_id', Auth::user()->id)
                    ->get();
        $school = \App\School::with('get_degree')
                    ->where('user_id', Auth::user()->id)
                    ->get();
        $skill = \App\Rating::with('get_ability')
                    ->where('user_id', Auth::user()->id)
                    ->get();
        $experience = \App\Experience::with('get_programming')
                    ->where('user_id', Auth::user()->id)
                    ->get();

        return view('cv.convert', compact('biodata','school','degree','skill','ability','experience','programming'));


    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('/cv/create');
    }

    public function school()
    {
        return view('/cv/school');
    }

    public function skill()
    {
        return view('/cv/skill');
    }

    public function experience()
    {
        return view('/cv/experience');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function storeConvert(Request $request)
    {
        // dd(request()->all());
        $tambah = new Transform();
        $tambah->user_id = $request->user_id;
        $tambah->KT_1 = $request['KT_1'];
        $tambah->KT_2 = $request['KT_2'];
        $tambah->KT_3 = $request['KT_3'];
        $tambah->KT_4 = $request['KT_4'];
        $tambah->KT_5 = $request['KT_5'];
        $tambah->KT_6 = $request['KT_6'];
        $tambah->KT_7 = $request['KT_7'];
        $tambah->KT_8 = $request['KT_8'];
        $tambah->PD_1 = $request['PD_1'];
        $tambah->PD_2 = $request['PD_2'];
        $tambah->PD_3 = $request['PD_3'];
        $tambah->IPK_1 = $request['IPK_1'];
        $tambah->US_1 = $request['US_1'];
        $tambah->US_2 = $request['US_2'];
        $tambah->US_3 = $request['US_3'];
        $tambah->JK_1 = $request['JK_1'];
        $tambah->FG_1 = $request['FG_1'];
        $tambah->PL_1 = $request['PL_1'];
        $tambah->BS_1 = $request['BS_1'];
        $tambah->created_at = Carbon::now()->format('Y-m-d H:i:s');
        $tambah->updated_at = Carbon::now()->format('Y-m-d H:i:s');

        $tambah->save();
        return redirect()->to('/transform/create');
        // return redirect()->to('/skill/create')
        //                 ->with('success','Keterampilan created successfully.');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\CurriculumVitae  $curriculumVitae
     * @return \Illuminate\Http\Response
     */
    public function show(CurriculumVitae $curriculumVitae)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\CurriculumVitae  $curriculumVitae
     * @return \Illuminate\Http\Response
     */
    public function edit(CurriculumVitae $curriculumVitae)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\CurriculumVitae  $curriculumVitae
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, CurriculumVitae $curriculumVitae)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\CurriculumVitae  $curriculumVitae
     * @return \Illuminate\Http\Response
     */
    public function destroy(CurriculumVitae $curriculumVitae)
    {
        //
    }
}
