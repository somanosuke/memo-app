<?php

namespace App\Http\Controllers;

use App\Models\Memo;
use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Requests\CreateMemoRequest;

class MemoController extends Controller
{
    //
    public function store(CreateMemoRequest $request)
    {
        $validated = $request->validated();

        auth()->user()->memos()->create([
            'content' => $validated['content'],
        ]);

        return response()->json([//成功を返す
            'message' => 'Created successfully :)'
        ], 201);
    }

    public function getMemos()
    {
        $memos = Memo::with('user')->get()->map(function ($memo) {
            return [
                'id' => $memo->id,
                'content' => $memo->content,
                'user_name' => $memo->user->name,
                'user_display_id' => $memo->user->display_id,
                'timestamp' => $memo->created_at->format('Y/m/d H:i:s'),
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
