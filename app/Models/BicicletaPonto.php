<?php

namespace App\Models;

use App\Models\UserAdm;
use App\Models\Endereco;
use App\Models\Bicicleta;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\MorphOne;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class BicicletaPonto extends Model
{
    protected $table = 'bicicleta_ponto';

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'bicicleta_id',
        'ponto_id',
        'quantidade'
    ];

    ######################
    # RELACIONAMENTOS
    ######################
}
