@extends('layouts.app')
@push('styles')
    @livewireStyles
@endpush

@section('content')
    @include('layouts.sidebar')
    <!-- partial -->
    <div class="container-fluid page-body-wrapper">
        <!-- partial:./partials/_navbar.html -->
        <nav class="flex-row px-0 py-0 navbar col-lg-12 col-12 py-lg-4 d-flex">
            <div class="navbar-menu-wrapper d-flex align-items-center justify-content-end ">
                <button class="navbar-toggler align-self-center" type="button" data-toggle="minimize">
                    <span class="mdi mdi-menu "></span>
                </button>
                <div class="navbar-brand-wrapper">
                    <a class="navbar-brand brand-logo" href=""><img src="/images/logo.svg" alt="logo" /></a>
                    <a class="navbar-brand brand-logo-mini" href=""><img src="/images/logo-mini.svg"
                            alt="logo" /></a>
                </div>
                <h4 class="mt-1 mb-0 font-weight-bold d-none d-md-block">Welcome back, Brandon Haynes</h4>
                {{-- <h4 class="mx-3 mb-0 font-weight-bold d-none d-md-block ">Pages Supplier</h4> --}}
                <ul class="navbar-nav navbar-nav-right">
                    <li class="nav-item nav-profile dropdown ">
                        <a class="nav-link dropdown-toggle" href="#" data-toggle="dropdown" id="profileDropdown">
                            <img src="/images/faces/face5.jpg" alt="profile" class="rounded-circle" width="40px" />
                            <span class="nav-profile-name ">Eleanor Richardson</span>
                        </a>
                        <div class="dropdown-menu dropdown-menu-right navbar-dropdown" aria-labelledby="profileDropdown">
                            <a class="dropdown-item">
                                <i class="mdi mdi-settings text-primary"></i>
                                Settings
                            </a>
                            <a class="dropdown-item" href="#"
                                onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                <i class="mdi mdi-logout text-primary"></i>
                                Logout
                            </a>
                            {{-- <form action="{{ route('logout') }}" method="POST" id="logout-form" class="d-none">
                                @csrf
                            </form> --}}
                        </div>
                    </li>

                </ul>
                <button class="navbar-toggler navbar-toggler-right d-lg-none align-self-center" type="button"
                    data-toggle="offcanvas">
                    <span class="mdi mdi-menu"></span>
                </button>
            </div>
        </nav>
        <!-- partial -->
        <div class="main-panel">
            <div class="content-wrapper">
                <div class="row">
                    @if (session()->has('success'))
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            {{ session('success') }}
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    @endif
                    @if (session()->has('danger'))
                        <div class="alert alert-danger alert-dismissible fade show" role="alert">
                            {{ session('danger') }}
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    @endif
                    <div class="col-lg-12 grid-margin stretch-card">
                        <div class="card">

                            <div class="card-header d-flex align-items-center justify-content-between">
                                <span class="title font-weight-bold">Data Customer</span>
                                {{-- <a href="" class="p-2 btn btn-primary"> </a> --}}
                                <button type="button" class="btn btn-primary d-flex" data-bs-toggle="modal"
                                    data-bs-target="#customerAdd">
                                    <i class="mdi mdi-account-plus me-1"></i> Add
                                </button>
                                <!-- Modal -->

                            </div>
                            <div class="card-body">
                                @livewire('customer.customer-table')
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!--Footer-->
            <footer class="footer">
                <div class="card">
                    <div class="card-body">
                        <div class="d-sm-flex justify-content-center justify-content-sm-between">
                            <span class="text-center text-muted d-block text-sm-left d-sm-inline-block">Copyright ©
                                bootstrapdash.com 2020</span>
                            <span class="text-center text-muted d-block text-sm-left d-sm-inline-block">Distributed By: <a
                                    href="https://www.themewagon.com/" target="_blank">ThemeWagon</a></span>
                            <span class="float-none mt-1 text-center float-sm-right d-block mt-sm-0"> Free <a
                                    href="https://www.bootstrapdash.com/" target="_blank">Bootstrap dashboard
                                    templates</a> from Bootstrapdash.com</span>
                        </div>
                    </div>
                </div>
            </footer>
            <!-- partial -->
        </div>
    </div>
    @livewire('customer.customer-create')
    @livewire('customer.customer-edit')
    @livewire('customer.customer-detail')
@endsection

{{-- script  --}}
@push('scripts')
    @livewireScripts
    <script>
        Livewire.on('CustomerCreate', () => {
            $('#customerAdd').modal('hide');
            $('#customerUpdate').modal('hide');
        });
    </script>
    <script>
        $('.rupiah').mask("#.##0", {
            reverse: true
        });
    </script>
    <script>
        window.addEventListener('DeleteConfirmation', event => {
            // console.log(event);
            Swal.fire({
                title: "Apakah anda yakin ingin ?",
                text: "Kamu akan  menghapus" + event.detail.customer.name + "?",
                icon: "warning",
                showCancelButton: true,
                confirmButtonColor: "#3085d6",
                cancelButtonColor: "#d33",
                confirmButtonText: "Yes, delete it!"
            }).then((result) => {
                if (result.isConfirmed) {
                    Livewire.dispatch('Destroy');
                    Swal.fire({
                        title: "Deleted!",
                        text: "Your file has been deleted.",
                        icon: "success"
                    });
                }
            });
        });
    </script>
@endpush
