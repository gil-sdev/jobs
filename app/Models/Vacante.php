<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Vacante extends Model
{
    use HasFactory;


/* Telling Laravel that the `ultimo_dia` field is a date field. */
    protected $dates = ['ultimo_dia'];

  /* Telling Laravel that the fields in the array are the only ones that can be filled in the database. */
    protected $fillable = [
        'titulo',
        'salario_id',
        'categoria_id',
        'empresa',
        'descripcion',
        'ultimo_dia',
        'imagen',
        'user_id'
    ];

    public function categoria()
    {
       /* Telling Laravel that the `categoria_id` field in the `vacantes` table is a foreign key that
       references the `id` field in the `categorias` table. */
        return $this->belongsTo(Categoria::class);
    }

    public function salario()
    {
        /* Telling Laravel that the `salario_id` field in the `vacantes` table is a foreign key that
        references the `id` field in the `salarios` table. */
        return $this->belongsTo(Salario::class);
    }
    public function candidatos()
    {
      /* Telling Laravel that the `vacantes` table has many `candidatos` records. */
        return $this->hasMany(Candidato::class)->orderBy('created_at', 'DESC');
    }

   /* Telling Laravel that the `vacantes` table has a `user_id` field that references the `id` field in
   the `users` table. */
    public function reclutador()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
