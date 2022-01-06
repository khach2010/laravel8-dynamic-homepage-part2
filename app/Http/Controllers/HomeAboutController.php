<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\HomeAbout;
use App\Models\Multipic;
use App\Models\PorfolioCard;
use App\Models\PorfolioWeb;
use Auth;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;

class HomeAboutController extends Controller
{

    public function HomeAbout() {
        $homeabout = HomeAbout::latest()->get();
        return view('admin.home.index', compact('homeabout'));
    }
    public function AddAbout() {
        return view('admin.home.add');
    }

    public function StoreAbout(Request $request) {
        HomeAbout::insert([
            'title' => $request->title,
            'short_des' => $request->short_des,
            'long_des' => $request->long_des,
            'created_at' => Carbon::now()
        ]);
        return Redirect()->route('home.about')->with('success', 'HomeAbout Inserted Successfully');
    }

    public function EditAbout($id) {
        $homeabout = HomeAbout::find($id);
        return view('admin.home.edit', compact('homeabout'));
    }

    public function UpdateAbout(Request $request, $id){

        $update = HomeAbout::find($id)->update([
            'title' => $request->title,
            'short_des' => $request->short_des,
            'long_des' => $request->long_des,
        ]);
        return Redirect()->route('home.about')->with('success', 'HomeAbout updated Successfully');
    }

    public function DeleteAbout($id) {
        $delete = HomeAbout::find($id)->delete();
       return Redirect()->route('home.about')->with('success', 'HomeAbout deleted successfully');
    }


    public function Portfolio() {
        $multipic = Multipic::all();
        $cards = PorfolioCard::all();
        $webs = PorfolioWeb::all();
        return view('pages.portfolio', compact('multipic', 'cards', 'webs'));
    }
}
