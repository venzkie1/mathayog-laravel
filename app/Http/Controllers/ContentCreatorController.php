<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Level;
use App\Models\Topic;
use Illuminate\Http\Request;
use App\Models\SkillsMapData;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;

class ContentCreatorController extends Controller
{
    //
    public function CCDashboard()
    {
        return view('ContentCreator.cc_dashboard');
    }

    public function CCLevel()
    {
        return view('ContentCreator.cc_level');
    }

    public function CCLogin()
    {
        return view('ContentCreator.cc_login');
    }

    public function CCSubTopic()
    {
        return view('ContentCreator.cc_sub_topic');
    }

    public function CCPostLevel(Request $request)
    {
        $validatedData = $request->validate([
            'level' => 'required',
            'content_area' => 'required',
            'pisa_framework' => 'required',
            'topic_title.*' => 'required',
        ]);

        $level = Level::create([
            'level' => $validatedData['level'],
            'content_area' => $validatedData['content_area'],
            'pisa_framework' => $validatedData['pisa_framework'],
        ]);

        $topicTitles = $validatedData['topic_title'];
        foreach ($topicTitles as $title) {
            $topic = new Topic;
            $topic->topic_title = $title;
            $topic->level_id = $level->id;
            $topic->save();
        }


        return redirect()->route('content_creator.level')
            ->with('success', 'Data has been successfully saved.');
    }
}
