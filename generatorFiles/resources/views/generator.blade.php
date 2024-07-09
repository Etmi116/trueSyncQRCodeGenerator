@include('partials.header')
<body>
    <h1>QR Code Generator</h1>
    <div class ="container mt-5">
        <form action="{{ route('generate') }}" method="POST">
        @csrf
                <div class="form-group">
                    <label for="title">QR Code Title</label>
                    <input type="text" class="form-control" id="title" name="title" required>
                </div>
                <div class="form-group">
                    <label for="url">QR Code URL</label>
                    <input type="url" class="form-control" id="url" name="url" required>
                </div>
                <button type="submit" class="btn btn-primary">Generate</button>
        </form>
    </div>

    
</body>