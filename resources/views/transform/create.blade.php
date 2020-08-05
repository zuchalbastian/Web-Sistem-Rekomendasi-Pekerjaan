@extends('layouts3.appresume')
 
@section('content')
<div class="app flex-row align-items-center" style="min-height:83vh;">
  <div class="container">
    <div class="py-5 d-md-down-none" style="width:60%; height:75%; background-color:none;">
      <div class="card-body">
          {{-- <h2>Results page</h2> --}}
          <h3><b>Here’s what you need to know:</b></h3>
          <h4><p>Do you want to find out your resume that matches the job, please click the next button!</p></h4>
          {{-- <h4><p>The results are used to match the data with the data train.</p></h4> --}}
      </div>
    </div> 
    @foreach ($tranform as $t)
    <form action="{{ URL('transform') }}" method="POST" class="horizontal">
      @csrf
      {{-- <input type="hidden" name="id_transforms" value="{{ $tranform->id_transforms }}"> --}}
      <div class="row" style="display:none;">
        <input type="text" name="KT_1" placeholder="KT_1" required="required" value="{{ $t->KT_1 }}" />
        <input type="text" name="KT_2" placeholder="KT_2" required="required" value="{{ $t->KT_2 }}"/>
        <input type="text" name="KT_3" placeholder="KT_3" required="required" value="{{ $t->KT_3 }}"/>
        <input type="text" name="KT_4" placeholder="KT_4" required="required" value="{{ $t->KT_4 }}"/>
        <input type="text" name="KT_5" placeholder="KT_5" required="required" value="{{ $t->KT_5 }}"/>
        <input type="text" name="KT_6" placeholder="KT_6" required="required" value="{{ $t->KT_6 }}"/>
        <input type="text" name="KT_7" placeholder="KT_7" required="required" value="{{ $t->KT_7 }}"/>
        <input type="text" name="KT_8" placeholder="KT_8" required="required" value="{{ $t->KT_8 }}"/>
        <input type="text" name="PD_1" placeholder="PD_1" required="required" value="{{ $t->PD_1 }}"/>
        <input type="text" name="PD_2" placeholder="PD_2" required="required" value="{{ $t->PD_2 }}"/>
        <input type="text" name="PD_3" placeholder="PD_3" required="required" value="{{ $t->PD_3 }}"/>
        <input type="text" name="IPK_1" placeholder="IPK_1" required="required" value="{{ $t->IPK_1 }}"/>
        <input type="text" name="US_1" placeholder="US_1" required="required" value="{{ $t->US_1 }}"/>
        <input type="text" name="US_2" placeholder="US_2" required="required" value="{{ $t->US_2 }}"/>
        <input type="text" name="US_3" placeholder="US_3" required="required" value="{{ $t->US_3 }}"/>
        <input type="text" name="JK_1" placeholder="JK_1" required="required" value="{{ $t->JK_1 }}"/>
        <input type="text" name="FG_1" placeholder="FG_1" required="required" value="{{ $t->FG_1 }}"/>
        <input type="text" name="PL_1" placeholder="PL_1" required="required" value="{{ $t->PL_1 }}"/>
        <input type="text" name="BS_1" placeholder="BS_1" required="required" value="{{ $t->BS_1 }}"/>
        {{-- <button type="submit" class="btn btn-primary">Predict</button> --}}
      </div>    
      <div class="d-flex justify-content-between">
        <div class="p-2 bd-highlight">
            {{-- <a type="button" class="btn btn-outline-success btn-lg btn-block" href="/skill/create">
            Back
            </a> --}}
        </div>
        <div class="p-2 bd-highlight">
            <button type="submit" class="btn-lg btn-dark">Next</button>
        </div>
      </div>
    </form><br><br>
    @endforeach


    {{-- <div class="d-flex justify-content-between" style="margin:1rem">
      <div class="p-2 bd-highlight">
        <a type="button" class="btn btn-outline-success btn-lg btn-block" href="/home">
          Back
        </a>
      </div>
      <div class="p-2 bd-highlight">
        <a type="button" class="btn btn-primary active btn-lg btn-block" href="/home">
          Next
        </a>
      </div>
    </div> --}}

  </div>
</div>


@endsection