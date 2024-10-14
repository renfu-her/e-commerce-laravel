@extends('layouts.backend')

@section('content')
    <div class="row">
        <div class="col-12 grid-margin">
            <div class="card card-statistics">
                <div class="row">
                    <div class="card-col col-xl-3 col-lg-3 col-md-3 col-6">
                        <div class="card-body">
                            <div class="d-flex align-items-center justify-content-center flex-column flex-sm-row">
                                <i class="mdi mdi-account-multiple-outline text-primary me-0 me-sm-4 icon-lg"></i>
                                <div class="wrapper text-center text-sm-left">
                                    <p class="card-text mb-0">New Users</p>
                                    <div class="fluid-container">
                                        <h3 class="card-title mb-0">65,650</h3>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card-col col-xl-3 col-lg-3 col-md-3 col-6">
                        <div class="card-body">
                            <div class="d-flex align-items-center justify-content-center flex-column flex-sm-row">
                                <i class="mdi mdi-checkbox-marked-circle-outline text-primary me-0 me-sm-4 icon-lg"></i>
                                <div class="wrapper text-center text-sm-left">
                                    <p class="card-text mb-0">New Feedbacks</p>
                                    <div class="fluid-container">
                                        <h3 class="card-title mb-0">32,604</h3>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card-col col-xl-3 col-lg-3 col-md-3 col-6">
                        <div class="card-body">
                            <div class="d-flex align-items-center justify-content-center flex-column flex-sm-row">
                                <i class="mdi mdi-trophy-outline text-primary me-0 me-sm-4 icon-lg"></i>
                                <div class="wrapper text-center text-sm-left">
                                    <p class="card-text mb-0">Employees</p>
                                    <div class="fluid-container">
                                        <h3 class="card-title mb-0">17,583</h3>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card-col col-xl-3 col-lg-3 col-md-3 col-6">
                        <div class="card-body">
                            <div class="d-flex align-items-center justify-content-center flex-column flex-sm-row">
                                <i class="mdi mdi-target text-primary me-0 me-sm-4 icon-lg"></i>
                                <div class="wrapper text-center text-sm-left">
                                    <p class="card-text mb-0">Total Sales</p>
                                    <div class="fluid-container">
                                        <h3 class="card-title mb-0">61,119</h3>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- 更多內容可以根據需要添加 -->
@endsection
