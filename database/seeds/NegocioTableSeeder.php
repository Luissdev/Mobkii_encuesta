<?php

use Illuminate\Database\Seeder;

class NegocioTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('negocio')->delete();
        
        \DB::table('negocio')->insert(array (
            0 => 
            array (
                'id' => 1,
                'nombre' => 'administrador',
                'email' => 'administrador@gmail.com',
                'password' => 'vjvjmmrh1',
                'descripcion' => '1',
                'status' => 1,
                'remember_token' => NULL,
                'created_at' => '0000-00-00 00:00:00',
                'updated_at' => '0000-00-00 00:00:00',
            ),
        ));
        
        
    }
}
