<?php

namespace App\Models;

use App\Traits\QueryTrait;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Task extends Model
{
    use QueryTrait, HasFactory;

    protected $table = 'tasks';
    protected $fillable = [
        'title',
        'slug',
        'card_id',
        'description',
        'order'
    ];

    /**
     * Get the card that owns the Task
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function card(): BelongsTo
    {
        return $this->belongsTo(Card::class, 'card_id');
    }
}
