<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
    //

    protected $table = 'companies';
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['ragioneSociale'];

    public function vouchers()
    {
        return $this->hasMany(Voucher::class);
    }
}
