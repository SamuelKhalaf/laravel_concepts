<?php

namespace App\Http\Controllers;

use App\Events\VideoViewer;
use App\Models\Video;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;

class YoutubeController extends Controller
{
    public function index(): View
    {
        $video = Video::first();
        event(new VideoViewer($video));
        return view('youtube',compact('video'));
    }
}
