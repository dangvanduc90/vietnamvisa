<?php

namespace App\Admin;

use Illuminate\Database\Eloquent\Model;
use App\Admin\Category;

class Category extends Model
{
    protected $fillable = [
        'name', 'slug', 'cat_id', 'type', 'type2', 'note', 'status', 'icon',
    ];

    protected $appends = ['parent'];

    public function getParentAttribute()
    {    
        $cat_id = $this->attributes['cat_id'];
        $res = null;
        if(isset($cat_id)){
        	$res = Category::find($cat_id);
        }
        return $res;
        
    }
    public function seo(){
        return Seo::where('type',2)->where('obj_id', $this->id)->first();
    }

    public function posts(){
        return $this->hasMany('App\Admin\Post','cat_id');
    }

    public function setIconAttribute($value) {
        $tmp = $value;
        if ($tmp != null && $tmp != "") {
            $index = strpos($tmp,'FILES/source/');
            if (!$index === false) {
                $tmp = substr($tmp,$index, strlen($tmp));
            }
        }
        $this->attributes['icon'] = $tmp;
    }

    public function getIconAttribute() {
        $tmp = $this->attributes['icon'];
        if ($tmp != null && $tmp != "") {
            $tmp = config('admin.base_url').$tmp;
        }
        return $tmp;
    }
}
