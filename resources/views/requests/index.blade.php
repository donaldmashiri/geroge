
@extends('layouts.app')

@section('content')
    <div class="container-fluid">
        <div class="row justify-content-center">
            @include('layouts.sidebar')
            <div class="col-md-9">
                <div class="card">
                    <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                        <h5 class="fw-bolder">
                            <i class="bi bi-tools"></i> {{ __('Equipment Management') }}
                        </h5>
                        @if(auth()->user()->role_id != 1)
                            <div class="justify-content-end">
                                <a href="{{route('equipments.create')}}" class="btn btn-primary btn-sm justify-content-end">   <i class="bi bi-plus"></i> Add Equipment</a>
                            </div>
                        @endif
                    </div>
                    <div class="card-body">
                        @include('layouts.messages')
                        @if($equipments->count() > 0)
                            <table class="table table-sm table-bordered table-striped table-responsive-sm">
                                <thead>
                                <tr>
                                    <th scope="col">Equipment#</th>
                                    <th scope="col">Name</th>
                                    <th scope="col">type</th>
                                    <th scope="col">model</th>
                                    <th scope="col">is_new</th>
                                    <th scope="col">acquisition_date</th>
                                    <th scope="col">created_by</th>
                                    <th scope="col">Company#</th>
                                    <th scope="col"></th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($equipments as $equipment)
                                    <tr>
                                        <td> {{$equipment->equipment_number}} </td>
                                        <td> {{$equipment->name}} </td>
                                        <td> {{$equipment->type}} </td>
                                        <td> {{$equipment->model}} </td>
                                        <td>
                                            <span class="{{ $equipment->is_new ? 'badge bg-success' : 'badge bg-danger' }}">
                                                @if ($equipment->is_new)
                                                    <i class="bi bi-check-circle-fill"></i>
                                                @else
                                                    <i class="bi bi-x-circle-fill"></i>
                                                @endif
                                                {{ $equipment->is_new ? 'New' : 'Old' }}
                                            </span>
                                        </td>
                                        <td> {{$equipment->acquisition_date}} </td>
                                        <td> {{$equipment->createdBy->name}} </td>
                                        <td> CO{{$equipment->company_number}} </td>
                                        <td> {{$equipment->created_at}} </td>
                                        <td>
                                            @if(auth()->user()->role_id == 1 || auth()->user()->role_id == 2)
                                                <div class="d-flex gap-2">
                                                    <a href="" data-bs-toggle="modal" data-bs-target="#delete_{{$equipment->id}}"><span class="badge bg-danger"><i class="bi bi-trash"></i></span></a>
                                                    <a href="{{ route('equipments.edit', $equipment->id) }}"><span class="badge bg-warning text-dark"><i class="bi bi-pencil-square"></i></span></a>
                                                </div>
                                            @endif
                                        </td>
                                    </tr>

                                    <div class="modal fade" id="delete_{{$equipment->id}}" tabindex="-1" aria-labelledby="delete_{{$equipment->id}}Label" aria-hidden="true">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h1 class="modal-title fs-5" id="delete_{{$equipment->id}}Label">Delete {{$equipment->name}}</h1>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                </div>
                                                <div class="modal-body">
                                                    Are you sure you want to delete?
                                                </div>
                                                <div class="modal-footer">
                                                    <form method="POST" action="{{ route('equipments.destroy', $equipment->id) }}">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">No</button>
                                                        <button type="submit" class="btn btn-danger">Yes</button>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

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
