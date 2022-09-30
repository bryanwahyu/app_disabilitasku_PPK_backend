<?php

namespace Database\Seeders;

use App\Models\Disability as ModelsDisability;
use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class Disability extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        ModelsDisability::insert([
            [
                'name'=>'Blind',
                "description"=>'Buat Orang buta',
                'created_at'=>Carbon::now(),
                'updated_at'=>Carbon::now()
            ],
            [
                "name"=>"accidential",
                'description'=>"disabilitas karena kecelakaan",
                'created_at'=>Carbon::now(),
                'updated_at'=>Carbon::now()

            ],
            [
                "name"=>'cerebral Palsy',
                "description"=>'disabilitas motorik',
                'created_at'=>Carbon::now(),
                'updated_at'=>Carbon::now()
            ]
        ]);
    }
}
