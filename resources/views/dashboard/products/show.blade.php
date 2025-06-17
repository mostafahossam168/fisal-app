@extends('layouts.app', [
    'title' => 'عرض منتج',
    'catName' => 'users',
    'breadcrumbs' => [' المنتجات', 'عرض منتج'],
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
                        <div class="col-xl-12 col-lg-12 col-md-12 layout-spacing">

                            <div class="section general-info">
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
                                                                    <input type="text" class="form-control mb-3" disabled
                                                                        id="fullName" placeholder="الاسم" name="name"
                                                                        value="{{ $item->name }}">
                                                                    @error('name')
                                                                        <span class="text-danger">{{ $message }}</span>
                                                                    @enderror
                                                                </div>
                                                            </div>


                                                            <div class="col-md-6">
                                                                <div class="form-group">
                                                                    <label for="product_number"> رقم المنتج</label>
                                                                    <input type="text" class="form-control mb-3"
                                                                        name="product_number" id="product_number"
                                                                        placeholder=" رقم المنتج" disabled
                                                                        value="{{ $item->product_number }}">
                                                                </div>
                                                            </div>


                                                            <div class="col-md-6">
                                                                <div class="form-group">
                                                                    <label for="phone">المستخدم</label>
                                                                    <select name="user_id" id="" disabled
                                                                        class="form-control">
                                                                        <option value="">اختر المستخدم</option>
                                                                        @foreach (App\Models\User::users()->active()->pluck('id', 'name') as $name => $id)
                                                                            <option @selected($item->user_id == $id)
                                                                                value="{{ $id }}">
                                                                                {{ $name }}</option>
                                                                        @endforeach
                                                                    </select>
                                                                </div>
                                                            </div>

                                                            <div class="col-md-6">
                                                                <div class="form-group">
                                                                    <label for="category_id">التصنيف</label>
                                                                    <select name="category_id" id="category_id" disabled
                                                                        class="form-control">

                                                                        @foreach (App\Models\Category::active()->pluck('id', 'name') as $name => $id)
                                                                            <option @selected(old('category_id') && old('category_id') == $id)
                                                                                value="{{ $id }}">
                                                                                {{ $name }}</option>
                                                                        @endforeach
                                                                    </select>

                                                                </div>
                                                            </div>
                                                            <div class="col-md-6">
                                                                <div class="form-group">
                                                                    <label for="status">الحالة</label>
                                                                    <select class="form-select mb-3" id="status" disabled
                                                                        name="status">

                                                                        <option value="1" @selected($item->status->value == 1)>
                                                                            مفعل</option>
                                                                        <option value="0" @selected($item->status->value == 0)>
                                                                            غير مفعل</option>
                                                                    </select>
                                                                </div>
                                                            </div>

                                                            <div class="col-md-6 my-3">
                                                                <div class="form-group">
                                                                    <label for="password">الباركود</label>
                                                                    {!! DNS1D::getBarcodeHTML($item->barcode . '', 'C128') !!}
                                                                </div>
                                                            </div>
                                                            <div class="col-md-6">
                                                                <div class="form-group">
                                                                    <label for="password">الصورة</label>
                                                                    @if ($item->image)
                                                                        <img src="{{ display_file($item->image) }}"
                                                                            class="d-block mb-3" alt=""
                                                                            srcset=""
                                                                            style="width:150px;height:150px;">
                                                                    @endif
                                                                </div>
                                                            </div>

                                                            <div class="col-md-6">
                                                                <div class="form-group">
                                                                    <label for="password" class="d-block">الشهادة</label>
                                                                    @if ($item->certificate)
                                                                        <a href="{{ display_file($item->certificate) }}"
                                                                            download class='btn btn-primary '>تحميل</a>
                                                                    @endif
                                                                </div>
                                                            </div>


                                                        </div>

                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>


                    </div>
                </div>

            </div>

        </div>

    </div>
@endsection

@section('scripts')
@endsection
