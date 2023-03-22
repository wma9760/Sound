<?php

namespace App\Http\Controllers;

use App\Models\Audio as ModelsAudio;
use Illuminate\Http\Request;
use App\Models\Audio_ratings,Audio ,User;
use App\Models\Vedio_ratings;
use Illuminate\Support\Facades\Auth;

class RatingsController extends Controller
{
    public function add(Request $req)
    {
        $Rating = new Audio_ratings;
        $Rating->user_id = Auth::id();
        $Rating->track_id = $req->track_id;
        $Rating->stars_rated = $req->stars_rated;
            $track_check=Audio_ratings::select('id')->where('user_id',$Rating->user_id)
            ->where('track_id',$Rating->track_id)->first();
                if($track_check){
                    // dd($track_check->id);
                            $Rating=Audio_ratings::find($track_check->id);
                            $Rating->user_id = Auth::id();
                            // $Rating->track_id = $req->track_id;
                            $Rating->stars_rated = $req->stars_rated;
                            $Rating->save();
                            return  redirect()->back()->with('message', 'Thanks For Rating !');

                        }

        $Rating->save();
      return  redirect()->back()->with('message', 'Thanks For Rating !');

    }
    public function rate(Request $req)
    {
        $Rating = new Vedio_ratings();
        $Rating->user_id = Auth::id();
        $Rating->track_id = $req->track_id;
        $Rating->stars_rated = $req->stars_rated;
            $track_check=Vedio_ratings::select('id')->where('user_id',$Rating->user_id)
            ->where('track_id',$Rating->track_id)->first();
                if($track_check){
                    // dd($track_check->id);
                            $Rating=Vedio_ratings::find($track_check->id);
                            $Rating->user_id = Auth::id();
                            $Rating->track_id = $req->track_id;
                            $Rating->stars_rated = $req->stars_rated;
                            $Rating->save();
                            return  redirect()->back()->with('message', 'Thanks For Rating !');

                        }

        $Rating->save();
      return  redirect()->back()->with('message', 'Thanks For Rating !');

    }
}
