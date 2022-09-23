<?php

namespace App;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Guestbook
 *
 * @property $id
 * @property $user_id
 * @property $title
 * @property $description
 * @property $document
 * @property $is_approved
 * @property $created_at
 * @property $updated_at
 *
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Guestbook extends Model
{
    use HasFactory;

    static $rules = [
		'user_id' => 'required',
		'title' => 'required',
		'description' => 'required'
    ];
    

    protected $perPage = 20;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['user_id','title','description','document','is_approved'];

    public function users()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

}
