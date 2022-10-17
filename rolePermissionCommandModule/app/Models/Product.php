<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Category;
class Product extends Model
{
    //who->relation name->to whom
        // 1 to  1 dependent =belongsTo
        // 1 to 1 not dependent = hasOne
    use HasFactory;

    // protected $fillable=['name','price','details'];
    protected $guarded=[];

    public function category(){
        return $this->belongsTo(Category::class);
        //product->category_id,id
    }
}
