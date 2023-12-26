<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'tax_no',
        'address',
        'country',
        'extra_logos'
    ];

    public function projects()
    {
        return $this->belongsToMany(Project::class, 'project_client')->withTimestamps();
    }
}
