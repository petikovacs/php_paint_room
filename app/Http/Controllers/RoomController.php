<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Room;
use App\Models\Paint;

class RoomController extends Controller
{
    public function showRoomForm()
    {
        return view('room.form');
    }

    public function storeRoom(Request $request)
    {
        $request->validate([
            'width' => 'required|numeric|gt:0',
            'length' => 'required|numeric|gt:0',
            'height' => 'required|numeric|gt:0',
        ]);

        $room = Room::create($request->all());

        // Mentsük el a room_id-t a session-be
        session(['room_id' => $room->id]);

        return redirect()->route('window.form');
    }

    public function showWindowForm()
    {
        $windows = session()->get('windows', []);
        return view('window.form', compact('windows'));
    }

    public function storeWindow(Request $request)
    {
        $validated = $request->validate([
            'width' => 'required|numeric|gt:0',
            'height' => 'required|numeric|gt:0',
        ]);

        $windows = session()->get('windows', []);
        $windows[] = $validated;
        session(['windows' => $windows]);

        return redirect()->route('window.form');
    }

    public function showResult(Request $request)
    {
        $roomId = session('room_id');

        if (!$roomId) {
            return redirect()->route('room.form')->withErrors(['msg' => 'Nincs szoba azonosító a session-ben.']);
        }

        $room = Room::find($roomId);

        if (!$room) {
            return redirect()->route('room.form')->withErrors(['msg' => 'A szoba nem található.']);
        }

        $windows = session()->get('windows', []);

        $totalWindowArea = 0;
        foreach ($windows as $window) {
            $totalWindowArea += $window['width'] * $window['height'];
        }

        $roomArea = 2 * ($room->width * $room->height + $room->length * $room->height);
        $remainingArea = $roomArea - $totalWindowArea;

        if ($remainingArea < 0) {
            $remainingArea = 0;
        }

        $windowCount = count($windows);

        // Festékek lekérése a másik adatbázisból
        $paints = Paint::all();

        // Kiválasztott festék kezelése
        $selectedPaintId = $request->input('paint_id');
        $selectedPaint = $selectedPaintId ? Paint::find($selectedPaintId) : $paints->first();

        // Szükséges festékmennyiség kiszámítása (feltételezve, hogy egy liter festék 10 m²-t fed le)
        $coveragePerLiter = 10;
        $requiredPaintLiters = $selectedPaint ? ceil($remainingArea / $coveragePerLiter) : 0;

        return view('result', compact('roomArea', 'windowCount', 'totalWindowArea', 'remainingArea', 'paints', 'selectedPaint', 'requiredPaintLiters'));
    }
}
