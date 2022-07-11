{{-- Modals --}}
{{-- Create Target Modal --}}
<div class="modal fade" id="CreateTargetModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
aria-hidden="true">
<div class="modal-dialog" role="document">
  <div class="modal-content">
    <div class="modal-header text-center">
      <h4 class="modal-title w-100 font-weight-bold">Tracking Tool for Monitoring Assignments</h4>
      <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
        <span aria-hidden="true">&times;</span>
      </button>
    </div>
    <div class="modal-body mx-3">
      <div class="form-floating mb-3">
        <input type="text" class="form-control" id="floatingInput" name="subject" placeholder="sample" form="targetForm" required>
        <label for="floatingInput">Subject</label>
      </div>            
      <div class="form-floating mb-3">
        <select type="text" class="form-control" id="floatingInput" name="user_id" placeholder="sample" form="targetForm" required>
            <option value="">Select Action Officer</option>
            @foreach ($users as $user)
                <option value="{{ $user['id'] }}">{{ $user['name'] }}</option>
            @endforeach
        </select>
        <label for="floatingInput">Action Officer</label>
      </div>
      <div class="form-floating mb-3">
        <input type="text" class="form-control" id="floatingInput" name="output" placeholder="sample" form="targetForm" required>
        <label for="floatingInput">Output</label>
      </div>   
    </div>
    <input type="hidden" name="set_user_id" form="targetForm" value="{{ Auth::user()->id }}">
    <form action="/tracking" method="POST" id="targetForm">
      @csrf
    </form>
    <div class="modal-footer d-flex justify-content-center">
      <button type="submit" class="btn btn-default" form="targetForm">Create</button>
    </div>
  </div>
</div>
</div>