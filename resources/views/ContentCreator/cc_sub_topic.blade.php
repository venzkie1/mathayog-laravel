<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>BACKEND | Sub Topic</title>
</head>
<body>
    This is the sub-topic <br><br><br>

    <form action="">
        <h3>SUB TOPIC</h3>
        <div>
            <label for="level">Please Select Topic</label><br>
            <select id="dropdown" name="options">
                <option value="option1" selected>Topic</option>
                <option value="option2">Option 1</option>
                <option value="option3">Option 2</option>
            </select>
        </div><br><br>
        <div>
            <label for="">Sub Topic Title</label><br>
            <input type="text" placeholder="Input Level"><br><br>
        </div><br><br>
        <div>
            <label for="">Course Skill & Course Title</label><br><br>
            <button type="button" class="add_skill_title_btn">Add Course Skill Field</button><br><br>
            <div id="show_item">
                <input type="text" name="course_skill[]" placeholder="Input Course Skill">
                <input type="text" name="course_title[]" placeholder="Input Course Title">
                <br><br>
            </div>
        </div><br><br>
        <div>
            <button type="submit" name="subTopicSubmitBtn">
                Submit
            </button>
        </div>
    </form>
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
    <script>
        $(document).ready(function() {
            $(".add_skill_title_btn").click(function(e) {
                e.preventDefault();
                $("#show_item").prepend(`
                    <div>
                        <input type="text" name="course_skill[]" placeholder="Input Course Skill">
                        <input type="text" name="course_title[]" placeholder="Input Course Title">
                        <button type="button" class="remove_course_skill">Remove</button>
                        <br><br>
                    </div>
                `);
            });   
            $(document).on('click', '.remove_course_skill', function(e) {
                e.preventDefault();
                let row_item = $(this).parent();
                $(row_item).remove();
            });
        });
    </script>
</body>
</html>