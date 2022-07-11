{{-- Modals --}}
{{-- Create Output Modal --}}
<div class="modal fade" id="CreateOutputModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
aria-hidden="true">
<div class="modal-dialog" role="document">
  <div class="modal-content">
    <div class="modal-header text-center">
      <h4 class="modal-title w-100 font-weight-bold">Output</h4>
      <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
        <span aria-hidden="true">&times;</span>
      </button>
    </div>
    <div class="modal-body mx-3">
      <div class="form-floating mb-3">
        <input type="text" class="form-control" id="floatingInput" name="code" placeholder="sample" form="outputForm" required>
        <label for="floatingInput">Code</label>
      </div>            
      <div class="form-floating mb-3">
        <input type="text" class="form-control" id="floatingInput" name="output" placeholder="sample" form="outputForm" required>
        <label for="floatingInput">Output</label>
      </div>
      <input type="hidden" id="funct_id" name="funct_id" form="outputForm">
      <input type="hidden" id="user_id" name="user_id" form="outputForm" value="{{ Auth::user()->id}}">
    </div>
    <form action="IPCR?insert=output" method="POST" id="outputForm">
      @csrf
    </form>
    <div class="modal-footer d-flex justify-content-center">
      <button type="submit" class="btn btn-default" form="outputForm">Create</button>
    </div>
  </div>
</div>
</div>

{{-- Create Sub MFO Modal --}}
<div class="modal fade" id="CreateSubMFOModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
aria-hidden="true">
<div class="modal-dialog" role="document">
  <div class="modal-content">
    <div class="modal-header text-center">
      <h4 class="modal-title w-100 font-weight-bold">Sub Output</h4>
      <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
        <span aria-hidden="true">&times;</span>
      </button>
    </div>
    <div class="modal-body mx-3">
      <div class="form-floating mb-3">
        <input type="text" class="form-control" id="floatingInput" name="suboutput" placeholder="sample" form="suboutputForm" required>
        <label for="floatingInput">Suboutput</label>
      </div>
      <input type="hidden" id="output_id" name="output_id" form="suboutputForm">
      <input type="hidden" id="user_id" name="user_id" form="suboutputForm" value="{{ Auth::user()->id}}">
    </div>
    <form action="IPCR?insert=suboutput" method="POST" id="suboutputForm">
      @csrf
    </form>
    <div class="modal-footer d-flex justify-content-center">
      <button type="submit" class="btn btn-default" form="suboutputForm">Create</button>
    </div>
  </div>
</div>
</div>

{{-- Create Target Modal --}}
<div class="modal fade" id="CreateTargetModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
aria-hidden="true">
<div class="modal-dialog" role="document">
  <div class="modal-content">
    <div class="modal-header text-center">
      <h4 class="modal-title w-100 font-weight-bold">Target</h4>
      <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
        <span aria-hidden="true">&times;</span>
      </button>
    </div>
    <div class="modal-body mx-3">
      <div class="form-floating mb-3">
        <input type="text" class="form-control" id="floatingInput" name="target" placeholder="sample" form="targetForm" required>
        <label for="floatingInput">Success Indicator</label>
      </div>
      <input type="hidden" id="output_id" name="output_id" form="targetForm">
      <input type="hidden" id="suboutput_id" name="suboutput_id" form="targetForm">
      <input type="hidden" id="user_id" name="user_id" form="targetForm" value="{{ Auth::user()->id}}">
    </div>
    <form action="IPCR?insert=target" method="POST" id="targetForm">
      @csrf
    </form>
    <div class="modal-footer d-flex justify-content-center">
      <button type="submit" class="btn btn-default" form="targetForm">Create</button>
    </div>
  </div>
</div>
</div>

