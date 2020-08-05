@extends('layouts3.app2')
  
@section('content')
<div class="row">
    <div class="col-lg-12 margin-tb">
        <div class="pull-right" style="margin:1rem">
            <a class="btn" href="{{ URL('/biodata') }}"> 
                <i class="nav-icon icon-arrow-left-circle"></i> Back: Education Index
            </a>
        </div>
    </div>
</div>
   
@if ($errors->any())
    <div class="alert alert-danger">
        <strong>Whoops!</strong> There were some problems with your input.<br><br>
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
@if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
@endif
   
<form action="{{ URL('/pendidikan/store') }}" id="myForm" method="POST" class="horizontal">
    @csrf
    <input type="hidden" name="user_id" value={{ Auth::user()->id }}> 
     <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card">
                <div class="card-header">
                    <h4>
                        <strong>Create New</strong>
                        Education
                    </h4>
                    <p align="justify" style="font-size: 12pt">Note: You can add more than one education,
                        which can be input in the education index page.
                    </p>
                </div>
                <div class="card-body">                 
                    <div class="row">
                      <div class="form-group col-sm-6">
                        <label for="nama_depan">Nama Sekolah</label>
                        <input type="text" class="form-control" name="nama_sekolah" id="nama_sekolah" placeholder="Nama Sekolah">
                      </div>
                      <div class="form-group col-sm-6">
                        <label for="nama_belakang">Alamat Sekolah</label>
                        <input type="text" class="form-control" name="alamat_sekolah" id="alamat_sekolah" placeholder="Alamat Sekolah">
                      </div>
                    </div>

                    <div class="row">
                        <div class="form-group col-sm-6">
                            <label for="profesi">Gelar</label>
                                <select id="gelar" name="gelar" class="form-control" onchange="showDiv('hidden_div', this)"> 
                                    <option value="">Select</option>
                                    @foreach ($school as $id_degrees => $name_degrees)
                                        <option value="{{ $id_degrees }}">{{ $name_degrees }}</option>
                                    @endforeach
                                        {{-- @foreach ($degree as $p)
                                            <option 
                                                value="{{ $p->id_degrees }}"
                                                @if ($p->id_degrees)
                                                    selected
                                                @endif
                                            >
                                                {{ $p->name_degrees }}
                                            </option>
                                        @endforeach --}}
                                </select>
                        </div>
                        <div class="form-group col-sm-6" id="hidden_div">
                            <label for="ipk">IPK</label>
                            <input type="text" class="form-control" name="ipk" id="ipk" placeholder="IPK">
                        </div>
                    </div>
                    
                    <div class="form-group">
                        <label for="bidang_studi">Bidang Studi</label>
                        <input type="text" class="form-control" name="bidang_studi" id="bidang_studi" placeholder="Bidang Studi">
                    </div>

                    <div class="row">
                      <div class="form-group col-sm-6">
                        <label for="tgl_mulai_kelulusan">Mulai Masuk</label>
                        <input type="month" class="form-control" name="tgl_mulai_kelulusan" id="tgl_mulai_kelulusan">
                      </div>
                      <div class="form-group col-sm-6">
                        <label for="tgl_akhir_kelulusan">Akhir Kelulusan</label>
                        <input type="month" class="form-control" name="tgl_akhir_kelulusan" id="tgl_akhir_kelulusan">
                      </div>
                    </div>

                </div>
                <div class="card-footer">
                    <button type="submit " class="btn btn-sm btn-primary "><i class="fa fa-dot-circle-o "></i> Submit</button>
                    <button onclick="document.getElementById('myForm').reset();" type="reset " class="btn btn-sm btn-danger "><i class="fa fa-ban "></i> Reset</button>
                </div>
            </div>
        </div>
    </div> 
</form>
<div class="d-flex justify-content-between" style="margin:1rem">
    <div class="p-2 bd-highlight">
      <a type="button" class="btn btn-outline-success btn btn-block" href="/biodata/create">
        Back
      </a>
    </div>
    <div class="p-2 bd-highlight">
      <a type="button" class="btn btn-primary active btn btn-block" href="/skill/create">
        Next: Skill
      </a>
    </div>
  </div>
@endsection