<?php

namespace App\Http\Resources;

use Auth;
// use App\Http\Resources\Goal as GoalResource;
// use App\Http\Resources\Reply as ReplyResource;
use App\Http\Resources\Objective as ObjectiveResource;
use App\Http\Resources\Report as ReportResource;
use Illuminate\Http\Resources\Json\JsonResource;

class Goal extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        $res = [
            'id' => $this->id,
            'title' => $this->title,
            'status' => $this->status,
            'status_label' => $this->status_label,
            'indicator' => $this->indicator,
            'indicator_goal' => $this->indicator_goal,
            'indicator_progress' => $this->indicator_progress,
            'progress_percentage' => $this->progress_percentage,
            'indicator_unit' => $this->indicator_unit,
            'indicator_frequency' => $this->indicator_frequency,
            'map_lat' => $this->map_lat,
            'map_long' => $this->map_long,
            'map_zoom' => $this->map_zoom,
            'map_center' => $this->map_center,
            'map_geometries' => $this->map_geometries,
            'source' => $this->source,
            'url' => route('goals.index',['goalId' => $this->id])
        ];
        $with = $request->query('with');
        if(!is_null($with)){
          $withParams = explode(',',$with);
          foreach ($withParams as $withParam) {
            switch($withParam){
              case 'goal_objective':
                $res['objective'] = ObjectiveResource::make($this->objective);
                break;
              case 'goal_reports_count':
                $res['reports_count'] = $this->reports()->count();
              case 'goal_latest_reports':
                $res['latest_reports'] = ReportResource::collection($this->reports()->orderBy('updated_at','DESC')->limit(4)->get());
                break;
            }
          }
        }
        return $res;
    }
}
