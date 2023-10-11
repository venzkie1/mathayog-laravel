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
    This is the Skills Map Notification <br><br>
    <table class="table">
        <thead>
          <tr>
            <th scope="col">Name</th>
            <th scope="col">Code</th>
            <th scope="col">Topic</th>
            <th scope="col">PISA Framework</th>
            <th scope="col">Date</th>
            <th scope="col">Status</th>
            <th scope="col">Action</th>
          </tr>
        </thead>
        <tbody>
            @foreach($usermsg as $key => $item)
                <tr>
                    <td>{{$item['user']['firstname']}} {{$item['user']['lastname']}}</td>
                    <td>{{$item->code}}</td>
                    <td>{{$item->topic}}</td>
                    <td>{{$item->pisa_framework}}</td>
                    <td>{{$item->created_at->format('l M d Y')}}</td>
                    <td>
                        @if($item->status1 == 1)
                        <span>CONFIRMED</span>
                        @else
                        <span>PENDING</span>
                        @endif
                    </td>
                    <td>
                        <a href="{{route('confirm.skills_map', $item->id)}}">View</a>
                        <button>DELETE</button>
                    </td>
                </tr>
            @endforeach
        </tbody>
      </table>



    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>
</html>