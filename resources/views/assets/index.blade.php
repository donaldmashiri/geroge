
@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            @include('layouts.sidebar')
            <div class="col-md-9">
                <div class="card">
                    <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                        <h5 class="fw-bolder">
                            <i class="bi bi-tools"></i> {{ __('Asset Management') }}
                        </h5>
                            <div class="justify-content-end">
                                <a href="{{route('assets.create')}}" class="btn btn-primary btn-sm justify-content-end">   <i class="bi bi-plus"></i> Add asset</a>
                            </div>
                    </div>
                    <div class="card-body">
                        @include('layouts.messages')
                        @if($assets->count() > 0)
                            <table class="table table-sm table-bordered table-striped table-responsive-sm">
                                <thead>
                                <tr>
                                    <th scope="col">Asset#</th>
                                    <th scope="col">Name</th>
                                    <th scope="col">Type</th>
                                    <th scope="col">created_by</th>
                                    <th scope="col"></th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($assets as $asset)
                                    <tr>
                                        <td>AS00{{$asset->id}} </td>
                                        <td> {{$asset->name}} </td>
                                        <td> {{$asset->type}} </td>
                                        <td> {{$asset->created_at}} </td>
                                        <td>
                                            <a href="{{ route('assets.edit', $asset->id) }}">Edit</a>
                                         </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        @else
                            <p class="alert alert-danger">No Data Added</p>
                        @endif

                    </div>


                </div>
            </div>
        </div>
    </div>
@endsection
