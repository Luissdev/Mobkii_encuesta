<?php

use Illuminate\Database\Seeder;

class PedidosTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('pedidos')->delete();
        
        
        
    }
}
