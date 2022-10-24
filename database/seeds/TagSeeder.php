<?php

use Illuminate\Database\Seeder;
use App\Tag;
use Illuminate\Support\Str;

class TagSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $tags = ['informatica', 'programmazione', 'database'];

        foreach ($tags as $tag) {
            $newtag = new Tag();
            $newtag->name = $tag;
            $newtag->slug = Str::slug($tag);
            $newtag->save();    
        }
    }
}
