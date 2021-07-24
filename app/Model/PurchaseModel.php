<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class PurchaseModel extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'purchase';

    /**
     * Get the product associated with the purchase.
     */
    public function product()
    {
        return $this->hasOne(ProductsModel::class, 'id', 'product_id');
    }
    
}
