<?php

use Illuminate\Database\Seeder;
use App\Cliente;

class ClientesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for($i=1;$i<20;$i++){
            Cliente::create([
                'nombre' => 'cliente '.$i,
                'imagen' => '',
                'cedula' => '123',
                'email' => 'cliente'.$i.'@gmail.com',
                'telefono' => '123',
                'observaciones' => 'prueba observacion'
            ]);
        }
    }
}
