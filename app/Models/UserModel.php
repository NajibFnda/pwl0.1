<?php
namespace App\Models;
use CodeIgniter\Model;

class UserModel extends Model
{
    protected $table      = 'users';
    protected $primaryKey = 'id';
    
    // Kolom apa saja yang boleh diubah melalui form CRUD
    protected $allowedFields = ['email', 'password', 'subscription_plan', 'expire_date'];
}