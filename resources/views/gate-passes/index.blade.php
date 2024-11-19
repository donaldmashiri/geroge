@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            @include('layouts.sidebar')
            <div class="col-md-9">
                <div class="card">
                    <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                        <h5 class="fw-bolder">
                            <i class="bi bi-tools"></i> {{ __('Gate Passes') }}
                        </h5>
                        <div class="justify-content-end">
                           @include('gate-passes.nav')
                        </div>

                    </div>
                    <div class="card-body">
                        @include('layouts.messages')
                        @if ($gatePasses->count() > 0)
                            <table class="table table-sm table-bordered table-striped table-responsive-sm">
                                <thead>
                                    <tr>
                                        <th scope="col">#</th>
                                        <th scope="col">Asset ID</th>
                                        <th scope="col">Description</th>
                                        <th scope="col">Quantity</th>
                                        <th scope="col">Status</th>
                                        <th scope="col">Requested By</th>
                                        <th scope="col">Date</th>

                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($gatePasses as $index => $gatePass)
                                        <tr>
                                            <td>{{ $index + 1 }}</td>

                                            <td>{{ $gatePass->asset->name??"" }}</td>
                                            <td>{{ $gatePass->description }}</td>
                                            <td>{{ $gatePass->quantity }}</td>
                                            <td>
                                                @if($gatePass->status === 'pending')
                                                    <span class="badge bg-warning">
                                                        <i class="bi bi-hourglass-split"></i> Pending
                                                    </span>
                                                @elseif($gatePass->status === 'approved')
                                                    <span class="badge bg-success">
                                                        <i class="bi bi-check-circle"></i> Approved
                                                    </span>
                                                @elseif($gatePass->status === 'rejected')
                                                    <span class="badge bg-danger">
                                                        <i class="bi bi-x-circle"></i> Rejected
                                                    </span>
                                                @else
                                                    <span class="badge bg-secondary">
                                                        <i class="bi bi-question-circle"></i> Unknown
                                                    </span>
                                                @endif
                                            </td>
                                            <td>{{ $gatePass->user->name }}</td>
                                            <td>{{ $gatePass->created_at }}</td>

                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        @else
                            <p class="alert alert-danger">No gate passes found.</p>
                        @endif

                    </div>


                </div>
            </div>
        </div>
    </div>
@endsection
