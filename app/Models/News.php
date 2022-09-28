<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\SoftDeletes;
use Laravel\Sanctum\HasApiTokens;

class News extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable; 
    //use SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected  $primaryKey = 'id_news'; // Сменть название первичного ключа для find($pk);
    //protected $softDelete = true; // Включаем маякого удаление 
    public $timestamps = false; // Отключать метки времени при создании через контроллер
    protected $table = 'news'; // Добавляем сами назавние таблицы
    protected $fillable = [
        'Tittle',
        'public_date',
        'category_news',
        'content',
        'author_news',
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
    ];
}