{{-- Edit Output Modal --}}
<div class="modal fade" id="EditOutputModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
aria-hidden="true">
<div class="modal-dialog" role="document">
  <div class="modal-content">
    <div class="modal-header text-center">
      <h4 class="modal-title w-100 font-weight-bold">Output</h4>
      <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
        <span aria-hidden="true">&times;</span>
      </button>
    </div>
    <div class="modal-body mx-3">
      <div class="form-floating mb-3">
        <input type="text" class="form-control code" id="floatingInput" name="code" placeholder="sample" form="editOutputForm" required>
        <label for="floatingInput">Code</label>
      </div>            
      <div class="form-floating mb-3">
        <input type="text" class="form-control output" id="floatingInput" name="output" placeholder="sample" form="editOutputForm" required>
        <label for="floatingInput">Output</label>
      </div>
      <input type="hidden" id="output_id" name="output_id" form="editOutputForm">
    </div>
    <form action="IPCR?update=output" method="POST" id="editOutputForm">
      @csrf
      @method('PUT')
    </form>
    <div class="modal-footer d-flex justify-content-center">
      <button type="submit" class="btn btn-success" form="editOutputForm">Update</button>
    </div>
  </div>
</div>
</div>

{{-- Edit Subutput Modal --}}
<div class="modal fade" id="EditSuboutputModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
aria-hidden="true">
<div class="modal-dialog" role="document">
  <div class="modal-content">
    <div class="modal-header text-center">
      <h4 class="modal-title w-100 font-weight-bold">Suboutput</h4>
      <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
        <span aria-hidden="true">&times;</span>
      </button>
    </div>
    <div class="modal-body mx-3"> 
      <div class="form-floating mb-3">
        <input type="text" class="form-control suboutput" id="floatingInput" name="suboutput" placeholder="sample" form="editSuboutputForm" required>
        <label for="floatingInput">Suboutput</label>
      </div>
      <input type="hidden" id="suboutput_id" name="suboutput_id" form="editSuboutputForm">
    </div>
    <form action="IPCR?update=suboutput" method="POST" id="editSuboutputForm">
      @csrf
      @method('PUT')
    </form>
    <div class="modal-footer d-flex justify-content-center">
      <button type="submit" class="btn btn-success" form="editSuboutputForm">Update</button>
    </div>
  </div>
</div>
</div>

{{-- Edit Target Modal --}}
<div class="modal fade" id="EditTargetModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
aria-hidden="true">
<div class="modal-dialog" role="document">
  <div class="modal-content">
    <div class="modal-header text-center">
      <h4 class="modal-title w-100 font-weight-bold">Target</h4>
      <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
        <span aria-hidden="true">&times;</span>
      </button>
    </div>
    <div class="modal-body mx-3"> 
      <div class="form-floating mb-3">
        <input type="text" class="form-control target" id="floatingInput" name="target" placeholder="sample" form="editTargetForm" required>
        <label for="floatingInput">Target</label>
      </div>
      <input type="hidden" id="target_id" name="target_id" form="editTargetForm">
    </div>
    <form action="IPCR?update=target" method="POST" id="editTargetForm">
      @csrf
      @method('PUT')
    </form>
    <div class="modal-footer d-flex justify-content-center">
      <button type="submit" class="btn btn-success" form="editTargetForm">Update</button>
    </div>
  </div>
</div>
</div>

