<!DOCTYPE html>
<html>

<head>
    <title>{{ $title }}</title>
    <style>
        body {
            font-family: Arial, sans-serif;
        }

        h2,
        h3 {
            color: #333;
            text-align: center;
            margin: 5px 0;
        }

        hr {
            border: 0;
            border-top: 2px solid #333;
            margin: 20px 0;
        }

        p {
            margin: 4px 0;
            font-size: 14px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 10px;
        }

        th,
        td {
            border: 1px solid #333;
            padding: 8px;
            text-align: center;
        }

        th {
            background-color: #f2f2f2;
        }

        .no-border {
            border: none;
        }

        .no-color {
            background-color: #FFF;
        }

        .text-left {
            text-align: start;
        }
    </style>
</head>

<body>
    <h2>YAYASAN "RIYADLATUL FALLAH WAL HIKMAH"</h2>
    <h3>MADRASAH TSANAWIYAH RIYADLATUL FALLAH</h3>

    <hr>
    @if ($raport->isEmpty() || $raport[0]->class_name === null)
        <h5>Belum ada nilai yang masuk</h5>
    @else
        <table>
            <tbody>
                <tr>
                    <td class="no-border text-left" style="width: 25%">Nama</td>
                    <td class="no-border text-left">: {{ $student->name }}</td>
                </tr>
                <tr>
                    <td class="no-border text-left" style="width: 25%">NIS</td>
                    <td class="no-border text-left">: {{ $student->nis }}</td>
                </tr>
                <tr>
                    <td class="no-border text-left" style="width: 25%">Kelas</td>
                    <td class="no-border text-left">: {{ $raport[0]->class_name }}</td>
                </tr>
                <tr>
                    <td class="no-border text-left" style="width: 25%">Semester</td>
                    <td class="no-border text-left">: {{ $academic_year->semester }}</td>
                </tr>
                <tr>
                    <td class="no-border text-left" style="width: 25%">Tahun Akademik</td>
                    <td class="no-border text-left">: {{ $academic_year->tahun_pelajaran }}</td>
                </tr>

            </tbody>
        </table>

        <br>


        <table>
            <thead>
                <tr>
                    <th>No</th>
                    <th>Mata Pelajaran</th>
                    <th>Nilai</th>
                    <th>Predikat</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($raport as $index => $item)
                    <tr>
                        <td>{{ $index + 1 }}</td>
                        <td>{{ $item->lesson_name }}</td>
                        <td>{{ $item->nilai }}</td>
                        <td>{{ $item->predikat }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @endif
</body>

</html>
