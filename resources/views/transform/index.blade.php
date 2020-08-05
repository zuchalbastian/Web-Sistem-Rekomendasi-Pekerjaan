@extends('layouts3.appresume')
 
@section('content')
<div class="app flex-row align-items-center" style="min-height:83vh;">
  <div class="container">
    <div class="panel-heading" style="margin:1rem">
      <div class="d-md-down-none" style="background-color:none;">
        {{-- <div class="card-body">
            <h2></h2>
            <h3><b>Here’s what you need to know:</b></h3>
            <h4><p>This page is a Prediction Results Page.</p></h4>
            <h4><p></p></h4>
        </div> --}}
      </div>

      <div class="panel-body" >
              @foreach ($json as $key => $value)
                {{-- // echo $value; --}}
                @foreach ($jobseekers as $predict_id => $kebutuhan)
                    @if ($value==1)
                        @if ($value==$kebutuhan)
                          <div class="row">
                            <div class="col-md-4">
                              <div class="card-body pb-0">
                                <table class="table table-bordered table-hover">
                                  <tr>
                                    <td style="padding:10px 10px 0px"><h5><a href="#" data-toggle="modal" data-target="#modalKomker" style="color:purple;">{{ $predict_id }}</a></h5></td>
                                  </tr>
                                </table>
                              </div>
                            </div>
                        </div>
                        @endif
                    @elseif($value==2)
                        @if ($value==$kebutuhan)
                          <div class="row">
                            <div class="col-md-4">
                              <div class="card-body pb-0">
                                <table class="table table-bordered table-hover">
                                  <tr>
                                    <td style="padding:10px 10px 0px"><h5><a href="#" style="color:purple;">{{ $predict_id }}</a></h5></td>
                                  </tr>
                                </table>
                              </div>
                            </div>
                        </div>
                        @endif
                    @elseif($value==6)
                      @if ($value==$kebutuhan)
                        <div class="row">
                          <div class="col-md-4">
                            <div class="card-body pb-0">
                              <table class="table table-bordered table-hover">
                                <tr>
                                  <td style="padding:10px 10px 0px"><h5><a href="#" style="color:purple;">{{ $predict_id }}</a></h5></td>
                                </tr>
                              </table>
                            </div>
                          </div>
                        </div>
                      @endif
                    @elseif($value==9)
                      @if ($value==$kebutuhan)
                        <div class="row">
                          <div class="col-md-4">
                            <div class="card-body pb-0">
                              <table class="table table-bordered table-hover">
                                <tr>
                                  <td style="padding:10px 10px 0px"><h5><a href="#" style="color:purple;">{{ $predict_id }}</a></h5></td>
                                </tr>
                              </table>
                            </div>
                          </div>
                        </div>
                      @endif
                    @elseif($value==11)
                      @if ($value==$kebutuhan)
                        <div class="row">
                          <div class="col-md-4">
                            <div class="card-body pb-0">
                              <table class="table table-bordered table-hover">
                                <tr>
                                  <td style="padding:10px 10px 0px"><h5><a href="#" style="color:purple;">{{ $predict_id }}</a></h5></td>
                                </tr>
                              </table>
                            </div>
                          </div>
                        </div>
                      @endif
                    @elseif($value==14)
                      @if ($value==$kebutuhan)
                        <div class="row">
                          <div class="col-md-4">
                            <div class="card-body pb-0">
                              <table class="table table-bordered table-hover">
                                <tr>
                                  <td style="padding:10px 10px 0px"><h5><a href="#" style="color:purple;">{{ $predict_id }}</a></h5></td>
                                </tr>
                              </table>
                            </div>
                          </div>
                        </div>
                      @endif
                    @elseif($value==15)
                      @if ($value==$kebutuhan)
                        <div class="row">
                          <div class="col-md-4">
                            <div class="card-body pb-0">
                              <table class="table table-bordered table-hover">
                                <tr>
                                  <td style="padding:10px 10px 0px"><h5><a href="#" style="color:purple;">{{ $predict_id }}</a></h5></td>
                                </tr>
                              </table>
                            </div>
                          </div>
                        </div>
                      @endif
                    @elseif($value==18)
                      @if ($value==$kebutuhan)
                        <div class="row">
                          <div class="col-md-4">
                            <div class="card-body pb-0">
                              <table class="table table-bordered table-hover">
                                <tr>
                                  <td style="padding:10px 10px 0px"><h5><a href="#" style="color:purple;">{{ $predict_id }}</a></h5></td>
                                </tr>
                              </table>
                            </div>
                          </div>
                        </div>
                      @endif
                    @elseif($value==23)
                      @if ($value==$kebutuhan)
                        <div class="row">
                          <div class="col-md-4">
                            <div class="card-body pb-0">
                              <table class="table table-bordered table-hover">
                                <tr>
                                  <td style="padding:10px 10px 0px"><h5><a href="#" style="color:purple;">{{ $predict_id }}</a></h5></td>
                                </tr>
                              </table>
                            </div>
                          </div>
                        </div>
                      @endif
                    @endif
                @endforeach
              @endforeach
        
        {{-- @foreach ($json as $r)
          @if ($r == 1)
              <h2 style="color:red;">Android/Mobile</h2>
          @elseif($r == 2)
              <h2 style="color:blue;">Backend</h2>
          @elseif($r == 6)
              <h2 style="color:green;">rontend</h2>
          @elseif($r == 9)
              <h2 style="color:brown;">IT</h2>
          @elseif($r == 11)
              <h2 style="color:gray;">IT/Technical Support</h2>
          @elseif($r == 14)
              <h2 style="color:orange;">Senior </h2>
          @elseif($r == 15)
              <h2 style="color:purple;">Laravel/WEB </h2>
          @elseif($r == 19)
              <h2 style="color:pink;">Programmer </h2>
          @elseif($r == 23)
              <h2 style="color:black;">Developer</h2>
          @endif
        @endforeach --}}
      </div>
    
    </div>
  </div>
</div>


@endsection