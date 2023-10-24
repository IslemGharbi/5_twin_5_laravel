<div class="container">
    <div class="frame">

        <!-- Title text -->
        <h3 id="animated-text" data-toggle="modal" data-target="#addNotesModal">press to ADD notes </h3>
      </div>

</div>
</div>

<!-- Add Notes Modal with Blue Style -->
<!-- Add Notes Modal with Labels in Blue -->
<div class="modal fade" id="addNotesModal" tabindex="-1" role="dialog" aria-labelledby="addNotesModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title bounce-left-right" id="addNotesModalLabel" style="color: #5672f9">Add Notes</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close" style="color: #5672f9">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <!-- Add Notes Form -->
                <form method="POST" action="{{ route('notes.create') }}" enctype="multipart/form-data">
                    <form>
                    @csrf 
                    <div class="form-group">

                        @cloudinaryJS
                        

                        <label for="picture" style="color: #5672f9;">Picture</label>
                        <input type="file" class="form-control" name="picture" id="picture">
                    </div>
                    <div class="form-group">
                        <label for="subject" style="color: #5672f9;">Subject</label>
                        <input type="text" class="form-control" name="subject" id="subject" placeholder="Enter the subject" required>
                    </div>
                    <div class="form-group">
                        <label for="details" style="color: #5672f9;">Details</label>
                        <textarea class="form-control" name="details" id="details" rows="4" placeholder="Enter the details"></textarea>
                    </div>
                    <div class="form-group">
                        <label for="deadline" style="color: #5672f9;">Deadline</label>
                        <input type="date" class="form-control" name="deadline" id="deadline">
                    </div>
                    <button type="submit" class="btn btn-light" style="color: #5672f9;">Save</button>
                </form>
            </div>
        </div>
    </div>
</div>
<script>
    $(document).ready(function () {
        $('#animated-text').click(function () {
            $('#addNotesModal').modal('show');
        });
    });
</script>