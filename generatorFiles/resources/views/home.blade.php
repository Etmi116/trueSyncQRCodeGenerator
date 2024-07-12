<!DOCTYPE html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- stylesheet -->
    <link rel="stylesheet" href="/css/app.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">

    <title>QR Code Manager</title>
</head>


<body>
    <div class ="options-block">
        <div class ="options_left_panel">
            <img src="/images/bearchillin.JPG">
        </div>
        <div class = 'options_right_panel'>
            <div class ="options_inner_content">
                <h1 class ="title_text">QR Codes</h1>

                <p class ='lead'>
                    Generate and manage your QR codes
                </p>
                <div class="options_inner_content">
                    <form action="{{route('index')}}" method='GET'>
                        <button type="submit" class="home_button">Generator</button>
                    </form>
                    <form action="{{route('menu')}}" method='GET'>
                        <button type="submit" class="home_button">Menu</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    
</body>