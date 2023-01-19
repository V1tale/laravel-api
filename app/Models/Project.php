<?php

namespace App\Models;

// use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Type;

class Project extends Model
{
    use HasFactory;
    protected $fillable = ['project_id', 'type_id', 'title', 'content', 'slug', 'image'];


    public function type()
    {
        return $this->belongsTo(Type::class);
    }
    public function technologies()
    {
        return $this->belongsToMany(Technology::class);
    }
    // public static function generateSlug($title)
    // {
    //     return Str::slug($title, '-');
    // }
}
