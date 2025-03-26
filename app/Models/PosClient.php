<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class PosClient extends Model
{
    use HasFactory;

    protected $table = 'pos_clients';

    protected $fillable = ['doc_type', 'doc_number', 'first_name', 'last_name', 'phone', 'email'];

    public function orders(): HasMany
    {
        return $this->hasMany(PosOrder::class);
    }
}
