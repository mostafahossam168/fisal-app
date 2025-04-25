@extends('layouts.app', [
    'title' => 'تسجيل الدخول',
    'catName' => 'dashboard',
    'scrollspy' => 0,
    'simplePage' => 1,
])

@section('styles')
    {{-- Style Here --}}
    @vite(['resources/scss/light/assets/authentication/auth-cover.scss'])
    @vite(['resources/scss/dark/assets/authentication/auth-cover.scss'])
@endsection

@section('content')
    {{-- Content Here --}}
    <div class="auth-container d-flex">

        <div class="container mx-auto align-self-center">

            <div class="row">
                <x-toster></x-toster>
                <div
                    class="col-6 d-lg-flex d-none h-100 my-auto top-0 start-0 text-center justify-content-center flex-column">
                    <div class="auth-cover-bg-image"></div>
                    <div class="auth-overlay"></div>

                    <div class="auth-cover">

                        <div class="position-relative">

                            <img src="{{ Vite::asset('resources/images/auth-cover.svg') }}" alt="auth-img">

                            <h2 class="mt-5 text-white font-weight-bolder px-2">Join the community of expert developers</h2>
                            <p class="text-white px-2">It is easy to setup with great customer experience. Start your 7-day
                                free trial</p>
                        </div>

                    </div>

                </div>

                <div
                    class="col-xxl-4 col-xl-5 col-lg-5 col-md-8 col-12 d-flex flex-column align-self-center ms-lg-auto me-lg-0 mx-auto">
                    <div class="card">
                        <form action="{{ route('login') }}" method="post">
                            @csrf

                            <div class="card-body">

                                <div class="row">
                                    <div class="col-md-12 mb-3">

                                        <h2>تسجيل الدخول</h2>
                                        <p>ادخل البريد الاكترونى والرقم السري للدخول</p>

                                    </div>
                                    <div class="col-md-12">
                                        <div class="mb-3">
                                            <label class="form-label">البريد الاكترونى</label>
                                            <input type="email" name="email" class="form-control"
                                                value="{{ old('email') }}">
                                            @error('email')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="mb-4">
                                            <label class="form-label">الرقم السرى</label>
                                            <input type="password" name="password" class="form-control">
                                            @error('password')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="mb-3">
                                            <div class="form-check form-check-primary form-check-inline">
                                                <input class="form-check-input me-3" type="checkbox" id="form-check-default"
                                                    name="remember">
                                                <label class="form-check-label" for="form-check-default">
                                                    تذكرنى
                                                </label>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-12">
                                        <div class="mb-4">
                                            <button class="btn btn-secondary w-100" type="submit">تسجيل الدخول</button>
                                        </div>
                                    </div>

                                </div>

                            </div>
                        </form>
                    </div>
                </div>

            </div>

        </div>

    </div>
@endsection

@section('scripts')
    {{-- Scripts Here --}}
@endsection
