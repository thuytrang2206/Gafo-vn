<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Slidebar extends Model
{
    use HasFactory;
    protected $table = 'slidebar';
    protected $fillable = ['title','pathimage'];
    public $timestamps = false;
    protected function file(): Attribute
    {
        return Attribute::make(
            get: fn ($value) => url('uploads/'.$value),
        );
    }
}
