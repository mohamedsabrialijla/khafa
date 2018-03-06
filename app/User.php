<?php

namespace App;

use App\Models\Comment;
use App\Models\Course;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Passport\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
        'profile_image', 'mobile','comment','user_type'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function getProfileImageAttribute($image)
    {
        if (!is_null($image)) {
            return url($image);
        }
        return '';
    }
    
    public function getCommentAttribute($comment)
    {
        if (!is_null($comment)) {
            return $comment;
        }
        return '';
    }
    
     public function nameng()
    {

        return $this->belongsTo('App\Models\Craftname','craft_job');
    }

     public function getCraftNameAttribute(){
    return Models\CraftnameTranslations::where('craftname_id',$this->craft_job)->pluck('name')->first();
    }


}
