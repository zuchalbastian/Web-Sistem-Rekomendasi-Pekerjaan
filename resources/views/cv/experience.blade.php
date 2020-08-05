@extends('layouts3.appresume')
 
@section('content')
<div class="app flex-row align-items-right" style="min-height:83vh;">
  <div class="container">   
    <div class="py-5 d-md-down-none" style="width:60%; height:75%; background-color:none;">
        <div class="card-body">
            <h2>Finally, let's work on your experience</h2>
            <h3><b>Here’s what you need to know:</b></h3>
            <h4><p>Your experience shows employers that you are entitled to their work.</p></h4>
            <h4><p>We will help you choose the experience that you want.</p></h4>
        </div>
    </div> 
    <div class="d-flex justify-content-between" style="margin:1rem">
        <div class="p-2 bd-highlight">
            <a type="button" class="btn btn-outline-success btn-lg btn-block" href="/skill/create">
            Back
            </a>
        </div>
        <div class="p-2 bd-highlight">
            <a type="button" class="btn btn-primary active btn-lg btn-block" href="/pengalaman/create">
            Next
            </a>
        </div>
    </div>
  </div>
</div>


@endsection