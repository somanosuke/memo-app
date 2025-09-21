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

        return response()->json([
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

    public function edit(CreateMemoRequest $request, $id)
    {
        $validated = $request->validated();
        $memo = Memo::findOrFail($id);

        if ($memo->user_id == auth()->id()) {
            $memo->update([
                'content' => $validated['content'],
            ]);
            return response()->json([
                'message' => 'Edited successfully :)'
            ]);
        }
    }

    public function delete(Request $request)
    {//メモの著者のみ削除可能
        $memo = Memo::find($request['id']);
        if (auth()->id() == $memo->user_id) {
            $memo->delete();
            return response()->json([
                'message' => 'Deleted successfully :)'
            ], 200);
        } else {
            return response()->json([
                'message' => 'Deletion failed :('
            ], 401);
        }
    }
}
