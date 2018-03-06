<?php

namespace App\Models;

use Dimsav\Translatable\Translatable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Company extends Model
{
    use SoftDeletes, Translatable;

    public $table = 'companies';
    public $translationModel = 'App\Models\CompanyTranslations';

    public $translatedAttributes = ['name','description'];
    protected $fillable = ['logo','status'];

    protected $hidden = ['created_at','updated_at','deleted_at'];
    


    public function getLogoAttribute($logo)
        {
            if (!is_null($logo)) {
                    return url($logo);
                }
                return "";
        }

}
