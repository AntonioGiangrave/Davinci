<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Company;

class Voucher extends Model
{
   
    protected $fillable =[
        'company_id',
        'voucher',
        'gratuito',
        'sconto'
    ];
    

    public function company(){
        
        return $this->belongsTo(Company::class);

    }

    

}
