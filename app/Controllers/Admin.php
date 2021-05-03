<?php

namespace App\Controllers;

use App\Models\ModelSantri;
use App\Models\ModelKelas;
use App\Models\ModelAbsensi;
use App\Models\ModelGuru;
use App\Models\ModelMateri;
use App\Models\ModelPengumuman;
use App\Models\ModelPembayaran;
use App\Models\ModelUserManagement;

class Admin extends BaseController
{
    protected $ModelSantri;
    protected $ModelKelas;
    protected $ModelAbsensi;
    protected $ModelGuru;
    protected $ModelMateri;
    protected $ModelPengumuman;
    protected $ModelPembayaran;
    protected $ModelUserManagement;

    public function __construct()
    {
        $this->ModelSantri = new ModelSantri();
        $this->ModelKelas = new ModelKelas();
        $this->ModelAbsensi = new ModelAbsensi();
        $this->ModelGuru = new ModelGuru();
        $this->ModelMateri = new ModelMateri();
        $this->ModelPengumuman = new ModelPengumuman();
        $this->ModelPembayaran = new ModelPembayaran();
        $this->ModelUserManagement = new ModelUserManagement();
    }

    public function index()
    {
        // if (session()->get('level') == "Admin") {
        //     $reportAbsen = $this->ModelAbsensi->orderBy('NIS', 'desc')->findAll();
        // } else {
        //     $reportAbsen = $this->ModelAbsensi->where('NIS', session()->get('id_santri'))->orderBy('id_santri', 'desc')->findAll();
        // }
        // $reportAbsen = $this->ModelAbsensi->findAll();

        // if (session()->get('level') == "Guru") {
        //     $reportSantri = $this->ModelSantri->orderBy('NIS', 'desc')->findAll();
        // } else {
        //     $reportSantri = $this->ModelSantri->where('NIS', session()->get('id_santri'))->orderBy('id_santri', 'desc')->findAll();
        // }
        // $reportSantri = $this->ModelSantri->findAll();

        $data = [
            'title' => 'Admin',
            'isi'    => 'admin',
            // 'reportAbsen' => $reportAbsen,
            // 'reportSantri' => $reportSantri,
            "total_santri" => $this->ModelSantri->get_santri_count(),
            "total_kelas" => $this->ModelKelas->get_kelas_count(),
            "total_absensi" => $this->ModelAbsensi->get_absensi_count(),
            "total_guru" => $this->ModelGuru->get_guru_count(),
            "total_materi" => $this->ModelMateri->get_materi_count(),
            "total_pengumuman" => $this->ModelPengumuman->get_pengumuman_count(),
            "total_pembayaran" => $this->ModelPembayaran->get_pembayaran_count(),
            "total_user" => $this->ModelUserManagement->get_user_count()
        ];

        return view("layout/wrapper", $data);
    }

    // public function viewchartJK($NIS)
    // {
    //     $data = [
    //         'title' => 'View Chart JK',
    //         'chartJK' => $this->ModelAdmin->allData($NIS),
    //         'isi'    => 'admin/v_viewchartJK'
    //     ];

    //     return view("layout/wrapper", $data);
    // }
}
