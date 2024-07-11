@include('partials.header')
<div>
    <h1>Created QR Codes</h1>
    <table class='table'>
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
                        <td class="text-center py-1">
                            <button class ="btn btn-primary">Download</button>
                        </td>
                    </form>
                    <form action="{{route('index',$row->id,$row->title)}}" method="GET">
                        <td class="text-center">
                            <button class ="btn btn-primary">Edit</button>
                        </td>
                    </form>
                    <form action="{{route('delete',$row->id)}}" method="POST">
                        @csrf
                        <td class="text-center">
                            <button class ="btn btn-danger">Delete Playlist</button>
                        </td>
                    </form>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
