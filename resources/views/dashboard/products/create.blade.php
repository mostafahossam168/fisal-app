@extends('layouts.app', [
    'title' => 'اضافة منتج',
    'catName' => 'users',
    'breadcrumbs' => [' المنتجات', 'اضافة منتج'],
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
            <a href="{{ route('products.index') }}" class="btn btn-danger btn-sm">رجوع</a>

            <div class="tab-content" id="animateLineContent-4">
                <div class="tab-pane fade show active" id="animated-underline-home" role="tabpanel"
                    aria-labelledby="animated-underline-home-tab">
                    <div class="row">
                        <div class="col-xl-8 col-lg-8 col-md-12 layout-spacing">
                            <form class="section general-info" action="{{ route('products.store') }}" method="POST"
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
                                                                    <label for="fullName">الاسم</label>
                                                                    <input type="text" class="form-control mb-3"
                                                                        id="fullName" placeholder="الاسم" name="name"
                                                                        value="{{ old('name') }}">
                                                                    @error('name')
                                                                        <span class="text-danger">{{ $message }}</span>
                                                                    @enderror
                                                                </div>
                                                            </div>
                                                            <div class="col-md-6">
                                                                <div class="form-group">
                                                                    <label for="barcode"> الباركود</label>
                                                                    <input type="number" class="form-control mb-3"
                                                                        name="barcode" id="barcode"
                                                                        value="{{ old('barcode') }}">
                                                                    @error('barcode')
                                                                        <span class="text-danger">{{ $message }}</span>
                                                                    @enderror
                                                                </div>
                                                            </div>
                                                            <div class="col-md-6">
                                                                <div class="form-group">
                                                                    <label for="price"> السعر</label>
                                                                    <input type="text" class="form-control mb-3"
                                                                        name="price" id="price" placeholder=" السعر"
                                                                        value="{{ old('price') }}">
                                                                    @error('price')
                                                                        <span class="text-danger">{{ $message }}</span>
                                                                    @enderror
                                                                </div>
                                                            </div>

                                                            <div class="col-md-6">
                                                                <div class="form-group">
                                                                    <label for="phone">المستخدم</label>
                                                                    <select name="user_id" id=""
                                                                        class="form-control">
                                                                        <option value="">اختر المستخدم</option>
                                                                        @foreach (App\Models\User::users()->active()->pluck('id', 'name') as $name => $id)
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
                                                                    <label for="status">الحالة</label>
                                                                    <select class="form-select mb-3" id="status"
                                                                        name="status">
                                                                        <option>اختر </option>
                                                                        <option value="1" @selected(old('status') && old('status') == 1)>
                                                                            مفعل</option>
                                                                        <option value="0" @selected(old('status') && old('status') == 0)>
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
                                                                    <label for="password">الشهادة</label>
                                                                    <input type="file" class="form-control"
                                                                        name="certificate" accept="application\pdf" />
                                                                    <span class="text-danger">pdf only</span>
                                                                    @error('certificate')
                                                                        <span class="text-danger">{{ $message }}</span>
                                                                    @enderror
                                                                </div>
                                                            </div>
                                                            <div class="col-md-12">
                                                                <div class="form-group">
                                                                    <label for="description">الوصف</label>


                                                                    <textarea name="description" class="form-control mb-3" id="" cols="30" rows="10">{{ old('description') }}</textarea>
                                                                    @error('description')
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

                        <div class="col-xl-4 col-lg-4 col-md-12 layout-spacing">
                            <form class="section general-info" method="POST"
                                action="{{ route('products.store.excel') }}" enctype="multipart/form-data">
                                @csrf
                                <div class="info">
                                    <div class="row">
                                        <div class="col-lg-11 mx-auto">
                                            <div class="row">
                                                <h6>اضافة منتجات مجمعة</h6>
                                                <div class=" col-lg-12 col-md-8 mt-md-0 mt-4">
                                                    <div class="form">
                                                        <div class="row">



                                                            <div class="col-md-12">
                                                                <div class="form-group">
                                                                    <label for="phone">المستخدم</label>
                                                                    <select name="user_id" id=""
                                                                        class="form-control">
                                                                        <option value="">اختر المستخدم</option>
                                                                        @foreach (App\Models\User::users()->active()->pluck('id', 'name') as $name => $id)
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

                                                            <div class="col-md-12 mt-4">
                                                                <div class="form-group">
                                                                    <label for="excel">ملف Excel</label>
                                                                    <input type="file" class="form-control mb-3"
                                                                        id="excel" name="excel">
                                                                    @error('excel')
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
