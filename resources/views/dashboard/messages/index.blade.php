@extends('layouts.app', [
    'title' => ' الرسائل',
    'catName' => 'messages',
    'breadcrumbs' => [' الرسائل'],
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

                <a href="{{ route('messages.create') }}" class="btn btn-primary">اضافة رسالة جديده</a>
                <a href="{{ route('messages.index') }}" class="btn btn-secondary">الكل :
                    {{ App\Models\Message::count() }} </a>
                <a href="{{ route('messages.index', ['read' => 'yes']) }}" class="btn btn-success ">مقروءه :
                    {{ App\Models\Message::read()->count() }}</a>
                <a href="{{ route('messages.index', ['read' => 'no']) }}"class="btn btn-danger ">غير مقروءه :
                    {{ App\Models\Message::notread()->count() }}</a>


            </div>
            <form action="{{ route('messages.index') }}" method="get" class="form-group" id="">
                <select name="filter_user" id="" class="form-control" onchange="this.form.submit()">
                    <option value="">اختر المستخدم</option>
                    @foreach (App\Models\User::users()->active()->pluck('id', 'name') as $name => $id)
                        <option @selected(request('filter_user') && request('filter_user') == $id) value="{{ $id }}">
                            {{ $name }}</option>
                    @endforeach
                </select>
            </form>
            <form action="{{ route('messages.index') }}" method="get">
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
                            <th>المستخدم</th>
                            <th>العنوان</th>
                            <th>الرسالة</th>
                            <th>تاريخ الانشاء</th>
                            <th>الحالة</th>
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
                                        <p class="align-self-center mb-0 user-name">{{ $item->user->name }} </p>
                                    </div>
                                </td>
                                <td>{{ $item->title }}</td>
                                <td>{{ $item->message }}</td>


                                <td><span class="inv-date"><svg xmlns="http://www.w3.org/2000/svg" width="24"
                                            height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                            stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                                            class="feather feather-calendar">
                                            <rect x="3" y="4" width="18" height="18" rx="2" ry="2">
                                            </rect>
                                            <line x1="16" y1="2" x2="16" y2="6"></line>
                                            <line x1="8" y1="2" x2="8" y2="6"></line>
                                            <line x1="3" y1="10" x2="21" y2="10"></line>
                                        </svg>
                                        {{ $item->created_at->format('d-m-Y') }}
                                    </span>
                                </td>
                                <td>
                                    <span
                                        class="badge {{ $item->read_at ? 'bg-success' : 'bg-danger' }} ">{{ $item->read_at ? 'مقروءه' : 'غير مقروءه' }}</span>
                                </td>

                                <td>


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

                                    @include('dashboard.messages.model-delete')
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
