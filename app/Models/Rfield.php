<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Rfield
 *
 * @property $id
 * @property $title
 * @property $field_name
 * @property $field_type
 * @property $filed_value
 * @property $field_sub
 * @property $role
 * @property $status
 * @property $creted_at
 * @property $updated_at
 *
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Rfield extends Model
{
    
    static $rules = [
		'name' => 'required',
		
		'field_type' => 'required',
		
		'role' => 'required',
		'status' => 'required',
		
    ];

    protected $perPage = 20;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['name','field_type','filed_value','field_sub','role','status','title'];



}
