<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $max = factory(App\User::class)->create(['name' => 'Max']);
        $max->posts()->createMany([
            ['title' => 'Post 1', 'tag' => 'Foo'],
            ['title' => 'Post 2', 'tag' => 'Bar'],
        ]);

        $david = factory(App\User::class)->create(['name' => 'David']);
        $david->posts()->createMany([
            ['title' => 'Post 3', 'tag' => 'Bar'],
            ['title' => 'Post 4', 'tag' => 'Biz'],
        ]);
        
        $daniel = factory(App\User::class)->create(['name' => 'Daniel']);
        $daniel->posts()->createMany([
            ['title' => 'Post 5', 'tag' => 'Foo'],
            ['title' => 'Post 6', 'tag' => 'Foo'],
        ]);
    }
}
