<?php

namespace App\Models\Alumno;

use Illuminate\Database\Eloquent\Model;

class AlumnoModel extends Model
{
    //
    protected $table = 'Alumno';

    protected $primarykey = 'id';

    public $timestamps = false;

    protected $fillable = [
        'id','nombres','apellidos','username','password','idvaucher','imgvaucher'
    ];

}
