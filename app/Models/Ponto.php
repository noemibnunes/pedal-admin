<?php

namespace App\Models;

use App\Models\UserAdm;
use App\Models\Endereco;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\MorphOne;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Ponto extends Model
{
    protected $table = 'points';

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'id',
        'descricao',
        'user_id'
    ];

    ######################
    # RELACIONAMENTOS
    ######################

    public function endereco(): MorphOne
    {
        return $this->morphOne(Endereco::class, 'endereable');
    }

    public function userAdm()
    {
        return $this->belongsTo(UserAdm::class, 'user_id', 'id');
    }

}
