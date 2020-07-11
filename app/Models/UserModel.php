<?php namespace App\Models;
use CodeIgniter\Model;
use App\Models\UserModel;

class UserModel extends Model
{
    protected $table      = 'admin';

    public function getUser($id=false)
    {
        if($id === false)
        {
            return $this->findAll();

        }
        return $this->getWhere(['id'=>$id]);
    }
    
    public function saveUser($data)
    {
        $query = $this->db->table($this->table)->insert($data);
        return $query;
    }

    public function updateUser($data, $id)
    {
        $query = $this->db->table($this->table)->update($data, array('id'=>$id));
        return $query;
    }

    public function deleteUser($id)
    {
        $query = $this->db->table($this->table)->delete(array('id'=>$id));
        return $query;
    }
}
