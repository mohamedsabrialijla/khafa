<?php

namespace App\Models;

use Dimsav\Translatable\Translatable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Product extends Model
{
    use SoftDeletes, Translatable;

    public $table = 'products';
    public $translationModel = 'App\Models\ProductTranslations';

    public $translatedAttributes = ['name','description'];
    protected $fillable = ['user_id','price','price_over','number_peces','available','slider','home_page','main_image','status'];

    //protected $hidden = ['created_at','updated_at','deleted_at','home_page','slider'];
    
    protected $appends = ['company_name_ar','company_name_en','name_en','name_ar','description_en','description_ar','over_price'];



    public function getMainImageAttribute($image)
        {
            if (!is_null($image)) {
                    return url($image);
                }
                return "";
        }

         public function getImageAttribute($image)
        {
            if (!is_null($image)) {
                    return url($image);
                }
                return "";
        }
    
   
   

      public function getOverPriceAttribute(){
        
          if($this->discount)
          {
             $ov = ($this->discount/100) * $this->price ;
             return $this->price - $ov;
          }
    }





    public function getCompanyNameArAttribute(){
    
          $id_company = Company::find($this->attributes["company_id"])->id;
          $name_ar = CompanyTranslations::where('company_id',$id_company)->where('locale','ar')->first();
          return $name_ar['name'];
    }


    public function getCompanyNameEnAttribute(){
    
          $id_company = Company::find($this->attributes["company_id"])->id;
          $name_ar = CompanyTranslations::where('company_id',$id_company)->where('locale','en')->first();
          return $name_ar['name'];
    }


   


    public function getNameEnAttribute(){
 
         $r = ProductTranslations::query()->where('product_id',$this->id)
         ->where('locale','en')->first();
        // $r = $this::query()->whereTranslation('locale','en')->name;
        return $r['name'];
    }

    public function getNameArAttribute(){
 
         $r = ProductTranslations::query()->where('product_id',$this->id)
         ->where('locale','ar')->first();
        // $r = $this::query()->whereTranslation('locale','en')->name;
        return $r['name'];
    }


    public function getDescriptionEnAttribute(){
 
         $r = ProductTranslations::query()->where('product_id',$this->id)
         ->where('locale','en')->first();
        // $r = $this::query()->whereTranslation('locale','en')->name;
        return $r['description'];
    }


    public function getDescriptionArAttribute(){
 
         $r = ProductTranslations::query()->where('product_id',$this->id)
         ->where('locale','ar')->first();
        // $r = $this::query()->whereTranslation('locale','en')->name;
        return $r['description'];
    }

    

    


}
