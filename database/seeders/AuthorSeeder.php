<?php

namespace Database\Seeders;

use App\Models\Author;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Carbon;

class AuthorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $seedAuthors = [
            ['id'=>'1', 'given_name'=>'Unknown','other_names'=>'','family_name'=>'','country'=>'',],
            ['id'=>'2', 'given_name'=>'Irvine','other_names'=>'','family_name'=>'Welsh','country'=>'Scotland','date_of_birth'=>'27/09/1958',],
            ['id'=>'3', 'given_name'=>'Makoto','other_names'=>'','family_name'=>'Yukimura','country'=>'Japan','date_of_birth'=>'08/05/1976',],
            ['id'=>'4', 'given_name'=>'Patrick','other_names'=>'','family_name'=>'Rothfuss','country'=>'USA','date_of_birth'=>'06/06/1976',],
            ['id'=>'5', 'given_name'=>'Max','other_names'=>'','family_name'=>'Brooks','country'=>'USA','date_of_birth'=>'22/05/1972',],
            ['id'=>'6', 'given_name'=>'Brandon','other_names'=>'','family_name'=>'Sanderson','country'=>'USA','date_of_birth'=>'19/12/1975',],
            ['id'=>'7', 'given_name'=>'Authur','other_names'=>'Conan','family_name'=>'Doyle','country'=>'UK','date_of_birth'=>'22/5/1859',],
            ['id'=>'8', 'given_name'=>'Terry','other_names'=>'','family_name'=>'Pratchett','country'=>'UK','date_of_birth'=>'28/04/1948','date_of_death'=>'12/03/2015',],
            ['id'=>'9', 'given_name'=>'Francis ','other_names'=>'Scott Key','family_name'=>'Fitzgerald ','country'=>'USA','date_of_birth'=>'24/9/1896','date_of_death'=>'21/12/1940',],
            ['id'=>'10', 'given_name'=>'Stephen','other_names'=>'William','family_name'=>'Hawking','country'=>'UK','date_of_birth'=>'08/01/1942','date_of_death'=>'14/03/2018',],
            ['id'=>'11', 'given_name'=>'Jane','other_names'=>'','family_name'=>'Austen','country'=>'UK','date_of_birth'=>'16/12/1775','date_of_death'=>'18/07/1817',],
            ['id'=>'12', 'given_name'=>'Salman','other_names'=>'','family_name'=>'Rushdie','country'=>'India','date_of_birth'=>'19/06/1947',],
            ['id'=>'13', 'given_name'=>'Robert','other_names'=>'','family_name'=>'Kiyosaki','country'=>'USA','date_of_birth'=>'08/04/1947',],
            ['id'=>'14', 'given_name'=>'William','other_names'=>'','family_name'=>'Dalrymple','country'=>'UK','date_of_birth'=>'20/03/1965',],
            ['id'=>'15', 'given_name'=>'John','other_names'=>'Ronald Reuel','family_name'=>'Tolkien','country'=>'UK','date_of_birth'=>'03/01/1892','date_of_death'=>'02/09/1973',],
            ['id'=>'16', 'given_name'=>'Robert','other_names'=>'','family_name'=>'Jordan','country'=>'USA','date_of_birth'=>'17/10/1948','date_of_death'=>'16/09/2007',],
            ['id'=>'17', 'given_name'=>'Lee','other_names'=>'','family_name'=>'Child','country'=>'UK','date_of_birth'=>'29/10/1954',],
            ['id'=>'18', 'given_name'=>'Nassim','other_names'=>'','family_name'=>'Taleb','country'=>'Lebanon','date_of_birth'=>'12/09/1960',],
            ['id'=>'19', 'given_name'=>'David','other_names'=>'','family_name'=>'Straker','country'=>'UK',],
            ['id'=>'20', 'given_name'=>'Dan','other_names'=>'','family_name'=>'Roam','country'=>'',],
            ['id'=>'21', 'given_name'=>'Peter','other_names'=>'','family_name'=>'Wainwright','country'=>'',],
            ['id'=>'22', 'given_name'=>'Joanna','other_names'=>'','family_name'=>'Wiebe','country'=>'CA',],
            ['id'=>'23', 'given_name'=>'Amy','other_names'=>'','family_name'=>'Silerbauer','country'=>'',],
            ['id'=>'24', 'given_name'=>'Bernie','other_names'=>'','family_name'=>'Coyne','country'=>'',],
            ['id'=>'25', 'given_name'=>'Mark','other_names'=>'C.','family_name'=>'Layton','country'=>'',],
            ['id'=>'26', 'given_name'=>'Steven','other_names'=>'J.','family_name'=>'Ostermiller','country'=>'',],
            ['id'=>'27', 'given_name'=>'Dean','other_names'=>'J.','family_name'=>'Kynaston','country'=>'',],
            ['id'=>'28', 'given_name'=>'Kurt','other_names'=>'','family_name'=>'Vonnegut','country'=>'USA','date_of_birth'=>'11/11/1922','date_of_death'=>'11/04/2007',],
            ['id'=>'29', 'given_name'=>'James','other_names'=>'','family_name'=>'Patterson','country'=>'USA','date_of_birth'=>'22/03/1947',],
            ['id'=>'30', 'given_name'=>'Mark','other_names'=>'','family_name'=>'Lawrence','country'=>'USA','date_of_birth'=>'28/01/1996',],
            ['id'=>'31', 'given_name'=>'Robin','other_names'=>'','family_name'=>'Hobb','country'=>'USA','date_of_birth'=>'05/03/1952',],
            ['id'=>'32', 'given_name'=>'Tom','other_names'=>'','family_name'=>'Clancy','country'=>'USA','date_of_birth'=>'12/04/1947','date_of_death'=>'01/10/2013',],
            ['id'=>'33', 'given_name'=>'Robert','other_names'=>'W.','family_name'=>'Chambers','country'=>'USA','date_of_birth'=>'26/05/1865','date_of_death'=>'16/12/1933',],
            ['id'=>'34', 'given_name'=>'Homer','other_names'=>'','family_name'=>'','country'=>'Greece',],
            ['id'=>'35', 'given_name'=>'Gabriel','other_names'=>'Jose de la Concordia','family_name'=>'Garcia Marquez','country'=>'Colombia','date_of_birth'=>'03/06/1927','date_of_death'=>'17/04/2014',],
            ['id'=>'36', 'given_name'=>'Miguel','other_names'=>'','family_name'=>'de Cervantes Saavedra','country'=>'Spain','date_of_birth'=>'29/09/1547','date_of_death'=>'22/04/1616',],
            ['id'=>'37', 'given_name'=>'Alex','other_names'=>'Sandy Mitchell','family_name'=>'Stewart','country'=>'UK','date_of_birth'=>'25/07/1958',],
            ['id'=>'38', 'given_name'=>'Mary','other_names'=>'','family_name'=>'Shelley','country'=>'UK','date_of_birth'=>'30/08/1797','date_of_death'=>'1/02/1851',],
            ['id'=>'39', 'given_name'=>'Margaret','other_names'=>'','family_name'=>'Weis','country'=>'USA','date_of_birth'=>'16/03/1948',],
            ['id'=>'40', 'given_name'=>'Tracy','other_names'=>'','family_name'=>'Hickman','country'=>'USA','date_of_birth'=>'26/11/1955',],
            ['id'=>'41', 'given_name'=>'David','other_names'=>'','family_name'=>'Baldacci','country'=>'USA','date_of_birth'=>'05/08/1960',],
            ['id'=>'42', 'given_name'=>'Samantha','other_names'=>'','family_name'=>'Shannon','country'=>'UK','date_of_birth'=>'08/11/1991',],
            ['id'=>'43', 'given_name'=>'Bill','other_names'=>'','family_name'=>'Watterson','country'=>'USA','date_of_birth'=>'05/07/1958',],
            ['id'=>'44', 'given_name'=>'Andrzej','other_names'=>'','family_name'=>'Sapkowski','country'=>'Poland','date_of_birth'=>'21/06/1948',],
            ['id'=>'45', 'given_name'=>'Michio','other_names'=>'','family_name'=>'Kaku','country'=>'USA','date_of_birth'=>'24/01/1947',],
            ['id'=>'46', 'given_name'=>'Stan','other_names'=>'','family_name'=>'Lee','country'=>'USA','date_of_birth'=>'28/12/1922','date_of_death'=>'12/11/2018',],
            ['id'=>'47', 'given_name'=>'Julio','other_names'=>'Florencio','family_name'=>'Cortazar','country'=>'Belgium','date_of_birth'=>'26/09/1914','date_of_death'=>'02/12/1984',],
            ['id'=>'48', 'given_name'=>'Stephen','other_names'=>'','family_name'=>'King','country'=>'USA','date_of_birth'=>'21/09/1947',],
            ['id'=>'49', 'given_name'=>'Edgar','other_names'=>'Allan','family_name'=>'Poe','country'=>'USA','date_of_birth'=>'19/01/1809','date_of_death'=>'7/10/1849',],
            ['id'=>'50', 'given_name'=>'Jose','other_names'=>'Mario Pedro','family_name'=>'Vargas Llosa','country'=>'Peru','date_of_birth'=>'28/03/1936',],
            ['id'=>'51', 'given_name'=>'Raymond','other_names'=>'E','family_name'=>'Feist','country'=>'USA','date_of_birth'=>'23/12/1945',],
            ['id'=>'52', 'given_name'=>'Ernest','other_names'=>'Miller','family_name'=>'Hemingway','country'=>'USA','date_of_birth'=>'21/07/1899','date_of_death'=>'02/07/1961',],
            ['id'=>'53', 'given_name'=>'Prince Harry','other_names'=>'Henery','family_name'=>'Charles Albert David','country'=>'UK','date_of_birth'=>'15/09/1984',],
            ['id'=>'54', 'given_name'=>'Andrew','other_names'=>'','family_name'=>'Child','country'=>'UK','date_of_birth'=>'08/05/1968',],
            ['id'=>'55', 'given_name'=>'Paulo','other_names'=>'','family_name'=>'Coelho de Souza','country'=>'Brazil','date_of_birth'=>'24/08/1947',],
            ['id'=>'56', 'given_name'=>'Kentaro','other_names'=>'','family_name'=>'Miura','country'=>'Japan','date_of_birth'=>'11/07/1966','date_of_death'=>'06/05/2021',],
            ['id'=>'57', 'given_name'=>'Michelle','other_names'=>'LaVaughn Robinson','family_name'=>'Obama','country'=>'USA','date_of_birth'=>'17/01/1964',],
            ['id'=>'58', 'given_name'=>'Charles','other_names'=>'','family_name'=>'Dickens','country'=>'UK','date_of_birth'=>'07/02/1812','date_of_death'=>'9/06/1870',],
            ['id'=>'59', 'given_name'=>'Jilly ','other_names'=>'','family_name'=>'Cooper','country'=>'UK','date_of_birth'=>'21/02/1937',],
            ['id'=>'60', 'given_name'=>'Pablo','other_names'=>'','family_name'=>'Neruda','country'=>'Chile','date_of_birth'=>'07/12/1904','date_of_death'=>'23/09/1973',],
            ['id'=>'61', 'given_name'=>'Clive','other_names'=>'Staples','family_name'=>'Lewis','country'=>'UK','date_of_birth'=>'29/11/1898','date_of_death'=>'22/11/1963',],
            ['id'=>'62', 'given_name'=>'Isabel','other_names'=>'Angelica','family_name'=>'Allende Llona','country'=>'Chile','date_of_birth'=>'06/02/1942',],
            ['id'=>'63', 'given_name'=>'Terrence','other_names'=>'David John','family_name'=>'Pratchett','country'=>'UK','date_of_birth'=>'28/04/1948','date_of_death'=>'12/03/2015',],
            ['id'=>'64', 'given_name'=>'Miles','other_names'=>'','family_name'=>'Cameron','country'=>'USA','date_of_birth'=>'16/08/1962',],
            ['id'=>'65', 'given_name'=>'Luke','other_names'=>'','family_name'=>'Jennings','country'=>'UK','date_of_birth'=>'04/12/1953',],
            ['id'=>'67', 'given_name'=>'Robert ','other_names'=>'','family_name'=>'Jordan','country'=>'USA','date_of_birth'=>'17/10/1948','date_of_death'=>'16/09/2007',],
            ['id'=>'68', 'given_name'=>'Olly','other_names'=>'','family_name'=>'Richards','country'=>'UK',],
            ['id'=>'69', 'given_name'=>'Richard','other_names'=>'','family_name'=>'Simcott','country'=>'UK',],
            ['id'=>'70', 'given_name'=>'Orhan','other_names'=>'','family_name'=>'Pamuk','country'=>'TR','date_of_birth'=>'07/06/1952',],
            ['id'=>'71', 'given_name'=>'Rick','other_names'=>'','family_name'=>'Riordan','country'=>'USA','date_of_birth'=>'05/06/1964',],
        ];

        foreach ($seedAuthors as $author) {
            if (isset($author["date_of_birth"]) && str_contains($author['date_of_birth'], '/')) {
                $author['date_of_birth'] = Carbon::createFromFormat('d/m/Y', $author['date_of_birth']);
            }

            if (isset($author['date_of_death']) && str_contains($author['date_of_death'], '/')) {
                $author['date_of_death'] = Carbon::createFromFormat('d/m/Y', $author['date_of_death']);
            }

            Author::create($author);
        }
    }
}
