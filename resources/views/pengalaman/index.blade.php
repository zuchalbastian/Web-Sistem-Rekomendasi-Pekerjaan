@extends('layouts3.app2')

@section('content')
<div class="row">
    <div class="col-lg-12 margin-tb">
         <div class="pull-right">
            <a class="btn" href="{{ URL('/pengalaman/create') }}"> 
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
                Pengalaman
            </h1>
        </center>
    </div>

    <div class="panel-body">
        <div class="table-responsive">
            <table class="table table-bordered">
                <tr>
                    <th>Id</th>
                    <th>Fresh Graduate</th>
                    <th>Pengalaman Dalam Bahasa Pemrograman</th>
                    <th>Bahasa Yang Dikuasai</th>
                    <th width="280px">View</th>
                </tr>
                @php $no = 1; @endphp
                @foreach($experience as $e)
                <tr>
                    <td>{{ $no++ }}</td>
                    <td>{{ $e->freshgraduate }}</td>
                    <td>{{ $e->get_programming->name_programming }}</td>
                    <td>{{ $e->language }}</td>
                    <td>
                        <form>
   
                            {{-- <a class="btn btn-info" href="{{ URL('/skill/show',$p->id_rating) }}">Show</a> --}}
                        
                            <a class="btn btn-primary" href="{{ URL('/pengalaman/edit',$e->id_experience) }}">Edit</a>
                    
                            <a class="btn btn-danger" onclick="return confirm('Are you sure?')" href="{{ URL('/pengalaman/destroy',$e->id_experience) }}">Delete</a>
                       
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

@endsection