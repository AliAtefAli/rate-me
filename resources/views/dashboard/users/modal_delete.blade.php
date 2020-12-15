<div class="modal fade  custom-imodal" id="delete-user-{{$user->id}}" tabindex="-1"
     role="dialog" aria-labelledby="exampleModalLabel"
     aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">خذف المستخدم</h5>
                <button type="button" class="close" data-dismiss="modal"
                        aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body custom-addpro">
                <div class="add-form">
                    <div class="contact-page">
                        <form action="{{ route('user.destroy', $user->id) }}"
                              method="post">
                            @csrf
                            @method('DELETE')
                            <h2>هل تريد حذف  {{ $user->name }} ؟</h2>

                            <div class="submit-btn">
                                <button type="submit" class="brown">حذف</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
