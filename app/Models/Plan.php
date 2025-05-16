<?php

namespace App\Models;

use App\Observers\PlanObserver;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Attributes\ObservedBy;
use Illuminate\Support\Number;

#[ObservedBy(PlanObserver::class)]
class Plan extends Model
{
    protected $guarded = ['id'];

    protected $casts = [
        'price' => 'decimal:2',
    ];

    protected function price(): Attribute
    {
        return Attribute::make(
            get: fn ($value) => Number::currency($value, 'BRL', 'pt_br'),
        );
    }

    public function users()
    {
        return $this->hasMany(User::class);
    }

    public function details()
    {
        return $this->hasMany(PlanDetail::class);
    }

}
