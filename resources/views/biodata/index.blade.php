@extends('layouts3.app')
 
@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-right">
                <a class="btn" href="{{ URL('/biodata/create') }}">
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
            Biodata
            </h1>
        </center>
    </div>

    <div class="panel-body">
        <div class="table-responsive">
            <table class="table table-bordered">
                <tr align="center">
                    <th>No</th>
                    <th>Nama Depan</th>
                    <th>Nama Belakang</th>
                    <th>Profesi</th>
                    <th>Usia</th>
                    <th>Jenis Kelamin</th>
                    <th>Alamat Lengkap</th>
                    <th>Kota</th>
                    <th>Provinsi</th>
                    <th>Kode Pos</th>
                    <th>Nomor HP</th>
                    <th>Alamat Email</th>
                    <th width="150px">Action</th>
                </tr>
                @foreach ($biodata as $biodatas)
                <tr align="center">
                    <td>{{ ++$i }}</td>
                    <td>{{ $biodatas->nama_depan }}</td>
                    <td>{{ $biodatas->nama_belakang }}</td>
                    <td>{{ $biodatas->profesi }}</td>
                    <td>{{ $biodatas->usia }}</td>
                    <td>{{ $biodatas->jenis_kelamin }}</td>
                    <td>{{ $biodatas->alamat_lengkap }}</td>
                    <td>{{ $biodatas->kota }}</td>
                    <td>{{ $biodatas->provinsi }}</td>
                    <td>{{ $biodatas->kode_pos }}</td>
                    <td>{{ $biodatas->nomor_hp }}</td>
                    <td>{{ $biodatas->alamat_email }}</td>
                    <td>
                        <form>
           
                            {{-- <a class="btn btn-info" href="{{ URL('/biodata/show',$biodatas->id_biodata) }}">Show</a> --}}
            
                            <a class="btn btn-primary" href="{{ URL('/biodata/edit',$biodatas->id_biodata) }}">Edit</a>
        
                            <a class="btn btn-danger" onclick="return confirm('Are you sure?')" href="{{ URL('/biodata/destroy',$biodatas->id_biodata) }}">Delete</a>
           
                            @csrf
                            {{-- @method('DELETE') --}}
                        </form>
                    </td>
                </tr>
                @endforeach
            </table>
        </div>
    </div>
</div>
  
    {!! $biodata->links() !!}
    
@endsection