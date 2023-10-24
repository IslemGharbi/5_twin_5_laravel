<?php

namespace App\Http\Controllers;
use App\Models\Gig;
use App\Models\Category;
use App\Models\SubCategory;
use App\Models\Thumbnail;


use Illuminate\Http\Request;

class GigController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $gig = Gig::all();
        $category = Category::all();
        $sub_category = SubCategory::all();
        return view('gig.index', compact('gig','category','sub_category'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $category = Category::all();
        $sub_category = SubCategory::all();
        return view('gig.create',compact('category','sub_category'));
    }


    public function search(Request $request)
    {
        $searchValue= $request->data;
        $result = Gig::where('title', 'LIKE', '%'.$searchValue.'%')->get();
        return view('gig.search',compact('result','searchValue'));
    }

    public function categorySearch(Request $request)
    {
        $searchValue= $request->data;
        $sub_category = SubCategory::all();
        $result = Gig::where('sub_category_id',$searchValue)->get();
        return view('gig.browse',compact('result','searchValue','sub_category'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
          // Define validation rules
    $rules = [
        'title' => 'required', // Add validation rule for the 'title' field
        'description' => 'required',
        'freelancer_id' => 'required',
        'category_id' => 'required',
        'sub_category_id' => 'required',
    ];

    // Create a validator with the rules
    $validator = Validator::make($request->all(), $rules);

    // Check if validation fails
    if ($validator->fails()) {
        return redirect()->back()->withErrors($validator)->withInput();
    }
        $gig = new Gig();
        $gig->title = $request->title;
        $gig->description = $request->description;
        $gig->freelancer_id = $request->freelancer_id;
        $gig->category_id = $request->category_id;
        $gig->sub_category_id = $request->sub_category_id;
        $gig->save();
        echo 'hello';
        return redirect()->route('option.create',['id'=>$gig->id]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $gig = Gig::find($id);
        if($gig){
            return view('gig.show',compact('gig'));
         }else{
            return redirect()->route('gig.list');
        }
    }

    /**
 * Show the form for editing the specified resource.
 *
 * @param  int  $id
 * @return \Illuminate\Http\Response
 */
    public function edit($id)
    {
        $gig = Gig::find($id);
        $category = Category::all();
        $sub_category = SubCategory::all();
        
        if ($gig) {
            return view('gig.edit', compact('gig', 'category', 'sub_category'));
        } else {
            return redirect()->route('gig.list');
        }
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
        $gig = Gig::find($id);
    
        if (!$gig) {
            return redirect()->route('gig.list')->with('error', 'Gig not found.');
        }
    
        // Update other fields
        $gig->title = $request->title;
        $gig->description = $request->description;
        $gig->freelancer_id = $request->freelancer_id;
        $gig->category_id = $request->category_id;
        $gig->sub_category_id = $request->sub_category_id;
    
        // Check if a new image file was provided
        if ($request->hasFile('thumbnail')) {
            // Handle the image upload using Cloudinary
            $image = $request->file('thumbnail');
            $uploadedImage = cloudinary()->upload($image->getRealPath())->getSecurePath();
            $thumbnail = Thumbnail::where('gig_id', $id)->first();
            if ($thumbnail) {
                $thumbnail->url = $uploadedImage;
                $thumbnail->save();
            } else {
                $newThumbnail = new Thumbnail();
                $newThumbnail->gig_id = $id; // Set the gig ID
                $newThumbnail->url = $uploadedImage; // Set the URL for the new thumbnail
                $newThumbnail->save();
            }
        }
    
        $gig->save();
    
        return redirect()->route('gig.show', ['id' => $id])->with('success', 'Gig updated successfully.');
    }
    
    
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $gig = Gig::find($id);
    
        if (!$gig) {
            return redirect()->route('gig.list')->with('error', 'Gig not found.');
        }
    
        $gig->delete();
    
        return redirect()->route('gig.list')->with('success', 'Gig deleted successfully.');
    }
}
