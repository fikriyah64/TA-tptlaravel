<?php

namespace App\Imports;

use App\Models\ExcelData;
use Maatwebsite\Excel\Concerns\ToModel;

class ExcelDataImport implements ToModel
{
    /**
     * @param array $row
     *
     * @return \Illuminate\Database\Eloquent\Model|null
     */
    public function model(array $row)
    {
        return new ExcelData([
            // 'NIK' => $nik[0],
            // 'NAMA' => $nama[1], 
            // 'JENIS_KELAMIN' =>$jk[2],
            // 'KECAMATAN' => $kecamatan[3],
            // 'TPT01' => $tpt01[4],
            // 'TPT02' => $tpt02[5], 
            // 'TPT03' => $tpt03[6], 
            // 'TPT04' => $tpt04[7], 
            //
        ]);
    }
}
