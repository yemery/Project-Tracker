<?php

namespace App\Models;

use App\Models\Project;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Task extends Model
{
  use HasFactory;
  protected $fillable = [
    "title",
    "priority",
    "is_completed",
    "created_at",
    "deadline",
    "updated_at",
    "project_id"

  ];
  public function project()
  {
    return $this->belongsTo(Project::class);
  }
  public function filters($query,array $filters)
  {
    // return $this->belongsTo(Project::class);
    dd($filters['date']);
  }
}
