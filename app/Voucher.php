<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Azienda;

class Voucher extends Model
{
   
    protected $fillable =[
        'azienda_id',
        'voucher',
        'gratuito',
        'sconto'
    ];
    

    public function azienda(){
        
        return $this->belongsTo(Azienda::class);

    }

    

}
