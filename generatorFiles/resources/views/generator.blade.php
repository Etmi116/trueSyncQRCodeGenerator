<!DOCTYPE html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- stylesheet -->
    <link rel="stylesheet" href="/css/app.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">

    <title>QR Code Generator</title>
</head>

<body>
    <div class="body_box">
        <div class ="container mt-5">
            <h4>Create a custom QR code for your venue</h4>
            <!-- form for the generate qr code function in QRCodeController -->
            <!-- if statement to display either the edit form or generate form -->
            <div class="form_box">
                @if(isset($id))
                    <form action="{{ route('edit',$id) }}" method="POST">
                @else
                    <form action="{{ route('generate') }}" method="POST">
                @endif
                    @csrf
                            <div class="form-group">
                                <label for="title">QR Code Title</label>
                                <input type="text" class="form-control" id="title" name="title" required>
                            </div>
                            <div class="form-group">
                                <label for="url">QR Code URL</label>
                                <input type="url" class="form-control" id="url" name="url" required>
                            </div>
                            @if(isset($id))
                            <button type="submit" class="redButton">Edit</button>
                            @else
                            <button type="submit" class="redButton">Generate</button>
                            @endif
                    </form>
            </div>
        </div>
    </div>  
</body>

</html>