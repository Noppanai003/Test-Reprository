<?php

namespace App;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class Promotion extends Model
{
    protected $fillable = [
        'pro_name',
        'pro_detail',
        'pro_image',
        'pro_cost',
        'pro_start_date',
        'pro_due_date'
    ];

    // ลบภาพที่เก็บอยู่ใน Storage
    public function deleteImage()
    {
        Storage::delete($this->pro_image);
    }

    // วันที่ data
    // protected $dates = [
    //     'pro_due_date'
    // ];


    public function getProDueDateAttribute($value)
    {
        return Carbon::parse($value)->format('d-m-Y');
    }

    public function getProStartDateAttribute($value)
    {
        return Carbon::parse($value)->format('d-m-Y');
    }
}
