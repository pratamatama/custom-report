<?php

namespace App\Http\Controllers;

use App\Enums\CaraDatang;
use App\Enums\Gender;
use App\Models\SensusRawatInap;
use App\Utilities\Generator;

class CustomReportController extends Controller
{
    public function generate()
    {
        $data = SensusRawatInap::all();

        $modifier = function ($item) {
            $gender = $item['gender'];
            $age = (int) $item['age'];
            $caraDatang = (int) $item['cara_datang'];

            return [
                ...$item,
                'l' => $gender == Gender::male->value ? $age . 'th' : '',
                'p' => $gender == Gender::female->value ? $age . 'th' : '',
                'poli' => $caraDatang == CaraDatang::poli->value ? 'v' : '',
                'igd' => $caraDatang == CaraDatang::igd->value ? 'v' : '',
                'pndhn.' => $caraDatang == CaraDatang::pindahan->value ? 'v' : '',
                'hp' => (bool) $item['hp'] ? 'v' : '',
                'krs' => (bool) $item['krs'] ? 'v' : '',
                'aps' => (bool) $item['aps'] ? 'v' : '',
                'm' => (bool) $item['m'] ? 'v' : '',
                'rjk' => (bool) $item['rjk'] ? 'v' : '',
                'pdh' => (bool) $item['pdh'] ? 'v' : '',
            ];
        };

        return Generator::xlsx()
            ->fromBlade('sample')
            ->setData($data)
            ->modify($modifier)
            ->render([
                'tgl_mrs',
                'nama',
                'l',
                'p',
                'no_rm',
                'igd',
                'poli',
                'pndhn.',
                'alamat',
                'diagnosa_mrs',
                'diagnosa_krs',
                'tgl_krs',
                'hp',
                'krs',
                'aps',
                'm',
                'rjk',
                'pdh',
                'cara_bayar',
                'dpjp',
            ])
            ->generate();
    }

    public function sample()
    {
        return view('sample');
    }
}
