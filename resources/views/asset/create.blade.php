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
                            <a href="{{route('asset.index')}}" class="btn btn-secondary btn-sm justify-content-end"> <i class="bi bi-back"></i> back</a>
                        </div>
                    </div>
                    <div class="card-body">
                        @include('layouts.messages')
                        <form method="POST" action="{{ isset($asset) ? route('asset.update', $asset->id) : route('asset.store') }}">
                            @if(isset($asset))
                                @method('PUT')
                            @endif
                            @csrf

                            <div class="row">
                                <div class="col-md-6 form-group mb-3">
                                    <label for="name">{{ __('Name') }}</label>
                                    <input id="name" type="text" class="form-control" name="name" value="{{ isset($asset) ? $asset->name : ''}}" required>
                                    @error('name')
                                    <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                                <div class="row">
                                <div class="col-md-6 form-group mb-3">
                                    <label for="serial_number">{{ __('Serial Number') }}</label>
                                    <input id="serial_number" type="text" class="form-control" name="serial_number" value="{{ isset($asset) ? $asset->serial_number : ''}}" required>
                                    @error('serial_number')
                                    <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-6 form-group mb-3">
                                    <label for="type">{{ __('Valuable Type') }}</label>
                                    <select name="type" id="type" class="form-control">
                                        <option value="">Select type</option>
                                        <option value="low">Low</option>
                                        <option value="medium">Medium</option>
                                        <option value="high">High</option>
                                    </select>

                                    @error('type')
                                    <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="row mt-3">
                                <div class="col-md-6">
                                    <button type="submit" class="btn btn-success">
                                        {{ isset($asset) ? 'Update': 'Create'}}
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
