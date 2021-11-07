<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
    protected $fillable = [
        'subcategory_id',
        'code',
        'unit',
        'name',
        'image',
        'minimum_stock',
        'description',
    ];

    public function category()
    {
        return $this->belongsTo('App\Category');
    }

    public function stockMutations()
    {
        return $this->hasMany('App\StockMutation');
    }

    public function mainStockIn($branch_id)
    {
        return $this->stockMutations->where('branch_id', $branch_id)->where('is_return', '!=', 1)->sum('in');
    }

    public function mainStockOut($branch_id)
    {
        return $this->stockMutations->where('branch_id', $branch_id)->where('is_return', '!=', 1)->sum('out');
    }

    public function mainStock($branch_id)
    {
        $in = StockMutation::where('item_id', $this->id)->where('branch_id', $branch_id)->whereNull('is_return')->sum('in');
        $out = StockMutation::where('item_id', $this->id)->where('branch_id', $branch_id)->whereNull('is_return')->sum('out');

        return $in - $out;
    }

    public function returStockIn($branch_id)
    {
        return $this->stockMutations->where('branch_id', $branch_id)->where('is_return', 1)->sum('in');
    }

    public function returStockOut($branch_id)
    {
        return $this->stockMutations->where('branch_id', $branch_id)->where('is_return', '=', 1)->sum('out');
    }

    public function returnStock($branch_id)
    {
        $in = StockMutation::where('item_id', $this->id)->where('branch_id', $branch_id)->where('is_return', 1)->sum('in');
        $out = StockMutation::where('item_id', $this->id)->where('branch_id', $branch_id)->where('is_return', 1)->sum('out');
        return $in - $out;
    }

    public function totalStock($branch_id)
    {
        return $this->mainStock($branch_id) + $this->returnStock($branch_id);
    }

    public function lastPrice($branch_id)
    {
        return Price::where('item_id', $this->id)
            ->where('branch_id', $branch_id)
            ->orderBy('created_at', 'desc')
            ->first();
    }

    public function lastBuyPrice($branch_id)
    {
        return PurchaseOrderDetail::where('item_id', $this->id)
            ->whereHas('purchaseOrder', function ($q) use ($branch_id) {
                $q->where('branch_id', $branch_id);
            })
            ->orderBy('created_at', 'desc')
            ->first();
    }

    public function lastSellPrice($branch_id)
    {
        return SalesOrderDetail::where('item_id', $this->id)
            ->whereHas('salesOrder', function ($q) use ($branch_id) {
                $q->where('branch_id', $branch_id);
            })
            ->orderBy('created_at', 'desc')
            ->first();
    }

    public function stockStatus($branch_id)
    {
        $color = '';
        $text = '';
        if ($this->mainStock($branch_id) <= $this->minimum_stock) {
            $color = 'danger';
            $text = 'Stock barang telah mencapai batas minimum';
        }

        $data['color'] = $color;
        $data['text'] = $text;

        return collect($data);
    }
}
