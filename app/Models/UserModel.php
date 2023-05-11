<?php 
namespace App\Models;
use CodeIgniter\Model;

class UserModel extends Model
{
    protected $DBGroup = 'default';
    protected $table = 'user';

    protected $primaryKey = 'id';

    protected $useAutoIncrement = TRUE;
    protected $returnType     = 'array';
    protected $useSoftDeletes = FALSE;

    protected $allowedFields = ['name','username','password'];

    protected $useTimestamps = TRUE;
    protected $dateFormat = 'datetime';
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
    // protected $deletedField  = 'deleted_at';

    protected $validationRules    = [/* Validation Rules */];
    protected $validationMessages = [/* Validation Messages */];
    protected $skipValidation     = TRUE;
    
}
?>