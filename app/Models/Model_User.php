<?php namespace App\Models;
use CodeIgniter\Model;

class Model_User extends Model
{
	public function get_data($email, $password)
	{
        return $this->db->table('admin')
        ->where(array('user_email' => $email, 'user_password' => $password))
        ->get()->getRowArray();
	}

	//--------------------------------------------------------------------

}
