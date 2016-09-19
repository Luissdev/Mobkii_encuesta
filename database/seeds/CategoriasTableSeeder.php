<?php

use Illuminate\Database\Seeder;

class CategoriasTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('categorias')->delete();
        
        \DB::table('categorias')->insert(array (
            0 => 
            array (
                'id' => 1,
                'nombre' => 'Frituras',
                'descripcion' => 'Todo tipo de frituras',
                'status' => 1,
                'remember_token' => '1',
                'created_at' => '0000-00-00 00:00:00',
                'updated_at' => '2016-09-19 12:55:06',
            ),
            1 => 
            array (
                'id' => 2,
                'nombre' => 'Refrescos',
                'descripcion' => 'Refrescos de todos sabores y marcas',
                'status' => 1,
                'remember_token' => NULL,
                'created_at' => '2016-09-19 12:43:39',
                'updated_at' => '2016-09-19 12:46:27',
            ),
        ));
        
        
    }
}
