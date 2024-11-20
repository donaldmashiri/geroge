
@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            @include('layouts.sidebar')
            <div class="col-md-9">
                <div class="card">
                    <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                        <h5 class="fw-bolder">
                            <i class="bi bi-tools"></i> {{ __('Dispatch Management') }}
                        </h5>
                            <div class="justify-content-end">
                                <a href="{{route('dispatches.create')}}" class="btn btn-primary btn-sm justify-content-end">   <i class="bi bi-plus"></i> Add Dispatch</a>
                            </div>
                    </div>
                    <div class="card-body">
                        @include('layouts.messages')
                        @if($dispatches->count() > 0)
                            <table class="table table-sm table-bordered table-striped table-responsive-sm">
                                <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Req#</th>
                                    <th scope="col">Dispatched To</th>
                                    <th scope="col">date</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($dispatches as $dispatch)
                                    <tr>
                                        <td>{{$dispatch->id}} </td>
                                        <td> GP00{{$dispatch->gate_pass_id}} </td>
                                        <td> {{$dispatch->dispatched_to}} </td>
                                        <td> {{$dispatch->created_at}} </td>
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
