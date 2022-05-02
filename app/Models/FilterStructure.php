<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FilterStructure extends Model
{
    use HasFactory;

    // primarykey
    public $primaryKey = 'filter_structure_id';
    public $timestamps = false;

    protected $hidden = [
        'pivot',
    ];

    protected $casts = [
        'input_list' => 'array',
        'is_required' => 'boolean',
        'is_applicable' => 'boolean',
        'is_multiple_input' => 'boolean',
    ];

    public function setInputListAttribute($value)
    {
        if ($value != null)
            $this->attributes['input_list'] = json_encode($value);
    }

    // static function to create new FilterStructure
    public static function store(string $name, string $input_type, ?array $input_list, ?string $filter_type, ?string $postfix, ?bool $is_multiple_input, ?bool $is_required, ?bool $is_applicable, int $id = 0):FilterStructure
    {
        $filter = new FilterStructure();
        if ($id != 0)
            $filter->filter_structure_id = $id;
        $filter->name = $name;
        $filter->input_type = $input_type;
        $filter->input_list = $input_list;
        if($filter_type != null && ($input_type == 'numreic' || $input_type == 'integer'))
        $filter->filter_type = $filter_type;
        $filter->postfix = $postfix;
        if($is_multiple_input != null)
            $filter->is_multiple_input = $is_multiple_input;
        if($is_required != null)
            $filter->is_required = $is_required;
        else
            $filter->is_required = false;
        if($is_applicable != null)
            $filter->is_applicable = $is_applicable;
        else
            $filter->is_applicable = false;
        $filter->save();
        return $filter;
    }
}