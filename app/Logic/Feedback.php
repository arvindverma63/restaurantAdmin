<?php

namespace App\Logic;

use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Session;

class Feedback{
    public function getFeedbacks(){
        $baseUrl = env('API_BASE_URL');
        $restaurantId = Session::get('restaurant_id');

        $response = Http::get($baseUrl.'/feedbacks/'.$restaurantId);
        return $response;

    }
}
