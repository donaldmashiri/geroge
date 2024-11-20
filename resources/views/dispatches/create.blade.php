@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            @include('layouts.sidebar')
            <div class="col-md-9">
                <div class="card">
                    <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                        <h5 class="fw-bolder">
                            <i class="bi bi-person"></i>
                            {{ isset($asset) ? 'Edit asset': 'Create asset'}}

                        </h5>
                        <div class="justify-content-end">
                            <a href="{{route('dispatches.index')}}" class="btn btn-secondary btn-sm justify-content-end"> <i class="bi bi-back"></i> back</a>
                        </div>
                    </div>
                    <div class="card-body">
                        @include('layouts.messages')
                        <form method="POST" action="{{ isset($asset) ? route('dispatches.update', $asset->id) : route('dispatches.store') }}">
                            @if(isset($asset))
                                @method('PUT')
                            @endif
                            @csrf

                                <div class="row">
                                    <div class="col-md-6 form-group mb-3">
                                        <label for="gate_pass_id">{{ __('Select Request') }}</label>
                                        <select name="gate_pass_id" id="type" class="form-control">
                                            <option value="">Select Request</option>
                                            @foreach ($gatePasses as $gatePass)
                                                <option value="{{ $gatePass->id }}">GP00{{ $gatePass->id }}</option>
                                            @endforeach
                                        </select>

                                        @error('gate_pass_id')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                </div>

                            <div class="row">
                                <div class="col-md-6 form-group mb-3">
                                    <label for="dispatched_to">{{ __('Dispatch to') }}</label>
                                    <input id="dispatched_to" type="text" class="form-control" name="dispatched_to" value="{{ isset($asset) ? $asset->name : ''}}" required>
                                    @error('dispatch_to')
                                    <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>



                            <div class="row mt-3">
                                <div class="col-md-6">
                                    <button type="submit" class="btn btn-success">
                                        {{ isset($asset) ? 'Update': 'Submit'}}
                                    </button>
                                </div>
                            </div>
                        </form>

                    </div>


                </div>
            </div>
        </div>
    </div>
@endsection
