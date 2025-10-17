<?php

namespace App\Exports;

use App\Models\Publikasi;
use Maatwebsite\Excel\Concerns\FromQuery;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithStyles;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;

class PublikasiExport implements FromQuery, WithHeadings, WithMapping, ShouldAutoSize, WithStyles
{
    protected $jenis;
    protected $tahun;

    public function __construct($jenis, $tahun)
    {
        $this->jenis = $jenis;
        $this->tahun = $tahun;
    }

    public function query()
    {
        $query = Publikasi::whereHas('user', function ($query) {
            $query->whereNull('deleted_at');
        })->with(['user.dosenProfile']);

        if ($this->jenis) {
            $query->where('jenis', $this->jenis);
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
            'Kontribusi',
            'Nama Jurnal / Proceeding',
            'Pemeringkatan',
            'Keterlibatan Mahasiswa',
            'Nama Mahasiswa',
            'Kesesuaian Roadmap',
            'Kesesuaian dengan Topik INFOKOM',
            'Total Sitasi',
            'Link Publikasi (DOI)',
        ];
    }

    public function map($publikasi): array
    {
        return [
            $publikasi->user?->name ?? 'N/A',
            $publikasi->user?->dosenProfile?->nidn_nip ?? '-',
            $publikasi->judul,
            $publikasi->kontribusi,
            $publikasi->nama_publikasi,
            $publikasi->pemeringkatan,
            $publikasi->keterlibatan_mahasiswa ? 'Ya' : 'Tidak',
            $publikasi->nama_mahasiswa,
            $publikasi->kesesuaian_roadmap ? 'Ya' : 'Tidak',
            $publikasi->kesesuaian_topik_infokom ? 'Ya' : 'Tidak',
            $publikasi->jumlah_sitasi,
            $publikasi->url_doi,
        ];
    }

    public function styles(Worksheet $sheet)
    {
        return [
            1 => ['font' => ['bold' => true]],
        ];
    }
}