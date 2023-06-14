<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends CI_Controller {

	public function index()
	{
        $this->form_validation->set_rules('username', 'Username', 'trim|required');
        $this->form_validation->set_rules('password', 'Password', 'trim|required');
        
        if ($this->form_validation->run() ==false) {
            $data['tittle'] = "Login";
            $this->load->view('templates/header',$data);
            $this->load->view('login');
            $this->load->view('templates/footer');
        }else {
            $this->login();
        }
	}

    private function login(){
        $username = $this->input->post('username');
        $password = $this->input->post('password');

        $user = $this->db->get_where('tbadmin', ['username' => $username])->row_array();
        if ($user) {
            if (password_verify($password,$user['password'])) {
                $data = [
                    'username' => $user['username']
                ];
                $this->session->set_userdata($data);
                redirect('pendaftaran');
            }else{
                $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Password salah!</div>');
                redirect('auth');
            }
        }else{
            $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Username salah!</div>');
            redirect('auth');
        }
    }
    public function logout(){
        $this->session->unset_userdata('username');
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Berhasil Logout</div>');
        redirect('auth');
    }
    public function block(){
        $data['tittle'] = "Error";
        $this->load->view('templates/header',$data);
            $this->load->view('block');
            $this->load->view('templates/footer');
    }

    public function reg0101(){
        $this->form_validation->set_rules('username', 'Username', 'trim|required|is_unique[tbadmin.username]',[
            'is_unique'=>'Username sudah terdaftar',
            'required'=>'Username harus di isi'
        ]);
        $this->form_validation->set_rules('password', 'Password', 'trim|required|matches[password2]', [
            'required'=>'Password harus di isi',
            'matches'=>'Password tidak sama dengan Confirm Password'
        ]);
        $this->form_validation->set_rules('password2', 'Password', 'trim|required|matches[password]', [
            'required'=>'Password harus di isi',
            'matches'=>'Confirm password tidak sama dengan Password'
        ]);
        // $this->form_validation->set_rules('password2', 'Password', 'trim|required');
        // $this->form_validation->set_rules('password2', 'Password', 'trim|required|min_lenght[4]|matches[password]', [
        //     'min_lenght'=>'Password harus lebih dari 4 karakter',
        //     'matches'=>'Password tidak sama'
        // ]);
        
        if ($this->form_validation->run() ==false) {
            $data['tittle'] = "Register Admin";
            $this->load->view('templates/header',$data);
            $this->load->view('reg/add_admin');
            $this->load->view('templates/footer');
        }else {
            $this->reg();
        }
    }
    private function reg(){
        $username = $this->input->post('username');
        $password = $this->input->post('password');
        $user = $this->db->get_where('tbadmin', ['username' => $username])->row_array();
        if ($user) {
            
            $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Username sudah ada!</div>');
            redirect('auth/reg0101');
        }else{
            $data = array(
                'username' => $this->input->post('username'),
                'password' => password_hash($this->input->post('password'),PASSWORD_DEFAULT)
                );
            $this->db->insert('tbadmin', $data);
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Berhasil register! Silahkan login.</div>');
            redirect ('auth');
        }
        
    }
}
