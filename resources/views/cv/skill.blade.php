@extends('layouts3.appresume')
 
@section('content')
<div class="app flex-row align-items-right" style="min-height:83vh;">
  <div class="container">   
    <div class="py-5 d-md-down-none" style="width:60%; height:75%; background-color:none;">
        <div class="card-body">
            <h2>Next, let’s take care of your skills</h2>
            <h3><b>Here’s what you need to know:</b></h3>
            <h4><p>Employers scan skills for relevant keywords.</p></h4>
            <h4><p>We will help write your best skills.</p></h4>
        </div>
    </div> 
    <div class="d-flex justify-content-between" style="margin:1rem">
        <div class="p-2 bd-highlight">
            <a type="button" class="btn btn-outline-success btn-lg btn-block" href="/pendidikan/create">
            Back
            </a>
        </div>
        <div class="p-2 bd-highlight">
            <a type="button" class="btn btn-primary active btn-lg btn-block" href="/skill/create">
            Next
            </a>
        </div>
    </div>
  </div>
</div>


@endsection