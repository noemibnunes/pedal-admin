<?php

namespace App\Models;

use App\Models\UserAdm;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Bicicleta extends Model
{
    use HasFactory;

    protected $table = 'bicycles';

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'modelo',
        'disponibilidade',
        'valor_aluguel',
        'descricao',
        'quantidades',
        'imagem',
        'user_id'
    ];

    ######################
    # RELACIONAMENTOS
    ######################

    public function userAdm()
    {
        return $this->belongsTo(UserAdm::class, 'user_id', 'id');
    }
}
