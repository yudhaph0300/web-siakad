@extends('layouts.student.index')

@section('main-content')
    <div class="app-content">
        <div class="app-content-header shadow-sm">
            <h1 class="app-content-headerText raleway fw-bold">Rapor Siswa</h1>
            <button class="btn-hamburger" id="btn-hamburger">
                <i class="bi bi-grid-3x3-gap"></i>
            </button>
        </div>

        <div class="content-body">
            <div class="card shadow mt-3">
                <div class="card-body">
                    <table class="table table-bordered table-hover">
                        <thead class="table-dark">
                            <tr>
                                <th scope="col" class="text-center">No</th>
                                <th scope="col">Tahun Pelajaran</th>
                                <th scope="col">Semester</th>
                                <th scope="col" class="text-center">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td class="text-center" style="vertical-align: middle;">1</td>
                                <td class="text-center" style="vertical-align: middle;">2020/2021</td>
                                <td class="text-center" style="vertical-align: middle;">1 (Ganjil)</td>
                                <td class="text-center" style="vertical-align: middle;"><button
                                        class="btn btn-primary">Lihat</button></td>
                            </tr>

                        </tbody>
                    </table>

                </div>
            </div>
        </div>
    </div>
@endsection
