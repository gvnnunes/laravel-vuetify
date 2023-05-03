<?php

namespace App\Http\Services;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class AvatarService
{
    public function getAvatar($nome)
    {
        if(empty($nome)){
            return false;
        }

        $avatar = file_get_contents('https://ui-avatars.com/api/?background=random&name='.urlencode($nome).'&length=2&size=512&font-size=0.45');

        $hash = md5(Str::random(40));
        $nomeArquivo = md5(Str::random(40)).'.png';

        $caminho = 'avatares/'.$hash.'/';
        $store = Storage::disk('public')->put($caminho.$nomeArquivo, $avatar);

        if($store){
            return 'storage/'.$caminho.$nomeArquivo;
        }

        return false;
    }
}
