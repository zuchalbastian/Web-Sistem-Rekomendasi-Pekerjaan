@extends('layouts3.app2')

@section('content')
<div class="app flex-row align-items-right" style="min-height:70vh;">
    <div class="container">  
        <div class="row">
            <div class="col-lg-12 margin-tb">
                <div class="pull-right">
                    <a class="btn" href="{{ URL('/skill/create') }}"> 
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
                        Kemampuan
                    </h1>
                </center>
            </div>
 
            <div class="panel-body">
                <div class="table-responsive">
                    <table class="table table-bordered">
                        <tr>
                            <th>No</th>
                            <th>Kemampuan</th>
                            <th>Rating</th>
                            <th width="280px">View</th>
                        </tr>
                        @foreach($skills as $p)
                        <tr>
                            <td>{{ $rank++ }}</td>
                            <td>{{ $p->get_ability->name_ability }}</td>
                            <td class="my-rating2" data-rating="{{  $p->rating  }}" >
                                {{-- value="{{  $p->rating  }}" --}}
                            </td>
                            <td>
                                <form>
        
                                    {{-- <a class="btn btn-info" href="{{ URL('/skill/show',$p->id_rating) }}">Show</a> --}}
                                
                                    <a class="btn btn-primary" href="{{ URL('/skill/edit',$p->id_rating) }}">Edit</a>
                            
                                    <a class="btn btn-danger" onclick="return confirm('Are you sure?')" href="{{ URL('/skill/destroy',$p->id_rating) }}">Delete</a>
                            
                                    @csrf
                                    {{-- @method('DELETE') --}}
                                </form>
                            </td>        
                        </tr>
                        @endforeach
                    </table>
                </div>
                {!! $skills->render() !!} 
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
@endsection