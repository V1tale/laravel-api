<?php

namespace Database\Seeders;

use App\Models\Technology;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class TechnologySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $technologies = ['HTML', 'CSS', 'JS', 'Vue', 'PHP', 'laravel'];
        foreach ($technologies as $tech) {
            $new_tech = new Technology();
            $new_tech->name = $tech;
            $new_tech->slug = Str::slug($new_tech->name, '-');
            $new_tech->save();
        }
    }
}
