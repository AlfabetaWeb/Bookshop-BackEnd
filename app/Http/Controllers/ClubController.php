<?php

namespace App\Http\Controllers;

use App\Models\Club;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Validator;

class ClubController extends Controller
{
    //CREATE NEW CLUB
    public function createClub(Request $request)
    {
        try {
            Log::info("Creating a club");

            $validator = Validator::make($request->all(), [
                'title' => 'required|string',
            ]);

            if ($validator->fails()) {
                return response()->json(
                    [
                        "success" => false,
                        "message" => $validator->errors()
                    ],
                    400
                );
            };

            $clubName = $request->input('clubName');
            $userId = auth()->user()->id;

            $club = new Club();
            $club->clubName = $clubName;
            $club->user_id = $userId;

            $club->save();


            return response()->json(
                [
                    'success' => true,
                    'message' => "Club created"
                ],
                200
            );
        } catch (\Exception $exception) {
            Log::error("Error creating club: " . $exception->getMessage());

            return response()->json(
                [
                    'success' => false,
                    'message' => "Error creating clubs"
                ],
                500
            );
        }
    }
}
