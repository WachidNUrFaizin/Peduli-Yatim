@extends('layouts.app')

@section('title', 'Dashboard')
@section('breadcrumb')
    @parent
    <li class="breadcrumb-item active">Dashboard</li>
@endsection

@push('css')
    <style>
        .bg-info, .bg-danger, .bg-success, .bg-primary {
            background-color: #C7D98D !important;
        }
        .small-box-footer {
            color: #FFFFFF !important;
        }
        .card-title, .card-text, .breadcrumb-item a, .breadcrumb-item.active {
            color: #1F2D36 !important;
        }
        .menu-item {
            color: #1F2D36 !important;
        }
        .small-box .icon {
            font-size: 70px;
            color: #1F2D36;
        }
        .small-box .inner h3 {
            font-size: 38px;
            font-weight: bold;
        }
        .small-box .inner p {
            font-size: 18px;
        }
    </style>
    <link rel="stylesheet" href="{{ asset('/AdminLTE/plugins/daterangepicker/daterangepicker.css') }}">
@endpush

@section('content')
    <!-- Small boxes (Stat box) -->
    <div class="row">
        <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-info">
                <div class="inner">
                    <h3>{{ format_uang($jumlahKategori) }}</h3>
                    <p class="menu-item">Kategori</p>
                </div>
                <div class="icon">
                    <i class="fas fa-cube"></i>
                </div>
                <a href="{{ route('category.index') }}" class="small-box-footer">Lihat <i class="fas fa-arrow-circle-right"></i></a>
            </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-info">
                <div class="inner">
                    <h3>{{ format_uang($jumlahProjek) }}</h3>
                    <p class="menu-item">Projek</p>
                </div>
                <div class="icon">
                    <i class="fas fa-folder"></i>
                </div>
                <a href="{{ route('campaign.index') }}" class="small-box-footer">Lihat <i class="fas fa-arrow-circle-right"></i></a>
            </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-info">
                <div class="inner">
                    <h3>{{ format_uang($jumlahProjekPending) }}</h3>
                    <p class="menu-item">Projek Pending</p>
                </div>
                <div class="icon">
                    <i class="fas fa-folder"></i>
                </div>
                <a href="{{ route('campaign.index', ['status' => 'pending']) }}" class="small-box-footer">Lihat <i class="fas fa-arrow-circle-right"></i></a>
            </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-info">
                <div class="inner">
                    <h3>{{ format_uang($jumlahKontakMasuk) }}</h3>
                    <p class="menu-item">Kontak Masuk Baru</p>
                </div>
                <div class="icon">
                    <i class="fas fa-envelope"></i>
                </div>
                <a href="{{ route('contact.index', ['date' => date('Y-m-d')]) }}" class="small-box-footer">Lihat <i class="fas fa-arrow-circle-right"></i></a>
            </div>
        </div>
        <!-- ./col -->
    </div>

    <div class="row">
        <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-info">
                <div class="inner">
                    <h3>Rp. {{ format_uang($totalDonasi) }}</h3>
                    <p class="menu-item">Total Donasi</p>
                </div>
                <div class="icon">
                    <i class="fas fa-donate"></i>
                </div>
                <a href="{{ route('donation.index', ['status' => 'confirmed']) }}" class="small-box-footer">Lihat <i class="fas fa-arrow-circle-right"></i></a>
            </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-info">
                <div class="inner">
                    <h3>{{ format_uang($jumlahDonasiBelumDikonfirmasi) }}</h3>
                    <p class="menu-item">Donasi Belum Dikonfirmasi</p>
                </div>
                <div class="icon">
                    <i class="fas fa-donate"></i>
                </div>
                <a href="{{ route('donation.index', ['status' => 'not confirmed']) }}" class="small-box-footer">Lihat <i class="fas fa-arrow-circle-right"></i></a>
            </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-info">
                <div class="inner">
                    <h3>{{ format_uang($jumlahDonasiDikonfirmasi) }}</h3>
                    <p class="menu-item">Donasi Dikonfirmasi</p>
                </div>
                <div class="icon">
                    <i class="fas fa-donate"></i>
                </div>
                <a href="{{ route('donation.index', ['status' => 'confirmed']) }}" class="small-box-footer">Lihat <i class="fas fa-arrow-circle-right"></i></a>
            </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-info">
                <div class="inner">
                    <h3>Rp. {{ format_uang($totalProjekDicairkan) }}</h3>
                    <p class="menu-item">Total Dicairkan</p>
                </div>
                <div class="icon">
                    <i class="fas fa-hand-holding-usd"></i>
                </div>
                <a href="{{ route('cashout.index', ['status' => 'success']) }}" class="small-box-footer">Lihat <i class="fas fa-arrow-circle-right"></i></a>
            </div>
        </div>
        <!-- ./col -->
    </div>

    <!-- /.row -->
    <div class="row">
        <!-- Left col -->
        <section class="col-lg-12 connectedSortable">
            <!-- Custom tabs (Charts with tabs)-->
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">
                        <i class="fas fa-chart-line mr-1"></i>
                        Laporan donasi dan pencairan {{ date('Y') }}
                    </h3>
                </div><!-- /.card-header -->
                <div class="card-body text-center pb-0">
                    {{ tanggal_indonesia(date('Y-01-01')) }} s/d {{ tanggal_indonesia(date('Y-12-31')) }}
                </div>
                <div class="card-body pt-0">
                    <canvas id="revenue-chart-canvas" height="300" style="height: 300px;"></canvas>
                </div><!-- /.card-body -->
            </div>
            <!-- /.card -->
        </section>
        <!-- /.Left col -->

        <div class="col-lg-7">
            <div class="card">
                <div class="card-header border-transparent">
                    <h3 class="card-title">10 projek populer bulan ini</h3>
                </div>
                <!-- /.card-header -->
                <div class="card-body p-0">
                    <div class="table-responsive">
                        <table class="table m-0">
                            <thead>
                            <tr>
                                <th width="5%">#</th>
                                <th>Judul</th>
                                <th>Status</th>
                                <th>Jumlah Donasi</th>
                            </tr>
                            </thead>
                            <tbody>
                            @forelse ($projekPopuler as $key => $item)
                                <tr>
                                    <td><a href="{{ route('campaign.show', $item->id) }}">{{ $key+1 }}</a></td>
                                    <td>{{ $item->title }}</td>
                                    <td><span class="badge badge-{{ $item->statusColor() }}">{{ $item->status }}</span></td>
                                    <td>{{ $item->donations_count }}x</td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="4">Tidak tersedia</td>
                                </tr>
                            @endforelse
                            </tbody>
                        </table>
                    </div>
                    <!-- /.table-responsive -->
                </div>
                <!-- /.card-body -->
            </div>
            <!-- /.card -->

            <div class="card">
                <div class="card-header border-transparent">
                    <h3 class="card-title">Top 10 donatur bulan ini</h3>
                </div>
                <!-- /.card-header -->
                <div class="card-body p-0">
                    <div class="table-responsive">
                        <table class="table m-0">
                            <thead>
                            <tr>
                                <th width="5%">#</th>
                                <th>Nama</th>
                                <th>Jumlah Donasi</th>
                                <th>Jumlah Projek</th>
                            </tr>
                            </thead>
                            <tbody>
                            @forelse ($topDonatur as $key => $item)
                                <tr>
                                    <td><a href="{{ route('donatur.index', ['email' => $item->email]) }}">{{ $key+1 }}</a></td>
                                    <td>
                                        {{ $item->name }}
                                        <br>
                                        <a href="mailto:{{ $item->email }}" target="_blank">{{ $item->email }}</a>
                                    </td>
                                    <td>{{ $item->donations_count }}x</td>
                                    <td>{{ $item->campaigns_count }}x</td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="4">Tidak tersedia</td>
                                </tr>
                            @endforelse
                            </tbody>
                        </table>
                    </div>
                    <!-- /.table-responsive -->
                </div>
                <!-- /.card-body -->
            </div>
            <!-- /.card -->
        </div>
        <!-- right col (We are only adding the ID to make the widgets sortable)-->
        <section class="col-lg-5 connectedSortable">

            <!-- Card -->
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">
                        <i class="fas fa-chart-pie mr-1"></i>
                        Pengguna bulan ini
                    </h3>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-6">
                            <canvas id="sales-chart-canvas" height="150" style="height: 150px;"></canvas>
                        </div>
                        <div class="col-md-6">
                            <ul class="chart-legend clearfix">
                                <li><i class="far fa-circle text-danger"></i> Donatur</li>
                                <li><i class="far fa-circle text-success"></i> Subscriber</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <!-- /.card -->

            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Notifikasi terbaru <span class="badge badge-danger">{{ $countNotifikasi }}</span></h3>
                </div>
                <!-- /.card-header -->
                <div class="card-body p-0">
                    <ul class="products-list product-list-in-card pl-2 pr-2">
                        @foreach ($listNotifikasi as $key => $notifikasi)
                            @foreach ($notifikasi as $item)
                                <li class="item">
                                    <div class="product-info ml-1">
                                        <a href="{{ route("$key.index") }}" class="product-title">
                                            {{ $item->name ?? $item->email ?? $item->user->name ?? "" }}
                                            <span class="badge
                                @switch($key)
                                    @case('donatur') badge-warning @break
                                    @case('subscriber') badge-secondary @break
                                    @case('contact') badge-info @break
                                    @case('donation') badge-primary @break
                                    @case('cashout') badge-success @break
                                @endswitch
                                float-right">{{ $key }} baru</span>
                                        </a>
                                        <span class="product-description">
                                {{ now()->parse($item->created_at)->diffForHumans() }}
                            </span>
                                    </div>
                                </li>
                            @endforeach
                        @endforeach
                    </ul>
                </div>
            </div>
        </section>
        <!-- right col -->
    </div>
    <!-- /.row (main row) -->
