@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            @include('layouts.sidebar')
            <div class="col-md-9">
                <div class="card">
                    <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                        <h5 class="fw-bolder">
                            <i class="bi bi-tools"></i> {{ __('Profile') }}
                        </h5>

                    </div>
                    <div class="card-body">
                        <table class="table table-striped table-bordered table-sm">
                            <tbody>
                            <tr>
                                <td>Full Names:</td>
                                <td>{{ Auth::user()->name }}</td>
                            </tr>
                            <tr>
                                <td>Email: </td>
                                <td>{{ Auth::user()->email }}</td>
                            </tr>

                            <tr>
                                <td>Role: </td>
                                <td>{{ Auth::user()->role}}</td>
                            </tr>
                            <tr>
                                <td>Created At: </td>
                                <td>{{ Auth::user()->created_at }}</td>
                            </tr>
                            </tbody>
                        </table>


                    </div>


                </div>
            </div>
        </div>
    </div>
@endsection

