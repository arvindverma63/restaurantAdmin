<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Facades\Auth;
use GuzzleHttp\Client;

class ProfileController extends Controller
{
    //
    public function account()
    {
        $token = Session::get('token');
        $restaurantId = Session::get('restaurant_id');



        if (!$token) {
            return redirect()->route('login')->withErrors(['message' => 'Token not found or expired. Please log in again.']);
        }
        $baseUrl = env('API_BASE_URL');

        $response = Http::withHeaders([
            'Authorization' => 'Bearer ' . $token,
        ])->get($baseUrl . '/rest-profile/' . $restaurantId);


        if ($response->successful()) {
            $profile = $response->json();

            return view('account', ['profile' => $profile]);
        }
        return redirect()->back()->withErrors(['error' => 'Failed to retrieve categories.']);
    }




    public function update(Request $request, $id)
    {
        $validate = $request->validate([
            'firstName' => 'nullable|string|max:255',
            'lastName' => 'nullable|string|max:255',
            'gender' => 'nullable|string|max:10',
            'restName' => 'nullable|string|max:255',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'phoneNumber' => 'nullable|string|max:15',
            'address' => 'nullable|string|max:255',
            'pinCode' => 'nullable|string|max:10',
            'restaurantId' => 'nullable|string|max:20',
            'identity' => 'nullable|string|max:255',
            'identityNumber' => 'nullable|string|max:255',
            'email' => 'nullable|email|max:255',
        ]);

        $restaurantId = Session::get('restaurant_id');
        $token = Session::get('token');

        if (!$restaurantId) {
            return response()->json(['error' => 'Restaurant ID not found in session.'], 404);
        }

        if (!$token) {
            return response()->json(['error' => 'Authorization token not found in session.'], 401);
        }

        $validate['restaurantId'] = $restaurantId;
        $baseURL = env('API_BASE_URL');

        $client = new Client(['base_uri' => $baseURL]);

        $formData = [];
        foreach ($validate as $key => $value) {
            if (!is_null($value)) {
                $formData[] = [
                    'name' => $key,
                    'contents' => $value,
                ];
            }
        }

        if ($request->hasFile('image') && $request->file('image')->isValid()) {
            $formData[] = [
                'name' => 'image',
                'contents' => fopen($request->file('image')->getRealPath(), 'r'),
                'filename' => $request->file('image')->getClientOriginalName(),
            ];
        }

        try {
            $response = $client->post($baseURL . '/profile/' . $id, [
                'headers' => [
                    'Authorization' => "Bearer {$token}",
                    'Accept' => 'application/json',
                ],
                'multipart' => $formData,
            ]);

            $responseBody = json_decode($response->getBody()->getContents(), true);

            if ($response->getStatusCode() === 200) {
                $message = $responseBody['message'] ?? 'Profile updated successfully.';

                Session::put('profile_image', $responseBody['data']['image'] ?? 'https://placehold.co/100');
                return redirect()->back()->with('success', $message);
            } else {
                Log::error('Failed to save profile details.', ['response' => $responseBody]);
                return redirect()->back()->withErrors(['error' => 'Failed to save profile detail.']);
            }
        } catch (\GuzzleHttp\Exception\RequestException $e) {
            $errorResponse = $e->getResponse() ? $e->getResponse()->getBody()->getContents() : $e->getMessage();
            Log::error('API Request Exception', ['error' => $errorResponse]);
            return redirect()->back()->withErrors(['error' => 'An error occurred while updating the profile.']);
        }
    }
}
