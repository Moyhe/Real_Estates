<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class SupplyEstates extends Model
{
    use HasFactory;

    protected $with = ['orderType'];

    protected $casts = [
        'thumbnails' => 'array',

    ];

    protected $attributes = [
        'thumbnails' => '[]'
    ];

    /**
     * Get the user that owns the SupplyEstates
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Get the category that owns the SupplyEstates
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function orderType(): BelongsTo
    {
        return $this->belongsTo(OrderType::class, 'order_type_id');
    }
}
