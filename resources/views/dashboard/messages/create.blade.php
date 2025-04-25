@extends('layouts.app', [
    'title' => 'اضافة رسالة',
    'catName' => 'messages',
    'breadcrumbs' => [' الرسائل', 'اضافة رسالة'],
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
            <a href="{{ route('messages.index') }}" class="btn btn-danger btn-sm">رجوع</a>

            <div class="tab-content" id="animateLineContent-4">
                <div class="tab-pane fade show active" id="animated-underline-home" role="tabpanel"
                    aria-labelledby="animated-underline-home-tab">
                    <div class="row">
                        <div class="col-xl-12 col-lg-12 col-md-12 layout-spacing">
                            <form class="section general-info" action="{{ route('messages.store') }}" method="POST"
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
                                                                    <label for="phone">المستخدم</label>
                                                                    <select name="user_id" id=""
                                                                        class="form-control">
                                                                        <option value="">اختر المستخدم</option>
                                                                        <option value="all">الكل</option>
                                                                        @foreach ($users as $name => $id)
                                                                            <option @selected(old('user_id') && old('user_id') == $id)
                                                                                value="{{ $id }}">
                                                                                {{ $name }}</option>
                                                                        @endforeach
                                                                    </select>
                                                                    @error('user_id')
                                                                        <span class="text-danger">{{ $message }}</span>
                                                                    @enderror
                                                                </div>
                                                            </div>


                                                            <div class="col-md-6">
                                                                <div class="form-group">
                                                                    <label for="title"> العنوان</label>
                                                                    <input type="text" class="form-control mb-3"
                                                                        name="title" id="title" placeholder=" العنوان"
                                                                        value="{{ old('title') }}">
                                                                    @error('title')
                                                                        <span class="text-danger">{{ $message }}</span>
                                                                    @enderror
                                                                </div>
                                                            </div>

                                                            <div class="col-md-12">
                                                                <div class="form-group">
                                                                    <label for="message">الرسالة</label>
                                                                    <textarea name="message" class="form-control mb-3" id="" cols="30" rows="10">{{ old('message') }}</textarea>
                                                                    @error('message')
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
