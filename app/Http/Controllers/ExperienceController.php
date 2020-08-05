<?php

namespace App\Http\Controllers;

use App\Experience;
use App\Programming;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Auth;
Use App\User;

class ExperienceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $experience = \App\Experience::with('get_programming')
                    ->orderBy('id_experience', 'ASC')
                    ->where('user_id', Auth::user()->id)
                    ->latest()
                    ->paginate(5);
        return view('pengalaman.index',compact('experience'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $experience = Programming::pluck('name_programming', 'id_programming');
        return view('/pengalaman/create',compact('experience'));
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
            'freshgraduate' => 'required',
            'programming' => 'required',
            'language' => 'required',
        ]);

        // dd($request->language);

        $tambah = new Experience();
        $tambah->user_id = $request['user_id'];
        $tambah->freshgraduate = $request['freshgraduate'];
        $tambah->programming = $request['programming'];
        $tambah->language = implode(", ",$request->language);
        $tambah->created_at = Carbon::now()->format('Y-m-d H:i:s');
        $tambah->updated_at = Carbon::now()->format('Y-m-d H:i:s');
        $tambah->save();
   
        // return redirect()->to('/pengalaman')
        //                 ->with('success','Pengalaman created successfully.');
         return redirect()->to('/pengalaman/create')
                        ->with('success','Pengalaman created successfully.');               
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Experience  $experience
     * @return \Illuminate\Http\Response
     */
    public function show(Experience $experience)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Experience  $experience
     * @return \Illuminate\Http\Response
     */
    public function edit($id_experience, Experience $experience)
    {
        $experience = Experience::find($id_experience);
        $language = explode(", ", $experience->language);
        $programming = Programming::pluck('name_programming', 'id_programming');
        return view('/pengalaman/edit',compact('experience','language','programming'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Experience  $experience
     * @return \Illuminate\Http\Response
     */
    public function update($id_experience, Request $request, Experience $experience)
    {
        $request->validate([
            'id_experience' => 'required',
            'user_id' => 'required',
            'freshgraduate' => 'required',
            'programming' => 'required',
            'language' => 'required',
        ]);

        // dd($request->language);

        $experience->update($request->all());
        $experience = Experience::find($id_experience);
        $experience->user_id = $request['user_id'];
        $experience->freshgraduate = $request['freshgraduate'];
        $experience->programming = $request['programming'];
        $experience->language = implode(", ",$request->language);
        $experience->created_at = Carbon::now()->format('Y-m-d H:i:s');
        $experience->updated_at = Carbon::now()->format('Y-m-d H:i:s');
        $experience->save();
   
        // return redirect()->to('/pengalaman')
        //                 ->with('success','Pengalaman update successfully.');
        return redirect()->back()
                        ->with('success','Pengalaman update successfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Experience  $experience
     * @return \Illuminate\Http\Response
     */
    public function destroy($id_experience, Experience $experience)
    {
        $experience = Experience::find($id_experience);
        $experience->delete();
        return redirect()->to('/pengalaman')
                        ->with('success','Pengalaman deleted successfully');
    }
}
