<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Goal extends Model
{
    use SoftDeletes;

    protected $table = 'goals';
    public $incrementing = true; // if IDs are auto-incrementing.
    public $timestamps = true; // if the model should be timestamped.
    protected $appends = ['progress_percentage','status_label'];

    public function objective()
    {
        return $this->belongsTo('App\Objective');
    }
    
    public function milestones()
    {
        return $this->hasMany('App\Milestone','goal_id')->orderBy('order','ASC');
    }

    public function companies()
    {
        return $this->belongsToMany('App\Company','goal_company','goal_id','company_id');
    }

    public function hasCompany($companyId)
    {
        return $this->companies()->where('company_id', $companyId)->exists();
    }

    public function districts()
    {
        return $this->belongsToMany('App\District','goal_district','goal_id','district_id');
    }
    
    public function districtsAsArray()
    {
        return $this->districts()->pluck('name')->toArray();
    }

    public function hasDistrict($districtId)
    {
        return $this->districts()->where('district_id', $districtId)->exists();
    }

    public function relatedObjectives()
    {
        return $this->belongsToMany('App\Objective','goal_related_objective','goal_id','objective_id');
    }

    public function hasRelatedObjective($objectiveId)
    {
        return $this->relatedObjectives()->where('objective_id', $objectiveId)->exists();
    }

    public function reports()
    {
        return $this->hasMany('App\Report','goal_id');
    }

    public function hasReport($reportId){
        return $this->reports()->where('id', $reportId)->exists();
    }

    public function getStatusLabelAttribute()
    {
        switch($this->status){
            case 'reached':
                return 'Alcanzado';
                break;
            case 'ongoing':
                return 'En progreso';
                break;
            case 'delayed':
                return 'Demorado';
                break;
            case 'inactive':
                return 'Inactivo';
                break;

            default:
                return '???';
        }
    }
    
    public function getProgressPercentageAttribute(){
        return round( ($this->indicator_progress / $this->indicator_goal)*100 );
    }
}
