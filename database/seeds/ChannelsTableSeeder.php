<?php

use Illuminate\Database\Seeder;
use App\Channel;
use Illuminate\Support\Str;

class ChannelsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Channel::create([
            'name' => 'Laravel 8',
            'slug' => Illuminate\Support\Str::slug('Laravel 8', '-')
        ]);

        Channel::create([
            'name' => 'Vue Js 3',
            'slug' => Illuminate\Support\Str::slug('Vue Js 3', '-')
        ]);

        Channel::create([
            'name' => 'React Js 12',
            'slug' => Illuminate\Support\Str::slug('React Js 12', '-')
        ]);

        Channel::create([
            'name' => 'Node Js',
            'slug' => Illuminate\Support\Str::slug('Node Js', '-')
        ]);
    }
}
