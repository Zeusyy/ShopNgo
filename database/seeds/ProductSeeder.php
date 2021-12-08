<?php

use Illuminate\Database\Seeder;
use App\Models\Product;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        for ($i=0; $i < 9; $i++) { 
            $product = new Product;
            $product->name = 'Dien thoai '.$i;
            $product->price = 1000000;
            $product->image = 'https://cdn.tgdd.vn/Products/Images/42/153856/iphone-xi-do-600x600.jpg';
            if($i < 3)
                $product->brand = 'Apple';
            elseif ($i >= 3 && $i >= 7)
                $product->brand = 'Samsung';
            else
                $product->brand = 'Xiaomi';

            $product->save();
        }
    }
}
