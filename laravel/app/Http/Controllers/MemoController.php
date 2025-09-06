<?php

namespace App\Http\Controllers;

use App\Models\Memo;
use Illuminate\Http\Request;
use App\Http\Requests\CreateMemoRequest;

class MemoController extends Controller
{
    //
    public function store(CreateMemoRequest $request)
    {
        $validated = $request->validated();

        Memo::create([
            'content' => $validated['content'],
        ]);

        return response()->json([//成功を返す
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
