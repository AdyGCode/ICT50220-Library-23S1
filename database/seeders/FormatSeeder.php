<?php

namespace Database\Seeders;

use App\Models\Format;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class FormatSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $seedFormats = [
            ['id'=>1, 'name'=>"Hardback",'description'=>"",],
            ['id'=>2, 'name'=>"eBook",'description'=>"Digital version of a book",],
            ['id'=>3, 'name'=>"eAudiobook",'description'=>"Recording of book read aloud (streaming)",],
            ['id'=>4, 'name'=>"Paperback",'description'=>"book with a thick paper or paperboard cover",],
            ['id'=>5, 'name'=>"Tapestry",'description'=>"embroidered into cloth",],
            ['id'=>6, 'name'=>"Blu-Ray",'description'=>"",],
            ['id'=>7, 'name'=>"CD",'description'=>"",],
            ['id'=>8, 'name'=>"DVD",'description'=>"",],
            ['id'=>9, 'name'=>"Electronic Resource",'description'=>"",],
            ['id'=>10, 'name'=>"eMagazine",'description'=>"",],
            ['id'=>11, 'name'=>"Jigsaw",'description'=>"",],
            ['id'=>12, 'name'=>"Map",'description'=>"",],
            ['id'=>13, 'name'=>"MP3",'description'=>"",],
            ['id'=>14, 'name'=>"Photograph",'description'=>"",],
            ['id'=>15, 'name'=>"Sound Recording",'description'=>"",],
            ['id'=>16, 'name'=>"Toy",'description'=>"",],
            ['id'=>17, 'name'=>"Large Print",'description'=>"",],
            ['id'=>18, 'name'=>"Game",'description'=>"",],
            ['id'=>19, 'name'=>"Audiobook",'description'=>"Audio book on CD",],
        ];

        foreach ($seedFormats as $format) {
            Format::create($format);
        }
    }
}
