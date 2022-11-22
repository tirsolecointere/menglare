<?php

namespace Database\Seeders;

use App\Models\City;
use App\Models\Department;
use App\Models\District;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DepartmentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Department::factory(8)->create()->each(function(Department $department) {
            City::factory(3)->create([
                'department_id' => $department->id
            ])->each(function(City $city) {
                District::factory(5)->create([
                    'city_id' => $city->id,
                ]);
            });
        });
    }
}
