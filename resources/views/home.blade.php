@extends('layouts.app', [
    'title' => ' الرئيسية',
    'catName' => 'dashboard',
    'breadcrumbs' => [' الرئيسية'],
    'scrollspy' => 0,
    'simplePage' => 0,
])


@section('styles')
    <link rel="stylesheet" href="{{ asset('plugins/src/apex/apexcharts.css') }}">
    @vite(['resources/scss/light/assets/dashboard/dash_1.scss'])
    @vite(['resources/scss/dark/assets/dashboard/dash_1.scss'])
    @vite(['resources/scss/light/assets/components/list-group.scss'])
    @vite(['resources/scss/dark/assets/components/list-group.scss'])
    @vite(['resources/scss/light/assets/dashboard/dash_2.scss'])
    @vite(['resources/scss/dark/assets/dashboard/dash_2.scss'])
@endsection

@section('content')
    <div class="row layout-top-spacing">

        <div class="col-lg-12 col-md-12 col-sm-12 col-12">
            <div class="row widget-statistic">
                <div class="col-xl-3 col-lg-3 col-md-4 col-sm-6 col-12 layout-spacing">
                    <div class="widget widget-one_hybrid widget-followers">
                        <div class="widget-heading">
                            <div class="w-title">
                                <div class="w-icon">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                        viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                        stroke-linecap="round" stroke-linejoin="round" class="feather feather-users">
                                        <path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"></path>
                                        <circle cx="9" cy="7" r="4"></circle>
                                        <path d="M23 21v-2a4 4 0 0 0-3-3.87"></path>
                                        <path d="M16 3.13a4 4 0 0 1 0 7.75"></path>
                                    </svg>
                                </div>
                                <div class="">
                                    <p class="w-value">{{ App\Models\User::admins()->count() }}</p>
                                    <h5 class="">مشرف</h5>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
                <div class="col-xl-3 col-lg-3 col-md-4 col-sm-6 col-12 layout-spacing">
                    <div class="widget widget-one_hybrid widget-followers">
                        <div class="widget-heading">
                            <div class="w-title">
                                <div class="w-icon">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                        viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                        stroke-linecap="round" stroke-linejoin="round" class="feather feather-users">
                                        <path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"></path>
                                        <circle cx="9" cy="7" r="4"></circle>
                                        <path d="M23 21v-2a4 4 0 0 0-3-3.87"></path>
                                        <path d="M16 3.13a4 4 0 0 1 0 7.75"></path>
                                    </svg>
                                </div>
                                <div class="">
                                    <p class="w-value">{{ App\Models\User::users()->count() }}</p>
                                    <h5 class="">مستخدم</h5>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>

                <div class="col-xl-3 col-lg-3 col-md-4 col-sm-6 col-12 layout-spacing">
                    <div class="widget widget-one_hybrid widget-engagement">
                        <div class="widget-heading">
                            <div class="w-title">
                                <div class="w-icon">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                        viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                        stroke-linecap="round" stroke-linejoin="round" class="feather feather-layout">
                                        <rect x="3" y="3" width="18" height="18" rx="2" ry="2">
                                        </rect>
                                        <line x1="3" y1="9" x2="21" y2="9"></line>
                                        <line x1="9" y1="21" x2="9" y2="9"></line>
                                    </svg>
                                </div>
                                <div class="">
                                    <p class="w-value">{{ App\Models\Product::count() }}</p>
                                    <h5 class="">المنتجات</h5>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>


                <div class="col-xl-3 col-lg-3 col-md-4 col-sm-6 col-12 layout-spacing">
                    <div class="widget widget-one_hybrid widget-engagement">
                        <div class="widget-heading">
                            <div class="w-title">
                                <div class="w-icon">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                        viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                        stroke-linecap="round" stroke-linejoin="round"
                                        class="feather feather-message-circle">
                                        <path
                                            d="M21 11.5a8.38 8.38 0 0 1-.9 3.8 8.5 8.5 0 0 1-7.6 4.7 8.38 8.38 0 0 1-3.8-.9L3 21l1.9-5.7a8.38 8.38 0 0 1-.9-3.8 8.5 8.5 0 0 1 4.7-7.6 8.38 8.38 0 0 1 3.8-.9h.5a8.48 8.48 0 0 1 8 8v.5z">
                                        </path>
                                    </svg>
                                </div>
                                <div class="">
                                    <p class="w-value">{{ App\Models\Message::count() }}</p>
                                    <h5 class="">الرسائل</h5>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>

            </div>
        </div>

        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 layout-spacing">
            <div class="widget widget-table-two">

                <div class="widget-heading">
                    <h5 class="">اخر المستخدمين</h5>
                </div>

                <div class="widget-content">
                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>
                                        <div class="th-content">#</div>
                                    </th>
                                    <th>
                                        <div class="th-content">الاسم</div>
                                    </th>
                                    <th>
                                        <div class="th-content">البريد الالكترونى</div>
                                    </th>
                                    <th>
                                        <div class="th-content th-heading">الهاتف</div>
                                    </th>
                                    <th>
                                        <div class="th-content">الحالة</div>
                                    </th>
                                </tr>
                            </thead>
                            <tbody>

                                @foreach (App\Models\User::users()->take(5)->latest()->get() as $item)
                                    <tr>
                                        <td>{{ $loop->index + 1 }}</td>
                                        <td>
                                            <div class="td-content customer-name"><img
                                                    src="{{ $item->image ? display_file($item->image) : asset('build/assets/no-image.jpeg') }}"
                                                    alt="avatar"><span>{{ $item->name }}</span></div>
                                        </td>
                                        <td>
                                            <div class="td-content product-brand text-primary">{{ $item->email }}
                                            </div>
                                        </td>

                                        <td>
                                            <div class="td-content pricing"><span
                                                    class="">{{ $item->phone }}</span></div>
                                        </td>

                                        <td>
                                            <div class="td-content product-invoice">
                                                <span
                                                    class="badge {{ $item->status->color() }} ">{{ $item->status->name() }}</span>
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>

                        </table>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 layout-spacing">
            <div class="widget widget-table-two">

                <div class="widget-heading">
                    <h5 class="">اخر المنتجات</h5>
                </div>

                <div class="widget-content">
                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>
                                        <div class="th-content">#</div>
                                    </th>
                                    <th>
                                        <div class="th-content">الاسم</div>
                                    </th>
                                    <th>
                                        <div class="th-content">المستخدم</div>
                                    </th>
                                    <th>
                                        <div class="th-content th-heading">رقم المنتج</div>
                                    </th>
                                    <th>
                                        <div class="th-content">التصنيف</div>
                                    </th>
                                    <th>
                                        <div class="th-content">الحالة</div>
                                    </th>

                                </tr>
                            </thead>
                            <tbody>
                                @foreach (App\Models\Product::take(5)->latest()->get() as $item)
                                    <tr>
                                        <td>{{ $loop->index + 1 }}</td>
                                        <td>
                                            <div class="td-content customer-name"><span>{{ $item->name }}</span></div>
                                        </td>
                                        <td>
                                            <div class="td-content product-brand text-primary">{{ $item->user->name }}
                                            </div>
                                        </td>

                                        <td>
                                            <div class="td-content pricing"><span
                                                    class="">{{ $item->product_number }}</span>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="td-content pricing"><span
                                                    class="">{{ $item->category->name }}</span>
                                            </div>
                                        </td>

                                        <td>
                                            <div class="td-content product-invoice">
                                                <span
                                                    class="badge {{ $item->status->color() }} ">{{ $item->status->name() }}</span>
                                            </div>
                                        </td>

                                    </tr>
                                @endforeach
                            </tbody>

                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
@endsection
