<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class FieldLearningPlan extends Model
{
    use SoftDeletes;

    protected $dates = ['deleted_at'];


    // timestamps 사용

//    public function simplePlan()
//    {
//        return $this->belongsTo('App\SimplePlan');
//    }
//
//    public function workProgresses()
//    {
//        return $this->hasMany('App\WorkProgress');
//    }
//
//    public function detailPlans()
//    {
//        return $this->hasMany('App\DetailPlan');
//    }
//
//    public function useTraffics()
//    {
//        return $this->hasMany('App\UseTraffic');
//    }
//
//    public function histories()
//    {
//        return $this->hasMany('App\History');
//    }
//
//    public function historySubstances()
//    {
//        return $this->hasMany('App\HistorySubstance');
//    }
//
//    public function historyImgs()
//    {
//        return $this->hasMany('App\HistoryImg');
//    }
//
//    public function group()
//    {
//        return $this->belongsTo('App\Group');
//    }
//
//    public function teams()
//    {
//        return $this->hasMany('App\Team');
//    }


}
