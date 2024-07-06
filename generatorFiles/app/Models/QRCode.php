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
    
    protected $path = '';//property that shall contain the path so that it can be pulled from DB as a request instead of directly linked. 

    protected $table = 'qr_codes'; // Explicitly specify the table name

    protected $fillable = [
        'title',
        'url',
        'scan_count',
    ];

    public function storePath($filepath){
        $this->path = $filepath;

    }
}