{{-- Submit IPCR Modal --}}
<div class="modal fade" id="SubmitIpcrModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
aria-hidden="true">
<div class="modal-dialog" role="document">
  <div class="modal-content">
    <div class="modal-header text-center">
      <h4 class="modal-title w-100 font-weight-bold">Submit IPCR</h4>
      <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
        <span aria-hidden="true">&times;</span>
      </button>
    </div>
    <div class="modal-body mx-3"> 
      <div class="form-floating mb-3">
        <select type="text" class="form-control" id="floatingInput" name="headoffice_id" placeholder="sample" form="submitIpcrForm" required>
            <option value="">Select Head of Office</option>
            @foreach ($users as $user)
              @if ($user->accountType->account_type == 'Head of Agency' || $user->accountType->account_type == 'Head of Delivery Unit')
                <option value="{{ $user['id'] }}">{{ $user['name'] }}</option>
              @endif
            @endforeach
        </select>
        <label for="floatingInput">Head of Office</label>
      </div>
      <div class="form-floating mb-3">
        <select type="text" class="form-control" id="floatingInput" name="hdu_id" placeholder="sample" form="submitIpcrForm" required>
            <option value="">Select Head of Units</option>
            @foreach ($users as $user)
              @if ($user->accountType->account_type == 'Head of Agency' || $user->accountType->account_type == 'Head of Delivery Unit')
                <option value="{{ $user['id'] }}">{{ $user['name'] }}</option>
              @endif
            @endforeach
        </select>
        <label for="floatingInput">Head of Units</label>
      </div>
      <input type="hidden" id="user_id" name="user_id" value="{{ Auth::user()->id }}" form="submitIpcrForm">
    </div>
    <form action="IPCR/submit?submit=ipcr" method="POST" id="submitIpcrForm">
      @csrf
    </form>
    <div class="modal-footer d-flex justify-content-center">
      <button type="submit" class="btn btn-primary" form="submitIpcrForm">Submit</button>
    </div>
  </div>
</div>
</div>

{{-- Submit Standard Modal --}}
<div class="modal fade" id="SubmitStandardModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
aria-hidden="true">
<div class="modal-dialog" role="document">
  <div class="modal-content">
    <div class="modal-header text-center">
      <h4 class="modal-title w-100 font-weight-bold">Submit Standard</h4>
      <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
        <span aria-hidden="true">&times;</span>
      </button>
    </div>
    <div class="modal-body mx-3"> 
      <div class="form-floating mb-3">
        <select type="text" class="form-control" id="floatingInput" name="headoff_id" placeholder="sample" form="submitStandardForm" required>
            <option value="">Select Head of Office</option>
            @foreach ($users as $user)
                <option value="{{ $user['id'] }}">{{ $user['name'] }}</option>
            @endforeach
        </select>
        <label for="floatingInput">Head of Office</label>
      </div>
      <div class="form-floating mb-3">
        <select type="text" class="form-control" id="floatingInput" name="headunit_id" placeholder="sample" form="submitStandardForm" required>
            <option value="">Select Head of Units</option>
            @foreach ($users as $user)
                <option value="{{ $user['id'] }}">{{ $user['name'] }}</option>
            @endforeach
        </select>
        <label for="floatingInput">Head of Units</label>
      </div>
      <input type="hidden" id="user_id" name="user_id" value="{{ Auth::user()->id }}" form="submitStandardForm">
    </div>
    <form action="#" method="GET" id="submitStandardForm">
      @csrf
    </form>
    <div class="modal-footer d-flex justify-content-center">
      <button type="submit" class="btn btn-primary" form="submitStandardForm">Submit</button>
    </div>
  </div>
</div>
</div>


{{-- Create Target Rating Modal --}}
<div class="modal fade" id="CreateTargetRateModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
aria-hidden="true">
<div class="modal-dialog" role="document">
  <div class="modal-content">
    <div class="modal-header text-center">
      <h4 class="modal-title w-100 font-weight-bold">Rating</h4>
      <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
        <span aria-hidden="true">&times;</span>
      </button>
    </div>
    <div class="modal-body mx-3">
      <div class="form-floating mb-3">
        <input type="text" class="form-control" id="floatingInput" name="accomplishment" placeholder="sample" form="createRateForm" required>
        <label for="floatingInput">Actual Accomplishment</label>
      </div>            
      <div class="form-floating mb-3">
        <input type="number" class="form-control" id="floatingInput" name="efficiency" placeholder="sample" form="createRateForm" required>
        <label for="floatingInput">Efficiency</label>
      </div>            
      <div class="form-floating mb-3">
        <input type="number" class="form-control" id="floatingInput" name="quality" placeholder="sample" form="createRateForm" required>
        <label for="floatingInput">Quality</label>
      </div>            
      <div class="form-floating mb-3">
        <input type="number" class="form-control" id="floatingInput" name="timeliness" placeholder="sample" form="createRateForm" required>
        <label for="floatingInput">Timeliness</label>
      </div>
      <input type="hidden" id="target_id" name="target_id" form="createRateForm">
      <input type="hidden" name="user_id" value="{{ Auth::user()->id }}" form="createRateForm">
    </div>
    <form action="IPCR?insert=rating" method="POST" id="createRateForm">
      @csrf
    </form>
    <div class="modal-footer d-flex justify-content-center">
      <button type="submit" class="btn btn-default" form="createRateForm">Create</button>
    </div>
  </div>
