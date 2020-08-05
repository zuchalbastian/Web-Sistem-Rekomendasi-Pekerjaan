@extends('layouts3.app2')
  
@section('content')
<div class="app flex-row align-items-right" style="min-height:83vh;">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 margin-tb">
                <div class="pull-right" style="margin:1rem">
                    {{-- <a class="btn" href="{{ URL('/pengalaman') }}">
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
           
        <form action="{{ URL('/pengalaman/store') }}" id="myForm" method="POST" class="horizontal">
            @csrf
            <input type="hidden" name="user_id" value={{ Auth::user()->id }}> 
             <div class="row justify-content-center">
                <div class="col-md-6">
                    <div class="card">
                        <div class="card-header">
                            <h4>
                                <strong>Create New</strong>
                                Experience
                            </h4>
                        </div>
                        <div class="card-body">                 
                            <div class="row">
                              <div class="form-group col-sm-6">
                                <label for="freshgraduate">Fresh Graduate</label>
                                <div class="col-form-label">
                                    <div class="form-check form-check-inline mr-1">
                                      <input class="form-check-input" type="radio" id="inline-radio1" value="No" name="freshgraduate">
                                      <label class="form-check-label " for="inline-radio1 ">No</label>
                                    </div>
                                    <div class="form-check form-check-inline mr-1">
                                      <input class="form-check-input" type="radio" id="inline-radio1" value="Yes" name="freshgraduate">
                                      <label class="form-check-label " for="inline-radio1 ">Yes</label>
                                    </div>
                                </div>
                              </div>
                              <div class="form-group col-sm-6">
                                <label for="language">Bahasa Yang Dikuasai</label>
                                <div class="col-form-label">
                                    <div class="form-check form-check-inline mr-1">
                                      <input class="form-check-input" type="checkbox" id="inline-radio1" value="Bahasa Indonesia" name="language[]">
                                      <label class="form-check-label " for="inline-radio1 ">Bahasa Indonesia</label>
                                    </div>
                                    <div class="form-check form-check-inline mr-1">
                                      <input class="form-check-input" type="checkbox" id="inline-radio1" value="Bahasa Inggris" name="language[]">
                                      <label class="form-check-label " for="inline-radio1 ">Bahasa Inggris</label>
                                    </div>
                                </div>
                              </div>
                            </div>
        
                            <div class="row">
                                <div class="form-group col-sm-6">
                                    <label for="programming">Pengalaman Dalam Bahasa Pemrograman</label>
                                        <select id="programming" name="programming" class="form-control"> 
                                            <option value="">Select</option>
                                            @foreach ($experience as $id_programming => $name_programming)
                                                <option value="{{ $id_programming }}">{{ $name_programming }}</option>
                                            @endforeach
                                        </select>
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
              <a type="button" class="btn btn-outline-success btn btn-block" href="/skill/create">
                Back
              </a>
            </div>
            <div class="p-2 bd-highlight">
              <a type="button" class="btn btn-primary active btn btn-block" href="/resume">
                Next & Show : Resume
              </a>
            </div>
        </div>
    </div>
</div>

@endsection