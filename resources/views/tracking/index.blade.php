@extends('layouts.user_type.auth')

@section('content')

  <main class="main-content position-relative max-height-vh-100 h-100 mt-1 border-radius-lg ">
    <div class="container-fluid py-4">
      <div class="row">
        <div class="col-12">
          <div class="card mb-4">
            <div class="card-header pb-0">
              <h6>Tracking Tool for Monitoring Assignments</h6>
              <a class="btn btn-outline-primary" data-bs-toggle="modal" data-bs-target="#CreateTargetModal">Add Assignment</a>
            </div>
            <div class="card-body px-0 pt-0 pb-2">
              <div class="table-responsive p-0">
                <table class="table align-items-center mb-0">
                  <thead class="align-middle text-center">
                    <tr>
                      <th class="text-uppercase text-xs text-secondary fw-bolder opacity-7" style="white-space: normal;">Task ID No. <span class="text-capitalize fst-italic">(Document No. or Task No. of Taken from WFP)</span></th>
                      <th class="text-uppercase text-secondary fw-bolder opacity-7 text-xs" style="white-space: normal;">Subject <span class="text-capitalize fst-italic">(Subject Are of the Task or the Signatory of the Document and Subject Are)</span></th>
                      <th class="text-uppercase text-secondary fw-bolder opacity-7 text-xs">Action Officer</th>
                      <th class="text-uppercase text-secondary fw-bolder opacity-7 text-xs">Output</th>
                      <th class="text-uppercase text-secondary fw-bolder opacity-7 text-xs" style="white-space: normal;">Date Assigned <span class="text-capitalize fst-italic">(Date the Task was assigned to the drafter)</span></th>
                      <th class="text-uppercase text-secondary fw-bolder opacity-7 text-xs" style="white-space: normal;">Date Accomplished <span class="text-capitalize fst-italic">(Date the output was approved by the approver)</span></th>
                      <th class="text-uppercase text-secondary fw-bolder opacity-7 text-xs">Remarks</th>
                    </tr>
                  </thead>
                <tbody>
                  @foreach ($trackings as $tracking)
                    @if ($tracking['user_id'] == Auth::user()->id || $tracking['set_user_id'] == Auth::user()->id)
                      <tr class="text-center">
                        <td class="text-sm fw-bolder opacity-7">{{ $tracking['id'] }}</td>
                        <td class="text-sm fw-bolder opacity-7">{{ $tracking['subject'] }}</td>
                        <td class="text-sm fw-bolder opacity-7">{{ $tracking->user->name }}</td>
                        <td class="text-sm fw-bolder opacity-7">{{ $tracking['output'] }}</td>
                        <td class="text-sm fw-bolder opacity-7">{{ date('M d, Y', strtotime($tracking['created_at'])) }}</td>
                        @if (empty($tracking['remarks']))
                          @if ($tracking['set_user_id'] == Auth::user()->id)
                            <td class="text-sm fw-bolder opacity-7"></td>
                            <td class="text-sm fw-bolder opacity-7"> 
                              <form action="/tracking/{{ $tracking['id'] }}" method="POST">
                                @csrf
                                @method('PUT')
                                <div class="form-floating mb-3">
                                  <select type="text" class="form-control" id="floatingInput" name="remarks" placeholder="sample" required>
                                      <option value="">Select Remarks</option>
                                      <option value="Done">Done</option>
                                  </select>
                                  <label for="floatingInput">Remarks</label>
                                </div>
                                <button type="submit" class="btn btn-default">Submit</button>
                              </form>
                            </td>
                          @else
                            <td class="text-sm fw-bolder opacity-7"></td>
                            <td class="text-sm fw-bolder opacity-7"></td>
                          @endif
                        @elseif (isset($tracking['remarks']))
                          <td class="text-sm fw-bolder opacity-7">{{ date('M d, Y', strtotime($tracking['date_accomplished'])) }}</td>
                          <td class="text-sm fw-bolder opacity-7">{{ $tracking['remarks'] }}</td>
                        @endif
                      </tr>
                    @endif
                  @endforeach
                <tbody>
                </table>
              </div>
            </div>
          </div>
        </div>
      </div>
  </main>
  @include('tracking.extend')
  @endsection
