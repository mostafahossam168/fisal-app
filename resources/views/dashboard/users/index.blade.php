@extends('layouts.app', [
    'title' => ' المستخدمين',
    'catName' => 'users',
    'breadcrumbs' => [' المستخدمين'],
    'scrollspy' => 0,
    'simplePage' => 0,
])

@section('styles')
    {{-- Style Here --}}
    <link rel="stylesheet" href="{{ asset('plugins/src/table/datatable/datatables.css') }}">
    @vite(['resources/scss/light/plugins/table/datatable/dt-global_style.scss'])
    @vite(['resources/scss/light/assets/apps/invoice-list.scss'])
    @vite(['resources/scss/light/assets/components/modal.scss'])
    @vite(['resources/scss/dark/assets/components/modal.scss'])
    @vite(['resources/scss/dark/plugins/table/datatable/dt-global_style.scss'])
    @vite(['resources/scss/dark/assets/apps/invoice-list.scss'])
@endsection

@section('content')
    <div class="row" id="cancel-row">
        <div class="d-flex align-items-center justify-content-between">
            <x-toster></x-toster>
            <div class="my-3 d-flex gap-3">

                <a href="{{ route('users.create') }}" class="btn btn-primary">اضافة مستخدم جديد</a>
                <a href="{{ route('users.index') }}" class="btn btn-secondary">الكل :
                    {{ App\Models\User::users()->count() }} </a>
                <a href="{{ route('users.index', ['status' => 1]) }}" class="btn btn-success ">مفعلين :
                    {{ App\Models\User::users()->active()->count() }}</a>
                <a href="{{ route('users.index', ['status' => 0]) }}"class="btn btn-danger ">غير مفعلين :
                    {{ App\Models\User::users()->inactive()->count() }}</a>


            </div>
            <form action="{{ route('admins.index') }}" method="get">
                <input type="search" name="search" class="form-control" id="" value="{{ request('search') }}"
                    placeholder="البحث .......">
            </form>
        </div>

        <div class="col-xl-12 col-lg-12 col-sm-12 layout-top-spacing layout-spacing">
            <div class="widget-content widget-content-area br-8">
                <table id="invoice-list" class="table dt-table-hover" style="width:100%">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>الاسم</th>
                            <th>الصوره</th>
                            <th>البريد</th>
                            <th>الحالة</th>
                            <th>الهاتف</th>
                            <th>تاريخ الانشاء</th>
                            <th>العمليات</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($items as $item)
                            <tr>
                                <td>{{ $loop->index + 1 }}
                                </td>
                                <td>
                                    <div class="d-flex">

                                        <p class="align-self-center mb-0 user-name">{{ $item->name }} </p>
                                    </div>
                                </td>

                                <td>
                                    <div class="d-flex">
                                        <img alt="avatar" class=""
                                            style="width: 50px; height:50px; border-radius:50%;"
                                            src="{{ $item->image ? display_file($item->image) : asset('build/assets/no-image.jpeg') }}">

                                    </div>
                                </td>

                                <td><span class="inv-email"><svg xmlns="http://www.w3.org/2000/svg" width="24"
                                            height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                            stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                                            class="feather feather-mail">
                                            <path
                                                d="M4 4h16c1.1 0 2 .9 2 2v12c0 1.1-.9 2-2 2H4c-1.1 0-2-.9-2-2V6c0-1.1.9-2 2-2z">
                                            </path>
                                            <polyline points="22,6 12,13 2,6"></polyline>
                                        </svg> {{ $item->email }}</span></td>
                                <td>
                                    <span class="badge {{ $item->status->color() }} ">{{ $item->status->name() }}</span>
                                </td>
                                <td><span class="inv-amount">{{ $item->phone }}</span></td>
                                <td><span class="inv-date"><svg xmlns="http://www.w3.org/2000/svg" width="24"
                                            height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                            stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                                            class="feather feather-calendar">
                                            <rect x="3" y="4" width="18" height="18" rx="2" ry="2">
                                            </rect>
                                            <line x1="16" y1="2" x2="16" y2="6"></line>
                                            <line x1="8" y1="2" x2="8" y2="6"></line>
                                            <line x1="3" y1="10" x2="21" y2="10"></line>
                                        </svg> {{ $item->created_at->format('d  M') }} </span></td>
                                <td>
                                    <a class="badge badge-light-primary text-start me-2 action-edit"
                                        href="{{ route('users.edit', $item->id) }}"><svg xmlns="http://www.w3.org/2000/svg"
                                            width="24" height="24" viewBox="0 0 24 24" fill="none"
                                            stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                            stroke-linejoin="round" class="feather feather-edit-3">
                                            <path d="M12 20h9"></path>
                                            <path d="M16.5 3.5a2.121 2.121 0 0 1 3 3L7 19l-4 1 1-4L16.5 3.5z"></path>
                                        </svg></a>


                                    <button type="button" class="badge badge-light-danger text-start action-delete"
                                        data-bs-toggle="modal" data-bs-target="#exampleModal{{ $item->id }}">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                            viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                            stroke-linecap="round" stroke-linejoin="round" class="feather feather-trash">
                                            <polyline points="3 6 5 6 21 6"></polyline>
                                            <path
                                                d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2">
                                            </path>
                                        </svg>
                                    </button>

                                    @include('dashboard.users.model-delete')
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                {{ $items->links() }}
            </div>
        </div>

    </div>
@endsection

@section('scripts')
    {{-- Scripts Here --}}
    <script src="{{ asset('plugins/src/global/vendors.min.js') }}"></script>
    @vite(['resources/js/custom.js'])
    <script src="{{ asset('plugins/src/table/datatable/datatables.js') }}"></script>
    <script src="{{ asset('plugins/src/table/datatable/button-ext/dataTables.buttons.min.js') }}"></script>
    {{-- @vite(['resources/js/apps/invoice-list.js']) --}}
@endsection
