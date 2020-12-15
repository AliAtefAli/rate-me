<div class="modal fade" id="reply-notification" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                <h5 class="modal-title" id="exampleModalLabel">رد علي الرسالة باشعار</h5>
            </div>
            <div class="modal-body">
                <form action="{{ route('complaint.replyNotification', $complaint->id ) }}" method="post">
                    @csrf
                    @method('PUT')
                    <div class="form-group">
                        <textarea class="form-control" name="answer"></textarea>
                    </div>

                    <button class="btn btn-success">رد</button>
                </form>
            </div>
        </div>
    </div>
</div>
