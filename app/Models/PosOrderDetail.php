<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class PosOrderDetail extends Model
{
    use HasFactory;

    protected $table = 'pos_order_details';

    protected $fillable = ['detail_price', 'quantity'];

    public function order() : BelongsTo
    {
        return $this->belongsTo(PosOrder::class);
    }

    public function book() : BelongsTo
    {
        return $this->belongsTo(PosBook::class);
    }
}
