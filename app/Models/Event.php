<?php

namespace App\Models;

use App\Models\User;
use App\Models\KategoriEvent;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Event extends Model
{
    use HasFactory;
    protected $guarded = ['id'];

    public function kategoriEvent()
    {
        return $this->belongsTo(KategoriEvent::class);
    }
    public function penulis()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
