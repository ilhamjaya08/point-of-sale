<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Stock extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'item_name',
        'company_id',
        'warehouse_id',
        'item_id',
        'item_unit_id',
        'item_category_id',
        'last_balance',
        'created_id',
        'updated_id',
        'deleted_id',
        'data_state',
    ];
}
