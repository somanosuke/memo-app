<?php

namespace App\Http\Controllers;

use App\Models\Memo;
use Illuminate\Http\Request;

class MemoController extends Controller
{
    //
    public function store(Request $request)
    {
        Memo::create([
            'content' => $request->input('content'),
        ]);

        return redirect(route('memo'));
    }

    public function getMemos()
    {
        $memos = Memo::all()->map(function ($memo) {
            return [
                'id' => $memo->id,
                'content' => $memo->content,
                'timestamp' => $memo->created_at->format('Y/m/d H:i:s'),
            ];
        });
        return response()->json($memos);
    }
}
