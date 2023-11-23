<?php

namespace App\Models\Modules;

use App\Models\Coa;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SalesDetail extends Model
{
    use HasFactory;

    protected $fillable = [
        'kode_item',
        'harga',
        'qty',
        'sales_master_id',
        'branch_item_id',
        'po_detail_id',
        'coa_id',
    ];

    public function salesMaster()
    {
        return $this->belongsTo(SalesMaster::class);
    }

    public function branchItem()
    {
        return $this->belongsTo(BranchItem::class);
    }

    public function purchaseOrderDetail()
    {
        return $this->belongsTo(PurchaseOrderDetail::class);
    }

    public function coa()
    {
        return $this->belongsTo(Coa::class);
    }
}
