<?php

namespace App\Models;

use CodeIgniter\Model;

class OutletModel extends Model
{
    protected $table            = 'tb_outlet';
    protected $primaryKey       = 'id';
    protected $protectFields    = true;
    protected $allowedFields    = ['nama','alamat','tlp'];
}