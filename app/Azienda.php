<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Azienda extends Model
{
    //


    protected $table = 'aziende';
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'ragioneSociale',
    ];
    

    public function vouchers(){

        return $this->hasMany(Voucher::class);

    }

}
