<?php

namespace App\Models;

use CodeIgniter\Model;

class MemberModel extends Model
{
    protected $table            = 'tb_member';
    protected $primaryKey       = 'id';
    protected $protectFields    = true;
    protected $allowedFields    = ['nama','alamat','jenis_kelamin','tlp'];
}