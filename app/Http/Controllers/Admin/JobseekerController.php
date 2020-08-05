<?php

namespace App\Http\Controllers\Admin;

use Session;
use App\Jobseeker;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Imports\JobseekerImport;
use Maatwebsite\Excel\Facades\Excel;

class JobseekerController extends Controller
{
    /**
     * Only Authenticated users for "admin" guard 
     * are allowed.
     * 
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth:admin');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $jobseeker = Jobseeker::latest()
                    ->paginate(5);

        $rank = $jobseeker->firstItem();

        return view('admin.jobseeker.index',compact('jobseeker','rank'));
    }

    public function import_excel(Request $request) 
	{
		// validasi
		$this->validate($request, [
			'file' => 'required|mimes:csv,xls,xlsx'
		]);
 
		// menangkap file excel
		$file = $request->file('file');
 
		// membuat nama file unik
		$nama_file = rand().$file->getClientOriginalName();
 
		// upload ke folder file_jobseeker di dalam folder public
		$file->move('file_jobseeker',$nama_file);
 
		// import data
		Excel::import(new JobseekerImport, public_path('/file_jobseeker/'.$nama_file));
 
		// notifikasi dengan session
		Session::flash('sukses','Data Jobseeker Berhasil Diimport!');
 
		// alihkan halaman kembali
		return redirect('/admin/jobseeker');
	}

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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
     * Display the specified resource.
     *
     * @param  \App\Jobseeker  $jobseeker
     * @return \Illuminate\Http\Response
     */
    public function show(Jobseeker $jobseeker)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Jobseeker  $jobseeker
     * @return \Illuminate\Http\Response
     */
    public function edit(Jobseeker $jobseeker)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Jobseeker  $jobseeker
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Jobseeker $jobseeker)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Jobseeker  $jobseeker
     * @return \Illuminate\Http\Response
     */
    public function destroy(Jobseeker $jobseeker)
    {
        //
    }
}