</div>
</div>

{{-- Edit Target Rating Modal --}}
<div class="modal fade" id="EditTargetRateModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
aria-hidden="true">
<div class="modal-dialog" role="document">
  <div class="modal-content">
    <div class="modal-header text-center">
      <h4 class="modal-title w-100 font-weight-bold">Target</h4>
      <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
        <span aria-hidden="true">&times;</span>
      </button>
    </div>
    <div class="modal-body mx-3"> 
      <div class="form-floating mb-3">
        <input type="text" class="form-control accomplishment" id="floatingInput" name="accomplishment" placeholder="sample" form="editTargetRateForm" required>
        <label for="floatingInput">Accomplishment</label>
      </div>
      <div class="form-floating mb-3">
        <input type="text" class="form-control efficiency" id="floatingInput" name="efficiency" placeholder="sample" form="editTargetRateForm" required>
        <label for="floatingInput">Efficiency</label>
      </div>
      <div class="form-floating mb-3">
        <input type="text" class="form-control quality" id="floatingInput" name="quality" placeholder="sample" form="editTargetRateForm" required>
        <label for="floatingInput">Quality</label>
      </div>
      <div class="form-floating mb-3">
        <input type="text" class="form-control timeliness" id="floatingInput" name="timeliness" placeholder="sample" form="editTargetRateForm" required>
        <label for="floatingInput">Timeliness</label>
      </div>
      <input type="hidden" id="rating_id" name="rating_id" form="editTargetRateForm">
    </div>
    <form action="IPCR?update=rating" method="POST" id="editTargetRateForm">
      @csrf
      @method('PUT')
    </form>
    <div class="modal-footer d-flex justify-content-center">
      <button type="submit" class="btn btn-success" form="editTargetRateForm">Update</button>
    </div>
  </div>
</div>
</div>

