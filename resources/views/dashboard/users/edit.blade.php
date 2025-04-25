@extends('layouts.app', [
    'title' => 'تعديل المستخدم',
    'catName' => 'users',
    'breadcrumbs' => [' المستخدمين', 'تعديل المستخدم'],
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
            <a href="{{ route('users.index') }}" class="btn btn-danger btn-sm">رجوع</a>

            <div class="tab-content" id="animateLineContent-4">
                <div class="tab-pane fade show active" id="animated-underline-home" role="tabpanel"
                    aria-labelledby="animated-underline-home-tab">
                    <div class="row">
                        <div class="col-xl-12 col-lg-12 col-md-12 layout-spacing">
                            <form class="section general-info" action="{{ route('users.update', $item->id) }}"
                                method="POST" enctype="multipart/form-data">
                                @csrf
                                @method('PUT')
                                <div class="info">
                                    <div class="row">
                                        <div class="col-lg-11 mx-auto">
                                            <div class="row">

                                                <div class=" col-lg-12 col-md-8 mt-md-0 mt-4">
                                                    <div class="form">
                                                        <div class="row">
                                                            <div class="col-md-6">
                                                                <div class="form-group">
                                                                    <label for="fullName">الاسم</label>
                                                                    <input type="text" class="form-control mb-3"
                                                                        id="fullName" placeholder="الاسم" name="name"
                                                                        value="{{ $item->name }}">
                                                                    @error('name')
                                                                        <span class="text-danger">{{ $message }}</span>
                                                                    @enderror
                                                                </div>
                                                            </div>
                                                            <div class="col-md-6">
                                                                <div class="form-group">
                                                                    <label for="email">البريد الالكترونى</label>
                                                                    <input type="text" class="form-control mb-3"
                                                                        name="email" id="email"
                                                                        placeholder="البريد الالكترونى"
                                                                        value="{{ $item->email }}">
                                                                    @error('email')
                                                                        <span class="text-danger">{{ $message }}</span>
                                                                    @enderror
                                                                </div>
                                                            </div>

                                                            <div class="col-md-6">
                                                                <div class="form-group">
                                                                    <label for="phone">الهاتف</label>
                                                                    <input type="text" class="form-control mb-3"
                                                                        id="phone" name="phone" placeholder="الهاتف"
                                                                        value="{{ $item->phone }}">
                                                                    @error('phone')
                                                                        <span class="text-danger">{{ $message }}</span>
                                                                    @enderror
                                                                </div>
                                                            </div>

                                                            <div class="col-md-6">
                                                                <div class="form-group">
                                                                    <label for="status">الحالة</label>
                                                                    <select class="form-select mb-3" id="status"
                                                                        name="status">
                                                                        <option>اختر </option>
                                                                        <option value="1" @selected($item->status->value == 1)>
                                                                            مفعل</option>
                                                                        <option value="0" @selected($item->status->value == 0)>
                                                                            غير مفعل</option>
                                                                    </select>
                                                                    @error('status')
                                                                        <span class="text-danger">{{ $message }}</span>
                                                                    @enderror
                                                                </div>
                                                            </div>

                                                            <div class="col-md-6">
                                                                <div class="form-group">
                                                                    <label for="password">الصورة</label>
                                                                    <input type="file" class="form-control"
                                                                        name="image"
                                                                        accept="image/png, image/jpeg, image/gif" />
                                                                    @error('image')
                                                                        <span class="text-danger">{{ $message }}</span>
                                                                    @enderror
                                                                </div>
                                                            </div>
                                                            <div class="col-md-6">
                                                                <div class="form-group">
                                                                    <label for="password">الرقم السرى</label>
                                                                    <input type="password" class="form-control mb-3"
                                                                        name="password" id="password"
                                                                        placeholder="الرقم السرى" value="">
                                                                    @error('password')
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
