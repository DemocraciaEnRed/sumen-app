<?php

namespace App\Http\Resources;

use Auth;
// use App\Http\Resources\Goal as GoalResource;
// use App\Http\Resources\Reply as ReplyResource;
use Illuminate\Http\Resources\Json\JsonResource;

class District extends JsonResource
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
            'name' => $this->name,
        ];
        return $res;
    }
}
