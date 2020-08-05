@extends('layouts3.app2')
  
@section('content')
<div class="row">
    <div class="col-lg-12 margin-tb">
        <div class="pull-right" style="margin:1rem">
            {{-- <a class="btn" href="{{ URL('/biodata') }}">  --}}
                {{-- <i class="nav-icon icon-arrow-left-circle"></i> Back --}}
            {{-- </a> --}}
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
   
<form action="{{ URL('/biodata/store') }}" id="myForm" method="POST" class="horizontal">
    @csrf
     <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card">
                <div class="card-header">
                    <h4>
                        <strong>Create New</strong>
                        Biodata
                    </h4>
                </div>
                <div class="card-body"> 
                  <input type="hidden" name="user_id" value={{ Auth::user()->id }}>                
                    <div class="row">
                      <div class="form-group col-sm-6">
                        <label for="nama_depan">Nama Depan</label>
                        <input type="text" class="form-control" name="nama_depan" id="nama_depan" placeholder="Nama Depan">
                      </div>
                      <div class="form-group col-sm-6">
                        <label for="nama_belakang">Nama Belakang</label>
                        <input type="text" class="form-control" name="nama_belakang" id="nama_belakang" placeholder="Nama Belakang">
                      </div>
                    </div>

                    
                    <div class="form-group">
                        <label for="profesi">Profesi</label>
                        <input type="text" class="form-control" name="profesi" id="profesi" placeholder="Profesi">
                    </div>

                    <div class="row">
                      <div class="form-group col-sm-6">
                        <label for="usia">Usia</label>
                        <input type="text" class="form-control" name="usia" id="usia" placeholder="Usia">
                      </div>
                      <div class="form-group col-sm-6">
                        <label for="jenis_kelamin">Jenis Kelamin</label>
                        <div class="col-form-label">
                          <div class="form-check form-check-inline mr-1">
                            <input class="form-check-input" type="radio" id="inline-radio1" value="Laki-Laki" name="jenis_kelamin">
                            <label class="form-check-label " for="inline-radio1 ">Laki-Laki</label>
                          </div>
                          <div class="form-check form-check-inline mr-1">
                            <input class="form-check-input" type="radio" id="inline-radio1" value="Perempuan" name="jenis_kelamin">
                            <label class="form-check-label " for="inline-radio1 ">Perempuan</label>
                          </div>
                        </div>
                      </div>
                    </div>

                    <div class="form-group">
                        <label for="alamat_lengkap">Alamat Lengkap</label>
                        <input type="text" class="form-control" name="alamat_lengkap" id="alamat_lengkap" placeholder="Alamat Lengkap">
                    </div>


                    <div class="row">
                      <div class="form-group col-sm-5">
                        <label for="kota">Kota</label>
                        <input type="text" class="form-control" name="kota" id="kota" placeholder="Kota">
                      </div>
                      <div class="form-group col-sm-4">
                        <label for="provinsi">Provinsi</label>
                        <input type="text" class="form-control" name="provinsi" id="provinsi" placeholder="Provinsi">
                      </div>
                      <div class="form-group col-sm-3">
                        <label for="kode_pos">Kode Pos</label>
                        <input type="text" class="form-control" name="kode_pos" id="kode_pos" placeholder="Kode Pos">
                      </div>
                    </div>

                    <div class="row">
                      <div class="form-group col-sm-6">
                        <label for="kota">Nomor Hp</label>
                        <input type="text" class="form-control" name="nomor_hp" id="nomor_hp" placeholder="Nomor Hp">
                      </div>
                      <div class="form-group col-sm-6">
                        <label for="provinsi">Email</label>
                        <input type="text" class="form-control" name="alamat_email" id="alamat_email" placeholder="Alamat Email">
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
    <a type="button" class="btn btn-outline-success btn btn-block" href="/resume/create">
      Back
    </a>
  </div>
  <div class="p-2 bd-highlight">
    <a type="button" class="btn btn-primary active btn btn-block" href="/pendidikan/create">
      Next: Education 
    </a>
  </div>
</div> 
@endsection