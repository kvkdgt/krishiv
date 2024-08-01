<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Portfolio;
use Illuminate\Support\Facades\Storage;

class PortfolioController extends Controller
{
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'category_id' => 'required|exists:categories,id',
            'status' => 'required|in:Active,Inactive',
            'thumbnail' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'images' => 'nullable',
            'description' => 'required|string',
            'technologies_used'=>'nullable'
        ]);

        if ($request->hasFile('thumbnail')) {

            $imageName = time() . '.' . $request->thumbnail->extension();
            $request->thumbnail->move(public_path('thumbnails'), $imageName);
            $validatedData['thumbnail'] = $imageName;
        }

        // Handle multiple images upload
        $imagePaths = [];
        if ($request->hasFile('images')) {
            foreach ($request->file('images') as $image) {
                // Generate a unique name for the image
                $imageName = time() . '_' . $image->getClientOriginalName();

                // Move the image to the 'images' directory
                $image->move(public_path('images'), $imageName);

                // Store the image path in the array
                $imagePaths[] = $imageName;
            }
        }

        // Encode the image paths as JSON and add to validated data
        $validatedData['images'] = implode(',', $imagePaths);
        Portfolio::create($validatedData);
        return redirect()->route('admin/portfolio')->with('success', 'Portfolio created successfully.');
    }

    public function update(Request $request)
    {
        // Validate the request data
        $request->validate([
            'id' => 'required|exists:portfolios,id',
            'name' => 'required|string|max:255',
            'category_id' => 'required|exists:categories,id',
            'status' => 'required|in:Active,Inactive',
            'description' => 'required|string',
            'thumbnail' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'images.*' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        // Find the portfolio item by ID
        $portfolio = Portfolio::find($request->id);

        // Update portfolio details
        $portfolio->name = $request->name;
        $portfolio->category_id = $request->category_id;
        $portfolio->status = $request->status;
        $portfolio->description = $request->description;
        $portfolio->technologies_used = $request->technologies_used;

        // Handle thumbnail upload
        // Handle thumbnail upload
        if ($request->hasFile('thumbnail')) {
            // Delete old thumbnail if it exists
            if ($portfolio->thumbnail && file_exists(public_path('thumbnails/' . $portfolio->thumbnail))) {
                unlink(public_path('thumbnails/' . $portfolio->thumbnail));
            }

            // Generate a unique name for the new thumbnail
            $imageName = time() . '.' . $request->thumbnail->extension();

            // Move the new thumbnail to the 'thumbnails' directory
            $request->thumbnail->move(public_path('thumbnails'), $imageName);

            // Update the portfolio's thumbnail path
            $portfolio->thumbnail = $imageName;
        }

        // Handle multiple images upload
        if ($request->hasFile('images')) {
            $imagePaths = $portfolio->images ? explode(',', $portfolio->images) : [];

            // Store new images and update paths
            foreach ($request->file('images') as $image) {
                // Generate a unique name for each image
                $imageName = time() . '_' . $image->getClientOriginalName();

                // Move the image to the 'images' directory
                $image->move(public_path('images'), $imageName);

                // Store the image path in the array
                $imagePaths[] = $imageName;
            }
            $portfolio->images = implode(',', $imagePaths);
        }
        // Save the portfolio model
        $portfolio->save();


        // Redirect with success message
        return redirect()->route('admin/portfolio')->with('success', 'Portfolio updated successfully!');
    }

    public function edit($id)
    {
        // Find the portfolio item by ID
        $portfolio = Portfolio::findOrFail($id);
        $imageNames = explode(',', $portfolio->images);
        $imagesWithBaseUrl = array_map(function ($imageName) {
            return asset('images/' . $imageName);
        }, $imageNames);
        // Prepare the data to be sent as JSON
        $data = [
            'id' => $portfolio->id,
            'name' => $portfolio->name,
            'category_id' => $portfolio->category_id,
            'status' => $portfolio->status,
            'description' => $portfolio->description,
            'thumbnail' => $portfolio->thumbnail ? asset('thumbnails/' . $portfolio->thumbnail) : null,
            'images' => $imagesWithBaseUrl,
            'technologies_used'=>$portfolio->technologies_used,
        ];

        // Return the data as JSON
        return response()->json($data);
    }
    public function destroy($id)
    {
        $category = Portfolio::findOrFail($id);
        $category->delete();

        return redirect()->route('admin/portfolio')->with('success', 'Item deleted successfully.');
    }
}