{{-- Create Standard Modal --}}
<div class="modal fade" id="CreateStandardModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
aria-hidden="true">
<div class="modal-dialog" role="document">
  <div class="modal-content">
    <div class="modal-header text-center">
      <h4 class="modal-title w-100 font-weight-bold">Standard</h4>
      <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
        <span aria-hidden="true">&times;</span>
      </button>
    </div>
    <div class="modal-body mx-3">
      <div class="d-inline-flex gap-3">
        <div>
          <h5>Efficiency</h5>
          <div class="form-floating mb-3">
            <input type="text" class="form-control" id="floatingInput" name="eff_five" placeholder="sample" form="createStandardForm">
            <label for="floatingInput">5</label>
          </div>
          <div class="form-floating mb-3">
            <input type="text" class="form-control" id="floatingInput" name="eff_four" placeholder="sample" form="createStandardForm">
            <label for="floatingInput">4</label>
          </div>
          <div class="form-floating mb-3">
            <input type="text" class="form-control" id="floatingInput" name="eff_three" placeholder="sample" form="createStandardForm">
            <label for="floatingInput">3</label>
          </div>
          <div class="form-floating mb-3">
            <input type="text" class="form-control" id="floatingInput" name="eff_two" placeholder="sample" form="createStandardForm">
            <label for="floatingInput">2</label>
          </div>
          <div class="form-floating mb-3">
            <input type="text" class="form-control" id="floatingInput" name="eff_one" placeholder="sample" form="createStandardForm">
            <label for="floatingInput">1</label>
          </div>
        </div>
        <div>
          <h5>Quality</h5>
          <div class="form-floating mb-3">
            <input type="text" class="form-control" id="floatingInput" name="qua_five" placeholder="sample" form="createStandardForm">
            <label for="floatingInput">5</label>
          </div>
          <div class="form-floating mb-3">
            <input type="text" class="form-control" id="floatingInput" name="qua_four" placeholder="sample" form="createStandardForm">
            <label for="floatingInput">4</label>
          </div>
          <div class="form-floating mb-3">
            <input type="text" class="form-control" id="floatingInput" name="qua_three" placeholder="sample" form="createStandardForm">
            <label for="floatingInput">3</label>
          </div>
          <div class="form-floating mb-3">
            <input type="text" class="form-control" id="floatingInput" name="qua_two" placeholder="sample" form="createStandardForm">
            <label for="floatingInput">2</label>
          </div>
          <div class="form-floating mb-3">
            <input type="text" class="form-control" id="floatingInput" name="qua_one" placeholder="sample" form="createStandardForm">
            <label for="floatingInput">1</label>
          </div>
        </div>
        <div>
          <h5>Timeliness</h5>
          <div class="form-floating mb-3">
            <input type="text" class="form-control" id="floatingInput" name="time_five" placeholder="sample" form="createStandardForm">
            <label for="floatingInput">5</label>
          </div>
          <div class="form-floating mb-3">
            <input type="text" class="form-control" id="floatingInput" name="time_four" placeholder="sample" form="createStandardForm">
            <label for="floatingInput">4</label>
          </div>
          <div class="form-floating mb-3">
            <input type="text" class="form-control" id="floatingInput" name="time_three" placeholder="sample" form="createStandardForm">
            <label for="floatingInput">3</label>
          </div>
          <div class="form-floating mb-3">
            <input type="text" class="form-control" id="floatingInput" name="time_two" placeholder="sample" form="createStandardForm">
            <label for="floatingInput">2</label>
          </div>
          <div class="form-floating mb-3">
            <input type="text" class="form-control" id="floatingInput" name="time_one" placeholder="sample" form="createStandardForm">
            <label for="floatingInput">1</label>
          </div>
        </div>
      </div>
      <input type="hidden" id="target_id" name="target_id" form="createStandardForm">
      <input type="hidden" name="user_id" value="{{ Auth::user()->id }}" form="createStandardForm">
    </div>
    <form action="IPCR?insert=standard" method="POST" id="createStandardForm">
      @csrf
    </form>
    <div class="modal-footer d-flex justify-content-center">
      <button type="submit" class="btn btn-default" form="createStandardForm">Create</button>
    </div>
  </div>
</div>
</div>

