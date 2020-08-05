@extends('layouts3.app2')
   
@section('content')
<div class="app flex-row align-items-right" style="min-height:83vh;">
    <div class="container">  
    
        <div class="row">
            <div class="col-lg-12 margin-tb">
                <div class="pull-right" style="margin:1rem">
                    <a class="btn" href="{{ URL('/skill') }}"> 
                        <i class="nav-icon icon-arrow-left-circle"></i> Back: Skill Index
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
    
        <form action="{{ URL('/skill/update',$skills->id_rating) }}" method="POST" class="horizontal">
            @csrf
            {{-- @method('PUT') --}}
            <input type="hidden" name="id_rating" value="{{ $skills->id_rating }}">
            <input type="hidden" name="user_id" value={{ Auth::user()->id }}> 
            <div class="row justify-content-center">
                <div class="col-md-6">
                    <div class="card">
                        <div class="card-header">
                            <h4>
                                <strong>Edit</strong>
                                Kemampuan
                            </h4>
                        </div>
                        <div class="card-body"> 
                            <div class="row">
                                <div class="form-group col-sm-6">
                                    <label for="name_rating">Skill</label>
                                    {{-- <input type="text" class="form-control" name="name_rating" id="name_rating" value="{{ $skills->name_rating }}" placeholder="Kemampuan"> --}}
                                    <select id="name_rating" name="name_rating" class="form-control"> 
                                        <option value="">Select</option>
                                        @foreach ($ability as $id_ability => $name_ability)
                                            <option value="{{ $id_ability }}"
                                                @if ($id_ability==$skills->name_rating)
                                                    selected
                                                @endif
                                            >
                                                {{ $name_ability }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group col-sm-6">
                                    <label for="nama_belakang">Rating</label>
                                    <div class="my-rating" data-rating="{{ $skills->rating }}" id="rating2"></div> 
                                    {{-- <span class="result">0</span> --}}
                                    <input type="hidden" name="rating" value="{{$skills->rating}}">
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
    </div>
</div>
@endsection