<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transportadora extends Model
{
    use HasFactory;

    protected $fillable = [
        'cnpj',
        'fantasia',
    ];
    protected $keyType = 'string';

    public $incrementing = false;

    protected $casts = [
        'remetente' => 'json',
        'destinatario' => 'json',
        'rastreamento' => 'json',
    ];

    public function entregas()
    {
        return $this->hasMany(Entrega::class, 'id_transportadora', 'id');
    }

    public function scopeFiltrar($query, $filters)
    {
        if (!empty($filters['transportadora_id'])) {
            $query->where('id', $filters['transportadora_id']);
        }

        if (!empty($filters['remetente'])) {
            $query->whereHas('entregas', function ($q) use ($filters) {
                $q->whereRaw("JSON_UNQUOTE(JSON_EXTRACT(remetente, '$.nome')) LIKE ?", ['%' . $filters['remetente'] . '%']);
            });
        }

        if (!empty($filters['destinatario'])) {
            $query->whereHas('entregas', function ($q) use ($filters) {
                $q->whereRaw("JSON_UNQUOTE(JSON_EXTRACT(destinatario, '$.nome')) LIKE ?", ['%' . $filters['destinatario'] . '%']);
            });
        }

        if (!empty($filters['cpf_destinatario'])) {
            $cpf = preg_replace('/\D/', '', $filters['cpf_destinatario']);
            $query->whereHas('entregas', function ($q) use ($cpf) {
                $q->whereRaw("JSON_UNQUOTE(JSON_EXTRACT(destinatario, '$.cpf')) = ?", [$cpf]);
            });
        }

        if (!empty($filters['data_inicio'])) {
            $query->whereHas('entregas', function ($q) use ($filters) {
                $q->where('data', '>=', $filters['data_inicio']);
            });
        }

        if (!empty($filters['data_fim'])) {
            $query->whereHas('entregas', function ($q) use ($filters) {
                $q->where('data', '<=', $filters['data_fim']);
            });
        }

        return $query;
    }
}
