<?php namespace App\Controllers;

use CodeIgniter\Controller;
use App\Models\UserModel;


class User extends Controller
{
	public function index()
	{
                $mhs = new UserModel();
                $data['user'] = $mhs->getUser();
                return view('user_view', $data);
        }
        public function add_new()
        {
                echo view('add_user_view');
        }
        public function save()
        {
                $mhs = new UserModel();
                $data = array(
                        'id' => $this->request->getPost('id'),
                        'user_nama' => $this->request->getPost('user_nama'),
                        'user_email' => $this->request->getPost('user_email')
                );
                        
                $mhs->saveUser($data);
                return redirect()->to('/user');
        }
        public function edit($id)
        {
                $mhs = new UserModel();
                $data['user'] = $mhs->getUser($id)->getRow();
                return view('edit_user_view', $data);
        }
        public function update()
        {
                $mhs = new UserModel();
                $id = $this->request->getPost('id');
                $data = array(
                        'user_nama' => $this->request->getPost('user_nama'),
                        'user_email' => $this->request->getPost('user_email'),
                );
                $mhs->updateUser($data, $id);
                return redirect()->to('/user');
        }
        public function delete($id)
        {    
                $mhs = new UserModel();
                $mhs->deleteUser($id);
                return redirect()->to('/user');
                    
        }


}
