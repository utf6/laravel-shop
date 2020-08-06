<?php

namespace App\Models;

use App\User;
use Illuminate\Database\Eloquent\Model;

class UserAddress extends Model
{
    //
    protected $fillable = [
        'province', 'city', 'district', 'address', 'zip', 'contact_name', 'contact_phone', 'last_used_at'
    ];

    protected $dates = ['last_used_at'];

    /**
     * 关联用户
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    /**
     * 获取完整地址
     * @return string
     */
    public function getFullAddressAttribute()
    {
        return "{$this->province}{$this->city}{$this->district}{$this->address}";
    }
}
