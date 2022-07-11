@extends('layouts.user_type.auth')

@section('content')

  <main class="main-content position-relative max-height-vh-100 h-100 mt-1 border-radius-lg ">
    <div class="container-fluid py-4">
      <div class="row">
        <div class="col-12">
          <div class="card mb-4">
            <div class="card-header pb-0">
              <h6>Office Performance Commitment and Review</h6>
            </div>
            <div class="card-body px-0 pt-0 pb-2">
              <div class="table-responsive p-0">
                <table class="table align-items-center mb-0">
                  <thead class="align-middle text-center">
                    <tr class="bg-secondary text-center">
                      <th colspan="5" class="text-uppercase text-light text-xs fw-bolder opacity-7">Human Resource Management</th>
                    </tr>
                  </thead>
                  <thead>
                    <tr class="bg-light">
                        <th colspan="5" class="text-uppercase text-secondary text-xs fw-bolder opacity-7">
                            Quantity
                        </th>
                    </tr>
                  </thead>
                
                  <tbody>
                    <tr>
                        <th colspan="2" class="text-uppercase text-xs fw-bolder opacity-7">
                            1. Good Governance Conditions
                        </th>
                        <th class="text-uppercase text-xs text-center fw-bolder opacity-7">
                            Assigned
                        </th>
                        <th class="text-uppercase text-xs text-center fw-bolder opacity-7">
                            Accomplished
                        </th>
                        <th class="text-uppercase text-xs text-center fw-bolder opacity-7">
                            Percentage
                        </th>
                    </tr>
                    <tr>
                        <td colspan="2" class="text-sm fw-bolder opacity-7">1. Maintain and Update Transparency Seal</td>
                        <td class="text-sm fw-bolder opacity-7"></td>
                        <td class="text-sm fw-bolder opacity-7"></td>
                        <td class="text-sm fw-bolder opacity-7"></td>
                    </tr>
                    <tr>
                        <td class="text-sm fw-bolder opacity-7"></td>
                        <td class="text-sm fw-bolder opacity-7">1.1 Number of documents submitted to ITSO for uploading in the transparency</td>
                        <td class="text-sm fw-bolder text-center opacity-7">3</td>
                        <td class="text-sm fw-bolder text-center opacity-7">3</td>
                        <td class="text-sm fw-bolder text-center opacity-7">100%</td>
                    </tr>
                    <tr>
                        <td colspan="3" class="text-sm fw-bolder text-end opacity-7">Average Rating of OPCR-QUANTITY</td>
                        <td class="text-sm fw-bolder text-center opacity-7"></td>
                        <td class="text-sm fw-bolder text-center opacity-7">100%</td>
                    </tr>
                  <tbody>
                    <thead>
                        <tr class="bg-light">
                            <th colspan="5" class="text-uppercase text-secondary text-xs fw-bolder opacity-7">
                                Quality
                            </th>
                        </tr>
                      </thead>
                    
                      <tbody>
                        <tr>
                            <th colspan="2" class="text-uppercase text-xs fw-bolder opacity-7">
                                1. Good Governance Conditions
                            </th>
                            <th class="text-uppercase text-xs text-center fw-bolder opacity-7">
                                Assigned
                            </th>
                            <th class="text-uppercase text-xs text-center fw-bolder opacity-7">
                                Accomplished
                            </th>
                            <th class="text-uppercase text-xs text-center fw-bolder opacity-7">
                                Percentage
                            </th>
                        </tr>
                        <tr>
                            <td colspan="2" class="text-sm fw-bolder opacity-7">1. Maintain and Update Transparency Seal</td>
                            <td class="text-sm fw-bolder opacity-7"></td>
                            <td class="text-sm fw-bolder opacity-7"></td>
                            <td class="text-sm fw-bolder opacity-7"></td>
                        </tr>
                        <tr>
                            <td class="text-sm fw-bolder opacity-7"></td>
                            <td class="text-sm fw-bolder opacity-7">1.1 Number of documents submitted to ITSO for uploading in the transparency</td>
                            <td class="text-sm fw-bolder text-center opacity-7">3</td>
                            <td class="text-sm fw-bolder text-center opacity-7">3</td>
                            <td class="text-sm fw-bolder text-center opacity-7">100%</td>
                        </tr>
                        <tr>
                            <td colspan="3" class="text-sm fw-bolder text-end opacity-7">Average Rating of OPCR-QUALITY</td>
                            <td class="text-sm fw-bolder text-center opacity-7"></td>
                            <td class="text-sm fw-bolder text-center opacity-7">100%</td>
                        </tr>
                      <tbody>
                        <thead>
                            <tr class="bg-light">
                                <th colspan="5" class="text-uppercase text-secondary text-xs fw-bolder opacity-7">
                                    Timeliness
                                </th>
                            </tr>
                          </thead>
                        
                          <tbody>
                            <tr>
                                <th colspan="2" class="text-uppercase text-xs fw-bolder opacity-7">
                                    1. Good Governance Conditions
                                </th>
                                <th class="text-uppercase text-xs text-center fw-bolder opacity-7">
                                    Assigned
                                </th>
                                <th class="text-uppercase text-xs text-center fw-bolder opacity-7">
                                    Accomplished
                                </th>
                                <th class="text-uppercase text-xs text-center fw-bolder opacity-7">
                                    Percentage
                                </th>
                            </tr>
                            <tr>
                                <td colspan="2" class="text-sm fw-bolder opacity-7">1. Maintain and Update Transparency Seal</td>
                                <td class="text-sm fw-bolder opacity-7"></td>
                                <td class="text-sm fw-bolder opacity-7"></td>
                                <td class="text-sm fw-bolder opacity-7"></td>
                            </tr>
                            <tr>
                                <td class="text-sm fw-bolder opacity-7"></td>
                                <td class="text-sm fw-bolder opacity-7">1.1 Number of documents submitted to ITSO for uploading in the transparency</td>
                                <td class="text-sm fw-bolder text-center opacity-7">3</td>
                                <td class="text-sm fw-bolder text-center opacity-7">3</td>
                                <td class="text-sm fw-bolder text-center opacity-7">100%</td>
                            </tr>
                            <tr>
                                <td colspan="3" class="text-sm fw-bolder text-end opacity-7">Average Rating of OPCR-Timeliness</td>
                                <td class="text-sm fw-bolder text-center opacity-7"></td>
                                <td class="text-sm fw-bolder text-center opacity-7">100%</td>
                            </tr>
                          <tbody>
                </table>
              </div>
            </div>
          </div>
        </div>
      </div>
  </main>
  @endsection
