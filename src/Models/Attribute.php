<?php

namespace Attributes\Developer\Models;

use Microservices\models\BaseModel;
 
class Attribute extends BaseModel
{
    protected $casts = [
        'integer' => ['_id', 'created_by', 'ordering', 'is_required', 'is_multiple'],
        'unixtime' => ['created_time', 'updated_time'],
        'string' => ['title', 'option_value', 'option_field', 'name', 'type', 'placeholder', 'class', 'value', 'id', 'data_value', 'module', 'data_get', 'data_module', 'help_text'],
    ];
    protected $idAutoIncrement = 1; 
    protected $primaryKey = '_id'; 
    protected $table = 'setting_attributes';
}
