<?php

namespace Database\Seeders;

use App\Models\Admin as ModelsAdmin;
use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class Admin extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        ModelsAdmin::create([
            'username'=>'Admin',
            'roles'=>'Super Admin',
            'password'=>bcrypt('admin'),
            'status'=>"Active",
            'verify_at'=>Carbon::now()
        ]);
    }
}
