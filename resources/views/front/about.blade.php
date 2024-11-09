@extends('layouts.front')

@section('title', 'Tentang Kami')

@section('content')
    {{-- Banner --}}
    <div class="banner bg-charity2">
        <div class="container">
            <h2 class="fa-2x text-white">Tentang Kami</h2>
        </div>
    </div>

    {{-- Tentang Kami --}}
    <div class="tentang-kami bg-white">
        <div class="container py-5">
            <div class="row">
                <div class="col-lg-12 text-justify">
                    <h3 class="mt-4">VISI & MISI PEDULI YATIM PENS ITS</h3>
                    {{-- Additional Content Here --}}

                    <h4 class="mt-4">Struktur Organisasi</h4>
                    <div class="org-chart">
                        <ul>
                            <li>
                                <img src="{{ asset('public/img/foto.png') }}" alt="Moga Kurniajaya"> Pengelola: Moga Kurniajaya
                                <ul>
                                    <li>
                                        <img src="{{ asset('public/img/foto.png') }}" alt="Agus Indra Gunawan"> Ka Div SDM: Agus Indra Gunawan
                                        <ul>
                                            <li><img src="{{ asset('public/img/foto.png') }}" alt="Agus Indra Gunawan"> Sub Div SDM 1: Agus Indra Gunawan</li>
                                            <li><img src="{{ asset('public/img/foto.png') }}" alt="Aris Eko S."> Sub Div SDM 2: Aris Eko S.</li>
                                            <li><img src="{{ asset('public/img/foto.png') }}" alt="Ismail"> Sub Div SDM 3: Ismail</li>
                                        </ul>
                                    </li>
                                    <li>
                                        <img src="{{ asset('public/img/foto.png') }}" alt="Bambang Purwanto"> Ka Div Humas: Bambang Purwanto
                                        <ul>
                                            <li><img src="{{ asset('public/img/foto.png') }}" alt="Bambang Purwanto"> Sub Div Humas: Bambang Purwanto</li>
                                        </ul>
                                    </li>
                                    <li>
                                        <img src="{{ asset('public/img/foto.png') }}" alt="Rengga Asmara"> Ka Div Swakelola: Rengga Asmara
                                    </li>
                                    <li>
                                        <img src="{{ asset('public/img/foto.png') }}" alt="Ardik Wijayanto"> Ka Div Zakat: Ardik Wijayanto
                                    </li>
                                    <li>
                                        <img src="{{ asset('public/img/foto.png') }}" alt="Achmad Djalaludin"> Ka Div ADM: Achmad Djalaludin
                                        <ul>
                                            <li><img src="{{ asset('public/img/foto.png') }}" alt="Achmad Djalaludin"> Sub Div ADM 1: Achmad Djalaludin</li>
                                            <li><img src="{{ asset('public/img/foto.png') }}" alt="Marno"> Sub Div ADM 2: Marno</li>
                                        </ul>
                                    </li>
                                    <li><img src="{{ asset('public/img/foto.png') }}" alt="Akh. Alimudin"> Akh. Alimudin</li>
                                    <li><img src="{{ asset('public/img/foto.png') }}" alt="M. Chusnan"> M. Chusnan</li>
                                    <li><img src="{{ asset('public/img/foto.png') }}" alt="Ach. Huzaini"> Ach. Huzaini</li>
                                </ul>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
