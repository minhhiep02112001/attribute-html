<?php

namespace Attributes\Developer\Models;

use Microservices\models\BaseModel;
 
class Attribute extends BaseModel
{
    protected $casts = [
        'integer' => ['_id', 'created_by', 'ordering', 'is_required', 'is_multiple'],
        'unixtime' => ['created_time', 'updated_time'],
        'string' => ['title', 'option_value', 'name', 'type', 'placeholder', 'class', 'value', 'data_field', 'id', 'data_channel', 'data_type', 'data_value', 'arr_data', 'module', 'data_get', 'data_module', 'help_text'],
    ];
    protected $idAutoIncrement = 1; 
    protected $primaryKey = '_id'; 
    protected $table = 'setting_attributes';
}
