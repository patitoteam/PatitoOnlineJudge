<?php

use Illuminate\Database\Seeder;

class TagTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $tags=['brute force','greedy','dp','trees','number theory','sorting','matrices','math','data structures','games','implementation','divide and conquer','string','bitmasks','graphs','geometry'];
        $description=['Brute Force','Greedy algorithms','Dynamic programming','Trees','Number theory: Euler function, GCD, divisibility, etc','Sortings, orderings',"Matrix multiplication, determinant, Cramer's rule, systems of linear equations",'Mathematics including integration, differential equations, etc','Heaps, binary search trees, segment trees, hash tables, etc'
        ,'Games, Sprague–Grundy theorem','Implementation problems, programming technics, simulation','Divide and Conquer','Prefix- and Z-functions, suffix structures, Knuth–Morris–Pratt algorithm, etc','Bitmasks'
            ,'Graphs','Geometry, computational geometry'
        ];
        $i=0;
        foreach($tags  as $t){
            DB::table('tags')->insert(
                [
                    'name'=>$t,
                    'description'=>$description[$i]
                ]

            );
            $i=$i+1;
        }

    }
}
