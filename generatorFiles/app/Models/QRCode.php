<?php
/*
*
* Trevor's Model
*
*/
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class QRCode extends Model
{
    use HasFactory;
    

    protected $table = 'qr_codes'; // Explicitly specify the table name

    protected $fillable = [
        'title',
        'url',
        'scan_count',
    ];
}
