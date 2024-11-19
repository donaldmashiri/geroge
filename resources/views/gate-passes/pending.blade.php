@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            @include('layouts.sidebar')
            <div class="col-md-9">
                <div class="card">
                    <div class="card-header bg-warning py-3 d-flex flex-row align-items-center justify-content-between">
                        <h5 class="fw-bolder text-white">
                            <i class="bi bi-hourglass-split"></i> {{ __('Pending Requests') }}
                        </h5>
                        <div class="justify-content-end">
                           @include('gate-passes.nav')
                        </div>

                    </div>
                    <div class="card-body">
                        @include('layouts.messages')
                        @if ($gatePasses->count() > 0)
    <div class="row">
        @foreach ($gatePasses as $gatePass)
            <div class="col-md-4 mb-3">
                <div class="card border-warning">
                    <div class="card-body">
                        <h5 class="card-header">Asset: {{ $gatePass->asset->name ?? "N/A" }}</h5>
                        <p class="card-text"><strong>Description:</strong> {{ $gatePass->description }}</p>
                        <p class="card-text"><strong>Quantity:</strong> {{ $gatePass->quantity }}</p>
                        <p class="card-text">
                            <span class="badge bg-warning">
                                <i class="bi bi-hourglass-split"></i> Pending
                            </span>
                        </p>
                        <p class="card-text"><strong>Requested By:</strong> {{ $gatePass->user->name }}</p>
                        <div class="d-flex justify-content-between">
                            <form action="{{ route('gate-passes.update', $gatePass->id) }}" method="POST">
                                @csrf
                                @method('PUT')
                                <button type="submit" name="action" value="approve" class="btn btn-success btn-sm">Approve</button>
                                <button type="submit" name="action" value="reject" class="btn btn-danger btn-sm">Reject</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
@else
    <p class="alert alert-danger">No gate passes found.</p>
@endif
                    </div>


                </div>
            </div>
        </div>
    </div>
@endsection
