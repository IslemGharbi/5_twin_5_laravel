

<!-- edit Notes Modal with Blue Style -->
<!-- edit Notes Modal with Labels in Blue -->
<div class="modal fade" id="editNotesModal" tabindex="-1" role="dialog" aria-labelledby="editNotesModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title bounce-left-right" id="editNotesModalLabel" style="color: #f9d856">Edit Notes</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close" style="color: #f9d856">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <!-- Edit Notes Form -->
                <form method="POST" action="{{ route('notes.update', ['id' => $note->id]) }}" enctype="multipart/form-data">
                    @csrf
                    @method('PUT') <!-- This sets the form method to PUT -->

                    <div class="form-group">
                        @cloudinaryJS
                        <label for="picture" style="color: #f9d856;">Picture</label>
                        <input type="file" class="form-control" name="picture" id="picture">
                    </div>
                    <div class="form-group">
                        <label for="subject" style="color: #f9d856;">Subject</label>
                        <input type="text" class="form-control" name="subject" id="subject" value="{{ $note->subject }}" required>
                    </div>
                    <div class="form-group">
                        <label for="details" style="color: #f9d856;">Details</label>
                        <textarea class="form-control" name="details" id="details" rows="4" required>{{ $note->details }}</textarea>
                    </div>
                    <div class="form-group">
                        <label for="deadline" style="color: #f9d856;">Deadline</label>
                        <input type="date" class="form-control" name="deadline" id="deadline" value="{{ $note->deadline }}">
                    </div>
                    <button type="submit" class="btn btn-light" style="color: #f9d856;">Save</button>
                </form>
            </div>
        </div>
    </div>
</div>

<script>
    $(document).ready(function () {
        $('#animated-text').click(function () {
            $('#edditNotesModal').modal('show');
        });
    });
</script>