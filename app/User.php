<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

//    public function work()
//    {
//        return $this->belongsTo('App\Work', 'usesrs', 'no');
//    }
//
//    public function surveies()
//    {
//        return $this->belongsTo('App\Survey');
//    }
//
//    public function surveyArticles()
//    {
//        return $this->hasMany('App\SurveyArticle');
//    }
//
//    public function surveyAnswers()
//    {
//        return $this->hasMany('App\SurveyAnswer');
//    }





}