{{-- Edit Standard Modal --}}
<div class="modal fade" id="EditStandardModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
aria-hidden="true">
<div class="modal-dialog" role="document">
  <div class="modal-content">
    <div class="modal-header text-center">
      <h4 class="modal-title w-100 font-weight-bold">Standard</h4>
      <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
        <span aria-hidden="true">&times;</span>
      </button>
    </div>
    <div class="modal-body mx-3">
      <div class="d-inline-flex gap-3">
        <div>
          <h5>Efficiency</h5>
          <div class="form-floating mb-3">
            <input type="text" class="form-control eff_five" id="floatingInput" name="eff_five" placeholder="sample" form="editStandardForm">
            <label for="floatingInput">5</label>
          </div>
          <div class="form-floating mb-3">
            <input type="text" class="form-control eff_four" id="floatingInput" name="eff_four" placeholder="sample" form="editStandardForm">
            <label for="floatingInput">4</label>
          </div>
          <div class="form-floating mb-3">
            <input type="text" class="form-control eff_three" id="floatingInput" name="eff_three" placeholder="sample" form="editStandardForm">
            <label for="floatingInput">3</label>
          </div>
          <div class="form-floating mb-3">
            <input type="text" class="form-control eff_two" id="floatingInput" name="eff_two" placeholder="sample" form="editStandardForm">
            <label for="floatingInput">2</label>
          </div>
          <div class="form-floating mb-3">
            <input type="text" class="form-control eff_one" id="floatingInput" name="eff_one" placeholder="sample" form="editStandardForm">
            <label for="floatingInput">1</label>
          </div>
        </div>
        <div>
          <h5>Quality</h5>
          <div class="form-floating mb-3">
            <input type="text" class="form-control qua_five" id="floatingInput" name="qua_five" placeholder="sample" form="editStandardForm">
            <label for="floatingInput">5</label>
          </div>
          <div class="form-floating mb-3">
            <input type="text" class="form-control qua_four" id="floatingInput" name="qua_four" placeholder="sample" form="editStandardForm">
            <label for="floatingInput">4</label>
          </div>
          <div class="form-floating mb-3">
            <input type="text" class="form-control qua_three" id="floatingInput" name="qua_three" placeholder="sample" form="editStandardForm">
            <label for="floatingInput">3</label>
          </div>
          <div class="form-floating mb-3">
            <input type="text" class="form-control qua_two" id="floatingInput" name="qua_two" placeholder="sample" form="editStandardForm">
            <label for="floatingInput">2</label>
          </div>
          <div class="form-floating mb-3">
            <input type="text" class="form-control qua_one" id="floatingInput" name="qua_one" placeholder="sample" form="editStandardForm">
            <label for="floatingInput">1</label>
          </div>
        </div>
        <div>
          <h5>Timeliness</h5>
          <div class="form-floating mb-3">
            <input type="text" class="form-control time_five" id="floatingInput" name="time_five" placeholder="sample" form="editStandardForm">
            <label for="floatingInput">5</label>
          </div>
          <div class="form-floating mb-3">
            <input type="text" class="form-control time_four" id="floatingInput" name="time_four" placeholder="sample" form="editStandardForm">
            <label for="floatingInput">4</label>
          </div>
          <div class="form-floating mb-3">
            <input type="text" class="form-control time_three" id="floatingInput" name="time_three" placeholder="sample" form="editStandardForm">
            <label for="floatingInput">3</label>
          </div>
          <div class="form-floating mb-3">
            <input type="text" class="form-control time_two" id="floatingInput" name="time_two" placeholder="sample" form="editStandardForm">
            <label for="floatingInput">2</label>
          </div>
          <div class="form-floating mb-3">
            <input type="text" class="form-control time_one" id="floatingInput" name="time_one" placeholder="sample" form="editStandardForm">
            <label for="floatingInput">1</label>
          </div>
        </div>
      </div>
      <input type="hidden" id="standard_id" name="standard_id" form="editStandardForm">
    </div>
    <form action="IPCR?update=standard" method="POST" id="editStandardForm">
      @csrf
      @method('PUT')
    </form>
    <div class="modal-footer d-flex justify-content-center">
      <button type="submit" class="btn btn-success" form="editStandardForm">Update</button>
    </div>
  </div>
</div>
</div>



<script>
// Create Output Modal Data
const CreateOutputModal = document.getElementById('CreateOutputModal')
CreateOutputModal.addEventListener('show.bs.modal', event => {
// Button that triggered the modal
const button = event.relatedTarget
// Extract info from data-bs-* attributes
const data = button.getAttribute('data-bs-funct')
// If necessary, you could initiate an AJAX request here
// and then do the updating in a callback.
//
// Update the modal's content.
const funct = CreateOutputModal.querySelector('#funct_id')

funct.value = data
})

// Create Sub MFO Modal Data
const CreateSubMFOModal = document.getElementById('CreateSubMFOModal')
CreateSubMFOModal.addEventListener('show.bs.modal', event => {
// Button that triggered the modal
const button = event.relatedTarget
// Extract info from data-bs-* attributes
const data = button.getAttribute('data-bs-output')
// If necessary, you could initiate an AJAX request here
// and then do the updating in a callback.
//
// Update the modal's content.
const output = CreateSubMFOModal.querySelector('#output_id')

output.value = data
})

