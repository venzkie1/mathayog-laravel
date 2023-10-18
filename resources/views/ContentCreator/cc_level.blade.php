<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <title>Mathayog | Skills Map</title>
</head>
<body>
    This is the form for Inputting Level <br><br><br>

    <form action="{{route('content_creator.post_level')}}" id="post_level_form" method="POST">
        @csrf
        <h3>LEVEL</h3>
        <div>
            <label for="level">Please input Level</label><br>
            <input type="text" name="level" placeholder="Input Level"><br><br>
        </div>
        <div>
            <label for="content_area">Content Area</label><br>
            <input type="text" name="content_area" placeholder="Input Content Area"><br><br>
        </div>
        <div>
            <label for="pisa_framework">Pisa Framework</label><br>
            <input type="text" name="pisa_framework" placeholder="Input Pisa Framework"><br><br>
        </div>
        <div>
            <label for="topic">Topic</label><br>
            <button type="button" class="add_topic_button">Add Topic Field</button><br>
            <div id="show_item">
                <input type="text" name="topic_title[]" placeholder="Input Topic Name">
                <br><br>
            </div>
        </div>
        
        <div>
            <button type="submit" name="levelSubmitBtn" id="levelSubmitBtn">
                Submit
            </button>
        </div>
    </form>

    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
    <script>
        $(document).ready(function() {
            $(".add_topic_button").click(function(e) {
                e.preventDefault();
                $("#show_item").prepend(`
                    <div>
                        <input type="text" name="topic_title[]" placeholder="Input Topic Name">
                        <button type="button" class="remove_topic">Remove</button>
                        <br><br>
                    </div>
                `);
            });
            $(document).on('click', '.remove_topic', function(e) {
                e.preventDefault();
                let row_item = $(this).parent();
                $(row_item).remove();
            });
            $("#post_level_form").submit(function(e) {
                e.preventDefault();
                $('#levelSubmitBtn');
                $.ajax({
                    url: '{{route('content_creator.post_level')}}',
                    method: 'post',
                    data: $(this).serialize(),
                    success: function(response) {
                        console.log(response)
                    }
                })
            });
        });
    </script>
</body>
</html>