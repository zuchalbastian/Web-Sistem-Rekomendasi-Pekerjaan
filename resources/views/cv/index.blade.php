@extends('layouts3.appresume')
 
@section('content')
<div class="app flex-row align-items-right" style="min-height:83vh;">
    <div class="container">  
    
        <div class="row justify-content-center">
            <div class="col-md-7">
                <div class="panel panel-info">
                    <div class="panel-heading">
                        <center>
                            <h1>
                                Curriculum Vitae
                            </h1>
                        </center>
                    </div>
                    <div class="panel-body">
                        <div>
                            <table border="1" class="table table-bordered table-hover" onclick="">
                                @foreach ($biodata as $b)
                                <tr>
                                    <td></td>
                                    <td><h1>{{ $b->nama_depan }} {{ $b->nama_belakang }}</h1></td>
                                    <td></td>
                                </tr>
                                <tr>
                                    <td></td>
                                    <td style="font-size:23px"><i class="fa fa-user-secret" style="font-size:24px"></i>
                                        {{ $b->profesi }}
                                    </td>
                                    <td><i class="fa fa-calendar" style="font-size:24px" ></i> 
                                        {{ $b->usia }} Tahun
                                    </td>
                                </tr>
                                <tr>
                                    <td class="pointer" style="padding:0px;">
                                        <a class="btn" href="{{ URL('/biodata/edit',$b->id_biodata) }}">
                                            <i class="nav-icon icon-pencil"></i>
                                        </a>
                                    </td>
                                    <td><i class="fa fa-map-marker" style="font-size:24px" ></i> 
                                        {{ $b->alamat_lengkap }}
                                        {{ $b->kota }}, {{ $b->provinsi }}, {{ $b->kode_pos }}
                                    </td>
                                    <td><i class="fa fa-venus-mars" style="font-size:24px"></i>
                                        {{ $b->jenis_kelamin }}
                                    </td>
                                </tr>
                                <tr>
                                    <td></td>
                                    <td><i class="fa fa-phone" style="font-size:24px"></i>
                                        {{ $b->nomor_hp }}
                                    </td>
                                    <td><i class="fa fa-envelope" style="font-size:24px"></i>
                                        {{ $b->alamat_email }}
                                    </td>
                                </tr>
                                @endforeach
                            </table>  
                            <table border="1" class="table table-bordered table-hover">
                                <tr>
                                    <td style="width:20px; background-color:black; color:white;">
                                        <i class="fa fa-graduation-cap" style="font-size:26px"></i>
                                    </td> 
                                    <td>
                                        <h3 style="padding:3px 0px 0px;">Education</h3>
                                    </td>
                                    <td></td>
                                    <td class="pointer" style="padding:0px;">
                                        <a class="btn" href="{{ URL('/pendidikan') }}">
                                            <i class="nav-icon icon-pencil"></i>
                                        </a>
                                    </td>
                                </tr>
                                @foreach ($school as $s)
                                    <tr>
                                        <td></td>
                                        <td style="width:140px">{{ $s->tgl_mulai_kelulusan }} - {{ $s->tgl_akhir_kelulusan }}</td>
                                        <td>{{ $s->get_degree->name_degrees  }} {{ $s->bidang_studi}} 
                                            {{-- {{ $s->ipk}} --}}
                                        </td>
                                        <td></td>
                                    </tr>
                                    <tr>
                                        <td></td>
                                        <td></td>
                                        <td>{{ $s->nama_sekolah }} - {{ $s->alamat_sekolah }}</td>
                                        <td></td>
                                    </tr>
                                @endforeach
                            </table>
                            <table border="1" class="table table-bordered table-hover">
                                <tr>
                                    <td style="width:20px; background-color:black; color:white;">
                                        <i class="fa fa-puzzle-piece" style="font-size:26px"></i>
                                    </td> 
                                    <td><h3 style="padding:3px 0px 0px;">Skill</h3></td>
                                    <td></td>
                                    <td class="pointer" style="padding:0px;">
                                        <a class="btn" href="{{ URL('/skill') }}">
                                            <i class="nav-icon icon-pencil"></i>
                                        </a>
                                    </td>
                                </tr>
                                @foreach ($skill as $k)
                                    <tr>
                                        <td></td>
                                        <td style="width:140px">{{ $k->get_ability->name_ability }}</td>
                                        <td class="my-rating2" data-rating="{{  $k->rating  }}" style="width:450px"></td>
                                        <td></td>
                                        {{-- {{ $k->rating }}
                                        @if ($k->rating >=3)
                                            1
                                        @else
                                            0
                                        @endif --}}
                                    </tr>
                                @endforeach
                            </table>
                            <table border="1" class="table table-bordered table-hover">
                                <tr>
                                    <td style="width:20px; background-color:black; color:white;">
                                        <i class="fa fa-briefcase" style="font-size:26px"></i>
                                    </td> 
                                    <td><h3 style="padding:3px 0px 0px;">Experience</h3></td>
                                    <td></td>
                                @foreach ($experience as $e)
                                    <td class="pointer" style="padding:0px;">
                                        <a class="btn" href="{{ URL('/pengalaman/edit',$e->id_experience) }}">
                                            <i class="nav-icon icon-pencil"></i>
                                        </a>
                                    </td>
                                </tr>
                                {{-- @foreach ($experience as $e) --}}
                                    <tr>
                                        <td></td>
                                        <td style="width:140px">Fresh Graduate</td>
                                        <td style="width:450px">{{ $e->freshgraduate }}</td>
                                        <td></td>
                                    </tr>
                                    <tr>
                                        <td></td>
                                        <td style="width:140px">Experience in Programming Languages</td>
                                        <td style="width:450px">{{ $e->get_programming->name_programming }}</td>
                                        <td></td>
                                    </tr>
                                    <tr>
                                        <td></td>
                                        <td style="width:140px">Languages Mastered</td>
                                        <td style="width:450px">{{ $e->language }}</td>
                                        <td></td>
                                    </tr>
                                @endforeach
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="d-flex justify-content-between" style="margin:1rem">
            <div class="p-2 bd-highlight">
                {{-- <a type="button" class="btn btn-outline-success btn-block" href="/skill/create">
                Back
                </a> --}}
            </div>
            <div class="p-2 bd-highlight">
                <a type="button" class="btn btn-dark active btn-block" href="/convert">
                Next: Show Job Vacancy
                </a>
            </div>
        </div>
    </div>
</div>


@endsection