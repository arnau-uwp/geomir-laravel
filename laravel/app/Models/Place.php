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
    public function favorited()
    {
    return $this->belongsToMany(User::class, 'favorites');
    }

    public function authUserHasFavorite()
    {
        $user = auth()->user();
        return $this->userHasFavorite($user);
    }

    public function userHasFavorite(User $user)
    {
        $count = DB::table('favorites')
            ->where(['user_id' => $user->id, 'place_id' => $this->id ])
            ->count();
        return $count > 0;
    }
}
