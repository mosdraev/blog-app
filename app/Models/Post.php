<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $table = 'post';

    public static $status = [
        'draft', 'published', 'private'
    ];

    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $fillable = [
        'author_id',
        'title',
        'content',
        'image_url',
        'status'
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array
     */
    protected $hidden = [
        'author_id',
    ];

    /**
     * @inheritdoc
     */
    public function user()
    {
        return $this->hasOne(User::class, 'id', 'author_id');
    }
}
