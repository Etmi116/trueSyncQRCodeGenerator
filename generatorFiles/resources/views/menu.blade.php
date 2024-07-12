<!DOCTYPE html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- stylesheet -->
    <link rel="stylesheet" href="/css/app.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">

    <title>QR Code Menu</title>
</head>


<body>
    <div class="body_box">
        <div class ="container-xxl">
            <div class ="form_box">
                <h1>Created QR Codes</h1>
                <p class="lead">Search for and manage your created QR codes</p>
                <table class='table table-striped'>
                    <thead>
                        <tr>
                            <th scope='col'>Name</th>
                            <th scope='col'>URL</th>
                            <th scope='col'>Scans</th>
                            <th scope='col'>Date Created</th>
                        </tr>
                    </thead>
                    <tbody>
                        <!-- cycles through the data provided by the controller to display QR codes -->
                        @foreach ($data as $row)
                            <tr>
                                <td>{{$row->title}}</td>
                                <td>{{$row->url}}</td>
                                <td>{{$row->scan_count}}</td>
                                <td>{{$row->created_at}}</td>
                                <form action="{{route('download',$row->id,$row->title)}}" method ="POST">
                                    @csrf
                                    <td class="text-center">
                                        <button class ="greyButton">Download</button>
                                    </td>
                                </form>
                                <form action="{{route('index',$row->id,$row->title)}}" method="GET">
                                    <td class="text-center">
                                        <button class ="greyButton">Edit</button>
                                    </td>
                                </form>
                                <form action="{{route('delete',$row->id)}}" method="POST">
                                    @csrf
                                    <td class="text-center">
                                        <button class ="redButton">Delete Playlist</button>
                                    </td>
                                </form>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</body>

</html>