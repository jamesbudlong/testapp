<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\Category;
use App\Models\Value;

class PopulateDataSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $cats = ['Always Valued', 'Often Valued', 'Sometimes Valued', 'Seldom Valued', 'Never Valued'];

        foreach ($cats as $value) {
            $categs = new Category;
            $categs->name = $value;
            $categs->save();
        }

        \App\Models\Value::factory(100)->create();
    }
}
