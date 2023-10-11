<?php

namespace App\Http\Controllers;

use App\Models\User;
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

    public function CCQuestion()
    {
        $curriculumLead_id = User::where('role', 'curriculum_lead')
            ->where('username', 'Curriculum Lead 1')
            ->value('id');
        $admin_id = User::where('role', 'admin')
            ->where('username', 'Admin 1')
            ->value('id');
        return view('ContentCreator.cc_question', [
            'curriculumLead_id' => $curriculumLead_id,
            'admin_id' => $admin_id
        ]);
    }

    public function CCLogin()
    {
        return view('ContentCreator.cc_login');
    }

    public function storeSkillsData(Request $request)
    {
        $clid = $request->curriculumLead_id;
        $aid = $request->admin_id;


        if (Auth::check()) {
            SkillsMapData::insert([
                'contentCreator_id' => Auth::user()->id,
                'curriculumLead_id' => $clid,
                'admin_id' => $aid,
                'code' => $request->code,
                'topic' => $request->topic,
                'sub_topic' => $request->sub_topic,
                'course_name' => $request->course_name,
                'skills' => $request->skills,
                'pisa_framework' => $request->pisa_framework,
                'created_at' => Carbon::now()
            ]);
            $notification = array(
                'message' => 'Send Request Successfully',
                'alert-type' => 'success'
            );
            return redirect()->back()->with($notification);
        } else {
            $notification = array(
                'message' => 'Please login your account first',
                'alert-type' => 'error'
            );
            return redirect()->back()->with($notification);
        }
    }
}
