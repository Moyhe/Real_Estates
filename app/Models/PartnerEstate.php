<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class PartnerEstate extends Model
{
    use HasFactory;

    protected $casts = [
        'thumbnails' => 'array',

    ];

    protected $attributes = [
        'thumbnails' => '[]'
    ];

    /**
     * Get the user that owns the PartnerEstate
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Get the orderType that owns the PartnerEstate
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function orderType(): BelongsTo
    {
        return $this->belongsTo(OrderType::class);
    }

    /**
     * Get the category that owns the OwnerEstate
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function category(): BelongsTo
    {
        return $this->belongsTo(Category::class);
    }
}
