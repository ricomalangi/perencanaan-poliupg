<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;

use Exception;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\DB;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    protected $table = 'tb_users';

    public function getData($paginate = 5)
    {
        try {
            $results =
                DB::table('tb_users as u')
                ->leftJoin('tb_unit_kerja as uk', 'u.uuid_unit_kerja', '=', 'uk.uuid')
                ->select('u.*', 'uk.nama_unit_kerja')
                ->paginate($paginate);
            return $results;
        } catch (Exception $e) {
            return redirect()->route('admin.users')->with('error', "Error " . $e->getMessage());
        }
    }
    
    public function getDataEdit($uuid){
        try {
            $results =
                DB::table('tb_users as u')
                ->leftJoin('tb_unit_kerja as uk', 'u.uuid_unit_kerja', '=', 'uk.uuid')
                ->select('u.*', 'uk.nama_unit_kerja')
                ->where('u.uuid', $uuid)
                ->first();
            return $results;
        } catch (Exception $e) {
            return redirect()->route('admin.users')->with('error', "Error " . $e->getMessage());
        }
    }




    // Bawann dari laravel

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
}
