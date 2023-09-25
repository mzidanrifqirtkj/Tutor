<?php

namespace App\Charts;

use ArielMejiaDev\LarapexCharts\LarapexChart;
use App\Http\Controllers\DashboardController;
use App\Models\Pendaftar;

class SantriChart
{
    protected $chart;

    public function __construct(LarapexChart $chart)
    {
        $this->chart = $chart;
    }

    public function build(): \ArielMejiaDev\LarapexCharts\DonutChart
    {
        $jumlahlaki = Pendaftar::get();
        $jumlahperempuan = Pendaftar::get();
        $data = [
            $jumlahlaki->where('jenis_kelamin', 'L')->count(),
            $jumlahperempuan->where('jenis_kelamin', 'P')->count()
        ];
        $label = [
            'Santri Putra',
            'Santri Putri',
        ];

        return $this->chart->donutChart()
            ->setTitle('Grafik Jumlah Pendaftar')
            ->setSubtitle(date('Y'))
            ->addData($data)
            ->setLabels($label)
            ->setXAxis(['Santri Putra', 'Santri Putri'])
            ->setHeight(600)
            ->setColors(['#3F4B36', '#fcedd4']);
    }
}
