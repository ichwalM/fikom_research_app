<?php

namespace App\Exports;

use App\Models\Penelitian;
use Maatwebsite\Excel\Concerns\FromQuery;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\ShouldAutoSize; // <-- 1. Import
use Maatwebsite\Excel\Concerns\WithStyles;     // <-- 1. Import
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet; // <-- 1. Import

class PenelitianExport implements FromQuery, WithHeadings, WithMapping, ShouldAutoSize, WithStyles // <-- 2. Implement
{
    /**
    * @return \Illuminate\Support\Collection
    */
    protected $skema_id;
    protected $tahun;

    public function __construct($skema_id, $tahun)
    {
        $this->skema_id = $skema_id;
        $this->tahun = $tahun;
    }

    public function query()
    {
        $query = Penelitian::whereHas('user', function ($query) {
            $query->whereNull('deleted_at');
        })->with(['user.dosenProfile', 'skemaPenelitian']);

        if ($this->skema_id) {
            $query->where('skema_penelitian_id', $this->skema_id);
        }

        if ($this->tahun) {
            $query->where('tahun', $this->tahun);
        }

        return $query->orderBy('tahun', 'desc');
    }

    public function headings(): array
    {
        return [
            'Nama',
            'NIDN',
            'Judul',
            'Skema',
            'Status Peneliti',
            'Sumber Dana',
            'Total Dana',
            'Tahun',
            'Mahasiswa Terlibat',
            'Nama Mahasiswa',
            'Sesuai Roadmap',
            'Sesuai Topik Infokom',
            'Dapat HKI',
            'Link Kontrak',
            'Mata Kuliah',
            'Keterangan',
        ];
    }

    public function map($penelitian): array
    {
        return [
            $penelitian->user?->name ?? 'N/A',
            $penelitian->user?->dosenProfile?->nidn_nip ?? '-',
            $penelitian->judul,
            $penelitian->skemaPenelitian?->nama_skema ?? '-',
            $penelitian->status_peneliti,
            $penelitian->sumber_dana,
            $penelitian->jumlah_dana,
            $penelitian->tahun,
            $penelitian->keterlibatan_mahasiswa ? 'Ya' : 'Tidak',
            $penelitian->nama_mahasiswa,
            $penelitian->kesesuaian_roadmap ? 'Ya' : 'Tidak',
            $penelitian->kesesuaian_topik_infokom ? 'Ya' : 'Tidak',
            $penelitian->mendapatkan_hki ? 'Ya' : 'Tidak',
            $penelitian->link_kontrak_penelitian,
            $penelitian->matakuliah,
            $penelitian->keterangan,
        ];
    }

    public function styles(Worksheet $sheet)
    {
        return [
            // Style baris pertama (header).
            1    => ['font' => ['bold' => true]],
        ];
    }

    // public function collection()
    // {
    //     return Penelitian::all();
    // }
}
