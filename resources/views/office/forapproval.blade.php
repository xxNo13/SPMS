@extends('layouts.user_type.auth')

@section('content')

<div>
    <div class="row">
        <div class="col-12">
            <div class="card mb-4 mx-4">
                <div class="card-header pb-0">
                    <div class="d-flex flex-row justify-content-between">
                        <div>
                            <h5 class="mb-0">For Approval</h5>
                        </div>
                    </div>
                </div>
                <div class="card-body px-0 pt-0 pb-2">
                    <div class="table-responsive p-0">
                        <table class="table align-items-center mb-0">
                            <thead>
                                <tr>
                                    <th class="text-uppercase text-secondary text-xs font-weight-bolder opacity-7">
                                        ID
                                    </th>
                                    <th class="text-center text-uppercase text-secondary text-xs font-weight-bolder opacity-7">
                                        Name
                                    </th>
                                    <th class="text-center text-uppercase text-secondary text-xs font-weight-bolder opacity-7">
                                        Email
                                    </th>
                                    <th class="text-center text-uppercase text-secondary text-xs font-weight-bolder opacity-7">
                                        Office
                                    </th>
                                    <th class="text-center text-uppercase text-secondary text-xs font-weight-bolder opacity-7">
                                        Submitted
                                    </th>
                                    <th class="text-center text-uppercase text-secondary text-xs font-weight-bolder opacity-7">
                                        Creation Date
                                    </th>
                                    <th class="text-center text-uppercase text-secondary text-xs font-weight-bolder opacity-7">
                                        Action
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($approvals as $approval)
                                    @foreach ($users as $user)
                                        @if (($approval->user_id == $user->id) && (Auth::user()->id == $approval->headoffice_id || (Auth::user()->id == $approval->hdu_id && $approval->headoffice_status == 'approved')))
                                        <tr>
                                            <td class="ps-4">
                                                <p class="text-sm font-weight-bold mb-0">{{ $user['id'] }}</p>
                                            </td>
                                            <td class="text-center">
                                                <p class="text-sm font-weight-bold mb-0">{{ $user['name'] }}</p>
                                            </td>
                                            <td class="text-center">
                                                <p class="text-sm font-weight-bold mb-0">{{ $user['email'] }}</p>
                                            </td>
                                            <td class="text-center">
                                                <p class="text-sm font-weight-bold mb-0">{{ $user->office->office }}</p>
                                            </td>
                                            <td class="text-center">
                                                <p class="text-sm font-weight-bold mb-0">{{ $approval->type }}</p>
                                            </td>
                                            <td class="text-center">
                                                <span class="text-secondary text-sm font-weight-bold">{{ date("M d, Y", strtotime($approval['created_at'])) }}</span>
                                            </td>
                                            <td class="text-center hstack gap-3">
                                                @if (Auth::user()->id == $approval->headoffice_id)
                                                    @if(isset($approval->headoffice_status))
                                                        <div class="mt-3 d-flex justify-content-center">
                                                            <p class="text-sm font-weight-bold mb-0 text-capitalize p-2">
                                                                {{ $approval->headoffice_status }}</p>
                                                            <a href="/forapproval/{{ $user['id'] }}?approval_id={{ $approval['id'] }}" class="btn btn-outline-secondary p-2">View</a>
                                                        </div>
                                                    @else
                                                        <div class="mt-3">
                                                            <button class="btn btn-outline-primary p-2" form="approveForm">Approve</button>
                                                            <button class="btn btn-outline-danger p-2" form="pendingForm">Pending</button>
                                                            <a href="/forapproval/{{ $user['id'] }}?approval_id={{ $approval['id'] }}" class="btn btn-outline-secondary p-2">View</a>
                                                        </div>
                                                        <form action="/responsed?id={{ $approval['id'] }}&type=headoffice" method="POST" id="approveForm">
                                                            @csrf
                                                            @method('PUT')
                                                            <input type="hidden" value="approved" name="headoffice_status">
                                                        </form>
                                                        <form action="/responsed?id={{ $approval['id'] }}&type=headoffice" method="POST" id="pendingForm">
                                                            @csrf
                                                            @method('PUT')
                                                            <input type="hidden" value="pending" name="headoffice_status">
                                                        </form>
                                                    @endif
                                                @elseif (Auth::user()->id == $approval->hdu_id)
                                                    @if(isset($approval->hdu_status))
                                                        <div class="mt-3 d-flex justify-content-center">
                                                            <p class="text-sm font-weight-bold mb-0 text-capitalize p-2">
                                                                {{ $approval->hdu_status }}</p>
                                                            <a href="/forapproval/{{ $user['id'] }}?approval_id={{ $approval['id'] }}" class="btn btn-outline-secondary p-2">View</a>
                                                        </div>
                                                    @else
                                                        <div class="mt-3">
                                                            <button class="btn btn-outline-primary p-2" form="approveForm">Approve</button>
                                                            <button class="btn btn-outline-danger p-2" form="pendingForm">Pending</button>
                                                            <a href="/forapproval/{{ $user['id'] }}?approval_id={{ $approval['id'] }}" class="btn btn-outline-secondary p-2">View</a>
                                                        </div>
                                                        <form action="/responsed?id={{ $approval['id'] }}&type=hdu" method="POST" id="approveForm">
                                                            @csrf
                                                            @method('PUT')
                                                            <input type="hidden" value="approved" name="hdu_status">
                                                        </form>
                                                        <form action="/responsed?id={{ $approval['id'] }}&type=hdu" method="POST" id="pendingForm">
                                                            @csrf
                                                            @method('PUT')
                                                            <input type="hidden" value="pending" name="hdu_status">
                                                        </form>
                                                    @endif
                                                @endif
                                            </td>
                                        </tr>
                                        @endif
                                    @endforeach
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
 
@endsection