@extends('layouts.admin.index')

@section('main-content')
    <div class="app-content">
        <div class="app-content-header shadow-sm">
            <h1 class="app-content-headerText raleway fw-bold">Detail Guru</h1>
            <button class="btn btn-primary">
                Action
            </button>
        </div>

        <div class="content-body">

            <div class="card shadow mt-3">
                <div class="card-body">
                    <div class="row g-3">
                        <div class="col-md-6">
                            <img src="{{ $teacher->image }}" class="img-fluid" alt="">
                        </div>
                        <div class="col-md-6">
                            <table class="table table-bordered table-hover">
                                <tbody>
                                    <tr>
                                        <td>NIK</td>
                                        <td>{{ $teacher->nik }}</td>
                                    </tr>
                                    <tr>
                                        <td>Name</td>
                                        <td>{{ $teacher->name }}</td>
                                    </tr>
                                    <tr>
                                        <td>username</td>
                                        <td>{{ $teacher->username }}</td>
                                    </tr>

                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
