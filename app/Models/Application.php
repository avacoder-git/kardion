<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Application extends Model
{
    use HasFactory;

    protected $guarded = [];


    const STATUS_NEW = 1;
    const STATUS_CREATED = 2;

    const TYPE_AMBULATORY = 1;
    const TYPE_STATIONARY = 2;
    const TYPE_ONLINE = 3;

    const TYPES = [
        self::TYPE_AMBULATORY,
        self::TYPE_STATIONARY,
        self::TYPE_ONLINE,
    ];

    const STATUSES = [
        self::STATUS_NEW,
        self::STATUS_CREATED,
    ];


    public function applicationable()
    {
        return $this->morphTo();
    }



}
