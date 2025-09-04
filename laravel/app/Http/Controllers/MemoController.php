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

        return response()->json([
            'message' => 'Created successfully :)'
        ], 200);
    }

    public function getMemos()
    {
        $memos = Memo::all()->map(function ($memo) {
            return [
                'id' => $memo->id,
                'content' => $memo->content,
                'timestamp' => $memo->created_at->timezone('Asia/Tokyo')->format('Y/m/d H:i:s'),
            ];
        });
        return response()->json($memos);
    }

    public function delete(Request $request)
    {
        $memo = Memo::find($request['id']);
        $memo->delete();
        return response()->json([
            'message' => 'Deleted successfully :)'
        ], 200);
    }
}
