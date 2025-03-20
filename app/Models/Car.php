<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Car extends Model
{
    protected $fillable = [
        'name',
        'brand',
        'description',
        'price_per_day',
        'availability',
        'image_url',
        'power',
        'engine',
        'year',
        'transmission',
        'fuel_consumption',
        'seats',
        'color',
        'mileage',
        'origin_country',
        'service_book',
        'max_speed',
        'acceleration',
        'torque',
        'fuel_tank',
        'safety_features',
        'airbags',
        'air_conditioning',
        'parking_camera',
        'heated_seats',
        'deposit',
        'min_driver_age',
        'min_license_length',
        'mileage_limit'
    ];

    protected $casts = [
        'availability' => 'boolean',
        'service_book' => 'boolean',
        'parking_camera' => 'boolean',
        'heated_seats' => 'boolean',
        'safety_features' => 'array'
    ];
} 