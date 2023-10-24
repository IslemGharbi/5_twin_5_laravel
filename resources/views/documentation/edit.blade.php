<div class="modal fade" id="editdocumentationModal" tabindex="-1" role="dialog" aria-labelledby="editdocumentationModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title bounce-left-right" id="editdocumentationModalLabel" style="color: #f9a556">edit document</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close" style="color: #f9a556">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <!-- Add Notes Form -->
                <form method="POST" action="{{ route('documentation.store') }}" enctype="multipart/form-data">
                    <form>
                    @csrf 
                    <div class="form-group">
                        <label for="picture" style="color: #f9a556;">File</label>
                        <input type="file" class="form-control" name="file" id="file">
                    </div>
                    <div class="form-group">
                        <label for="subject" style="color: #f9a556;">Title</label>
                        <input type="text" class="form-control" name="title" id="title" placeholder="Enter the subject" required>
                    </div>
                   
                    <button type="submit" class="btn btn-light" style="color: #f9a556;">Save</button>
                </form>
            </div>
        </div>
    </div>
</div>
<script>
    $(document).ready(function () {
        $('#animated-text').click(function () {
            $('#editdocumentationModal').modal('show');
        });
    });
</script>