<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use app\Models\Report;
use app\Models\User;
use app\Models\Action;

class Student extends Model
{
    protected $fillable = [
        'name',
        'phone',
        'total_points',
        'user_id'
    ];


    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function Reports()
    {
        return $this->hasMany(Report::class);
    }

    public function totalPoints()
    {
        return $this->actions->sum(function($action) {
            return $action->pages + $action->hadiths + ($action->clothes ? 1 : 0) - ($action->noisy ? 1 : 0);
        });
    }

    public function actions()
    {
        return $this->hasMany(Action::class);
    }
}
