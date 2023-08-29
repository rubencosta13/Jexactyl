<?php

namespace Jexactyl\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


/**
 * @property int $id
 * @property string $plan_name
 * 
 * @property string|null $image
 * @property int $memory
 * @property int $swap
 * @property int $disk
 * @property int $io
 * @property int $cpu
 * @property string|null $threads
 * @property bool $oom_disabled
 * @property int|null $allocation_limit
 * @property int|null $database_limit
 * @property int $backup_limit
 * 
 * @property int $nest_id
 * @property int $egg_id
 * @property string $startup
 * 
 * @property float $price
 * 
 */
class Plans extends Model
{
    use HasFactory;


    protected $table = 'plans';

    protected $attributes = [
        'oom_disabled' => true
    ];

    public static array $validationRules = [
        'plan_name' => 'required|string|max:30',

        'image' => 'required|string|max:191',
        'memory' => 'required|numeric|min:0',
        'swap' => 'required|numeric|min:-1',
        'disk' => 'required|numeric|min:0',
        'io' => 'required|numeric|between:10,1000',
        'cpu' => 'required|numeric|min:0',
        'threads' => 'nullable|regex:/^[0-9-,]+$/',
        'oom_disabled' => 'sometimes|boolean',
        'allocation_limit' => 'sometimes|nullable|integer|min:0',
        'database_limit' => 'present|nullable|integer|min:0',
        'backup_limit' => 'present|nullable|integer|min:0',

        'nest_id' => 'required|exists:nests,id',
        'egg_id' => 'required|exists:eggs,id',
        'startup' => 'required|string',

        'price' => 'required|int|min:0'
    ];

    protected $casts = [
        'plan_name' => 'string',

        'image' => 'string',
        'memory' =>  'integer',
        'swap' => 'integer',
        'disk' => 'integer',
        'io' =>  'integer',
        'cpu' => 'integer',
        'oom_disabled' => 'boolean',
        'database_limit' => 'integer',
        'backup_limit' => 'integer',

        'nest_id' => 'integer',
        'egg_id' => 'integer',
        'startup' => 'string',

        'price' => 'float'
    ];

     /**
     * Gets information for the egg associated with this plan.
     */
    public function egg(): HasOne
    {
        return $this->hasOne(Egg::class, 'id', 'egg_id');
    }    
}
