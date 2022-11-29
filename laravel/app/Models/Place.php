<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Place extends Model
{
    use \Backpack\CRUD\app\Models\Traits\CrudTrait;
    use HasFactory;
    
    protected $fillable = [
        'name',
        'description',
        'file_id',
        'latitude',
        'longitude',
        'author_id',
        'visibility_id',
    ];

    public function file()
    {
        return $this->belongsTo(File::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'author_id');
    }
    public function author()
    {
        return $this->belongsTo(User::class);
    }
    public function visibility()
    {
        return $this->belongsTo(visibility::class, 'visibility_id');
    } 
    public function favorites()
    {
        return $this->hasMany(Favorite::class);
    }

    public function favorited()
    {
        return $this->belongsToMany(User::class, 'favorites');
    }
    
    public function favoritedByUser(User $user)
    {
        $count = Favorite::where([
            ['user_id',  '=', auth()->user()->id],
            ['place_id', '=', $this->id],
        ])->count();

        return $count > 0;
    }

    public function favoritedByAuthUser()
    {
        $user = auth()->user();
        return $this->favoritedByUser($user);
    }
}
