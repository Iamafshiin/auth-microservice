<?php

namespace App\Http\Resources;

use App\Http\Resources\Strategies\UserResponseStrategy;
use Carbon\Carbon;
use Illuminate\Http\Resources\Json\JsonResource;

class UserResource extends JsonResource
{
    protected $strategy;

    public function __construct(UserResponseStrategy $strategy)
    {
        $this->strategy = $strategy;
    }

    public function toArray($request): array
    {
        return [
            'data' => $this->strategy->format(),
            'server_time' => Carbon::now(),
        ];
    }
}
