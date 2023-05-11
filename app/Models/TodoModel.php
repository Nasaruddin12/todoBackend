<?php 
namespace App\Models;
use CodeIgniter\Model;

class TodoModel extends Model
{
    protected $DBGroup = 'default';
    protected $table = 'todo';

    protected $primaryKey = 'id';

    protected $useAutoIncrement = TRUE;
    protected $returnType     = 'array';
    protected $useSoftDeletes = FALSE;

    protected $allowedFields = ['todo_name','status'];

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