<?php

namespace App\Imports;

use App\Models\LessonValue;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\WithCustomCsvSettings;

class LessonValueImport implements ToModel, WithHeadingRow, WithCustomCsvSettings
{

    /**
     * Define the row number where the headings are located.
     *
     * @return int
     */
    public function headingRow(): int
    {
        return 5;
    }

    /**
     * @param array $row
     *
     * @return \Illuminate\Database\Eloquent\Model|null
     */
    public function model(array $row)
    {
        return new LessonValue([
            'id_learning' => $row['id_learning'],
            'id_student' => $row['id_student'],
            'ko1' => $row['ko1'] ?? 0,
            'ko2' => $row['ko2'] ?? 0,
            'sub1' => $row['sub1'] ?? 0,
            'sub2' => $row['sub2'] ?? 0,
            'praktik' => $row['praktik'] ?? 0,
            'uts_uas' => $row['uts_uas'] ?? 0,
        ]);
    }

    /**
     * Define the CSV settings.
     *
     * @return array
     */
    public function getCsvSettings(): array
    {
        return [
            'startRow' => 5
        ];
    }
}
