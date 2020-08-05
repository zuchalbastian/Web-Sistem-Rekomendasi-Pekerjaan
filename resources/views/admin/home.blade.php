@extends('admin.layout.app')

@section('content')
<div class="app flex-row align-items-right" style="min-height:83vh;">
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-right">
                {{-- <a class="btn" href="#"> 
                    <i class="nav-icon icon-note"></i> New
                </a> --}}
            </div>
        </div>
    </div>

    <div class="container">
        <div class="row justify-content-center" style="margin:1rem">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Admin</div>

                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif

                        You are logged in! Admin
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
