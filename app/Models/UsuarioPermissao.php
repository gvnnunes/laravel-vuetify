<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class UsuarioPermissao extends Model
{
    protected $table = 'usuario_permissoes';

    protected $fillable = [
        'usuario_id',
        'permissao_id',
    ];
}
