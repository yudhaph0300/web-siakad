@extends('layouts.admin.index')

@section('main-content')
    <div class="app-content">
        <div class="app-content-header shadow-sm">
            <h1 class="app-content-headerText raleway fw-bold">Data Pembelajaran</h1>
            <button class="btn btn-primary">
                Action
            </button>
        </div>

        <div class="content-body">


            <div class="card shadow mt-3">
                <div class="card-body">

                    <table class="table table-bordered table-hover">
                        <thead class="table-dark">
                            <tr>
                                <th scope="col" class="text-center">No</th>
                                <th scope="col" class="text-center">Mata Pelajaran</th>
                                <th scope="col" class="text-center">Kelas</th>
                                <th scope="col" class="text-center">Pengajar</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($learnings as $item)
                                <tr>
                                    <td class="text-center">{{ $loop->iteration }}</td>
                                    <td class="text-center">{{ $item->lesson->name }}</td>
                                    <td class="text-center">{{ $item->classname->name }}</td>
                                    <td class="text-center">{{ $item->teacher->name }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>

                </div>
            </div>
        </div>
    </div>
@endsection
