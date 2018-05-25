<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\User;
class Task extends Model {

    /**
     * Массово присваиваемые атрибуты.
     *
     * @var array
     */
    protected $fillable = ['name'];
    
     public function user(){
    return $this->belongsTo(User::class);
  }

}
