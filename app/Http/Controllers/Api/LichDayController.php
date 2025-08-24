<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Models\LichDay;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class LichDayController extends Controller
{
    // Trả về lịch của 1 lớp
    public function index($lopHocId)
    {
        return LichDay::where('lop_hoc_id', $lopHocId)->get();
    }

    // Tick/untick: value=true -> tạo (nếu chưa có), value=false -> xóa
    public function toggle(Request $request, $lopHocId)
    {
        $validated = $request->validate([
            'thu'  => ['required', Rule::in(['T2','T3','T4','T5','T6','T7','CN'])],
            'buoi' => ['required', Rule::in(['morning','afternoon','evening'])],
            'value'=> ['required','boolean'],
        ]);

        if ($validated['value'] === true) {
            // tạo nếu chưa có
            LichDay::firstOrCreate([
                'lop_hoc_id' => $lopHocId,
                'thu'        => $validated['thu'],
                'buoi'       => $validated['buoi'],
            ]);
            return response()->json(['message' => 'Đã thêm lịch'], 201);
        } else {
            // xóa nếu có
            LichDay::where('lop_hoc_id', $lopHocId)
                ->where('thu', $validated['thu'])
                ->where('buoi', $validated['buoi'])
                ->delete();
            return response()->json(['message' => 'Đã xóa lịch']);
        }
    }
}
