<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Mathayog | Question</title>
</head>
<body>
    This is the Content Creator Question Creation<br><br>
    <p>Curriculum Lead ID: {{ $curriculumLead_id }}</p>
    <p>Admin ID: {{ $admin_id }}</p>
    <form action="{{route('content_creator.store.skills_data')}}" method="POST" style="text-align: center">
        @csrf
        <input type="hidden" name="curriculumLead_id" value="{{ $curriculumLead_id }}">
        <input type="hidden" name="admin_id" value="{{ $admin_id }}">
        <input type="hidden" name="contentCreator_id" value="{{ $admin_id }}">
        <div>
            <label for="code">Code</label><br>
            <input type="text" name="code" id="code">
        </div><br>

        <div>
            <label for="topic">Topic</label><br>
            <input type="text" name="topic" id="topic">
        </div><br>

        <div>
            <label for="subtopic">Sub-topic</label><br>
            <input type="text" name="sub_topic" id="subtopic">
        </div><br>

        <div>
            <label for="course_name">Course Name</label><br>
            <input type="text" name="course_name" id="course_name">
        </div><br>

        <div>
            <label for="skills">Skills</label><br>
            <textarea name="skills" id="skills" cols="30" rows="10" placeholder="Input the skills in here"></textarea>
        </div><br>

        <div>
            <label for="pisa_framework">PISA Framework</label><br>
            <input type="text" name="pisa_framework" id="pisa_framework">
        </div><br><br>

        <div>
            <button type="submit" name="submitBtn" id="submitBtn">Submit</button>
        </div>
    </form>
</body>
</html>