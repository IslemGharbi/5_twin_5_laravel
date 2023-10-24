<?php

namespace App\Http\Controllers;
use App\Models\Thumbnail;
use App\Models\Gig;
use Cloudinary;
use Cloudinary\Uploader;

use Illuminate\Http\Request;


class ThumbnailController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id)
    {
        $gig = Gig::find($id);
        return view('thumbnail.create',compact('gig'));

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $gigId = $request->input('gig_id');
        $image = $request->file('image');
    
        // Check if a file was uploaded
        if ($image) {
            // Validate that the uploaded file is an image
            if ($image->isValid() && strpos($image->getMimeType(), 'image') !== false) {
                // Upload the image to Cloudinary
                $uploadedImage = cloudinary()->upload($image->getRealPath())->getSecurePath();
    
                // Save the Cloudinary URL to your database
                $thumbnail = new Thumbnail();
                $thumbnail->gig_id = $gigId;
                $thumbnail->url = $uploadedImage;
                $thumbnail->save();
    
                return redirect()->route('thumbnail.create', ['id' => $request->gig_id]);
            }
        }
    
        // Handle the case where no valid image was uploaded
        return back()->with('error', 'Please upload a valid image.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
