<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Folder;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class FolderController extends Controller
{
    public function get()
    {
        try {
            $folder = Folder::where('parent_id', 0)->get();
            return response()->json([
                'status' => true,
                'message' => 'Successfully',
                'data' => $folder
            ], 201);
        } catch (\Throwable $err) {
            return response()->json([
                'status' => false,
                'message' => 'Data docter empty',
                'errors' => $err->getMessage()
            ], 422);
        }
    }

    public function getSub($id)
    {
        try {
            $folder = Folder::where('parent_id', $id)->get();
            return response()->json([
                'status' => true,
                'message' => 'Successfully',
                'data' => $folder
            ], 201);
        } catch (\Throwable $err) {
            return response()->json([
                'status' => false,
                'message' => 'Data docter empty',
                'errors' => $err->getMessage()
            ], 422);
        }
    }

    public function store(Request $request)
    {
        if (!empty($request->nama)) {
            Folder::create([
                'nama' => $request->nama,
                'parent_id' => $request->parent_id,
                'slug' => Str::uuid(),
            ]);
            return response()->json([
                'status' => true,
                'message' => 'Successfully',
            ], 201);
        } else {
            return response()->json([
                'status' => false,
                'message' => 'No action',
            ], 422);
        }
    }

    public function storeSub(Request $request)
    {
        if (!empty($request->nama)) {
            Folder::create([
                'nama' => $request->nama,
                'parent_id' => $request->parent_id,
                'slug' => Str::uuid(),
            ]);
            return response()->json([
                'status' => true,
                'message' => 'Successfully',
            ], 201);
        } else {
            return response()->json([
                'status' => false,
                'message' => 'No action',
            ], 422);
        }
    }


    public function destroy($id)
    {
        try {
            Folder::where('parent_id', $id)->delete();
            $folder = Folder::findOrFail($id);
            $folder->delete();
            return response()->json([
                'status' => true,
                'message' => 'Deleted successfully'
            ], 204);
        } catch (\Throwable $err) {
            return response()->json([
                'status' => false,
                'message' => 'Delete data failed',
                'errors' => $err->getMessage()
            ], 422);
        }
    }

    public function destroySub($id)
    {
        try {
            $docter = Folder::findOrFail($id);
            $docter->delete();
            return response()->json([
                'status' => true,
                'message' => 'Deleted successfully'
            ], 204);
        } catch (\Throwable $err) {
            return response()->json([
                'status' => false,
                'message' => 'Delete data failed',
                'errors' => $err->getMessage()
            ], 422);
        }
    }
}
