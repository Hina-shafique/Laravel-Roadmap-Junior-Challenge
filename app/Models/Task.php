<?php

namespace App\Models;

use App\Enums\TaskStatus;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Scope;
use App\Models\Project;

class Task extends Model
{
    /** @use HasFactory<\Database\Factories\TaskFactory> */
    use HasFactory;

    protected $fillable = [
        'title',
        'description',
        'project_id',
        'user_id',
        'client_id',
        'deadline',
        'status',
    ];

    public function casts(): array
    {
        return [
            'status' => TaskStatus::class,
        ];
    }

    #[scope]
    public function fillterStatus(Builder $query, ?TaskStatus $status = null): Builder
    {
        return $query->when($status, function($query, $status){
            return $query->where('status', $status);
        });
    }
    public function project()
    {
        return $this->belongsTo(Project::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function client()
    {
        return $this->belongsTo(Client::class);
    }
}
