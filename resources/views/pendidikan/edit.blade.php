@extends('layouts3.app2')
   
@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-right">
                <a class="btn" href="{{ URL('/pendidikan') }}"> 
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
  
    <form action="{{ URL('/pendidikan/update',$school->id_school) }}" method="POST">
        @csrf
        {{-- @method('PUT') --}}
        <input type="hidden" name="id_school" value={{ $school->id_school }}>
        <input type="hidden" name="user_id" value={{ Auth::user()->id }}> 
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header">
                        <h4>
                            <strong>Edit</strong>
                            Pendidikan
                        </h4>
                    </div>
                    <div class="card-body">                 
                        <div class="row">
                          <div class="form-group col-sm-6">
                            <label for="nama_depan">Nama Sekolah</label>
                            <input type="text" class="form-control" name="nama_sekolah" id="nama_sekolah" value="{{ $school->nama_sekolah }}" placeholder="Nama Sekolah">
                          </div>
                          <div class="form-group col-sm-6">
                            <label for="nama_belakang">Alamat Sekolah</label>
                            <input type="text" class="form-control" name="alamat_sekolah" id="alamat_sekolah" value="{{ $school->alamat_sekolah }}" placeholder="Alamat Sekolah">
                          </div>
                        </div>
    
                        <div class="row">
                            <div class="form-group col-sm-6">
                                <label for="profesi">Pendidikan Terakhir</label>
                                    <select id="gelar" name="gelar" class="form-control" onchange="showDiv('hidden_div', this)"> 
                                        <option value="">Select</option>
                                                {{-- @foreach ($degree as $id_degrees => $name_degrees)
                                                    <option value="{{ $id_degrees }}">
                                                        {{ $name_degrees }}
                                                    </option>
                                                @endforeach --}}
                                                @foreach ($degree as $id_degrees => $name_degrees)
                                                    <option value="{{ $id_degrees }}"
                                                        @if ($id_degrees==$school->gelar)
                                                            selected
                                                        @endif
                                                    >
                                                        {{ $name_degrees }}
                                                    </option>
                                                @endforeach
                                    </select>
                            </div>
                            <div class="form-group col-sm-6" id="hidden_div">
                                <label for="ipk">IPK</label>
                                <input type="text" class="form-control" name="ipk" id="ipk" value="{{ $school->ipk }}" placeholder="IPK">
                            </div>
                        </div>
                        
                        <div class="form-group">
                            <label for="bidang_studi">Bidang Studi</label>
                            <input type="text" class="form-control" name="bidang_studi" id="bidang_studi" value="{{ $school->bidang_studi }}" placeholder="Bidang Studi" >
                        </div>
    
                        <div class="row">
                          <div class="form-group col-sm-6">
                            <label for="tgl_mulai_kelulusan">Mulai Masuk</label>
                            <input type="month" class="form-control" name="tgl_mulai_kelulusan" id="tgl_mulai_kelulusan" value="{{ $school->tgl_mulai_kelulusan }}">
                          </div>
                          <div class="form-group col-sm-6">
                            <label for="tgl_akhir_kelulusan">Akhir Kelulusan</label>
                            <input type="month" class="form-control" name="tgl_akhir_kelulusan" id="tgl_akhir_kelulusan" value="{{ $school->tgl_akhir_kelulusan }}">
                          </div>
                        </div>
    
                    </div>
                    <div class="card-footer">
                        <button type="submit " class="btn btn-sm btn-primary "><i class="fa fa-dot-circle-o "></i> Submit</button>
                        {{-- <button onclick="document.getElementById('myForm').reset();" type="reset " class="btn btn-sm btn-danger "><i class="fa fa-ban "></i> Reset</button> --}}
                    </div>
                </div>
            </div>
        </div> 
    </form>
@endsection