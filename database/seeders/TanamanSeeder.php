<?php

namespace Database\Seeders;

use App\Models\Tanaman;
use Illuminate\Database\Seeder;

class TanamanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [];
        $data[] = ["nama" => "Daun Bawang"];
        $data[] = ["nama" => "Seledri"];
        $data[] = ["nama" => "Pokcoy"];
        $data[] = ["nama" => "Bayam"];
        $data[] = ["nama" => "Selada"];
        $data[] = ["nama" => "Sawi"];
        $data[] = ["nama" => "Kangkung"];

        foreach ($data as $key => $dt) {
            $activity = Tanaman::create($dt);
            $activity->id = $key + 1;
            $activity->save();
        }
    }
}
