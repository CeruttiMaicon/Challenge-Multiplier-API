<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Hash;

use Tymon\JWTAuth\Contracts\JWTSubject;

class User extends Authenticatable implements JWTSubject
{
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function getJWTIdentifier()
    {
        return $this->getKey();
    }

    public function getJWTCustomClaims()
    {
        return [];
    }

    public function store ($request)
    {
        try {

            $user = new User;

            return $this->make($user, $request);

        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message_error' => trans('message.error_register_user'),
                'message' => $e->getMessage()
            ]);
        }
    }

    public function edit($request)
    {
        try {

            $user = new User;

            if($request->id != null)
            {
                $user = $user->findOrFail($request->id);
            }

            return $this->make($user, $request);

        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message_error' => trans('message.error_update_user'),
                'message' => $e->getMessage()
            ]);
        }
    }

    private function make(User $user, $request)
    {
        try
        {
            if($user->id)
            {
                $user = User::find($user->id);
            } else {
                $user = new User;
            }
                $user->email = $request->email;
                $user->name = $request->name;
                $user->password = Hash::make($request->password);

                $user->save();

            return $user;

        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message_error' => trans('message.error_make_user'),
                'message' => $e->getMessage()
            ]);
        }
    }
}
