<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Check_session extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->library('session');
        $this->load->helper('url');
    }

    public function start_session()
    {
        $_POST = json_decode(file_get_contents('php://input'), true);
        $data = array(
            'id' => $_POST['id'],
            'token' => $_POST['token'],
            'zoneid' => $_POST['zoneid'],
            'roleid' => $_POST['roleid'],
            'logged_in' => true,
            'name'=> $_POST['name']

        );

        $this->session->set_userdata($data);

        header('Content-Type: application/json');
        echo json_encode($data);
    }

    public function end_session()
    {
        $query = $this->session->sess_destroy();
        $data = array(
            'status' => true,
            'message' => 'all session destroyed',
            'query' => $query,
        );
        header('Content-Type: application/json');
        echo json_encode($data);
    }
}
