<?php

namespace App\Model;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Model;

class ProductsModel extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'products';

    public static function getuserData(){
        $value = DB::table('users')->orderBy('id', 'asc')->get();
        return $value;
    }
}
