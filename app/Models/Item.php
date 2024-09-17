<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Models\Stock;

class Item extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'company_id',
        'item_unit_id',
        'item_category_id',
        'item_name',
        'item_code',
        'item_barcode',
        'item_status',
        'item_unit_price',
        'item_unit_cost',
        'created_id',
        'updated_id',
        'deleted_id',
        'data_state',
    ];

    public function stock() {
        return $this->hasOne(Stock::class);
    }
}
