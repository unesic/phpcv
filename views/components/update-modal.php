<div class="modal fade" id="update-modal" role="dialog" aria-hidden="true">

    <div class="modal-dialog" role="document">

        <div class="modal-content">

            <div class="modal-header">
                <h5 class="modal-title"><?php echo $this->type; ?></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>

            <form method="POST">

                <div class="modal-body">

                    <div class="form-group">
                        <label for="text">Simple Text</label>
                        <textarea name="text" id="text" class="form-control"><?php echo $this->content; ?></textarea>
                    </div>

                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <input type="submit" name="update" class="btn btn-primary" value="Save">
                </div>

            </form>

        </div>

    </div>

</div>

<script>
    $("#update-modal").appendTo("body");
</script>