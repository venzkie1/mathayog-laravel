<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\SkillsMapData;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use App\Mail\ScheduleMail;

class CurriculumLeadController extends Controller
{
    //
    public function CurriculumLeadDashboard()
    {
        return view('CurriculumLead.cl_dashboard');
    }

    public function SkillsMapNotification()
    {
        $id = Auth::user()->id;
        $usermsg = SkillsMapData::where('curriculumLead_id', $id)->get();
        return view('CurriculumLead.cl_skills_notification', compact('usermsg'));
    }

    public function SkillsMapConfirm($id)
    {
        $skills = SkillsMapData::findOrFail($id);
        return view('CurriculumLead.cl_skillConfirm', compact('skills'));
    }

    public function SkillsMapUpdate(Request $request)
    {
        $skillsMap_id = $request->id;

        SkillsMapData::findOrFail($skillsMap_id)->update([
            'status1' => '1'
        ]);


        //Email Config
        $sendmail = SkillsMapData::findorFail($skillsMap_id);
        $data = [
            'contentCreator_id' => $sendmail->contentCreator_id,
            'sub_topic' => $sendmail->sub_topic,
            'skills' => $sendmail->skills,
            'code' => $sendmail->code,
            'topic' => $sendmail->topic,
            'course_name' => $sendmail->course_name,
            'pisa_framework' => $sendmail->pisa_framework,
            'created_at' => $sendmail->created_at,
        ];
        Mail::to($request->email)->send(new ScheduleMail($data));




        $notification = array(
            'message' => 'You have confirmed the Skills Map Request successfully!',
            'alert-type' => 'success'
        );
        return redirect()->route('curriculum_lead.skills.map.notification')->with($notification);
    }
}
