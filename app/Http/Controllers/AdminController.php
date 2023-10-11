<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\SkillsMapData;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    //
    public function AdminDashboard()
    {
        return view('Admin.admin_dashboard');
    }

    public function AdminApprovedSkillsMap()
    {
        $id = Auth::user()->id;
        $usermsg = SkillsMapData::where('admin_id', $id)->get();
        return view('Admin.approvedSkills_map', compact('usermsg'));
    }

    public function AdminPublishSkillsMap($id)
    {
        $skills = SkillsMapData::findOrFail($id);
        return view('Admin.publish_skillsMap', compact('skills'));
    }

    public function AdminSkillsMapUpdate(Request $request)
    {
        $skillsMap_id = $request->id;

        SkillsMapData::findOrFail($skillsMap_id)->update([
            'status2' => '1'
        ]);

        $notification = array(
            'message' => 'You have published the Skills Map Request successfully!',
            'alert-type' => 'success'
        );
        return redirect()->route('admin.approved.skills_map')->with($notification);
    }
}
