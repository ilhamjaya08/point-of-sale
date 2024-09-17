<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Models\SalesItem;

class Sales extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'sales_invoice_date',
        'subtotal_amount',
        'subtotal_item',
        'paid_amount',
        'total_amount',
        'change_amount',
        'payment_method',
        'company_id',
        'created_id',
        'updated_id',
        'deleted_id',
    ];

    public function items() {
        return $this->hasMany(SalesItem::class);
    }
}
