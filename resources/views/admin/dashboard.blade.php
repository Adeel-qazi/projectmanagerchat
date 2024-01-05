@extends('admin.layouts.master')



@section('content')
    <div class="main-content">
        <section class="section">
            <ul class="breadcrumb breadcrumb-style ">
                <li class="breadcrumb-item">
                    <h4 class="page-title m-b-0">Dashboard</h4>
                </li>
                <li class="breadcrumb-item">
                    <a href="index-2.html">
                        <i data-feather="home"></i></a>
                </li>
                {{-- <li class="breadcrumb-item active">Admin</li> --}}
            </ul>
            <div class="row ">
                <div class="col-xl-6 col-lg-6">
                    <div class="card l-bg-style1">
                        <div class="card-statistic-3">
                            <div class="card-icon card-icon-large"><i class="fa fa-award"></i></div>
                            <div class="card-content">
                            
                                <h4 class="card-title">Managers</h4>
                                @if (!empty($managers))
                                        <span>{{ $managers->count() }}</span>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-6 col-lg-6">
                    <div class="card l-bg-style2">
                        <div class="card-statistic-3">
                            <div class="card-icon card-icon-large"><i class="fa fa-briefcase"></i></div>
                            <div class="card-content">
                                <h4 class="card-title">Projects</h4>
                                @if (!empty($projects))
                                        <span>{{ $projects->count() }}</span>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection



@push('customJs')
@endpush