<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class PosOrder extends Model
{
    use HasFactory;

    protected $table = 'pos_orders';

    protected $fillable = ['total', 'doc_type', 'doc_number'];

    public function client() : BelongsTo
    {
        return $this->belongsTo(PosClient::class);
    }

    public function orderDetails(): HasMany
    {
        return $this->hasMany(PosOrderDetail::class);
    }
}
