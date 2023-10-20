<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Level;
use App\Models\CourseSkillTitle;

class DataByLevelController extends Controller
{

    // public function displayDataByLevel(Request $request)
    // {
    //     $selectedLevel = $request->input('level');
    //     // dd($selectedLevel);
    //     // var_dump($selectedLevel);
    //     $data = DB::table('levels')
    //         ->select('levels.*', 'topics.topic_title', 'sub_topics.sub_topic_title', 'skill_name')
            
    //         ->join('topics', 'levels.id', '=', 'topics.level_id')
    //         ->join('sub_topics', 'topics.id', '=', 'sub_topics.topic_id')
    //         ->join('course_skill_titles', 'sub_topics.id', '=', 'course_skill_titles.sub_topic_id')
    //         ->where('topics.level_id', $selectedLevel)
    //         ->get();
    //     return view('dashboard', ['data' => $data]);

    //     // $data = DB::table('levels')->get();
    //     // dd($data);
    //     // return view('dashboard', ['data' => $data]);
    // }

//     public function displayDataByLevel(Request $request)
// {
//     $search = $request->input('search');

//     // $data = DB::table('levels')
//         // ->select('levels.level', 'topics.topic_title', 'sub_topics.sub_topic_title', 'course_skill_titles.skill_name')
//         // ->join('topics', 'levels.id', '=', 'topics.level_id')
//         // ->join('sub_topics', 'topics.id', '=', 'sub_topics.topic_id')
//         // ->join('course_skill_titles', 'sub_topics.id', '=', 'course_skill_titles.sub_topic_id')
//         // ->where(function ($query) use ($search) {
//         //     $query->where('topics.topic_title', 'LIKE', '%' . $search . '%')
//         //         ->orWhere('sub_topics.sub_topic_title', 'LIKE', '%' . $search . '%')
//         //         ->orWhere('course_skill_titles.skill_name', 'LIKE', '%' . $search . '%');
//         // })
//         $data = Level::with(['topics', 'topics.subTopics.courseSkillTitles'])
//         ->where('level', '=', $search)
//         ->get();

//     // dd($data);

//     return view('dashboard', ['data' => $data]);
// }

// public function displayDataByLevel(Request $request)
// {
//     $search = $request->input('search');

//     // if (is_numeric($search)) {
//     //     // If the search term is numeric, consider it as a level search
//     //     $query = Level::with(['topics.subTopics.courseSkillTitles'])->where('level', $search)->get();
//     // } else {
//     //     // If the search term is not numeric, consider it as a topic title search
//     //     $query = Level::with(['topics' => function ($topicQuery) use ($search) {
//     //         // Filter topics based on the search
//     //         $topicQuery->where('topic_title', $search);
//     //     }, 'topics.subTopics.courseSkillTitles'])->get();
//     // }

//     // return view('dashboard', ['data' => $query, 'search' => $search]);

//     $query = Level::with(['topics' => function ($topicQuery) use ($search) {
//         $topicQuery->where('topic_title', 'LIKE', '%' . $search . '%')
//             ->orWhereHas('subTopics.courseSkillTitles', function ($subTopicQuery) use ($search) {
//                 $subTopicQuery->where('sub_topic_title', 'LIKE', '%' . $search . '%')
//                     ->orWhere('skill_name', 'LIKE', '%' . $search . '%');
//             });
//     }]);

//     if (is_numeric($search)) {
//         // If the search term is numeric, consider it as a level search
//         $query = Level::with(['topics.subTopics.courseSkillTitles'])->where('level', $search)->get();
//     } else {
//         // If the search term is not numeric, consider it as a topic_title, sub_topic_title, or skill_name search
//         $query = Level::with(['topics' => function ($topicQuery) use ($search) {
//             $topicQuery->where('topic_title', 'LIKE', '%' . $search . '%')
//                 ->orWhereHas('subTopics.courseSkillTitles', function ($subTopicQuery) use ($search) {
//                     $subTopicQuery->where('sub_topic_title', 'LIKE', '%' . $search . '%')
//                         ->orWhere('skill_name', 'LIKE', '%' . $search . '%');
//                 });
//         }])->get();
//     }


//     // dd($query);  
//     return view('dashboard', ['data' => $query, 'search' => $search]);
// }


// Main code
// public function displayDataByLevel(Request $request)
// {
//     $search = $request->input('search');

//     $query = Level::with(['topics.subTopics.courseSkillTitles']);

//     if (is_numeric($search)) {
//         // If the search term is numeric, consider it as a level search
//         $query->where('level', $search);
//     } else {
//         // If the search term is not numeric, consider it as a search for sub-topic or skill
//         $query->whereHas('topics.subTopics.courseSkillTitles', function ($query) use ($search) {
//             $query->where('sub_topic_title', 'LIKE', '%' . $search . '%')
//                 ->orWhere('skill_name', 'LIKE', '%' . $search . '%');
//         });
//     }

//     $data = $query->get();

//     return view('dashboard', ['data' => $data, 'search' => $search]);
// }


// public function displayAllData()
// {
//     $data = Level::with(['topics.subTopics.courseSkillTitles'])->get();
//     return view('dashboard', ['data' => $data]);
// }

// public function displayDataByLevel(Request $request)
// {
//     $search = $request->input('search');

//     $query = Level::with(['topics.subTopics.courseSkillTitles']);

//     if ($search) {
//         if (is_numeric($search)) {
//             $query->where('level', 'LIKE', '%' . $search . '%');
//         } else {
//             $query->whereHas('topics.subTopics.courseSkillTitles', function ($subQuery) use ($search) {
//                 $subQuery->where('sub_topic_title', 'LIKE', '%' . $search . '%')
//                     ->orWhere('skill_name', 'LIKE', '%' . $search . '%');
//             });
//         }
//     }

//     $data = $query->get();

//     return view('dashboard', ['data' => $data, 'search' => $search]);
// }

public function displayAllData()
{
    $data = CourseSkillTitle::with(['subTopic.topic.level'])->paginate(10); // Paginate with 10 items per page
    return view('dashboard', ['data' => $data]);
}

public function searchDataByLevel(Request $request)
{
    $search = $request->input('search');

    $query = CourseSkillTitle::with(['subTopic.topic.level']);

    if ($search) {
        $query->where(function($query) use ($search) {
            $query->orWhereHas('subTopic', function ($subQuery) use ($search) {
                $subQuery->where('sub_topic_title', 'LIKE', '%' . $search . '%');
                $subQuery->orWhereHas('topic', function ($topicQuery) use ($search) {
                    $topicQuery->where('topic_title', 'LIKE', '%' . $search . '%');
                    $topicQuery->orWhereHas('level', function ($levelQuery) use ($search) {
                        $levelQuery->where('level', 'LIKE', '%' . $search . '%');
                    });
                });
            });
            $query->orWhere('skill_name', 'LIKE', '%' . $search . '%');
        });
    }

    $data = $query->paginate(10); // Adjust '10' for your desired results per page

    return view('dashboard', ['data' => $data, 'search' => $search]);
}


}
