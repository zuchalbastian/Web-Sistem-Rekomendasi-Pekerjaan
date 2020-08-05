<?php

namespace App\Http\Controllers;
use App\Transform;

use Auth;
Use App\User;

use Illuminate\Http\Request;
use GuzzleHttp\Client;
use GuzzleHttp\Exception\RequestException;

use App\Jobseeker;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Arr;

class TransformController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        //
        $client = new \GuzzleHttp\Client(["base_uri" => "http://localhost:5000/"]);
        $options = [
            'json' => [
                // "fruit" => "apple"
                    'KT_1' => $request->KT_1,
                    'KT_2' => $request->KT_2,
                    'KT_3' => $request->KT_3,
                    'KT_4' => $request->KT_4,
                    'KT_5' => $request->KT_5,
                    'KT_6' => $request->KT_6,
                    'KT_7' => $request->KT_7,
                    'KT_8' => $request->KT_8,
                    'PD_1' => $request->PD_1,
                    'PD_2' => $request->PD_2,
                    'PD_3' => $request->PD_3,
                    'IPK_1' => $request->IPK_1,
                    'US_1' => $request->US_1,
                    'US_2' => $request->US_2,
                    'US_3' => $request->US_3,
                    'JK_1' => $request->JK_1,
                    'FG_1' => $request->FG_1,
                    'PL_1' => $request->PL_1,
                    'BS_1' => $request->BS_1,
            ]
        ]; 
        $response = $client->post("/predict_api", $options);
        $json = json_decode($response->getBody(), true, 512, JSON_BIGINT_AS_STRING);
        // echo $response->getBody();

        $jobseekers = Jobseeker::select(
                    DB::raw("CONCAT(kebutuhan,', ',nama_perusahaan) as kebutuhan"),'predict_id')
                    ->pluck('predict_id', 'kebutuhan')
                    ->all();
        // $jobseekers = \App\Jobseeker::all()->map(function ($predict_id) {
        //     return ['key' => $predict_id, 'value' => $predict_id];
        // })->pluck('value', 'key');
        
        $json2 = implode(", ", $json);

        // dd($json2,$jobseekers);

        foreach ($json as $key => $value) {
            // echo $value;
            foreach ($jobseekers as $predict_id => $kebutuhan) {
                if ($value==18) {
                    if ($value==$kebutuhan) {
                        // echo $predict_id;
                        // echo $kebutuhan;
                    }
                } 
                if ($value==9) {
                    if ($value==$kebutuhan) {
                        // echo $predict_id;
                        // echo $kebutuhan;
                    }
                } 
            }
        }
        
        // dd($predict_id);
        return view('transform.index',compact('json','jobseekers'));
    }

     /**
     * Display the specified resource.
     *
     * @param  int  $id_jobseeker
     * @return \Illuminate\Http\Response
     */
    public function show($id_jobseeker)
    {
        $jobseeker = Jobseeker::find($id_jobseeker);
        return view('/tranform/show',compact('jobseeker'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $tranform = $tranform = DB::table('transforms')
                    ->where('user_id', Auth::user()->id)
                    ->get();
        return view('transform.create',compact('tranform'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function getDistance()
    {
        $client = new \GuzzleHttp\Client(["base_uri" => "http://localhost:5000/"]);
        // $request = $client->get('http://localhost:5000/');
        $response = $client->get("/");
        
        echo $response->getBody();
    
        dd($response);
    }

    public function getPredict()
    {
        $client = new \GuzzleHttp\Client(["base_uri" => "http://localhost:5000/"]);
        $options = [
            'json' => [
                // "fruit" => "apple"
                    'KT_1' => 1,
                    'KT_2' => 2,
                    'KT_3' => 3,
                    'KT_4' => 4,
                    'KT_5' => 5,
                    'KT_6' => 6,
                    'KT_7' => 7,
                    'KT_8' => 8,
                    'PD_1' => 9,
                    'PD_2' => 10,
                    'PD_3' => 11,
                    'IPK_1' => 12,
                    'US_1' => 13,
                    'US_2' => 14,
                    'US_3' => 15,
                    'JK_1' => 16,
                    'FG_1' => 17,
                    'PL_1' => 18,
                    'BS_1' => 19,
            ]
        ]; 
        $response = $client->post("/predict_api", $options);
        $json = json_decode($response->getBody());
        // echo $response->getBody();
        // dd($json);
        return view('transform.index',compact('json'));
    }
}
