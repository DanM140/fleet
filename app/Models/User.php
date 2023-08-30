<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Request;
class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
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
    static public function getEmailSingle($email)
    {
       return self::where('email','=',$email)->first();
    }

    static public function getTokenSingle($remember_token)
    {
        return self::where('remember_token','=',$remember_token)->first();  
    }
    static public function getDrivers()
    {
        $return = self::select('users.*') 
             ->where('is_deleted','=',0)
             ->where('user_type','=',2);
             if(!empty(Request::get('name'))){
                $return=$return->where('name','like','%'.Request::get('name').'%');  
            }
            if(!empty(Request::get('last_name'))){
                $return=$return->where('last_name','like','%'.Request::get('last_name').'%');  
            }
            if(!empty(Request::get('national_id'))){
                $return=$return->where('national_id','like','%'.Request::get('national_id').'%');  
            }
            if(!empty(Request::get('license'))){
                $return=$return->where('license','like','%'.Request::get('license').'%');  
            }
            if(!empty(Request::get('residence'))){
                $return=$return->where('residence','like','%'.Request::get('residence').'%');  
            }
            if(!empty(Request::get('date'))){
                $return=$return->whereDate('dob','=',Request::get('date'));  
            }
            if(!empty(Request::get('email'))){
                $return=$return->where('email','like','%'.Request::get('email').'%');  
            }

             $return=$return ->orderBy('id','desc')
             ->paginate(10);
             return $return;
    }
    static public function getSingle($id){
        return self::find($id);
    }
    public function getprofile()
     {
        if(!empty($this->profile_pic) && file_exists('upload/profile/'.$this->profile_pic))
        {
             return url('upload/profile/'.$this->profile_pic);
        }
        else{
            return "";
        }
     }
}
