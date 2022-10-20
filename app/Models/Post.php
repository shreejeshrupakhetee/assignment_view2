<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Post extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $table='posts';
    protected  $fillable=['name','status','category_id'];

    function  cat(){
        return $this->belongsTo(Category::class,'category_id');
    }
}