// Create Target Modal Data
const CreateTargetModal = document.getElementById('CreateTargetModal')
CreateTargetModal.addEventListener('show.bs.modal', event => {
// Button that triggered the modal
const button = event.relatedTarget
// Extract info from data-bs-* attributes
const data = button.getAttribute('data-bs-output')
const data2 = button.getAttribute('data-bs-suboutput')
// If necessary, you could initiate an AJAX request here
// and then do the updating in a callback.
//
// Update the modal's content.
const output = CreateTargetModal.querySelector('#output_id')
const suboutput = CreateTargetModal.querySelector('#suboutput_id')

output.value = data
suboutput.value = data2
})

// Edit Output Modal Data
const EditOutputModal = document.getElementById('EditOutputModal')
EditOutputModal.addEventListener('show.bs.modal', event => {
// Button that triggered the modal
const button = event.relatedTarget
// Extract info from data-bs-* attributes
const data = button.getAttribute('data-bs-code')
const data2 = button.getAttribute('data-bs-output')
const data3 = button.getAttribute('data-bs-output-id')
// If necessary, you could initiate an AJAX request here
// and then do the updating in a callback.
//
// Update the modal's content.
const code = EditOutputModal.querySelector('.code')
const output = EditOutputModal.querySelector('.output')
const output_id = EditOutputModal.querySelector('#output_id')

code.value = data
output.value = data2
output_id.value = data3
})

// Edit Suboutput Modal Data
const EditSuboutputModal = document.getElementById('EditSuboutputModal')
EditSuboutputModal.addEventListener('show.bs.modal', event => {
// Button that triggered the modal
const button = event.relatedTarget
// Extract info from data-bs-* attributes
const data = button.getAttribute('data-bs-suboutput')
const data2 = button.getAttribute('data-bs-suboutput-id')
// If necessary, you could initiate an AJAX request here
// and then do the updating in a callback.
//
// Update the modal's content.
const suboutput = EditSuboutputModal.querySelector('.suboutput')
const suboutput_id = EditSuboutputModal.querySelector('#suboutput_id')

suboutput.value = data
suboutput_id.value = data2
})

// Edit Target Modal Data
const EditTargetModal = document.getElementById('EditTargetModal')
EditTargetModal.addEventListener('show.bs.modal', event => {
// Button that triggered the modal
const button = event.relatedTarget
// Extract info from data-bs-* attributes
const data = button.getAttribute('data-bs-target-name')
const data2 = button.getAttribute('data-bs-target-id')
// If necessary, you could initiate an AJAX request here
// and then do the updating in a callback.
//
// Update the modal's content.
const target = EditTargetModal.querySelector('.target')
const target_id = EditTargetModal.querySelector('#target_id')

target.value = data
target_id.value = data2
})

// Create Target Rating Modal Data
const CreateTargetRateModal = document.getElementById('CreateTargetRateModal')
CreateTargetRateModal.addEventListener('show.bs.modal', event => {
// Button that triggered the modal
const button = event.relatedTarget
// Extract info from data-bs-* attributes
const data = button.getAttribute('data-bs-target-id')
// If necessary, you could initiate an AJAX request here
// and then do the updating in a callback.
//
// Update the modal's content.
const target_id = CreateTargetRateModal.querySelector('#target_id')

target_id.value = data
})

// Edit Target Rating Modal Data
const EditTargetRateModal = document.getElementById('EditTargetRateModal')
EditTargetRateModal.addEventListener('show.bs.modal', event => {
// Button that triggered the modal
const button = event.relatedTarget
// Extract info from data-bs-* attributes
const data = button.getAttribute('data-bs-accomplishment')
const data2 = button.getAttribute('data-bs-efficiency')
const data3 = button.getAttribute('data-bs-quality')
const data4 = button.getAttribute('data-bs-timeliness')
const data5 = button.getAttribute('data-bs-rating-id')
// If necessary, you could initiate an AJAX request here
// and then do the updating in a callback.
//
// Update the modal's content.
const accomplishment = EditTargetRateModal.querySelector('.accomplishment')
const efficiency = EditTargetRateModal.querySelector('.efficiency')
const quality = EditTargetRateModal.querySelector('.quality')
const timeliness = EditTargetRateModal.querySelector('.timeliness')
const rating_id = EditTargetRateModal.querySelector('#rating_id')

accomplishment.value = data
efficiency.value = data2
quality.value = data3
timeliness.value = data4
rating_id.value = data5
})

