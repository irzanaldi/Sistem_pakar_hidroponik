<?php

namespace Database\Seeders;

use App\Models\BagianTanaman;
use Illuminate\Database\Seeder;

class BagianTanamanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [];
        $data[] = ["nama" => "Daun"];
        $data[] = ["nama" => "Batang"];
        $data[] = ["nama" => "Akar"];
        $data[] = ["nama" => "Proses Tumbuh"];

        foreach ($data as $key => $dt) {
            $activity = BagianTanaman::create($dt);
            $activity->id = $key + 1;
            $activity->save();
        }
    }
}
