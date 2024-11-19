@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            @include('layouts.sidebar')
            <div class="col-md-9">
                <div class="card">
                    <div class="card-header bg-danger text-white py-3 d-flex flex-row align-items-center justify-content-between">
                        <h5 class="fw-bolder">
                            <i class="bi bi-tools"></i> {{ __('Request Gate Passes') }}
                        </h5>
                        <div class="justify-content-end">
                            @include('gate-passes.nav')
                        </div>

                    </div>
                    <div class="card-body">
                        @include('layouts.messages')

                        <form method="POST" action="{{ isset($gatePass) ? route('gate-passes.update', $gatePass->id) : route('gate-passes.store') }}">
                            @if(isset($gatePass))
                                @method('PUT')
                            @endif
                            @csrf

                            <div class="row">
                                <div class="col-md-9 form-group mb-3">
                                    <label for="asset_id">{{ __('Select Asset') }}</label>
                                    <select name="asset_id" id="asset_id" class="form-control">
                                        <option value="">Select Asset</option>
                                        @foreach ($assets as $asset)
                                            <option value="{{ $asset->id }}">{{ $asset->name }}</option>
                                        @endforeach
                                    </select>

                                    @error('asset_id')
                                    <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>

                                <div class="col-md-6 form-group mb-3">
                                    <label for="description">{{ __('Description') }}</label>
                                    <input id="description" type="text" class="form-control" name="description" value="{{ isset($gatePass) ? $gatePass->description : ''}}" required>
                                    @error('description')
                                    <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>

                                <div class="col-md-6 form-group mb-3">
                                    <label for="quantity">{{ __('Quantity') }}</label>
                                    <input id="quantity" type="number" min="1" class="form-control" name="quantity" value="{{ isset($gatePass) ? $gatePass->quantity : ''}}" required>
                                    @error('quantity')
                                    <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="row">

                            </div>

                            <div class="row mt-3">
                                <div class="col-md-6">
                                    <button type="submit" class="btn btn-success">
                                        {{ isset($gatePass) ? 'Update': 'Request'}}
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
