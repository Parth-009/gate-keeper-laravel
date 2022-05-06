<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Complaint;

class ComplaintSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Complaint::create([
            'name'=>'Akash',
            'mobile' =>'9524560123',
            'type'=>'neighbour',
            'complaints'=>'noisy neighbour',
            'status' =>'open'
        ]);
    }
}
