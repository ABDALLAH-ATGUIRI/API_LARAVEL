<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // $product = new \App\Models\Product([
        //     'name' => 'Laravel',
        //     'detail' => 'Laravel is a free, open-source PHP web framework, created by Taylor Otwell and intended for the development of web applications following the model–view–controller (MVC) architectural pattern.',
        // ]);
        // $product->save();

        $product = new \App\Models\Product([
            'name' => 'Laravel 32',
            'detail' => 'Laravel 32 is a free, open-source PHP web framework, created by Taylor Otwell and intended for the development of web applications following the model–view–controller (MVC) architectural pattern.',
        ]);
        $product->save();

        $product = new \App\Models\Product([
            'name' => 'Laravel 23',
            'detail' => 'Laravel 23 is a free, open-source PHP web framework, created by Taylor Otwell and intended for the development of web applications following the model–view–controller (MVC) architectural pattern.',
        ]);
        $product->save();

        $product = new \App\Models\Product([
            'name' => 'Laravel 43',
            'detail' => 'Laravel 43 is a free, open-source PHP web framework, created by Taylor Otwell and intended for the development of web applications following the model–view–controller (MVC) architectural pattern.',
        ]);
        $product->save();

        $product = new \App\Models\Product([
            'name' => 'Laravel 5',
            'detail' => 'Laravel 5 is a free, open-source PHP web framework, created by Taylor Otwell and intended for the development of web applications following the model–view–controller (MVC) architectural pattern.',
        ]);
        $product->save();
    }
}
