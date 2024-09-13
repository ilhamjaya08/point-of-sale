<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    protected $fillable = [
        'company_id',
        'item_category_name',
        'item_category_code',
        'created_id',
        'updated_id',
        'deleted_id',
        'data_state',
    ];
}
