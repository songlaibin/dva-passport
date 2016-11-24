<?php

namespace App\Models;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'nickname', 'mobile', 'email', 'password',
        'tel', 'status', 'avatar', 'dingid', 'remark' 
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /*
     * 传入一个昵称生成唯一的昵称
     */
    public static function getUniqueNickname($nickname)
    {
        $origNickname = $nickname;
        while(true) {
            if (self::where('nickname', $nickname)->count() < 1) {
                break;
            } 
            $nickname = $origNickname.str_pad(random_int(1, 999), 3, '0'); 
        }
        return $nickname;
    }
}