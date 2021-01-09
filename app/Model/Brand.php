<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Brand extends Model
{
    public $timestamps = false;
    protected $fillable = [
      'brand_name',
      'brand_desc',
      'brand_status',
    ];
    protected $primaryKey = 'brand_id';
    protected $table = 'tbl_brand_product';
    public function product() {
      return $this->hasMany('App\Model\Product', 'brand_id');
    }
}
