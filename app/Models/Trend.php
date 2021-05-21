<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\support\Facades\DB;

class Trend extends Model
{
    protected $table = 'table_trend';

    public function getDate(){
        // return DB::table('table_trend')->select('datetime')->get()->toArray();
        return DB::table('table_trend')->select('datetime')->get();
    }

    public function value1(){
        return DB::table('table_trend')
            ->select('value_1')
            ->get();
            // ->get()->toArray();
    }

    public function value2(){
        return DB::table('table_trend')
            ->select('value_2')
            ->get();
            // ->get()->toArray();
    }

    // public function endDate(){
    //     return DB::table('table_trend')->select('datetime')->orderBy('datetime', 'DESC')->get();
    // }
}
