<?php

use Illuminate\Database\Seeder;

class UsuariosTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('usuarios')->delete();
        
        \DB::table('usuarios')->insert(array (
            0 => 
            array (
                'id' => 1,
                'nombre' => 'admin',
                'email' => 'admin@admin.com',
                'password' => '$2y$10$PHoP/LMm82u1U7jtBaLuPOLHzabzufcEDgTUBWyuoN/n.YnWn9hfW',
                'direccion' => '',
                'info' => '',
                'status' => 0,
                'remember_token' => NULL,
                'created_at' => '2016-09-19 12:07:39',
                'updated_at' => '2016-09-19 12:07:39',
            ),
            1 => 
            array (
                'id' => 2,
                'nombre' => 'daniela',
                'email' => 'dani@merlo.com',
                'password' => '',
                'direccion' => '',
                'info' => '',
                'status' => 2,
                'remember_token' => NULL,
                'created_at' => '2016-09-19 12:28:15',
                'updated_at' => '2016-09-19 12:28:15',
            ),
            2 => 
            array (
                'id' => 6,
                'nombre' => 'dgn',
                'email' => 'dgf@gmail.com',
                'password' => '',
                'direccion' => '',
                'info' => '',
                'status' => 1,
                'remember_token' => NULL,
                'created_at' => '2016-09-19 12:31:01',
                'updated_at' => '2016-09-19 12:31:01',
            ),
            3 => 
            array (
                'id' => 7,
                'nombre' => 'Daniela',
                'email' => 'daniela@dani.com',
                'password' => '',
                'direccion' => '',
                'info' => '',
                'status' => 1,
                'remember_token' => NULL,
                'created_at' => '2016-09-19 12:31:01',
                'updated_at' => '2016-09-19 12:31:01',
            ),
            4 => 
            array (
                'id' => 8,
                'nombre' => 'gjgj',
                'email' => 'estoesunaprueba@gmail.com',
                'password' => '1111111',
                'direccion' => '',
                'info' => '',
                'status' => 1,
                'remember_token' => NULL,
                'created_at' => '2016-09-19 12:41:55',
                'updated_at' => '2016-09-19 12:46:10',
            ),
        ));
        
        
    }
}
