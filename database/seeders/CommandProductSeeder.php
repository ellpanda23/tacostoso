<?php

namespace Database\Seeders;

use App\Models\Command;
use App\Models\Product;
use App\Models\Table;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Auth;

class CommandProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $commands = Command::factory(30)->create();

        foreach ($commands as $command) {
            for($i = 1; $i < 5; $i++)
            {
                $productId = Product::all()->random()->id;
                $command->products()->attach($productId, ['quantity' => $i]);
                $command->orders()->create(['user_id' => 1, 'product_id' => $productId, 'quantity' => $i, 'table_id' => Table::all()->random()->id]);
            }
        }
    }
}
