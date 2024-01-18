<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function layout()
    {
        return $this->belongsTo(Layout::class);
    
    }

    public function product__images()
    {
        return $this->hasMany(Product__images::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function import()
    {
        return $this->belongsTo(Import::class);
    }
    
    public function import_detail()
    {
        return $this->belongsTo(Import_details::class);
    }

}
