@extends('layouts3.app2')
 
@section('content')
<div class="app flex-row align-items-right" style="min-height:70vh;">
    <div class="container">  
    
        <div class="row">
            <div class="col-lg-12 margin-tb">
                <div class="pull-right">
                    <a class="btn" href="{{ URL('/pendidikan/create') }}"> 
                        <i class="nav-icon icon-note"></i> New
                    </a>
                </div>
            </div>
        </div>
    
        @if ($message = Session::get('success'))
            <div class="alert alert-success">
                <p>{{ $message }}</p>
            </div>
        @endif
  
        <div class="panel panel-info">
            <div class="panel-heading">
                <center>
                    <h1>
                        Pendidikan
                    </h1>
                </center>
            </div>

            <div class="panel-body">
                <div class="table-responsive">
                    <table class="table table-bordered">
                        <tr>
                            <th>No</th>
                            <th width="180px">Nama Sekolah</th>
                            <th>Alamat Sekolah</th>
                            <th>Pendidikan Terakhir</th>
                            <th>Indeks Prestasi Kumulatif</th>
                            <th>Bidang Studi</th>
                            <th width="100px">Mulai Masuk</th>
                            <th width="100px">Akhir Kelulusan</th>
                            <th width="180px">Action</th>
                        </tr>
                        
                        @foreach ($school as $schools)
                        <tr>
                            <td>{{ $rank++ }}</td>
                            <td>{{ $schools->nama_sekolah }}</td>
                            <td>{{ $schools->alamat_sekolah }}</td>
                            <td>{{ $schools->get_degree->name_degrees  }}</td>
                            <td>{{ $schools->ipk }}</td>
                            <td>{{ $schools->bidang_studi}}</td>
                            <td>{{ $schools->tgl_mulai_kelulusan }}</td>
                            <td>{{ $schools->tgl_akhir_kelulusan }}</td>
                            <td>
                                <form>
                
                                    {{-- <a class="btn btn-info" href="{{ URL('/pendidikan/show',$schools->id_school) }}">Show</a> --}}
                    
                                    <a class="btn btn-primary" href="{{ URL('/pendidikan/edit',$schools->id_school) }}">Edit</a>

                                    <a class="btn btn-danger" onclick="return confirm('Are you sure?')" href="{{ URL('/pendidikan/destroy',$schools->id_school) }}">Delete</a>
                
                                    @csrf
                                    {{-- @method('DELETE') --}}
                                </form>
                            </td>
                        </tr>
                        @endforeach
                    </table>
                </div>
                {!! $school->render() !!} 
            </div>
        </div>
        
    </div>
</div>
<div class="d-flex justify-content-between" style="margin:1rem">
    <div class="p-2 bd-highlight">
      {{-- <a type="button" class="btn btn-outline-success btn-lg btn-block" href="/resume/create">
        Back
      </a> --}}
    </div>
    <div class="p-2 bd-highlight">
      <a type="button" class="btn btn-primary active btn-lg btn-block" href="/resume">
        Next
      </a>
    </div>
</div>
    {{-- {!! $school->links() !!} --}}
    
@endsection