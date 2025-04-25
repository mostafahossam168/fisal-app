                <!-- Modal -->
                <div class="modal fade" id="exampleModal{{ $item->id }}" tabindex="-1" role="dialog"
                    aria-labelledby="exampleModalLabel" aria-hidden="true">

                    <form action="{{ route('users.destroy', $item->id) }}" method="POST" class="modal-dialog"
                        role="document">
                        @csrf
                        @method('DELETE')
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">حذف المستخدم</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                                    <svg aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24"
                                        height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                        stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                                        class="feather feather-x">
                                        <line x1="18" y1="6" x2="6" y2="18"></line>
                                        <line x1="6" y1="6" x2="18" y2="18"></line>
                                    </svg>
                                </button>
                            </div>
                            <div class="modal-body">
                                <p class="modal-text">هل انت متاكد من عملية الحذف ؟ </p>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-light-dark" data-bs-dismiss="modal">الغاء</button>
                                <button type="submit" class="btn btn-danger">حذف</button>
                            </div>
                        </div>
                    </form>
                </div>
