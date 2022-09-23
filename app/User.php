<?php



namespace App;



use Illuminate\Database\Eloquent\Model;



/**

 * Class User

 *

 * @property $id

 * @property $name

 * @property $email

 * @property $email_verified_at

 * @property $password

 * @property $remember_token

 * @property $created_at

 * @property $updated_at

 *

 * @package App

 * @mixin \Illuminate\Database\Eloquent\Builder

 */

class User extends Model

{



    static $rules = [

        'name' => 'required',

        'email' => 'required',

        'password' => 'required',

        'pathology_name' => 'required',

        'pathology_address' => 'required',

        'mobile' => 'required',
        'is_admin' => 'required'

    ];



    protected $perPage = 20;



    /**

     * Attributes that should be mass-assignable.

     *

     * @var array

     */

    protected $fillable = ['name', 'email', 'password', 'mobile', 'pathology_name', 'pathology_address', 'is_admin'];
}
