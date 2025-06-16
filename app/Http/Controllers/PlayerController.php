<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Player;

class PlayerController extends Controller
{
    public function remove(Request $request)
{
    $player = Player::find($request->player_id);

    if ($player) {
        $player->delete();
        return response()->json(['success' => true]);
    }

    return response()->json(['success' => false]);
}

}
