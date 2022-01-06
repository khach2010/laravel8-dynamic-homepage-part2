<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\PorfolioCard;
use App\Models\PorfolioWeb;
use Auth;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;
use Image;

class PorfolioController extends Controller
{
    // // All methods for multipic here
    public function PorfolioCard() {
        $images = PorfolioCard::all();
        return view('admin.porfolio-card.index', compact('images'));
    }
    public function PorfolioCardAdd(Request $request) {
        $image =  $request->file('image');

        foreach($image as $multi_img) {
            $name_gen = hexdec(uniqid()).'.'.$multi_img->getClientOriginalExtension();
            Image::make($multi_img)->resize(300,200)->save('image/portfolio/card/'.$name_gen);
            $last_img = 'image/portfolio/card/'.$name_gen;

            PorfolioCard::insert([
                'image' => $last_img,
                'created_at' => Carbon::now()
            ]);
        }

        return Redirect()->back()->with('success', 'Brand Inserted Successfully');
    }

    public function PorfolioCardDelete($id) {
        $image =  PorfolioCard::find($id);
        $old_image = $image->image;
        unlink($old_image);

        PorfolioCard::find($id)->delete();
       return Redirect()->back()->with('success', 'Image Deleted Successfully');
    }


    // WEB
    public function PorfolioWeb() {
        $images = PorfolioWeb::all();
        return view('admin.porfolio-web.index', compact('images'));
    }
    public function PorfolioWebAdd(Request $request) {
        $image =  $request->file('image');

        foreach($image as $multi_img) {
            $name_gen = hexdec(uniqid()).'.'.$multi_img->getClientOriginalExtension();
            Image::make($multi_img)->resize(300,200)->save('image/portfolio/web/'.$name_gen);
            $last_img = 'image/portfolio/web/'.$name_gen;

            PorfolioWeb::insert([
                'image' => $last_img,
                'created_at' => Carbon::now()
            ]);
        }

        return Redirect()->back()->with('success', 'Brand Inserted Successfully');
    }
    public function PorfoliowebDelete($id) {
        $image =  PorfolioWeb::find($id);
        $old_image = $image->image;
        unlink($old_image);

        PorfolioWeb::find($id)->delete();
       return Redirect()->back()->with('success', 'Image Deleted Successfully');
    }

}
