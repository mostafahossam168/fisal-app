@extends('layouts.app', [
    'title' => ' المنتجات',
    'catName' => 'products',
    'breadcrumbs' => [' المنتجات'],
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

                <a href="{{ route('products.create') }}" class="btn btn-primary">اضافة منتج جديد</a>
                <a href="{{ route('products.index') }}" class="btn btn-secondary">الكل :
                    {{ App\Models\Product::count() }} </a>
                <a href="{{ route('products.index', ['status' => 1]) }}" class="btn btn-success ">مفعلين :
                    {{ App\Models\Product::active()->count() }}</a>
                <a href="{{ route('products.index', ['status' => 0]) }}"class="btn btn-danger ">غير مفعلين :
                    {{ App\Models\Product::inactive()->count() }}</a>
            </div>
            <div class="d-flex gap-2">

                <form action="{{ route('products.index') }}" method="get" class="form-group" id="">
                    <select name="filter_user" id="" class="form-control" onchange="this.form.submit()">
                        <option value="">اختر المستخدم</option>
                        @foreach (App\Models\User::users()->active()->pluck('id', 'name') as $name => $id)
                            <option @selected(request('filter_user') && request('filter_user') == $id) value="{{ $id }}">
                                {{ $name }}</option>
                        @endforeach
                    </select>
                </form>
                <form action="{{ route('products.index') }}" method="get" class="form-group" id="">
                    <input type="date" name="filter_date" class="form-control" id=""
                        onchange="this.form.submit()" value="{{ request('filter_date') }}">
                </form>
            </div>
            <form action="{{ route('products.index') }}" method="get">
                <input type="search" name="search" class="form-control" id="" value="{{ request('search') }}"
                    placeholder="البحث .......">
            </form>
        </div>
        {{-- {{ route('products.bulk-delete') }} --}}

        <div>
            {{-- <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#deletechecked">حذف
                المحدد</button> --}}

            <button type="button" class="btn btn-danger" id="openDeleteModal">حذف المحدد</button>

        </div>
        <div class="modal fade" id="deletechecked" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
            aria-hidden="true">

            <form action="{{ route('products.bulk-delete') }}" method="POST" class="modal-dialog" role="document">
                @csrf
                @method('POST')
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">حذف المنتجات</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                            <svg aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                stroke-linecap="round" stroke-linejoin="round" class="feather feather-x">
                                <line x1="18" y1="6" x2="6" y2="18"></line>
                                <line x1="6" y1="6" x2="18" y2="18"></line>
                            </svg>
                        </button>
                    </div>
                    <div class="modal-body">
                        <p class="modal-text">هل انت متاكد من عملية الحذف ؟ </p>
                        <input type="hidden" name="ids" id="selected-ids">
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-light-dark" data-bs-dismiss="modal">الغاء</button>
                        <button type="submit" class="btn btn-danger">حذف</button>
                    </div>
                </div>
            </form>
        </div>



        <div class="col-xl-12 col-lg-12 col-sm-12 layout-top-spacing layout-spacing">
            <div class="widget-content widget-content-area br-8">
                <table id="invoice-list" class="table dt-table-hover" style="width:100%">
                    <thead>
                        <tr>
                            <th>
                                <input type="checkbox" id="select-all">
                            </th>
                            <th>#</th>
                            <th>الاسم</th>
                            <th>رقم المنتح</th>
                            <th>الباركود</th>
                            <th>الصوره</th>
                            <th>الشهادة</th>
                            <th>التصنيف</th>
                            <th>الحالة</th>
                            <th>المستخدم</th>
                            <th>تاريخ الانشاء</th>
                            <th>العمليات</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($items as $item)
                            <tr>
                                <td>
                                    <input type="checkbox" name="selected_items[]" value="{{ $item->id }}"
                                        class="item-checkbox">
                                </td>
                                <td>{{ $loop->index + 1 }}
                                </td>
                                <td>
                                    <div class="d-flex">
                                        <p class="align-self-center mb-0 user-name">{{ $item->name }} </p>
                                    </div>
                                </td>
                                <td>{{ $item->product_number }}
                                </td>
                                <td> {!! DNS1D::getBarcodeHTML($item->barcode . '', 'C128') !!}
                                    {{ $item->barcode }}
                                </td>
                                <td>
                                    @if ($item->image)
                                        <img alt="avatar" class=""
                                            style="width: 50px; height:50px; border-radius:50%;"
                                            src="{{ display_file($item->image) }}">
                                    @else
                                        <span class="text-danger">لايوجد</span>
                                    @endif

                                </td>
                                <td>
                                    @if ($item->certificate)
                                        <a href="{{ display_file($item->certificate) }}" class="btn btn-sm btn-danger"
                                            download="">تحميل</a>
                                    @else
                                        <span class="text-danger">لايوجد</span>
                                    @endif
                                </td>

                                <td>{{ $item->category->name }}
                                <td>
                                    <span class="badge {{ $item->status->color() }} ">{{ $item->status->name() }}</span>
                                </td>
                                <td><span class="inv-amount">{{ $item->user->name }}</span></td>
                                <td><span class="inv-date"><svg xmlns="http://www.w3.org/2000/svg" width="24"
                                            height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                            stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                                            class="feather feather-calendar">
                                            <rect x="3" y="4" width="18" height="18" rx="2"
                                                ry="2">
                                            </rect>
                                            <line x1="16" y1="2" x2="16" y2="6"></line>
                                            <line x1="8" y1="2" x2="8" y2="6"></line>
                                            <line x1="3" y1="10" x2="21" y2="10"></line>
                                        </svg> {{ $item->created_at->format('d-m-Y') }} </span></td>
                                <td>
                                    <a class="badge badge-light-primary text-start me-2 action-eye"
                                        href="{{ route('products.show', $item->id) }}" title="عرض المنتج">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20"
                                            viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                            stroke-linecap="round" stroke-linejoin="round" class="feather feather-eye">
                                            <path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z" />
                                            <circle cx="12" cy="12" r="3" />
                                        </svg>
                                    </a>


                                    <a class="badge badge-light-primary text-start me-2 action-edit"
                                        href="{{ route('products.edit', $item->id) }}"><svg
                                            xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                            viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                            stroke-linecap="round" stroke-linejoin="round"
                                            class="feather feather-edit-3">
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

                                    @include('dashboard.products.model-delete')
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

    <script>
        // عند الضغط على الهيدر (select-all)
        document.getElementById('select-all').addEventListener('click', function() {
            let checkboxes = document.querySelectorAll('.item-checkbox');
            checkboxes.forEach(checkbox => {
                checkbox.checked = this.checked;
            });
        });

        // وظيفة: كل مرة أحدد او الغي تحديد عنصر، نشوف نعمل ايه في الهيدر
        function updateSelectAllCheckbox() {
            let checkboxes = document.querySelectorAll('.item-checkbox');
            let allChecked = Array.from(checkboxes).every(checkbox => checkbox.checked);
            document.getElementById('select-all').checked = allChecked;
        }

        // اربط الحدث على كل شيك بوكس
        document.querySelectorAll('.item-checkbox').forEach(cb => {
            cb.addEventListener('change', updateSelectAllCheckbox);
        });

        // لما يضغط زرار حذف المحدد
        var deleteModalButton = document.querySelector('[data-bs-target="#deletechecked"]');
        deleteModalButton.addEventListener('click', function() {
            let selected = [];
            document.querySelectorAll('.item-checkbox:checked').forEach(cb => {
                selected.push(cb.value);
            });

            if (selected.length === 0) {
                alert('من فضلك حدد على الأقل منتج واحد');
                var modal = bootstrap.Modal.getOrCreateInstance(document.getElementById('deletechecked'));
                modal.hide();
                return;
            }

            document.getElementById('selected-ids').value = selected.join(',');
        });
    </script>

    <script>
        document.getElementById('openDeleteModal').addEventListener('click', function() {
            let selected = [];
            document.querySelectorAll('.item-checkbox:checked').forEach(cb => {
                selected.push(cb.value);
            });

            if (selected.length === 0) {
                alert('من فضلك حدد على الأقل منتج واحد');
                return; // نوقف هنا ومش نكمل
            }

            // لو في منتجات محددة
            document.getElementById('selected-ids').value = selected.join(',');

            // نفتح المودال يدوي
            var deleteModal = new bootstrap.Modal(document.getElementById('deletechecked'));
            deleteModal.show();
        });
    </script>
@endsection
