<div class="modal fade" id="changeRole" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                <h5 class="modal-title" id="exampleModalLabel">تغيير الوظيفة</h5>
            </div>
            <div class="modal-body">
                <form action="{{ route('user.changeRole', $user) }}" method="post">
                    @csrf
                    <div class="form-group">
                        <label> وظيفة المستخدم</label>
                        <select class="form-control" name="role">
                            @foreach($roles as $role)
                                <option value="{{ $role->name }}" @if($user->role) @if($role->name == $user->role->name) selected @endif @endif>{{ $role->display_name }}</option>
                            @endforeach
                        </select>
                    </div>
                    @error("role")
                    <div class="alert alert-danger">{{ $message }}</div>
                    @enderror

                    <div class="submit-btn">
                        <button type="submit" class="brown">حفظ التعديلات</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
</div>
