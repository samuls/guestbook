<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Guestbook
 *
 * @property $id
 * @property $title
 * @property $file_name
 * @property $description
 * @property $is_approved
 * @property $created_at
 * @property $updated_at
 *
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Guestbook extends Model
{
    static $rules = [
    ];

    protected $perPage = 20;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['title','file_name','description','is_approved'];



}
