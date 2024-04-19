<?php

namespace App\Http\Controllers;

use App\Imports\ClassificationDataImport;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Support\Facades\Log;

class ExcelImportController extends Controller
{
    public function importExcel(Request $request)
    {
        $request->validate([
            'excel_file' => 'required|mimes:xls,xlsx|max:2048',
        ], [
            'excel_file.required' => 'File Excel wajib diunggah.',
            'excel_file.mimes' => 'Format file Excel tidak valid. Pilih file dengan format xls atau xlsx.',
            'excel_file.max' => 'Ukuran file Excel tidak boleh lebih dari 2MB.',
        ]);

        if ($request->hasFile('excel_file')) {
            $file = $request->file('excel_file');

            try {
                $import = new ClassificationDataImport();
                Excel::import($import, $file);
                Log::info('Excel data imported successfully.'); // Mengecek eror dikarenakan tidak ada tulisan eror ketika ada yang salah (di dalam folder storage->logs)
                return redirect()->back()->with('success', 'Excel data imported successfully.');
            } catch (\Exception $e) {
                Log::error('Error importing Excel data: ' . $e->getMessage());
                return redirect()->back()->with('error', 'Error importing Excel data. ' . $e->getMessage());
            }
        }

        return redirect()->back()->with('error', 'Error importing Excel data.');
    }
}
