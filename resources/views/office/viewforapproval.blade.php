@extends('layouts.user_type.auth')

@section('content')

  <main class="main-content position-relative max-height-vh-100 h-100 mt-1 border-radius-lg ">
    <div class="container-fluid py-4">
        <div class="row">
          <div class="col-12">
              <div class="card mb-4">
                  <div class="mx-5 card-body d-flex justify-content-between">
                      <div class="text-center">
                          <svg xmlns="http://www.w3.org/2000/svg" width="2rem" height="2rem" viewBox="0 0 24 24">
                              <path fill="currentColor" fill-rule="evenodd" d="M12 1C5.925 1 1 5.925 1 12s4.925 11 11 11s11-4.925 11-11S18.075 1 12 1Zm4.768 9.14a1 1 0 1 0-1.536-1.28l-4.3 5.159l-2.225-2.226a1 1 0 0 0-1.414 1.414l3 3a1 1 0 0 0 1.475-.067l5-6Z" clip-rule="evenodd"/>
                          </svg>
                          <h5 class="mt-1">Creating of IPCR</h5>
                      </div>
                      <div class="text-center">
                          @foreach ($approvals as $approval)
                            @if ($approval_id == $approval['id'])
                              @if ($approval->headoffice_status == 'approved')
                                <svg xmlns="http://www.w3.org/2000/svg" width="2rem" height="2rem" viewBox="0 0 24 24">
                                  <path fill="currentColor" fill-rule="evenodd" d="M12 1C5.925 1 1 5.925 1 12s4.925 11 11 11s11-4.925 11-11S18.075 1 12 1Zm4.768 9.14a1 1 0 1 0-1.536-1.28l-4.3 5.159l-2.225-2.226a1 1 0 0 0-1.414 1.414l3 3a1 1 0 0 0 1.475-.067l5-6Z" clip-rule="evenodd"/>
                                </svg>
                              @elseif ($approval->hdu_status == 'pending')
                                  <svg xmlns="http://www.w3.org/2000/svg" width="2rem" height="2rem" viewBox="0 0 1024 1024">
                                    <path fill="currentColor" d="M512 64C264.6 64 64 264.6 64 512s200.6 448 448 448s448-200.6 448-448S759.4 64 512 64zm165.4 618.2l-66-.3L512 563.4l-99.3 118.4l-66.1.3c-4.4 0-8-3.5-8-8c0-1.9.7-3.7 1.9-5.2l130.1-155L340.5 359a8.32 8.32 0 0 1-1.9-5.2c0-4.4 3.6-8 8-8l66.1.3L512 464.6l99.3-118.4l66-.3c4.4 0 8 3.5 8 8c0 1.9-.7 3.7-1.9 5.2L553.5 514l130 155c1.2 1.5 1.9 3.3 1.9 5.2c0 4.4-3.6 8-8 8z"/>
                                  </svg>
                              @else
                                <svg xmlns="http://www.w3.org/2000/svg" width="2rem" height="2rem" viewBox="0 0 24 24">
                                  <g fill="none" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="m8 12.5l3 3l5-6"/><circle cx="12" cy="12" r="10"/></g>
                                </svg>
                              @endif
                            @endif
                          @endforeach
                          <h5 class="mt-1">Reviewed by Head of Office</h5>
                      </div>
                      <div class="text-center">
                        @foreach ($approvals as $approval)
                        @if ($approval_id == $approval['id'])
                          @if ($approval->hdu_status == 'approved')
                            <svg xmlns="http://www.w3.org/2000/svg" width="2rem" height="2rem" viewBox="0 0 24 24">
                              <path fill="currentColor" fill-rule="evenodd" d="M12 1C5.925 1 1 5.925 1 12s4.925 11 11 11s11-4.925 11-11S18.075 1 12 1Zm4.768 9.14a1 1 0 1 0-1.536-1.28l-4.3 5.159l-2.225-2.226a1 1 0 0 0-1.414 1.414l3 3a1 1 0 0 0 1.475-.067l5-6Z" clip-rule="evenodd"/>
                            </svg>
                          @elseif ($approval->hdu_status == 'pending')
                            <svg xmlns="http://www.w3.org/2000/svg" width="2rem" height="2rem" viewBox="0 0 1024 1024">
                              <path fill="currentColor" d="M512 64C264.6 64 64 264.6 64 512s200.6 448 448 448s448-200.6 448-448S759.4 64 512 64zm165.4 618.2l-66-.3L512 563.4l-99.3 118.4l-66.1.3c-4.4 0-8-3.5-8-8c0-1.9.7-3.7 1.9-5.2l130.1-155L340.5 359a8.32 8.32 0 0 1-1.9-5.2c0-4.4 3.6-8 8-8l66.1.3L512 464.6l99.3-118.4l66-.3c4.4 0 8 3.5 8 8c0 1.9-.7 3.7-1.9 5.2L553.5 514l130 155c1.2 1.5 1.9 3.3 1.9 5.2c0 4.4-3.6 8-8 8z"/>
                            </svg>
                          @else
                            <svg xmlns="http://www.w3.org/2000/svg" width="2rem" height="2rem" viewBox="0 0 24 24">
                              <g fill="none" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="m8 12.5l3 3l5-6"/><circle cx="12" cy="12" r="10"/></g>
                            </svg>
                          @endif
                        @endif
                      @endforeach
                          <h5 class="mt-1">Approved by Head of Units</h5>
                      </div>
                  </div>
              </div>
          </div>
      </div>
      <div class="row">
        <div class="col-12">
          <div class="card mb-4">
            <div class="card-header pb-0">
              <h6>IPCR of {{ $user['name'] }}</h6>
            </div>
            <div class="card-body px-0 pt-0 pb-2">
              <div class="table-responsive p-0">
                <table class="table align-items-center mb-0">
                  <thead class="align-middle text-center">
                    <tr>
                      <th rowspan="2" colspan="2" class="text-uppercase text-secondary fw-bolder opacity-7">Major Final Output (MFO)</th>
                      <th rowspan="2" class="text-uppercase text-secondary fw-bolder opacity-7">Success Indicators <br>(Traget + Measure)</th>
                      <th rowspan="2" class="text-uppercase text-secondary fw-bolder opacity-7">Alloted Budget</th>
                    </tr>
                  </thead>

                  @foreach ($functs as $funct)
                  <thead>
                    <tr class="bg-secondary">
                      <th colspan="10" class="text-uppercase text-light text-sm fw-bolder opacity-7">{{ $funct['funct'] }}</th>
                    </tr>
                  </thead>
                  @forelse ($funct->outputs as $output)
                  @if ($output['user_id'] == $user['id'])
                    
                  <thead>
                    <tr class="bg-light">
                      <th class="text-uppercase text-secondary text-sm fw-bolder opacity-7">
                          {{ $output['code'] }}
                      </th>
                      <th class="text-uppercase text-secondary text-sm fw-bolder opacity-7">
                          {{ $output['output'] }}
                      </th>
                    </tr>
                    @if ($output->suboutputs()->exists())
                    @foreach ($output->suboutputs as $suboutput)
                    @if ($suboutput['user_id'] == $user['id'])
                      
                    <tr>
                      <th></th>
                      <th class="text-sm fw-bolder opacity-7">
                          {{ $suboutput['suboutput'] }}
                      </th>
                  </tr>
                </thead>
                <tbody>
                    @foreach ($suboutput->targets as $target)
                    @if ($target['user_id'] == $user['id'])
                      
                      <tr>
                        <td colspan="2"></td>
                        <td class="text-sm fw-bolder opacity-7" style="white-space: normal;">
                            {{ $target['target'] }}
                        </td>
                        <td class="text-sm fw-bolder opacity-7"></td>
                    </tr>
                    @endif
                    @endforeach
                    @endif
                    @endforeach
                    @else
                  </thead>
                  <tbody>
                    @foreach ($output->targets as $target)
                    @if ($target['user_id'] == $user['id'])
                      
                      <tr>
                        <td colspan="2"></td>
                        <td class="text-sm fw-bolder opacity-7" style="white-space: normal;">
                            {{ $target['target'] }}
                        </td>
                        <td class="text-sm fw-bolder opacity-7"></td>
                    </tr>
                    @endif
                    @endforeach
                    @endif
                    
                  @endif
                  @empty
                  <tbody>
                  @endforelse
                  </tbody>
                  @endforeach

                  
                </table>
              </div>
            </div>
            <div class="card-footer text-end pt-0 pb-2">
                <a href="/forapproval" class="btn btn-outline-secondary btn-rounded">Return</a>
            </div>
          </div>
        </div>
      </div>
  </main>
  @endsection
