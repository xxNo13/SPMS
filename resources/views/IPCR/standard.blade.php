@extends('layouts.user_type.auth')

@section('content')

  <main class="main-content position-relative max-height-vh-100 h-100 mt-1 border-radius-lg ">
    <div class="container-fluid py-4">
      <div class="row">
        <div class="col-12">
          <div class="card mb-4">
            <div class="card-header pb-0">
              <h6>Standard</h6>
            </div>
            <div class="card-body px-0 pt-0 pb-2">
              <div class="table-responsive p-0">
                <table class="table align-items-center mb-0">
                  <thead class="align-middle text-center">
                    <tr>
                      <th colspan="2" class="text-uppercase text-secondary fw-bolder opacity-7">Output</th>
                      <th class="text-uppercase text-secondary fw-bolder opacity-7">Success Indicator</th>
                      <th class="text-uppercase text-secondary fw-bolder opacity-7">Rating</th>
                      <th class="text-uppercase text-secondary fw-bolder opacity-7">Efficiency Standard</th>
                      <th class="text-uppercase text-secondary fw-bolder opacity-7">Rating</th>
                      <th class="text-uppercase text-secondary fw-bolder opacity-7">Quality Standard</th>
                      <th class="text-uppercase text-secondary fw-bolder opacity-7">Rating</th>
                      <th class="text-uppercase text-secondary fw-bolder opacity-7">Time Standard</th>
                    </tr>
                  </thead>
                  @foreach ($functs as $funct)
                    <thead>
                      <tr class="bg-secondary">
                          <th colspan="9" class="text-uppercase text-light text-sm fw-bolder opacity-7">
                              {{ $funct['funct'] }}
                          </th>
                      </tr>
                    </thead>
                    @foreach ($funct->outputs as $output)
                      @if ($output['user_id'] == Auth::user()->id)
                        <thead>
                          <tr class="bg-light">
                            <th class="text-uppercase text-secondary text-sm fw-bolder opacity-7">
                                {{ $output['code'] }}
                            </th>
                            <th class="text-uppercase text-secondary text-sm fw-bolder opacity-7">
                                {{ $output['output'] }}
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
                                          {{ $suboutput['suboutput'] }}
                                      </th>
                                  </tr>
                                </thead>
                                @foreach ($suboutput->targets as $target)
                                  @if ($target['user_id'] == Auth::user()->id)
                                    <tbody>
                                      <tr>
                                          <td rowspan="6" colspan="2"></td>
                                          <td rowspan="6" class="text-sm fw-bolder opacity-7" style="white-space: normal;">
                                            <div class="dropup">
                                              <i class="fas fa-ellipsis-v mx-2 pointer" data-bs-toggle="dropdown"></i>
                                              <ul class="dropdown-menu p-2">
                                                @forelse ($target->standards as $standard)
                                            @if ($standard['user_id'] == Auth::user()->id)
                                              <li>
                                                <a class="drop-down-item" data-bs-toggle="modal" data-bs-target="#EditStandardModal" data-bs-standard-id="{{ $standard['id'] }}" data-bs-eff-five="{{ $standard['eff_five'] }}" data-bs-eff-four="{{ $standard['eff_four'] }}" data-bs-eff-three="{{ $standard['three'] }}" data-bs-eff-two="{{ $standard['eff_two'] }}" data-bs-eff-one="{{ $standard['eff_one'] }}" data-bs-qua-five="{{ $standard['qua_five'] }}" data-bs-qua-four="{{ $standard['qua_four'] }}" data-bs-qua-three="{{ $standard['qua_three'] }}" data-bs-qua-two="{{ $standard['qua_two'] }}" data-bs-qua-one="{{ $standard['qua_one'] }}" data-bs-time-five="{{ $standard['time_five'] }}" data-bs-time-four="{{ $standard['time_four'] }}" data-bs-time-three="{{ $standard['time_three'] }}" data-bs-time-two="{{ $standard['time_two'] }}" data-bs-time-one="{{ $standard['time_one'] }}">Edit Standard</a>
                                              </li>
                                              <li>
                                                <form action="IPCR/{{ $standard['id'] }}?delete=standard" method="POST">
                                                  @csrf
                                                  @method('delete')
                                                  <button class="abutton btn shadow-none p-0 m-0" type="submit">Delete Standard</button>
                                                </form>
                                              </li>
                                              @break
                                            @elseif ($standard['user_id'] != Auth::user()->id && $loop->last)
                                              <li>
                                                <a class="drop-down-item" data-bs-toggle="modal" data-bs-target="#CreateStandardModal" data-bs-target-id="{{ $target['id'] }}">Add Standard</a>
                                              </li>
                                            @endif
                                          @empty
                                            <li>
                                              <a class="drop-down-item" data-bs-toggle="modal" data-bs-target="#CreateStandardModal" data-bs-target-id="{{ $target['id'] }}">Add Standard</a>
                                            </li>
                                          @endforelse
                                              </ul>
                                              {{ $target['target'] }}
                                            </div>
                                          </td>
                                      </tr>
                                      @foreach ($target->standards as $standard)
                                        @if ($standard['user_id'] == Auth::user()->id)
                                          <tr class="text-center">
                                            <td class="text-sm fw-bolder opacity-7">5</td>
                                            <td class="text-sm fw-bolder opacity-7">{{ $standard['eff_five'] }}</td>
                                            <td class="text-sm fw-bolder opacity-7">5</td>
                                            <td class="text-sm fw-bolder opacity-7">{{ $standard['qua_five'] }}</td>
                                            <td class="text-sm fw-bolder opacity-7">5</td>
                                            <td class="text-sm fw-bolder opacity-7">{{ $standard['time_five'] }}</td>
                                          </tr>
                                          <tr class="text-center">
                                            <td class="text-sm fw-bolder opacity-7">4</td>
                                            <td class="text-sm fw-bolder opacity-7">{{ $standard['eff_four'] }}</td>
                                            <td class="text-sm fw-bolder opacity-7">4</td>
                                            <td class="text-sm fw-bolder opacity-7">{{ $standard['qua_four'] }}</td>
                                            <td class="text-sm fw-bolder opacity-7">4</td>
                                            <td class="text-sm fw-bolder opacity-7">{{ $standard['time_four'] }}</td>
                                          </tr>
                                          <tr class="text-center">
                                            <td class="text-sm fw-bolder opacity-7">3</td>
                                            <td class="text-sm fw-bolder opacity-7">{{ $standard['eff_three'] }}</td>
                                            <td class="text-sm fw-bolder opacity-7">3</td>
                                            <td class="text-sm fw-bolder opacity-7">{{ $standard['qua_three'] }}</td>
                                            <td class="text-sm fw-bolder opacity-7">3</td>
                                            <td class="text-sm fw-bolder opacity-7">{{ $standard['time_three'] }}</td>
                                          </tr>
                                          <tr class="text-center">
                                            <td class="text-sm fw-bolder opacity-7">2</td>
                                            <td class="text-sm fw-bolder opacity-7">{{ $standard['eff_two'] }}</td>
                                            <td class="text-sm fw-bolder opacity-7">2</td>
                                            <td class="text-sm fw-bolder opacity-7">{{ $standard['qua_two'] }}</td>
                                            <td class="text-sm fw-bolder opacity-7">2</td>
                                            <td class="text-sm fw-bolder opacity-7">{{ $standard['time_two'] }}</td>
                                          </tr>
                                          <tr class="text-center border-bottom">
                                            <td class="text-sm fw-bolder opacity-7">1</td>
                                            <td class="text-sm fw-bolder opacity-7">{{ $standard['eff_one'] }}</td>
                                            <td class="text-sm fw-bolder opacity-7">1</td>
                                            <td class="text-sm fw-bolder opacity-7">{{ $standard['qua_one'] }}</td>
                                            <td class="text-sm fw-bolder opacity-7">1</td>
                                            <td class="text-sm fw-bolder opacity-7">{{ $standard['time_one'] }}</td>
                                          </tr>
                                        @endif
                                      @endforeach
                                    <tbody>
                                  @endif
                                @endforeach
                              @endif
                            @endforeach
                          @else
                            @foreach ($output->targets as $target)
                              @if ($target['user_id'] == Auth::user()->id)
                              <tbody>
                                <tr>
                                    <td rowspan="6" colspan="2"></td>
                                    <td rowspan="6" class="text-sm fw-bolder opacity-7" style="white-space: normal;">
                                      <div class="dropup">
                                        <i class="fas fa-ellipsis-v mx-2 pointer" data-bs-toggle="dropdown"></i>
                                        <ul class="dropdown-menu p-2">
                                          @forelse ($target->standards as $standard)
                                            @if ($standard['user_id'] == Auth::user()->id)
                                              <li>
                                                <a class="drop-down-item" data-bs-toggle="modal" data-bs-target="#EditStandardModal" data-bs-standard-id="{{ $standard['id'] }}" data-bs-eff-five="{{ $standard['eff_five'] }}" data-bs-eff-four="{{ $standard['eff_four'] }}" data-bs-eff-three="{{ $standard['three'] }}" data-bs-eff-two="{{ $standard['eff_two'] }}" data-bs-eff-one="{{ $standard['eff_one'] }}" data-bs-qua-five="{{ $standard['qua_five'] }}" data-bs-qua-four="{{ $standard['qua_four'] }}" data-bs-qua-three="{{ $standard['qua_three'] }}" data-bs-qua-two="{{ $standard['qua_two'] }}" data-bs-qua-one="{{ $standard['qua_one'] }}" data-bs-time-five="{{ $standard['time_five'] }}" data-bs-time-four="{{ $standard['time_four'] }}" data-bs-time-three="{{ $standard['time_three'] }}" data-bs-time-two="{{ $standard['time_two'] }}" data-bs-time-one="{{ $standard['time_one'] }}">Edit Standard</a>
                                              </li>
                                              <li>
                                                <form action="IPCR/{{ $standard['id'] }}?delete=standard" method="POST">
                                                  @csrf
                                                  @method('delete')
                                                  <button class="abutton btn shadow-none p-0 m-0" type="submit">Delete Standard</button>
                                                </form>
                                              </li>
                                              @break
                                            @elseif ($standard['user_id'] != Auth::user()->id && $loop->last)
                                              <li>
                                                <a class="drop-down-item" data-bs-toggle="modal" data-bs-target="#CreateStandardModal" data-bs-target-id="{{ $target['id'] }}">Add Standard</a>
                                              </li>
                                            @endif
                                          @empty
                                            <li>
                                              <a class="drop-down-item" data-bs-toggle="modal" data-bs-target="#CreateStandardModal" data-bs-target-id="{{ $target['id'] }}">Add Standard</a>
                                            </li>
                                          @endforelse
                                        </ul>
                                        {{ $target['target'] }}
                                      </div>
                                    </td>
                                </tr>
                                @foreach ($target->standards as $standard)
                                  @if ($standard['user_id'] == Auth::user()->id)
                                    <tr class="text-center">
                                      <td class="text-sm fw-bolder opacity-7">5</td>
                                      <td class="text-sm fw-bolder opacity-7">{{ $standard['eff_five'] }}</td>
                                      <td class="text-sm fw-bolder opacity-7">5</td>
                                      <td class="text-sm fw-bolder opacity-7">{{ $standard['qua_five'] }}</td>
                                      <td class="text-sm fw-bolder opacity-7">5</td>
                                      <td class="text-sm fw-bolder opacity-7">{{ $standard['time_five'] }}</td>
                                    </tr>
                                    <tr class="text-center">
                                      <td class="text-sm fw-bolder opacity-7">4</td>
                                      <td class="text-sm fw-bolder opacity-7">{{ $standard['eff_four'] }}</td>
                                      <td class="text-sm fw-bolder opacity-7">4</td>
                                      <td class="text-sm fw-bolder opacity-7">{{ $standard['qua_four'] }}</td>
                                      <td class="text-sm fw-bolder opacity-7">4</td>
                                      <td class="text-sm fw-bolder opacity-7">{{ $standard['time_four'] }}</td>
                                    </tr>
                                    <tr class="text-center">
                                      <td class="text-sm fw-bolder opacity-7">3</td>
                                      <td class="text-sm fw-bolder opacity-7">{{ $standard['eff_three'] }}</td>
                                      <td class="text-sm fw-bolder opacity-7">3</td>
                                      <td class="text-sm fw-bolder opacity-7">{{ $standard['qua_three'] }}</td>
                                      <td class="text-sm fw-bolder opacity-7">3</td>
                                      <td class="text-sm fw-bolder opacity-7">{{ $standard['time_three'] }}</td>
                                    </tr>
                                    <tr class="text-center">
                                      <td class="text-sm fw-bolder opacity-7">2</td>
                                      <td class="text-sm fw-bolder opacity-7">{{ $standard['eff_two'] }}</td>
                                      <td class="text-sm fw-bolder opacity-7">2</td>
                                      <td class="text-sm fw-bolder opacity-7">{{ $standard['qua_two'] }}</td>
                                      <td class="text-sm fw-bolder opacity-7">2</td>
                                      <td class="text-sm fw-bolder opacity-7">{{ $standard['time_two'] }}</td>
                                    </tr>
                                    <tr class="text-center border-bottom">
                                      <td class="text-sm fw-bolder opacity-7">1</td>
                                      <td class="text-sm fw-bolder opacity-7">{{ $standard['eff_one'] }}</td>
                                      <td class="text-sm fw-bolder opacity-7">1</td>
                                      <td class="text-sm fw-bolder opacity-7">{{ $standard['qua_one'] }}</td>
                                      <td class="text-sm fw-bolder opacity-7">1</td>
                                      <td class="text-sm fw-bolder opacity-7">{{ $standard['time_one'] }}</td>
                                    </tr>
                                  @endif
                                @endforeach
                              <tbody>
                              @endif
                            @endforeach
                          @endif
                      @endif
                    @endforeach
                  @endforeach
                </table>
              </div>
            </div>
            <div class="card-footer text-end pt-0 pb-2">
                <button class="btn btn-outline-primary btn-rounded" data-bs-toggle="modal" data-bs-target="#SubmitStandardModal">Submit</button>
            </div>
          </div>
        </div>
      </div>
  </main>

  @include('IPCR.extend')
  @endsection
