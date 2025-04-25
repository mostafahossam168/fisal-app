@extends('layouts.app', [
    'title' => 'الاعدادات',
    'catName' => 'settings',
    'breadcrumbs' => ['الاعدادات'],
    'scrollspy' => 0,
    'simplePage' => 0,
])


@section('styles')
    @vite(['resources/scss/light/assets/users/account-setting.scss'])
    @vite(['resources/scss/dark/assets/users/account-setting.scss'])
@endsection

@section('content')
    <div class="account-settings-container layout-top-spacing">

        <div class="account-content">
            <a href="{{ route('home') }}" class="btn btn-danger btn-sm">رجوع</a>

            <div class="tab-content" id="animateLineContent-4">
                <div class="tab-pane fade show active" id="animated-underline-home" role="tabpanel"
                    aria-labelledby="animated-underline-home-tab">
                    <div class="row">
                        <div class="col-xl-12 col-lg-12 col-md-12 layout-spacing">
                            <form class="section general-info" action="{{ route('settings.update') }}" method="POST"
                                enctype="multipart/form-data">
                                @csrf
                                <div class="info">
                                    <div class="row">
                                        <div class="col-lg-11 mx-auto">
                                            <div class="row">

                                                <div class=" col-lg-12 col-md-8 mt-md-0 mt-4">
                                                    <div class="form">
                                                        <div class="row">
                                                            <div class="col-md-6">
                                                                <div class="form-group">
                                                                    <label for="fullName">اسم التطبيق</label>
                                                                    <input type="text" class="form-control mb-3"
                                                                        id="fullName" placeholder="الاسم"
                                                                        name="website_name"
                                                                        value="{{ $items['website_name'] }}">
                                                                    @error('website_name')
                                                                        <span class="text-danger">{{ $message }}</span>
                                                                    @enderror
                                                                </div>
                                                            </div>

                                                            <hr>
                                                            <h6 class="">الاصدار</h6>
                                                            <div class="col-md-6">
                                                                <div class="form-group">
                                                                    <label for="apple">Apple</label>
                                                                    <input type="text" class="form-control mb-3"
                                                                        name="apple" id="apple"
                                                                        value="{{ $items['apple'] }}">
                                                                    @error('apple')
                                                                        <span class="text-danger">{{ $message }}</span>
                                                                    @enderror
                                                                </div>
                                                            </div>

                                                            <div class="col-md-6">
                                                                <div class="form-group">
                                                                    <label for="android">Android</label>
                                                                    <input type="text" class="form-control mb-3"
                                                                        id="android" name="android"
                                                                        value="{{ $items['android'] }}">
                                                                    @error('android')
                                                                        <span class="text-danger">{{ $message }}</span>
                                                                    @enderror
                                                                </div>
                                                            </div>
                                                            <div class="col-md-12 mt-1">
                                                                <div class="form-group text-end">
                                                                    <button class="btn btn-secondary"
                                                                        type="submit">حفظ</button>
                                                                </div>
                                                            </div>

                                                        </div>

                                                    </div>
                                                </div>
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

    </div>
@endsection

@section('scripts')
@endsection
