@extends('layouts.user_type.auth')

@section('content')
  
  @forelse ($approvals as $approval)
    @if (Auth::user()->id == $approval->user_id)
      @if ((isset($approval->headoffice_status) && $approval->headoffice_status == 'pending') || (isset($approval->hdu_status) && $approval->hdu_status == 'pending'))
        @php
          $submitted = false;
          $approved = false;
        @endphp
      @elseif ((isset($approval->headoffice_status) && $approval->headoffice_status == 'approved') && (isset($approval->hdu_status) && $approval->hdu_status == 'approved'))
        @php
          $submitted = true;
          $approved = true;
        @endphp
        @break
      @endif
      
      @if (empty($approval->headoffice_status) || empty($approval->hdu_status))
        @php
          $submitted = true;
          $approved = false;
        @endphp
        @break
      @endif
      
    @elseif (Auth::user()->id != $approval->user_id && $loop->last)
      @php
        $submitted = false;
        $approved = false;
      @endphp
    @endif
  @empty
    @php
      $submitted = false;
      $approved = false;
    @endphp
  @endforelse
  <main class="main-content position-relative max-height-vh-100 h-100 mt-1 border-radius-lg ">
    <div class="container-fluid py-4">
      <div class="row">
        <div class="col-12">
          <div class="card mb-4">
            <div class="card-header pb-0">
              <h6>Individual Performance Commitment and Review</h6>
            </div>
            <div class="card-body px-0 pt-0 pb-2">
              <div class="table-responsive p-0">
                <table class="table align-items-center mb-0">
                  <thead class="align-middle text-center">
                    <tr>
                      <th rowspan="2" colspan="2" class="text-uppercase text-secondary fw-bolder opacity-7">Major Final Output (MFO)</th>
                      <th rowspan="2" class="text-uppercase text-secondary fw-bolder opacity-7">Success Indicators <br>(Traget + Measure)</th>
                      <th rowspan="2" class="text-uppercase text-secondary fw-bolder opacity-7">Actual Accomplishment</th>
                      <th colspan="4" class="text-uppercase text-secondary fw-bolder opacity-7">Rating</th>
                      <th rowspan="2" class="text-uppercase text-secondary fw-bolder opacity-7">Remarks</th>
                    </tr>
                    <tr>
                        <th class="text-uppercase text-secondary fw-bolder opacity-7">E</th>
                        <th class="text-uppercase text-secondary fw-bolder opacity-7">Q</th>
                        <th class="text-uppercase text-secondary fw-bolder opacity-7">T</th>
                        <th class="text-uppercase text-secondary fw-bolder opacity-7">A</th>
                    </tr>
                  </thead>

                  @foreach ($functs as $funct)
                  <thead>
                    <tr class="bg-secondary">
                      <th colspan="10" class="text-uppercase text-light text-sm fw-bolder opacity-7">{{ $funct['funct'] }}</th>
                    </tr>
                  </thead>
                  @forelse ($funct->outputs as $output)
                  @if ($output['user_id'] == Auth::user()->id)
                    
                  <thead>
                    <tr class="bg-light">
                      <th class="text-uppercase text-secondary text-sm fw-bolder opacity-7">
                          {{ $output['code'] }}
                      </th>
                      <th class="text-uppercase text-secondary text-sm fw-bolder opacity-7">
                        <div class="dropup">
                          @if (!$submitted)
                            <i class="fas fa-ellipsis-v mx-2 pointer" data-bs-toggle="dropdown"></i>
                            <ul class="dropdown-menu p-2">
                              @if ($output->suboutputs()->exists())
                                <li><a class="drop-down-item" data-bs-toggle="modal" data-bs-target="#CreateSubMFOModal" data-bs-output="{{ $output['id'] }}">Add Sub MFO</a></li>
                              @elseif ($output->targets()->exists())
                                <li><a class="drop-down-item" data-bs-toggle="modal" data-bs-target="#CreateTargetModal" data-bs-output="{{ $output['id'] }}">Add Target</a></li>
                              @elseif (!$output->suboutputs()->exists() && !$output->targets()->exists())
                                <li><a class="drop-down-item" data-bs-toggle="modal" data-bs-target="#CreateSubMFOModal" data-bs-output="{{ $output['id'] }}">Add Sub MFO</a></li>
                                <li><a class="drop-down-item" data-bs-toggle="modal" data-bs-target="#CreateTargetModal" data-bs-output="{{ $output['id'] }}">Add Target</a></li>
                              @endif
                              <li><a class="drop-down-item" data-bs-toggle="modal" data-bs-target="#EditOutputModal" data-bs-code="{{ $output['code'] }}" data-bs-output="{{ $output['output'] }}" data-bs-output-id="{{ $output['id'] }}">Edit</a></li>
                              <li>
                              <form action="IPCR/{{ $output['id'] }}?delete=output" method="POST">
                                @csrf
                                @method('delete')
                                <button class="abutton btn shadow-none p-0 m-0" type="submit">Delete</button>
                              </form>
                              </li>
                            </ul>
                          @endif
                          {{ $output['output'] }}
                        </div>
                      </th>
                    </tr>
                  </thead>
                    @if ($output->suboutputs()->exists())
                    @foreach ($output->suboutputs as $suboutput)
                    @if ($suboutput['user_id'] == Auth::user()->id)
                  <thead>
                    <tr>
                      <th></th>
                      <th class="text-sm fw-bolder opacity-7">
                        <div class="dropup">
                          @if (!$submitted)
                            <i class="fas fa-ellipsis-v mx-2 pointer" data-bs-toggle="dropdown"></i>
                            <ul class="dropdown-menu p-2">
                              <li><a class="drop-down-item"  data-bs-toggle="modal" data-bs-target="#CreateTargetModal" data-bs-suboutput="{{ $suboutput['id'] }}">Add Target</a></li>
                              <li><a class="drop-down-item" data-bs-toggle="modal" data-bs-target="#EditSuboutputModal" data-bs-suboutput="{{ $suboutput['suboutput'] }}" data-bs-suboutput-id="{{ $suboutput['id'] }}">Edit</a></li>
                              <li>
                                <form action="IPCR/{{ $suboutput['id'] }}?delete=suboutput" method="POST">
                                  @csrf
                                  @method('delete')
                                  <button class="abutton btn shadow-none p-0 m-0" type="submit">Delete</button>
                                </form>
                              </li>
                            </ul>
                          @endif
                          {{ $suboutput['suboutput'] }}
                        </div>
                      </th>
                  </tr>
                </thead>
                <tbody>
                    @foreach ($suboutput->targets as $target)
                    @if ($target['user_id'] == Auth::user()->id)
                      <tr>
                        <td colspan="2"></td>
                        <td class="text-sm fw-bolder opacity-7" style="white-space: normal;">
                          <div class="dropup">
                            @if (!$submitted)
                              <i class="fas fa-ellipsis-v mx-2 pointer" data-bs-toggle="dropdown"></i>
                              <ul class="dropdown-menu p-2">
                                <li><a class="drop-down-item" data-bs-toggle="modal" data-bs-target="#EditTargetModal" data-bs-target-name="{{ $target['target'] }}" data-bs-target-id="{{ $target['id'] }}">Edit</a>
                                </li>
                                <li>
                                  <form action="IPCR/{{ $target['id'] }}?delete=target" method="POST">
                                    @csrf
                                    @method('delete')
                                    <button class="abutton btn shadow-none p-0 m-0" type="submit">Delete</button>
                                  </form>
                                </li>
                              </ul>
                              @elseif ($approved)
                                <i class="fas fa-ellipsis-v mx-2 pointer" data-bs-toggle="dropdown"></i>
                                <ul class="dropdown-menu p-2">
                                  @forelse ($target->ratings as $rating)
                                    @if ($rating['user_id'] == Auth::user()->id)
                                      @break;
                                    @elseif ($rating['user_id'] != Auth::user()->id && $loop->last)
                                      <li>
                                        <a class="drop-down-item" data-bs-toggle="modal" data-bs-target="#CreateTargetRateModal" data-bs-target-id="{{ $target['id'] }}">Add Rating</a>
                                      </li>
                                    @endif
                                  @empty
                                    <li>
                                      <a class="drop-down-item" data-bs-toggle="modal" data-bs-target="#CreateTargetRateModal" data-bs-target-id="{{ $target['id'] }}">Add Rating</a>
                                    </li>
                                  @endforelse
                                </ul>
                              @endif
                            {{ $target['target'] }}
                          </div>
                        </td>
                        @forelse ($target->ratings as $rating)
                          @if ($rating['user_id'] == Auth::user()->id)
                            <td class="text-sm fw-bolder opacity-7" style="white-space: normal;">
                              <div class="dropup">
                                @if (!$submitted)
                                  <i class="fas fa-ellipsis-v mx-2 pointer" data-bs-toggle="dropdown"></i>
                                  <ul class="dropdown-menu p-2">
                                    <li><a class="drop-down-item" data-bs-toggle="modal" data-bs-target="#EditTargetRateModal" data-bs-accomplishment="{{ $rating['accomplishment'] }}" data-bs-efficiency="{{ $rating['efficiency'] }}" data-bs-quality="{{ $rating['quality'] }}"  data-bs-timeliness="{{ $rating['timeliness'] }}" data-bs-rating-id="{{ $rating['id'] }}">Edit</a>
                                    </li>
                                    <li>
                                      <form action="IPCR/{{ $rating['id'] }}?delete=rating" method="POST">
                                        @csrf
                                        @method('delete')
                                        <button class="abutton btn shadow-none p-0 m-0" type="submit">Delete</button>
                                      </form>
                                    </li>
                                  </ul>
                                @endif
                                {{ $rating['accomplishment'] }}
                              </div>
                            </td>
                            <td class="text-sm text-center fw-bolder opacity-7">{{ $rating['efficiency'] }}</td>
                            <td class="text-sm text-center fw-bolder opacity-7">{{ $rating['quality'] }}</td>
                            <td class="text-sm text-center fw-bolder opacity-7">{{ $rating['timeliness'] }}</td>
                            <td class="text-sm text-center fw-bolder opacity-7">{{ $rating['average'] }}</td>
                            <td class="text-sm text-center fw-bolder opacity-7"></td>
                          @endif
                        @empty
                          <td class="text-sm fw-bolder opacity-7" style="white-space: normal;"></td>
                          <td class="text-sm fw-bolder opacity-7"></td>
                          <td class="text-sm fw-bolder opacity-7"></td>
                          <td class="text-sm fw-bolder opacity-7"></td>
                          <td class="text-sm fw-bolder opacity-7"></td>
                          <td class="text-sm fw-bolder opacity-7"></td>
                        @endforelse
                    </tr>
                    @endif
                    @endforeach
                    @endif
                    @endforeach
                    @else
                  </thead>
                  <tbody>
                    @foreach ($output->targets as $target)
                    @if ($target['user_id'] == Auth::user()->id)
                      
                      <tr>
                        <td colspan="2"></td>
                        <td class="text-sm fw-bolder opacity-7" style="white-space: normal;">
                          <div class="dropup">
                            @if (!$submitted)
                              <i class="fas fa-ellipsis-v mx-2 pointer" data-bs-toggle="dropdown"></i>
                              <ul class="dropdown-menu p-2">
                                <li><a class="drop-down-item" data-bs-toggle="modal" data-bs-target="#EditTargetModal" data-bs-target-name="{{ $target['target'] }}" data-bs-target-id="{{ $target['id'] }}">Edit</a>
                                </li>
                                <li>
                                  <form action="IPCR/{{ $target['id'] }}?delete=target" method="POST">
                                    @csrf
                                    @method('delete')
                                    <button class="abutton btn shadow-none p-0 m-0" type="submit">Delete</button>
                                  </form>
                                </li>
                              </ul>
                            @elseif ($approved)
                              <i class="fas fa-ellipsis-v mx-2 pointer" data-bs-toggle="dropdown"></i>
                              <ul class="dropdown-menu p-2">
                                @forelse ($target->ratings as $rating)
                                  @if ($rating['user_id'] == Auth::user()->id)
                                    @break;
                                  @elseif ($rating['user_id'] != Auth::user()->id && $loop->last)
                                    <li>
                                      <a class="drop-down-item" data-bs-toggle="modal" data-bs-target="#CreateTargetRateModal" data-bs-target-id="{{ $target['id'] }}">Add Rating</a>
                                    </li>
                                  @endif
                                @empty
                                  <li>
                                    <a class="drop-down-item" data-bs-toggle="modal" data-bs-target="#CreateTargetRateModal" data-bs-target-id="{{ $target['id'] }}">Add Rating</a>
                                  </li>
                                @endforelse
                              </ul>
                            @endif
                            {{ $target['target'] }}
                          </div>
                        </td>
                        @forelse ($target->ratings as $rating)
                          @if ($rating['user_id'] == Auth::user()->id)
                            <td class="text-sm fw-bolder opacity-7" style="white-space: normal;">
                              <div class="dropup">
                                @if (!$submitted)
                                  <i class="fas fa-ellipsis-v mx-2 pointer" data-bs-toggle="dropdown"></i>
                                  <ul class="dropdown-menu p-2">
                                    <li><a class="drop-down-item" data-bs-toggle="modal" data-bs-target="#EditTargetRateModal" data-bs-accomplishment="{{ $rating['accomplishment'] }}" data-bs-efficiency="{{ $rating['efficiency'] }}" data-bs-quality="{{ $rating['quality'] }}"  data-bs-timeliness="{{ $rating['timeliness'] }}" data-bs-rating-id="{{ $rating['id'] }}">Edit</a>
                                    </li>
                                    <li>
                                      <form action="IPCR/{{ $rating['id'] }}?delete=rating" method="POST">
                                        @csrf
                                        @method('delete')
                                        <button class="abutton btn shadow-none p-0 m-0" type="submit">Delete</button>
                                      </form>
                                    </li>
                                  </ul>
                                @endif
                                {{ $rating['accomplishment'] }}
                              </div>
                            </td>
                            <td class="text-sm text-center fw-bolder opacity-7">{{ $rating['efficiency'] }}</td>
                            <td class="text-sm text-center fw-bolder opacity-7">{{ $rating['quality'] }}</td>
                            <td class="text-sm text-center fw-bolder opacity-7">{{ $rating['timeliness'] }}</td>
                            <td class="text-sm text-center fw-bolder opacity-7">{{ $rating['average'] }}</td>
                            <td class="text-sm text-center fw-bolder opacity-7"></td>
                          @endif
                        @empty
                          <td class="text-sm fw-bolder opacity-7" style="white-space: normal;"></td>
                          <td class="text-sm fw-bolder opacity-7"></td>
                          <td class="text-sm fw-bolder opacity-7"></td>
                          <td class="text-sm fw-bolder opacity-7"></td>
                          <td class="text-sm fw-bolder opacity-7"></td>
                          <td class="text-sm fw-bolder opacity-7"></td>
                        @endforelse
                    </tr>
                    @endif
                    @endforeach
                    @endif
                    
                  @endif
                  @empty
                  <tbody>
                  @endforelse
                    @if (!$submitted)
                      <tr>
                        <td></td>
                        <td class="text-center">
                          <span data-bs-toggle="tooltip"  data-bs-original-title="Add Output">
                            <a class="mx-3 btn" data-bs-toggle="modal" data-bs-target="#CreateOutputModal" data-bs-funct="{{ $funct['id'] }}">
                                <i class="fas fa-solid fa-plus"></i>
                            </a>
                          </span>
                        </td>
                      </tr>
                    @endif
                    <tr> 
                        @php
                          $total = 0;
                        @endphp
                        @foreach ($funct->outputs as $output)
                          @foreach ($output->targets as $target)
                            @foreach ($target->ratings as $rating)
                              @if ($rating['user_id'] == Auth::user()->id)
                                @php
                                  $total += $rating['average'];
                                @endphp
                              @endif
                            @endforeach
                          @endforeach
                          @foreach ($output->suboutputs as $suboutput)
                            @foreach ($suboutput->targets as $target)
                              @foreach ($target->ratings as $rating)
                                @if ($rating['user_id'] == Auth::user()->id)
                                  @php
                                    $total += $rating['average'];
                                  @endphp
                                @endif
                              @endforeach
                            @endforeach
                          @endforeach
                        @endforeach
                        <td colspan="5" class="text-end text-sm fw-bolder opacity-7">Total {{ $funct['funct'] }}</td>
                        <td colspan="2"></td>
                        <td class="text-end text-center text-sm fw-bolder opacity-7">
                          {{ $total }}
                        </td>
                    </tr>
                  </tbody>
                  @endforeach

                  
                </table>
              </div>
            </div>
            @if (!$submitted)
              <div class="card-footer text-end pt-0 pb-2">
                <button class="btn btn-outline-primary btn-rounded" data-bs-toggle="modal" data-bs-target="#SubmitIpcrModal">Submit</button>
              </div>
            @endif
          </div>
        </div>
      </div>
      
  @include('IPCR.extend')
  
  </main>
  @endsection
