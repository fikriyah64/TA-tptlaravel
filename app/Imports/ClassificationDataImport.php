<?php

namespace App\Imports;

use App\Models\Classification;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class ClassificationDataImport implements ToModel, WithHeadingRow
{
    /**
     * @param array $row
     *
     * @return \Illuminate\Database\Eloquent\Model|null
     */

    // protected $nullableColumns = ['nik'];
    public function model(array $row)
    {
        $data = [
            'nik' => $row['nik'],
            'nama' => $row['nama'],
            'jenis_kelamin' => $row['jenis_kelamin'],
            'kecamatan' => $row['kecamatan'],
            'tpt01' => $row['tpt01'],
            'tpt02' => $row['tpt02'],
            'tpt03' => $row['tpt03'],
            'tpt04' => $row['tpt04'],
            'status' => $row['status']
        ];
        if (empty($data['nik'])) {
            return null; // Skip this row if 'nik' is null
        }
        return new Classification($data);
    }
}
