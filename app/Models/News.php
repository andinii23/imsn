<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;

class News extends Model
{
    use HasFactory, Sluggable;

    // protected $fillable = [
    //     'title', 'kutipan', 'isi_news'
    // ];
    protected $guarded = ['id'];
    protected $with = ['kategori', 'penulis'];

    public function scopeFilter($query, array $filters)
    {

        $query->when($filters['search'] ?? false, function ($query, $search) {
            return $query->where('title', 'like', '%' . $search  . '%')
                ->orWhere('isi_news', 'like', '%' . $search  . '%');
        });

        $query->when($filters['kategori'] ?? false, function ($query, $kategori) {
            return $query->whereHas('kategori', function ($query) use ($kategori) {
                $query->where('slug', $kategori);
            });
        });

        $query->when(
            $filters['penulis'] ?? false,
            fn ($query, $penulis) =>  $query->whereHas(
                'penulis',
                fn ($query) =>
                $query->where('username', $penulis)
            )
        );
    }

    public function kategori()
    {
        return $this->belongsTo(Kategori::class);
    }
    public function penulis()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function getRouteKeyName()
    {
        return 'slug';
    }

    public function sluggable(): array
    {
        return [
            'slug' => [
                'source' => 'title'
            ]
        ];
    }
}
