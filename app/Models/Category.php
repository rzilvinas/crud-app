<?php

namespace App\Models;

use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{

    use HasFactory;

    protected $fillable = ['title', 'description', 'slug'];

    /**
     * Set the category slug.
     *
     * @param  string  $value
     * @return void
    */
    public function setSlugAttribute($value)
    {
        $slugValue = Str::slug($value); //Value can become empty after trying to convert to slug so we try converting it first

        if(empty($slugValue)) {
            $slugValue = Str::slug($this->attributes['title']);
        } 

        $this->attributes['slug'] = $slugValue;
    }
}
