<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Lead
 *
 * @property $id
 * @property $client_name
 * @property $mobile_no
 * @property $project_type
 * @property $solar_requirment
 * @property $lead_source
 * @property $capicity
 * @property $address
 * @property $state
 * @property $district
 * @property $client_response
 * @property $other_remark
 * @property $updated_at
 * @property $created_at
 *
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Lead extends Model
{
    
    static $rules = [
		'client_name' => 'required',
		'mobile_no' => 'required',
		'project_type' => 'required',
		'solar_requirment' => 'required',
		'lead_source' => 'required',
		'capicity' => 'required',
		'capicity_unit' => 'required',
		'address' => 'required',
		'state' => 'required',
		'district' => 'required',
		'client_response' => 'required',
		'other_remark' => 'required',
    ];

    protected $perPage = 20;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['client_name','mobile_no','project_type','solar_requirment','lead_source','capicity','capicity_unit','address','state','district','client_response','other_remark'];



}
