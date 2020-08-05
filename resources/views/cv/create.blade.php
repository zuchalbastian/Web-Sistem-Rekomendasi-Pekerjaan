@extends('layouts3.appresume')
 
@section('content')
<div class="app flex-row align-items-center" style="min-height:83vh;">
  <div class="container">
    <div class="panel-heading" style="margin:2rem">
      <center>
          <h1>
              How do you want start?
          </h1>
      </center>
    </div>
    <div class="row justify-content-center">
      <div class="col-md-4">
          <div class="card-group">
              <div class="card py-4" style="width:44%" onclick="location.href='/biodata/create';">
                  <div class="card-body text-center">
                    <div style="font-size:18px">
                      <div class="btn"> 
                        <i class="nav-icon icon-note" style="font-size:30px">
                          <div> Create New Resume </div><br>
                        </i> 
                      </div>
                      We will help you create a resume step-by-step.
                      {{-- <button type="button" class="btn btn-primary active mt-3">Register Now!</button> --}}
                    </div>
                  </div>
              </div>
          </div>
      </div>
    </div>
    <div class="d-flex justify-content-between" style="margin:1rem">
      <div class="p-2 bd-highlight">
        <a type="button" class="btn btn-outline-success btn-lg btn-block" href="/home">
          Back
        </a>
      </div>
      <div class="p-2 bd-highlight">
        <a type="button" class="btn btn-primary active btn-lg btn-block" href="/biodata/create">
          Next
        </a>
      </div>
    </div>
  </div>
</div>


@endsection