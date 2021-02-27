<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

//
use Illuminate\Support\Facades\DB;

class EmployeeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
          DB::table('employees')->insert([
              [
                'emoplyee_no' => '',
                'name' => 'Sazal Ahamed',
                'designation_id' => 2,
                'department' => 'Product Development',
                'company' => 'ABC Ltd',
                'salary' => 70000.00,
                'joining_date' => '2021-02-27',
                'termination_date' => NULL
              ],[
                'emoplyee_no' => '',
                'name' => 'Kamrul Hasan',
                'designation_id' => 1,
                'department' => 'Product Development',
                'company' => 'XYZ Ltd',
                'salary' => 60000.00,
                'joining_date' => '2021-02-25',
                'termination_date' => NULL
              ],[
                'emoplyee_no' => '',
                'name' => 'John Duo',
                'designation_id' => 3,
                'department' => 'Product Development',
                'company' => 'XYZ Ltd',
                'salary' => 90000.00,
                'joining_date' => '2021-02-20',
                'termination_date' => NULL
              ],[
                'emoplyee_no' => '',
                'name' => 'Shoile',
                'designation_id' => 1,
                'department' => 'Product Development',
                'company' => 'XYZ Ltd',
                'salary' => 50000.00,
                'joining_date' => '2021-02-22',
                'termination_date' => NULL
              ]
        ]);
    }
}
