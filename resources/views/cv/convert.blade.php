@extends('layouts3.appresume')
 
@section('content')
<div class="app flex-row align-items-right" style="min-height:83vh;">
    <div class="container">
        <div class="py-2 d-md-down-none" style="width:60%; background-color:none;">
            <div class="card-body" style="padding:10px;">
                <h2>Job Vacancy Page</h2>
                <h3><b>Here’s what you need to know:</b></h3>
                <h4><p>This page will show some examples of job openings in this system.</p></h4>
            </div>
        </div> 
        <div style="width:100%; background-color:none;">
            <div class="card-body" style="padding:10px;">
                <img class="navbar-brand-full" src="{{ asset('loker/8.jpg') }}" width="200"> 
                <img class="navbar-brand-full" src="{{ asset('loker/2.jpg') }}" width="200"> 
                <img class="navbar-brand-full" src="{{ asset('loker/3.jpg') }}" width="200"> 
                <img class="navbar-brand-full" src="{{ asset('loker/4.jpg') }}" width="200"> 
                <img class="navbar-brand-full" src="{{ asset('loker/5.jpg') }}" width="200">     
            </div>
        </div>
            <div class="panel-body">
                <form action="{{ URL('/convert/store') }}" method="POST">
                    @csrf
                    <input type="hidden" name="user_id" value={{ Auth::user()->id }}> 
                    <div>
                        @foreach ($biodata as $b)
                            <div class="row">
                                <div class="col-md-6">
                                    <textarea id="textarea-input" name="JK_1" class="form-control" 
                                    {{-- placeholder="Content.." --}}
                                    {{-- @if ($b->jenis_kelamin=="Laki-Laki")
                                                Nilai 1
                                    @elseif($b->jenis_kelamin=="Perempuan")
                                                Nilai 2
                                    @endif --}}
                                    style="display:none;"
                                    >
                                        @if ($b->jenis_kelamin=="Laki-Laki")
                                            1
                                        @elseif($b->jenis_kelamin=="Perempuan")
                                            2
                                         @endif
                                    </textarea>
                                </div>
                                <div class="col-md-6">
                                    <textarea id="textarea-input" name="US_1" class="form-control" 
                                    {{-- placeholder="Content.." --}}
                                    style="display:none;"
                                    >
                                        @if ($b->usia <= 20)
                                           1
                                        @else
                                            0
                                        @endif
                                    </textarea>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <textarea id="textarea-input" name="US_2" class="form-control" 
                                    {{-- placeholder="Content.." --}}
                                    style="display:none;"
                                    >
                                        @if ($b->usia <= 30 )
                                            1
                                        @else
                                            0
                                        @endif
                                    </textarea>
                                </div>
                                <div class="col-md-6">
                                    <textarea id="textarea-input" name="US_3" class="form-control" 
                                    {{-- placeholder="Content.." --}}
                                    style="display:none;"
                                    >
                                        @if ($b->usia <= 35 )
                                           1
                                        @else
                                            0
                                        @endif
                                    </textarea>
                                </div>
                            </div>  
                        @endforeach
                        @foreach ($school as $s)
                            <div class="row">
                                <div class="col-md-3">
                                    <textarea id="textarea-input" name="PD_1" class="form-control"
                                    {{-- placeholder="Content.." --}}
                                    style="display:none;"
                                    >
                                        @if ($s->get_degree->name_degrees == "SMK")
                                            1
                                        @else
                                            0
                                        @endif 
                                    </textarea>
                                </div>
                                <div class="col-md-3">
                                    <textarea id="textarea-input" name="PD_2" class="form-control"
                                    {{-- placeholder="Content.." --}}
                                    style="display:none;"
                                    >
                                        @if ($s->get_degree->name_degrees == "D3")
                                            1
                                        @else
                                            0
                                        @endif  
                                    </textarea>
                                </div>
                                <div class="col-md-3">
                                    <textarea id="textarea-input" name="PD_3" class="form-control"
                                    {{-- placeholder="Content.." --}}
                                    style="display:none;"
                                    >
                                        @if ($s->get_degree->name_degrees == "S1")
                                            1
                                        @else
                                            0
                                        @endif  
                                    </textarea>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <textarea id="textarea-input" name="IPK_1" class="form-control"
                                {{-- placeholder="Content.." --}}
                                style="display:none;"
                                >
                                    @if ($s->ipk >= 3.00)
                                        1
                                    @else
                                        0
                                    @endif  
                                </textarea>
                            </div>
                        @endforeach
                        @foreach ($skill as $k)
                            <div class="row">
                                <div class="col-md-3">
                                     <textarea id="textarea-input" name="KT_1" class="form-control"
                                    {{-- placeholder="Content.." --}}
                                    style="display:none;"
                                    >
                                        @if ($k->get_ability->name_ability == "PHP")
                                            1
                                        @else
                                            0
                                        @endif
                                    </textarea>
                                </div>
                                <div class="col-md-3">
                                    <textarea id="textarea-input" name="KT_2" class="form-control"
                                    {{-- placeholder="Content.." --}}
                                    style="display:none;"
                                    >
                                        @if ($k->get_ability->name_ability == "Javascript")
                                            1
                                        @else
                                            0
                                        @endif
                                    </textarea>
                                </div>
                                <div class="col-md-3">
                                    <textarea id="textarea-input" name="KT_3" class="form-control"
                                    {{-- placeholder="Content.." --}}
                                    style="display:none;"
                                    >
                                        @if ($k->get_ability->name_ability == "Java")
                                            1
                                        @else
                                            0
                                        @endif
                                    </textarea>
                                </div>
                                <div class="col-md-3">
                                    <textarea id="textarea-input" name="KT_4" class="form-control"
                                    {{-- placeholder="Content.." --}}
                                    style="display:none;"
                                    >
                                        @if ($k->get_ability->name_ability == "SQL")
                                            1
                                        @else
                                            0
                                        @endif
                                    </textarea>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-3">
                                    <textarea id="textarea-input" name="KT_5" class="form-control"
                                    {{-- placeholder="Content.." --}}
                                    style="display:none;"
                                    >
                                        @if ($k->get_ability->name_ability == "C++")
                                            1
                                        @else
                                            0
                                        @endif
                                    </textarea>
                                </div>
                                <div class="col-md-3">
                                    <textarea id="textarea-input" name="KT_6" class="form-control"
                                    {{-- placeholder="Content.." --}}
                                    style="display:none;"
                                    >
                                        @if ($k->get_ability->name_ability == "HTML/CSS")
                                            1
                                        @else
                                            0
                                        @endif
                                    </textarea>
                                </div>
                                <div class="col-md-3">
                                    <textarea id="textarea-input" name="KT_7" class="form-control"
                                    {{-- placeholder="Content.." --}}
                                    style="display:none;"
                                    >
                                        @if ($k->get_ability->name_ability == "Python")
                                            1
                                        @else
                                            0
                                        @endif
                                    </textarea>
                                </div>
                                <div class="col-md-3">
                                    <textarea id="textarea-input" name="KT_8" class="form-control"
                                    {{-- placeholder="Content.." --}}
                                    style="display:none;"
                                    >
                                        @if ($k->get_ability->name_ability == "Framework")
                                            1
                                        @else
                                            0
                                        @endif
                                    </textarea>
                                </div>
                            </div>
                                {{-- @if ($k->get_ability->name_ability == "Python" || $k->get_ability->name_ability == "Javascript" )
                                    Nilai 1
                                @else
                                    Nilai 0
                                @endif --}}
                        @endforeach
                        @foreach ($experience as $e)
                            <div class="row">
                                <div class="col-md-3">
                                    <textarea id="textarea-input" name="FG_1" class="form-control"
                                        {{-- placeholder="Content.." --}}
                                        style="display:none;"
                                        >
                                        @if ($e->freshgraduate == "Yes")
                                            1
                                        @else
                                            0
                                        @endif
                                    </textarea>
                                </div>
                                <div class="col-md-3">
                                    <textarea id="textarea-input" name="PL_1" class="form-control"
                                    {{-- placeholder="Content.." --}}
                                    style="display:none;"
                                    >
                                    @if ($e->get_programming->name_programming == "Dibawah 1 Tahun") 
                                        0
                                    @elseif ($e->get_programming->name_programming == "1 - 3 Tahun")
                                        1
                                    @elseif ($e->get_programming->name_programming == "3 - 5 Tahun")
                                        2  
                                    @elseif ($e->get_programming->name_programming == "Lebih Dari 5 Tahun")
                                        3
                                    @endif
                                    </textarea>
                                </div>
                                <div class="col-md-3">
                                    <textarea id="textarea-input" name="BS_1" class="form-control"
                                    {{-- placeholder="Content.." --}}
                                    style="display:none;"
                                    >
                                    @if ($e->language == "Bahasa Indonesia,Bahasa Inggris" || $e->language == "Bahasa Inggris")
                                        1
                                    @else
                                        0
                                    @endif
                                    </textarea>
                                </div>
                            </div>
                        @endforeach
                    </div>
                    {{-- <div class="card-footer">
                        <button type="submit" class="btn btn-primary">Kirim</button>
                    </div>   --}}
                    <div class="d-flex justify-content-between">
                        <div class="p-2 bd-highlight">
                            {{-- <a type="button" class="btn btn-outline-success btn-lg btn-block" href="/skill/create">
                            Back
                            </a> --}}
                        </div>
                        <div class="bd-highlight" style="padding: 15px">
                            <button type="submit" class="btn btn-dark active btn-lg btn-block">Next</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

@endsection