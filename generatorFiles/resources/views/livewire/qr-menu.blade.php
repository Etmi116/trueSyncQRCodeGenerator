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