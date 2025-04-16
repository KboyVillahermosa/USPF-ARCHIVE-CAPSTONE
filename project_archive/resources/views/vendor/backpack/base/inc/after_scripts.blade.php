<!-- Add this to your after_scripts.blade.php file -->

<!-- Rejection Modal -->
<div class="modal fade" id="rejectModal" tabindex="-1" role="dialog" aria-labelledby="rejectModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="rejectModalLabel">Reject Research Submission</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form id="rejectForm" method="POST" action="">
        @csrf
        <div class="modal-body">
          <div class="form-group">
            <label for="rejection_reason">Reason for Rejection</label>
            <textarea class="form-control" id="rejection_reason" name="rejection_reason" rows="4" required
              placeholder="Please provide detailed feedback on why this submission is being rejected"></textarea>
            <small class="form-text text-muted">This feedback will be sent to the faculty member.</small>
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
          <button type="submit" class="btn btn-danger">Reject Submission</button>
        </div>
      </form>
    </div>
  </div>
</div>

<!-- Abstract Modal -->
<div class="modal fade" id="abstractModal" tabindex="-1" role="dialog" aria-labelledby="abstractModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="abstractModalLabel">Research Abstract</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div id="abstractContent"></div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>

<script>
  // Set up the reject modal to update the form action
  $('#rejectModal').on('show.bs.modal', function (event) {
    var button = $(event.relatedTarget);
    var researchId = button.data('research-id');
    var modal = $(this);
    
    modal.find('#rejectForm').attr('action', '{{ url("admin/research/reject") }}/' + researchId);
  });
  
  // Set up the abstract modal to show abstract content
  $('#abstractModal').on('show.bs.modal', function (event) {
    var button = $(event.relatedTarget);
    var abstract = button.data('abstract');
    var title = button.data('title');
    var modal = $(this);
    
    modal.find('.modal-title').text(title + ' - Abstract');
    modal.find('#abstractContent').html(abstract);
  });
</script>