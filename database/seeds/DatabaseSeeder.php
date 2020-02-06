<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UsersTableSeeder::class);
        // seed Users
        $this->call(Users::class);
        // Để seed ta dùng lệnh: php artisan db:seed

        //Seed category
        $this->call(Category::class);
        $this->call(Order::class);
        $this->call(product::class);
        $this->call(ProductOrder::class);
        $this->call(info::class);

    }
}
