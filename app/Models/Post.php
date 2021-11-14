<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $table = 'post';

    /**
     * Post status options
     *
     * @var array
     */
    public static $status = [
        'draft', 'published', 'private'
    ];

    /**
     * Post validation rule
     *
     * @var array
     */
    public static $postValidate = [
        'title' => 'string|required|min:10|max:100',
        'content' => 'string|required|min:100|max:5000',
    ];

    /**
     * Image validation rule
     *
     * @var array
     */
    public static $imageValidate = [
        'image_url' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048'
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
