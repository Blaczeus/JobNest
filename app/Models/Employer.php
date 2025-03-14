<?php

namespace App\Models;

use Database\Factories\EmployerFactory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Job;
use App\Models\User;

/**
 * @method static where(string $string, $id)
 * @method static firstOrCreate(array $array, $param, string[] $array1)
 */
class Employer extends Model
{

    protected $guarded = [];

    /** @use HasFactory<EmployerFactory> */
    use HasFactory;

    public function jobs() {
        return $this->hasMany(Job::class);
    }

    public function user() {
        return $this->belongsTo(User::class);
    }
}
