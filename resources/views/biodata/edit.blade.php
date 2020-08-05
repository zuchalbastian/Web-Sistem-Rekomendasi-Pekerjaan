@extends('layouts3.app2')
   
@section('content')
<div>
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-right" style="margin:1rem">
                {{-- <a class="btn" href="{{ URL('/biodata') }}"> 
                    <i class="nav-icon icon-arrow-left-circle"></i> Back
                </a> --}}
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

    <form action="{{ URL('/biodata/update',$biodata->id_biodata) }}" method="POST">
        @csrf
        {{-- @method('PUT') --}}
        <input type="hidden" name="id_biodata" value={{ $biodata->id_biodata }}>
        <input type="hidden" name="user_id" value={{ Auth::user()->id }}> 
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header">
                        <h4>
                            <strong>Edit</strong>
                            Biodata
                        </h4>
                    </div>
                    <div class="card-body">                 
                        <div class="row">
                          <div class="form-group col-sm-6">
                            <label for="nama_depan">Nama Depan</label>
                            <input type="text" class="form-control" name="nama_depan" id="nama_depan" value="{{ $biodata->nama_depan }}" placeholder="Nama Depan">
                          </div>
                          <div class="form-group col-sm-6">
                            <label for="nama_belakang">Nama Belakang</label>
                            <input type="text" class="form-control" name="nama_belakang" id="nama_belakang" value="{{ $biodata->nama_belakang }}" placeholder="Nama Belakang">
                          </div>
                        </div>
    
                        <div class="form-group">
                            <label for="profesi">Profesi</label>
                            <input type="text" class="form-control" name="profesi" id="profesi" value="{{ $biodata->profesi }}" placeholder="Profesi">
                        </div>

                        <div class="row">
                            <div class="form-group col-sm-6">
                              <label for="usia">Usia</label>
                              <input type="text" class="form-control" name="usia" id="usia" placeholder="Usia" value="{{ $biodata->usia }}">
                            </div>
                            <div class="form-group col-sm-6">
                              <label for="jenis_kelamin">Jenis Kelamin</label>
                              <div class="col-form-label">
                                <div class="form-check form-check-inline mr-1">
                                  <input class="form-check-input" type="radio" id="inline-radio1" value="Laki-Laki" name="jenis_kelamin" {{ $biodata->jenis_kelamin == 'Laki-Laki' ? 'checked' : ''}}>
                                  <label class="form-check-label " for="inline-radio1 ">Laki-Laki</label>
                              </div>
                              <div class="form-check form-check-inline mr-1">
                                  <input class="form-check-input" type="radio" id="inline-radio1" value="Perempuan" name="jenis_kelamin" {{ $biodata->jenis_kelamin == 'Perempuan' ? 'checked' : ''}}>
                                  <label class="form-check-label " for="inline-radio1 ">Perempuan</label>
                              </div>
                              </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="alamat_lengkap">Alamat Lengkap</label>
                            <input type="text" class="form-control" name="alamat_lengkap" id="alamat_lengkap" value="{{ $biodata->alamat_lengkap }}" placeholder="Alamat Lengkap">
                        </div> 
    
                        <div class="row">
                          <div class="form-group col-sm-5">
                            <label for="kota">Kota</label>
                            <input type="text" class="form-control" name="kota" id="kota" value="{{ $biodata->kota }}" placeholder="Kota">
                          </div>
                          <div class="form-group col-sm-4">
                            <label for="provinsi">Provinsi</label>
                            <input type="text" class="form-control" name="provinsi" id="provinsi" value="{{ $biodata->provinsi }}" placeholder="Provinsi">
                          </div>
                          <div class="form-group col-sm-3">
                            <label for="kode_pos">Kode Pos</label>
                            <input type="text" class="form-control" name="kode_pos" id="kode_pos" value="{{ $biodata->kode_pos }}" placeholder="Kode Pos">
                          </div>
                        </div>
    
                        <div class="row">
                          <div class="form-group col-sm-6">
                            <label for="kota">Nomor Hp</label>
                            <input type="text" class="form-control" name="nomor_hp" id="nomor_hp" value="{{ $biodata->nomor_hp }}" placeholder="Nomor Hp">
                          </div>
                          <div class="form-group col-sm-6">
                            <label for="provinsi">Email</label>
                            <input type="text" class="form-control" name="alamat_email" id="alamat_email" value="{{ $biodata->alamat_email }}" placeholder="Alamat Email">
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
</div>
<div class="d-flex justify-content-between" style="margin:1rem">
  <div class="p-2 bd-highlight">
    {{-- <a type="button" class="btn btn-outline-success btn-lg btn-block" href="#">
      Back
    </a> --}}
  </div>
  <div class="p-2 bd-highlight">
    <a type="button" class="btn btn-primary active btn-block" href="/resume">
      Next
    </a>
  </div>
</div>

@endsection