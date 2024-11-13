<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Folder;
use Illuminate\Http\Request;

class DashbordController extends Controller
{
    public $data;
    public function get()
    {
        try {
            $this->data['folder'] = Folder::where('parent_id', 0)->count();
            $this->data['subFolder'] = Folder::where('parent_id', '!=', 0)->count();
            return response()->json([
                'status' => true,
                'message' => 'Successfully',
                'data' => $this->data
            ], 201);
        } catch (\Throwable $err) {
            return response()->json([
                'status' => false,
                'message' => 'Data empty',
                'errors' => $err->getMessage()
            ], 422);
        }
    }
}
