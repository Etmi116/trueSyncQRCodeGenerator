@include('partials.header')
<body>
    <h1>QR Code Generator</h1>
    <img src = '{{$path}}' class ='image-display-center'>
    <livewire:qr-u-r-l-form />
</body>