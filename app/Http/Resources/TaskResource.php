<?php

namespace App\Http\Resources;

use Carbon\Carbon;
use Illuminate\Http\Resources\Json\JsonResource;

class TaskResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'priority' => $this->priority,
            'due' => Carbon::parse($this->due)->shortRelativeDiffForHumans(),
            'user' => $this->owner,
            'site' => $this->site,
            'type' => $this->type,
            'name' => $this->name,
            'words' => $this->words,
            'progress' => $this->progress,
            'comment' => $this->comment,
            'editor' => $this->editor,
            'folder' => $this->folder,
            'live_link' => $this->live_link,
            'completed' => $this->completed,
            'archived' => $this->archived
        ];
    }
}
