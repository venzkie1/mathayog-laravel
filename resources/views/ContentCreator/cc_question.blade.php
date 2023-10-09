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
    <form action="#" method="POST" style="text-align: center">
        @csrf
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
            <input type="text" name="subtopic" id="subtopic">
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