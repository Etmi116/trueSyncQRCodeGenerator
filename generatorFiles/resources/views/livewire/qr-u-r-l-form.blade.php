<div class ="bodybox">
    <img src = {{$imagePath}} class ='image-display-center'>
    <form wire:submit="genCode">
        <input type='text' wire:model ="imageURL" class='wide-text-input' placeholder='Enter a Name'></input>

        <button class='blueButton' type="submit">Generate my QR Code</button>
    </form>
</div>
