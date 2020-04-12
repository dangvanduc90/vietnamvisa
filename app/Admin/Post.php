<?php

namespace App\Admin;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
   	protected $fillable = [
        'name', 'image' , 'sosao', 'slug' , 'des_s', 'price', 'content','cat_id', 'status' , 'link_demo'
    ];

    public function category()
    {
        return $this->belongsTo('App\Admin\Category','cat_id');
    }

    public function setImageAttribute($value) {
    	$tmp = $value;
    	if ($tmp != null && $tmp != "") {
    		$index = strpos($tmp,'FILES/source/');
    		if (!$index === false) {
    			$tmp = substr($tmp,$index, strlen($tmp));
    		}
    	}
    	$this->attributes['image'] = $tmp;
    }

    public function getImageAttribute() {
    	$tmp = $this->attributes['image'];
    	if ($tmp != null && $tmp != "") {
    		$tmp = config('admin.base_url').$tmp;
    	}
    	return $tmp;
    }

    public function seo(){
        return Seo::where('type',3)->where('obj_id', $this->id)->first();
    }
}