@endsection

@push('scripts_vendor')
    <script src="{{ asset('/AdminLTE/plugins/daterangepicker/daterangepicker.js') }}"></script>
@endpush

@push('scripts')
    <script>
        var salesChartCanvas = document.getElementById('revenue-chart-canvas').getContext('2d')
        var salesChartData = {
            labels: @json($listBulan),
            datasets: [{
                label: 'Donasi',
                backgroundColor: '#C7D98D',
                borderColor: '#C7D98D',
                pointColor: '#C7D98D',
                pointStrokeColor: '#C7D98D',
                pointHighlightFill: '#fff',
                pointHighlightStroke: '#C7D98D',
                data: @json($listDonasi)
            },
                {
                    label: 'Pencairan',
                    backgroundColor: '#018844',
                    borderColor: '#018844',
                    pointColor: '#018844',
                    pointStrokeColor: '#018844',
                    pointHighlightFill: '#fff',
                    pointHighlightStroke: '#018844',
                    data: @json($listPencairan)
                }
            ]
        }
        var salesChartOptions = {
            maintainAspectRatio: false,
            responsive: true,
        }

        var salesChart = new Chart(salesChartCanvas, {
            type: 'line',
            data: salesChartData,
            options: salesChartOptions
        })

        var pieChartCanvas = $('#sales-chart-canvas').get(0).getContext('2d')
        var pieData = {
            labels: @json($listNamaUser),
            datasets: [{
                data: @json($listJumlahUser),
                backgroundColor: ['#A5C451', '#003E1F']
            }]
        }
        var pieOptions = {
            legend: {
                display: false
            },
            maintainAspectRatio: false,
            responsive: true
        }

        var pieChart = new Chart(pieChartCanvas, {
            type: 'doughnut',
            data: pieData,
            options: pieOptions
        })
    </script>
@endpush
