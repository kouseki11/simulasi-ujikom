<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;
    protected $guarded = ['id'];
    protected $table = 'user';

    public function scopeFilter($query, array $filters)
    {
        $query->when($filters['search'] ?? false, function($query, $search){
            return $query->where(function($query) use ($search){
            $query->where('name', 'like', '%' . $search . '%')
            ->orWhere('nisn', 'like', '%' . $search . '%')
            ->orWhere('email', 'like', '%' . $search . '%');
           });
         });

         $query->when(request('minat_jurusan'), function($query, $minatJurusan) {
            return $query->where('minat_jurusan', 'like', '%' . $minatJurusan . '%');
        });
        
        $query->when(request('gender'), function($query, $gender) {
            return $query->where('gender', 'like', '%' . $gender . '%');
        });
    
    }
}
