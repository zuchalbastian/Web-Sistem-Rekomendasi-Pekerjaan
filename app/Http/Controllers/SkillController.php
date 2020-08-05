<?php

namespace App\Http\Controllers;

use App\Rating;
use App\Ability;
use Illuminate\Http\Request;
use Carbon\Carbon;
use DB;
use Auth;
Use App\User;

class SkillController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function index()
    {
        $skills = \App\Rating::with('get_ability')
                ->orderBy('id_rating', 'ASC')
                ->where('user_id', Auth::user()->id)
                ->paginate(5);

        $rank = $skills->firstItem();

        return view('skill.index',compact('skills','rank'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function create()
    {
        $ability = Ability::pluck('name_ability', 'id_ability');
        return view('/skill/create',compact('ability'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $tambah = new Rating();
        $tambah->id_rating = $request['id_rating'];
        $tambah->user_id = $request['user_id'];
        $tambah->name_rating = $request['name_rating'];
        $tambah->rating = $request['rating'];
        $tambah->created_at = Carbon::now()->format('Y-m-d H:i:s');
        $tambah->updated_at = Carbon::now()->format('Y-m-d H:i:s');

        $tambah->save();

        // return redirect()->to('/skill');
        return redirect()->to('/skill/create')
                        ->with('success','Kemampuan created successfully.');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Skill  $skill
     * @return \Illuminate\Http\Response
     */
    public function show(Skill $skill)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Skill  $skill
     * @return \Illuminate\Http\Response
     */
    public function edit($id_rating)
    {
        $skills = Rating::find($id_rating);
        $ability = Ability::pluck('name_ability', 'id_ability');
        return view('skill.edit',compact('skills', 'ability'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Skill  $skill
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        if (isset($request)){
            $data = DB::table('ratings')->where('id_rating',$request->id_rating)->latest();

            Rating::where('id_rating',$request->id_rating)->update([
                'user_id' => $request->user_id,
                'name_rating' => $request->name_rating,
                'rating' => $request->rating
            ]);

        }else{
            Rating::where('id_rating',$request->id_rating)->update([
                'user_id' => $request->user_id,
                'name_rating' => $request->name_rating,
                'rating' => $request->rating
            ]);
        }
        

        return redirect()->to('/skill')
                        ->with('success','Kemampuan update successfully.');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Skill  $skill
     * @return \Illuminate\Http\Response
     */
    public function destroy($id_rating)
    {
        $skills = Rating::find($id_rating);
        $skills->delete();
        return redirect()->to('/skill')
                        ->with('success','Kemampuan deleted successfully');
    }
}
