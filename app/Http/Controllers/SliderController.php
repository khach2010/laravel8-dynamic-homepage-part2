<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Slider;
use Auth;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;
use Image;

class SliderController extends Controller
{
    public function HomeSlider() {
        $sliders = Slider::latest()->get();
        return view('admin.slider.index', compact('sliders'));
    }
    public function AddSlider() {
        return view('admin.slider.add');
    }
    public function StoreSlider(Request $request) {
        $validatedData = $request->validate([
            'title' => 'required|unique:sliders|min:2',
            'slider_image' => 'required|mimes:jpg,jpeg,png',
        ],
        [
            'title.required' => 'Please add a title here',
            'slider_image.required' => 'Please insert an image before add slider',
        ]
        );
        $slider_image =  $request->file('slider_image');

        $name_gen = hexdec(uniqid()).'.'.$slider_image->getClientOriginalExtension();
        Image::make($slider_image)->resize(1920,1088)->save('image/slider/'.$name_gen);
        $last_img = 'image/slider/'.$name_gen;

        Slider::insert([
            'title' => $request->title,
            'description' => $request->description,
            'image' => $last_img,
            'created_at' => Carbon::now()
        ]);

        return Redirect()->route('home.slider')->with('success', 'Slider Inserted Successfully');
    }

    public function Edit($id) {
        $sliders = Slider::find($id);
        return view('admin.slider.edit', compact('sliders'));
  }


  public function Update(Request $request,$id) {
    $old_image = $request->old_image;
    $description = $request->description;
    $slider_image =  $request->file('slider_image');

    // if statement
    if($slider_image) {
    $name_gen = hexdec(uniqid());
    $img_ext = strtolower($slider_image->getClientOriginalExtension());
    $img_name = $name_gen.'.'.$img_ext;
    $up_location = 'image/slider/';
    $last_img = $up_location.$img_name;
    $slider_image->move($up_location,$img_name);

    unlink($old_image);
    Slider::find($id)->update([
        'title' => $request->title,
        'description' => $request->description,
        'image' => $last_img,
        'created_at' => Carbon::now()
    ]);
    return Redirect()->route('home.slider')->with('success', 'Slider Updated Successfully');
    }

    if($description) {
        Slider::find($id)->update([
            'title' => $request->title,
            'description' => $request->description,
            'created_at' => Carbon::now()
        ]);
        return Redirect()->route('home.slider')->with('success', 'Slider Updated Successfully');
    }

    else {
    Slider::find($id)->update([
        'title' => $request->title,
        'created_at' => Carbon::now()
    ]);
    return Redirect()->route('home.slider')->with('success', 'Slider Updated Successfully');
    }
    //end if
  }

  public function Delete($id){
    $image = Slider::find($id);
    $old_image = $image->image;
    unlink($old_image);

    Slider::find($id)->delete();
    return Redirect()->route('home.slider')->with('success', 'Slider Deleted Successfully');
  }


}
