<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $fillable = [
        'order_id',
        'name',
        'email',
        'card_number',
        'card_exp_month',
        'card_exp_year',
        'plan_name',
        'plan_id',
        'price',
        'price_currency',
        'txn_id',
        'payment_status',
        'receipt',
        'user_id',
        'duration'
    ];

    protected $casts = [
        'created_at' => 'datetime'
    ];

    public const PAYMENT_CHANNELS = ['credit_card', 'mandiri_clickpay', 'cimb_clicks',
	'bca_klikbca', 'bca_klikpay', 'bri_epay', 'echannel', 'permata_va',
	'bca_va', 'bni_va', 'other_va', 'gopay', 'indomaret',
	'danamon_online', 'akulaku'];

    public const EXPIRY_DURATION = 2;
	public const EXPIRY_UNIT = 'days';

    public const CHALLENGE = 'challenge';
	public const SUCCESS = 'success';
	public const SETTLEMENT = 'settlement';
	public const PENDING = 'pending';
	public const DENY = 'deny';
	public const EXPIRE = 'expire';
	public const CANCEL = 'cancel';

	public const ORDERCODE = 'INV';

	public const PAID = 'paid';
	public const UNPAID = 'unpaid';

    public const CREATED = 'created';
	public const CONFIRMED = 'confirmed';
	public const DELIVERED = 'delivered';
	public const COMPLETED = 'completed';
	public const CANCELLED = 'cancelled';
    
	public const PAYMENTCODE = 'PAY';

    public static function total_orders()
    {
        return Order::whereRaw('payment_status = ? OR payment_status = ? OR payment_status = ?', ['SUCCESS', 'success', 'succeeded'])->count();
    }

    public static function total_orders_price()
    {
        return Order::whereRaw('payment_status = ? OR payment_status = ? OR payment_status = ?', ['SUCCESS', 'success', 'succeeded'])->sum('price');
    }

    public function total_coupon_used()
    {
        return $this->hasOne(UserCoupon::class, 'order', 'order_id');
    }

    public function plan(){
        return $this->belongsTo(Plan::class,'id', 'order_id');
    }

    public function user_order(){
        return $this->belongsTo(User::class,'plan_id','id');
    }
}
