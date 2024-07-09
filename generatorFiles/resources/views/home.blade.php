@include('partials.header')
<div class = 'bodybox'>
    <h1>QR Codes</h1>

    <p class ='text-center'>
        Generate and manage your QR codes
    </p>
    <form class = 'text-center' action="{{route('index')}}" method='GET'>
        <button type="submit" class="btn btn-primary btn-lg">Generator</button>
    </form>
    <form class = 'text-center' action="{{route('menu')}}" method='GET'>
        <button type="submit" class="btn btn-primary btn-lg">Menu</button>
    </form>
</div>
