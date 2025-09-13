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

        Memo::create([
            'content' => $validated['content'],
            'user_ULID' => $validated['user_ULID'],
        ]);

        return response()->json([//成功を返す
            'message' => 'Created successfully :)'
        ], 201);
    }

    public function getMemos()
    {
        $memos = Memo::all()->map(function ($memo) {
            $user_ULID = $memo->user_ULID;
            $user = User::where('ULID', $user_ULID)->first();
            return [
                'id' => $memo->id,
                'content' => $memo->content,
                'user_name' => $user->name,
                'user_display_id' => $user->display_id,
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
