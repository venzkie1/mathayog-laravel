<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <title>Document</title>
</head>
<body>
    Request Details <br><br>

    <form action="{{route('update.skills_map')}}" method="POST">
        @csrf
        <input type="hidden" name="id" value="{{$skills->id}}">
        <input type="hidden" name="email" value="{{$skills->user->email}}">
        <table class="table">
            <tbody>
                    <tr>
                        <td>No.</td>
                        <th scope="row">{{$skills->id}}</th>
                    </tr>

                    <tr>
                        <td>Name</td>
                        <td>{{$skills->user->firstname}} {{$skills->user->lastname}}</td>
                    </tr>    

                    <tr>
                        <td>Code</td>
                        <td>{{$skills->code}}</td>
                    </tr>    

                    <tr>
                        <td>Topic</td>
                        <td>{{$skills->topic}}</td>
                    </tr>

                    <tr>
                        <td>Sub-Topic</td>
                        <td>{{$skills->sub_topic}}</td>
                    </tr>

                    <tr>
                        <td>Course Name</td>
                        <td>{{$skills->course_name}}</td>
                    </tr>

                    <tr>
                        <td>Skills</td>
                        <td>{{$skills->skills}}</td>
                    </tr>

                    <tr>
                        <td>PISA FRAMEWORK</td>
                        <td>{{$skills->pisa_framework}}</td>
                    </tr>

                    <tr>
                        <td>Date</td>
                        <td>{{$skills->created_at}}</td>
                    </tr>
            </tbody>
        </table><br>
        <button type="submit">CONFIRM SKILLS REQUEST</button>
    </form>



    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>
</html>