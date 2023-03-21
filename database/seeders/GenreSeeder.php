<?php

namespace Database\Seeders;

use App\Models\Genre;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class GenreSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $seedGenres = [
            ['id'=>'1', 'name'=>"unknown",'description'=>"if you are unable to apply a genre, then use this",],
            ['id'=>'2', 'name'=>"Romance",'description'=>"smooches",],
            ['id'=>'3', 'name'=>"Fantasy",'description'=>"",],
            ['id'=>'4', 'name'=>"sci-fi",'description'=>"Science Fiction",],
            ['id'=>'5', 'name'=>"Horror",'description'=>"",],
            ['id'=>'6', 'name'=>"Thriller",'description'=>"Ahhhhh",],
            ['id'=>'7', 'name'=>"Non-fiction",'description'=>"",],
            ['id'=>'8', 'name'=>"Personal finance",'description'=>"",],
            ['id'=>'9', 'name'=>"Action and adventure",'description'=>"",],
            ['id'=>'10', 'name'=>"Realism",'description'=>"Escapism? Don't know her",],
            ['id'=>'11', 'name'=>"Mystery",'description'=>"idk",],
            ['id'=>'12', 'name'=>"Cosmology",'description'=>"Dealing with the nature of the universe",],
            ['id'=>'13', 'name'=>"Cookbook",'description'=>"Cooking for humans",],
            ['id'=>'14', 'name'=>"Business",'description'=>"",],
            ['id'=>'15', 'name'=>"Computing",'description'=>"",],
            ['id'=>'16', 'name'=>"Programming",'description'=>"",],
            ['id'=>'17', 'name'=>"Python",'description'=>"",],
            ['id'=>'18', 'name'=>"C#",'description'=>"",],
            ['id'=>'19', 'name'=>"Ruby",'description'=>"",],
            ['id'=>'20', 'name'=>"PHP",'description'=>"",],
            ['id'=>'21', 'name'=>"MongoDB",'description'=>"",],
            ['id'=>'22', 'name'=>"Autobiography and memoirs",'description'=>"",],
            ['id'=>'23', 'name'=>"Biography",'description'=>"",],
            ['id'=>'24', 'name'=>"Essays",'description'=>"",],
            ['id'=>'25', 'name'=>"Non-fiction novel",'description'=>"",],
            ['id'=>'26', 'name'=>"Self-help",'description'=>"",],
            ['id'=>'27', 'name'=>"Adventure stories",'description'=>"",],
            ['id'=>'28', 'name'=>"Classics",'description'=>"",],
            ['id'=>'29', 'name'=>"Crime",'description'=>"",],
            ['id'=>'30', 'name'=>"Fairy tales, fables, and folk tales",'description'=>"",],
            ['id'=>'31', 'name'=>"Historical fiction",'description'=>"",],
            ['id'=>'32', 'name'=>"Humour and satire",'description'=>"",],
            ['id'=>'33', 'name'=>"Literary fiction",'description'=>"",],
            ['id'=>'34', 'name'=>"Poetry",'description'=>"",],
            ['id'=>'35', 'name'=>"Plays",'description'=>"",],
            ['id'=>'36', 'name'=>"Science fiction",'description'=>"",],
            ['id'=>'37', 'name'=>"Short stories",'description'=>"",],
            ['id'=>'38', 'name'=>"Thrillers",'description'=>"",],
            ['id'=>'39', 'name'=>"War",'description'=>"",],
            ['id'=>'40', 'name'=>"Women’s fiction",'description'=>"",],
            ['id'=>'41', 'name'=>"Young adult",'description'=>"",],
        ];

        foreach($seedGenres as $genre) {
            Genre::create($genre);
        }

    }
}
