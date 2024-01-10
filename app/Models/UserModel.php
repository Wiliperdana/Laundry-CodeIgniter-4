<?php

namespace App\Models;

use CodeIgniter\Model;

class UserModel extends Model
{
    protected $table            = 'tb_user';
    protected $primaryKey       = 'id';
    protected $protectFields    = true;
    protected $allowedFields    = ['nama','username','password','id_outlet','role'];
}
