<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class WebController extends Controller
{
    //
    public function homePage(){
        return view('web.home');
    }
    
    public function uploadImage(Request $request)
    {
        // Validate the uploaded file
        $validator = Validator::make($request->all(), [
            'image' => 'required|image|mimes:jpeg,jpg,png|max:10240', // 10MB max
        ]);
        
        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'message' => $validator->errors()->first('image')
            ], 422);
        }
        
        try {
            // Get the uploaded file
            $file = $request->file('image');
            
            // Generate a unique filename
            $filename = time() . '_' . uniqid() . '.' . $file->getClientOriginalExtension();
            
            // Store the file in the public storage
            $path = $file->storeAs('images', $filename, 'public');
            
            // Get the full URL to the stored file
            $url = Storage::url($path);
            
            return response()->json([
                'success' => true,
                'message' => 'Image uploaded successfully!',
                'path' => $path,
                'url' => $url,
                'filename' => $filename
            ]);
            
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Failed to upload image: ' . $e->getMessage()
            ], 500);
        }
    }
}
