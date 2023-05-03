<?php

namespace Database\Seeders;

use App\Http\Services\AvatarService;
use App\Models\Permissao;
use App\Models\Usuario;
use App\Models\UsuarioPermissao;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        Permissao::create([
            'nome' => 'admin',
        ]);

        Permissao::create([
            'nome' => 'dashboard',
        ]);

        $avatar = new AvatarService();
        $avatar = $avatar->getAvatar('Giovani Nunes');

        Usuario::create([
            'nome' => 'Giovani Nunes',
            'email' => 'giovaninunes99@gmail.com',
            'senha' => Hash::make('123'),
            'avatar' => $avatar,
        ]);

        UsuarioPermissao::create([
            'usuario_id' => 1,
            'permissao_id' => 1,
        ]);
    }
}
