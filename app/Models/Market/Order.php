<?php

namespace App\Models\Market;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Order extends Model
{
    use HasFactory,SoftDeletes;

    protected $fillable = ['seen'];

    public function payment()
    {
        return $this->belongsTo('App\Models\Market\Payment');
    }

    public function delivery()
    {
        return $this->belongsTo('App\Models\Market\Delivery');
    }

    public function user()
    {
        return $this->belongsTo('App\Models\User');
    }

    public function address()
    {
        return $this->belongsTo('App\Models\Address');
    }

    public function orderItems()
    {
        return $this->hasMany('App\Models\Market\OrderItem');
    }

    public function copan()
    {
        return $this->belongsTo('App\Models\Market\Copan');
    }
    
    public function commonDiscount()
    {
        return $this->belongsTo('App\Models\Market\CommonDiscount');
    }
    
    
    // check status and types multi value
          
    public function getPaymentTypeValueAttribute()
    {
        switch($this->payment_type){
            case 0:
                $result = 'آنلاین';
            break;
            case 1:
                $result = 'آفلاین';
            break;
            default:
                $result = 'در محل';
            break;
        }

        return $result;
    }


    public function getPaymentStatusValueAttribute()
    {
        switch($this->payment_status){
            case 0:
                $result = 'پرداخت نشد';
            break;
            case 1:
                $result = 'پرداخت شده';
            break;
            case 2:
                $result = 'باطل شده';
            break;
            default:
                $result = 'برگشت داده شده';
            break;
        }

        return $result;
    }


    public function getDeliveryStatusValueAttribute()
    {
        switch($this->delivery_status){
            case 0:
                $result = 'ارسال نشده';
            break;
            case 1:
                $result = 'درحال ارسال';
            break;
            case 2:
                $result = 'ارسال شده';
            break;
            default:
                $result = 'تحویل داده شد';
            break;
        }

        return $result;
    }


    public function getOrderStatusValueAttribute()
    {
        switch($this->order_status){
            case 0:
                $result = 'در انتظار تایید';
            break;
            case 1:
                $result = 'تایید نشده';
            break;
            case 2:
                $result = 'تایید شده';
            break;
            case 3:
                $result = 'باطل شده';
            break;
            default:
                $result = 'مرجوع شده';
            break;
        }

        return $result;
    }

}
