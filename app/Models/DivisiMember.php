<?php

namespace App\Models;

use App\Models\Divisi;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class DivisiMember extends Model
{
    use HasFactory;
    protected $guarded = ['id'];

    public function divisi()
    {
        return $this->belongsTo(Divisi::class);
    }
}
