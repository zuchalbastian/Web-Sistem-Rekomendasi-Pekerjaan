@extends('admin.layout.app')

@section('content')
<div class="app flex-row align-items-right" style="min-height:83vh;">
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-right">
                {{-- <a class="btn" href="#"> 
                    <i class="nav-icon icon-note"></i> New
                </a> --}}
            </div>
        </div>
    </div>

    <div class="container">
 
		{{-- notifikasi form validasi --}}
		@if ($errors->has('file'))
		<span class="invalid-feedback" role="alert">
			<strong>{{ $errors->first('file') }}</strong>
		</span>
		@endif
 
		{{-- notifikasi sukses --}}
		@if ($sukses = Session::get('sukses'))
		<div class="alert alert-success alert-block">
			<button type="button" class="close" data-dismiss="alert">×</button> 
			<strong>{{ $sukses }}</strong>
		</div>
		@endif
 
		<!-- Import Excel -->
		<div class="modal fade" id="importExcel" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
			<div class="modal-dialog" role="document">
				<form method="post" action="{{ route('jobseeker.import') }}" enctype="multipart/form-data">
					<div class="modal-content">
						<div class="modal-header">
							<h5 class="modal-title" id="exampleModalLabel">Import Excel</h5>
						</div>
						<div class="modal-body">
 
							{{ csrf_field() }}
 
							<label>Pilih file excel</label>
							<div class="form-group">
								<input type="file" name="file" required="required">
							</div>
 
						</div>
						<div class="modal-footer">
							<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
							<button type="submit" class="btn btn-primary">Import</button>
						</div>
					</div>
				</form>
			</div>
		</div>
 
        
		
		{{-- <a href="/jobseeker/export_excel" class="btn btn-success my-3" target="_blank">EXPORT EXCEL</a> --}}
        <div class="panel panel-info">
            <div class="panel-heading">
                <center>
                    <h1>
                        Import Excel Ke Database
                    </h1>
                </center>
            </div>
            <div class="mr-5">
                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#importExcel">
                    IMPORT EXCEL
                </button>
            </div><br>

            <div class="panel-body">
                <div class="table-responsive">
                    <table class="table table-bordered">
                        <thead>
                            <tr align="center">
                                <th>No</th>
                                <th>Predict_id</th>
                                <th>Kebutuhan</th>
                                <th>Nama Perusahaan</th>
                                <th>Kemampuan</th>
                                <th>Pendidikan</th>
                                <th>Usia</th>
                                <th>Jenis Kelamin</th>
                                <th>Pengalaman</th>
                                <th>Bahasa</th>
                                <th>Kemampuan Khusus</th>
                                <th>Domisili</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($jobseeker as $s)
                            <tr>
                                <td>{{ $rank++ }}</td>
                                <td>{{$s->predict_id}}</td>
                                <td>{{$s->kebutuhan}}</td>
                                <td>{{$s->nama_perusahaan}}</td>
                                <td>{{$s->kemampuan}}</td>
                                <td>{{$s->pendidikan}}</td>
                                <td>{{$s->usia}}</td>
                                <td>{{$s->jenis_kelamin}}</td>
                                <td>{{$s->pengalaman}}</td>
                                <td>{{$s->bahasa}}</td>
                                <td>{{$s->kemampuan_khusus}}</td>
                                <td>{{$s->domisili}}</td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                {!! $jobseeker->render() !!} 
            </div>
        </div>
    </div>
</div>
@endsection
