<!-- Modal -->
<div class="modal fade" id="exampleModalEdite{{ $item->id }}" tabindex="-1" role="dialog"
    aria-labelledby="exampleModalLabel" aria-hidden="true">

    <form action="{{ route('categories.update', $item->id) }}" method="POST" class="modal-dialog" role="document">
        @csrf
        @method('PUT')
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">تعديل تصنيف</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                    <svg aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                        viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                        stroke-linejoin="round" class="feather feather-x">
                        <line x1="18" y1="6" x2="6" y2="18"></line>
                        <line x1="6" y1="6" x2="18" y2="18"></line>
                    </svg>
                </button>
            </div>
            <div class="modal-body">
                <div class="col-md-12">
                    <div class="form-group">
                        <label for="name">الاسم</label>
                        <input type="text" class="form-control " id="name" value="{{ $item->name }}"
                            name="name" placeholder="الاسم">
                    </div>
                    @error('name')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>



                <div class="col-md-12">
                    <div class="form-group">
                        <label for="status">الحالة</label>
                        <select class="form-select mb-3" id="status" name="status">
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
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-light-dark" data-bs-dismiss="modal">الغاء</button>
                <button type="submit" class="btn btn-success">حفظ</button>
            </div>
        </div>
    </form>
</div>
