<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $usuarioadmin = new User();
        $usuarioadmin->name = 'administrador';
        $usuarioadmin->ap_paterno = 'academia';
        $usuarioadmin->ap_materno = 'briceno';
        $usuarioadmin->dni = '12345678';
        $usuarioadmin->codigo = '123456';
        $usuarioadmin->email = 'yoel_13_2007@gmail.com';
        $usuarioadmin->password = bcrypt('123456789');
        $usuarioadmin->save();
    }
}