// Create Standard Data
const CreateStandardModal = document.getElementById('CreateStandardModal')
CreateStandardModal.addEventListener('show.bs.modal', event => {
// Button that triggered the modal
const button = event.relatedTarget
// Extract info from data-bs-* attributes
const data = button.getAttribute('data-bs-target-id')
// If necessary, you could initiate an AJAX request here
// and then do the updating in a callback.
//
// Update the modal's content.
const target_id = CreateStandardModal.querySelector('#target_id')

target_id.value = data
})

// Edit Standard Data
const EditStandardModal = document.getElementById('EditStandardModal')
EditStandardModal.addEventListener('show.bs.modal', event => {
// Button that triggered the modal
const button = event.relatedTarget
// Extract info from data-bs-* attributes
const data = button.getAttribute('data-bs-standard-id')
const data_eff = button.getAttribute('data-bs-eff-one')
const data_eff2 = button.getAttribute('data-bs-eff-two')
const data_eff3 = button.getAttribute('data-bs-eff-three')
const data_eff4 = button.getAttribute('data-bs-eff-four')
const data_eff5 = button.getAttribute('data-bs-eff-five')
const data_qua = button.getAttribute('data-bs-qua-one')
const data_qua2 = button.getAttribute('data-bs-qua-two')
const data_qua3 = button.getAttribute('data-bs-qua-three')
const data_qua4 = button.getAttribute('data-bs-qua-four')
const data_qua5 = button.getAttribute('data-bs-qua-five')
const data_time = button.getAttribute('data-bs-time-one')
const data_time2 = button.getAttribute('data-bs-time-two')
const data_time3 = button.getAttribute('data-bs-time-three')
const data_time4 = button.getAttribute('data-bs-time-four')
const data_time5 = button.getAttribute('data-bs-time-five')
// If necessary, you could initiate an AJAX request here
// and then do the updating in a callback.
//
// Update the modal's content.
const eff_five = EditStandardModal.querySelector('.eff_five')
const eff_four = EditStandardModal.querySelector('.eff_four')
const eff_three = EditStandardModal.querySelector('.eff_three')
const eff_two = EditStandardModal.querySelector('.eff_two')
const eff_one = EditStandardModal.querySelector('.eff_one')
const qua_five = EditStandardModal.querySelector('.qua_five')
const qua_four = EditStandardModal.querySelector('.qua_four')
const qua_three = EditStandardModal.querySelector('.qua_three')
const qua_two = EditStandardModal.querySelector('.qua_two')
const qua_one = EditStandardModal.querySelector('.qua_one')
const time_five = EditStandardModal.querySelector('.time_five')
const time_four = EditStandardModal.querySelector('.time_four')
const time_three = EditStandardModal.querySelector('.time_three')
const time_two = EditStandardModal.querySelector('.time_two')
const time_one = EditStandardModal.querySelector('.time_one')
const standard_id = EditStandardModal.querySelector('#standard_id')

standard_id.value = data
eff_five.value = data_eff5
eff_four.value = data_eff4
eff_three.value = data_eff3
eff_two.value = data_eff2
eff_one.value = data_eff
qua_five.value = data_qua5
qua_four.value = data_qua4
qua_three.value = data_qua3
qua_two.value = data_qua2
qua_one.value = data_qua
time_five.value = data_time5
time_four.value = data_time4
time_three.value = data_time3
time_two.value = data_time2
time_one.value = data_time
})
</script>