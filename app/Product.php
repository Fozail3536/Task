<?php 
namespace App;
  
use Illuminate\Database\Eloquent\Model;
  
class Product extends Model
{
     protected $table = 'products';
     protected $fillable = ['product_name', 'product_price', 'product_tenure','category_id'];
     
    
     public function category()
    {
        return $this->belongsTo('App\Category');
    }
    public function productSizes()
    {
        return $this->hasMany('App\ProductSize');
    }
}
?>