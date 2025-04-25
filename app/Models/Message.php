<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Message extends Model
{
    public $guarded = [];
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function ScopeRead($q)
    {
        $q->whereNotNull('read_at');
    }
    public function ScopeNotRead($q)
    {
        $q->whereNull('read_at');
    }
}