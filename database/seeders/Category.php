<?php

namespace Database\Seeders;

use App\Models\Category as ModelsCategory;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Carbon;
class Category extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        ModelsCategory::insert([
            [
                "name"=>'IT Backend',
                'created_at'=>Carbon::now(),
                'updated_at'=>Carbon::now()
            ],
            [
                "name"=>'IT Frontend',
                'created_at'=>Carbon::now(),
                'updated_at'=>Carbon::now()
            ],
            [

                "name"=>'IT Networking',
                'created_at'=>Carbon::now(),
                'updated_at'=>Carbon::now()
            ],
            [
                "name"=>'IT Database Admin',
                'created_at'=>Carbon::now(),
                'updated_at'=>Carbon::now()
            ],
            [
                "name"=>'Cashier',
                'created_at'=>Carbon::now(),
                'updated_at'=>Carbon::now()
            ],
            [
                "name"=>'Entry Data',
                'created_at'=>Carbon::now(),
                'updated_at'=>Carbon::now()
            ],
            [
                "name"=>'Administrastor',
                'created_at'=>Carbon::now(),
                'updated_at'=>Carbon::now()
            ]
            ]);
    }
}
