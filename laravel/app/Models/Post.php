<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Post extends Model
{
    use \Backpack\CRUD\app\Models\Traits\CrudTrait;
    use HasFactory;
    use \Backpack\CRUD\app\Models\Traits\HasIdentifiableAttribute;


        
    protected $fillable = [
        'body',
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
    public function liked()
    {
    return $this->belongsToMany(User::class, 'likes');
    }

    public function authUserHasLike()
    {
        $user = auth()->user();
        return $this->userHasLike($user);
    }

    public function userHasLike(User $user)
    {
        $count = DB::table('likes')
            ->where(['user_id' => $user->id, 'post_id' => $this->id ])
            ->count();
        return $count > 0;
    }

 
}
