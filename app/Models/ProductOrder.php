<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class ProductOrder extends Model
{
    use SoftDeletes;
	 public $table = 'product_orders';

	  protected $fillable = ['order_id','product_id','feature_id','price','size','color','dimension','quantity','details','status'];

	  protected $hidden = ['created_at','updated_at','deleted_at'];

	  public function product(){
	  	return $this->belongsTo(Product::class, 'product_id');
	  }
	
	
	  
	  public function images(){
	  	return $this->hasMany(Image::class, 'product_id');
	  }
	  
	  
	  protected $appends = ['name_en','image','name_ar'];
	  public function getNameEnAttribute()
	    {
	    	//$n = Product::where('id',$this->product_id)->pluck('cat_id')->first();
	    	return ProductTranslations::where('product_id',$this->product_id)->pluck('name')->first();
	    }
	    
	    public function getNameArAttribute()
	    {
	    	//$n = Product::where('id',$this->product_id)->pluck('cat_id')->first();
	    	return ProductTranslations::where('product_id',$this->product_id)->where('locale','ar')->pluck('name')->first();
	    }
	    
	    
	    
	    public function getImageAttribute()
	    {
	    	return Product::where('id',$this->product_id)->pluck('image')->first();
	    	//return ProductTranslations::where('product_id',$this->product_id)->pluck('name')->first();
	    }
}
