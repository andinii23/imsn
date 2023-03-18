<?php

namespace App\Models;

use App\Models\DivisiMember;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Divisi extends Model
{
    use HasFactory;
    protected $guarded = ['id'];

    public function divisiMember()
    {
        return $this->hasMany(DivisiMember::class);
    }
}
