<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use SoftDeletes;
    use HasApiTokens, HasFactory, Notifiable; // ADD THIS

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'phone',
        'photo',
        'role',
        'currency_id',
        'seller_id',
        'gevernorate_id',
        'affiliate',
        'affiliate_id',
        'device_token'
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];

    /**
     * Get the modules of this user
     * @return BelongsToMany
     */
    public function modules()
    {
        return $this->belongsToMany(Module::class,'user_modules');
    }


    /**
     * Check if the user has this module
     * @param string, module name
     * @return bool
     */
    public function hasModule($module)
    {
        if($this->modules->contains('path',$module))
        {
            return true;
        }
        return false;
    }

    /**
     * Check if the user can access a module
     * @param string, module name
     * @return bool
     */
    public function canAccess($module)
    {
        // dd($this->role);
        if ( 'admin' == $this->role ) {
            return true;
        }else {
            return $this->hasModule($module);
        }
        return false;
    }
    public function articles(){
        return $this->hasMany(Article::class,'user_id');
    }
    public function getCurrencyName(){
        $currency_name = Currency::where('id',$this->currency_id)->value('symbol');
        return $currency_name;
    }

}
