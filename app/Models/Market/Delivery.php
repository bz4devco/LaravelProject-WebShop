<?php

namespace App\Models\Market;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Delivery extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'delivery';

    protected $fillable = ['name', 'amount', 'delivery_time', 'delivery_time_unit', 'status'];


    public function getDeliveryTimesAttribute()
    {
        $delivery_time = $this->delivery_time == 0 ? 'امروز' : $this->delivery_time;
        $delivery_unit = $this->delivery_time == 0 ? '' : $this->delivery_time_unit;
        $last = $this->delivery_time == 0 ? '' : 'آینده';
        return "تامین کالا از $delivery_time $delivery_unit $last";
    }
}
