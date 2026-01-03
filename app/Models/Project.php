<?php

namespace App\Models;

use GuzzleHttp\Psr7\Query;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Enums\ProjectStatus;
use Illuminate\Database\Eloquent\Scope;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;

class Project extends Model implements HasMedia
{
    /** @use HasFactory<\Database\Factories\ProjectFactory> */
    use HasFactory;
    use InteractsWithMedia;

    protected $fillable = [
        'title',
        'description',
        'user_id',
        'client_id',
        'deadline',
        'status',
    ];

    public function casts(): array
    {
        return [
            'status' => ProjectStatus::class,
            'deadline' => 'datetime',
        ];
    }

    #[scope]
    public function filterStatus(Builder $query, ?ProjectStatus $status = null): Builder
    {
        return $query->when($status, function($query , $status){
            return $query->where('status', $status);
        });
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function client()
    {
        return $this->belongsTo(Client::class);
    }

    public function tasks()
    {
        return $this->hasMany(Task::class);
    }

    // Accessor and mutators

    public function description() : Attribute
    {
        return Attribute::make(
            get: fn(string $description) => ucfirst($description),
        );
    }
}
