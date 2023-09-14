<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class Order extends Model
{
    use HasFactory;

    protected $fillable = [
        'num_ref',
        'user_id',
        'cart_id',
        'type',
        'status',
        'total'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function products()
    {
        return $this->belongsToMany(Product::class);
    }
    public function transaction(){
        return $this->hasOne(transaction::class);
    }
    public function cart(){
        return $this->belongsTo(Cart::class);
    }
    public function payment () {
        return $this->hasOne(Payment::class);
    }
    public static function pending () {
        $pending  = Order::where('status', 'pending')->get();

        return $pending;
    }
    public static function userTotalSpent(User $user){
        $total = Order::where('user_id', $user->id)->whereStatus('processed')->sum('total');

        return $total;
    }
}
