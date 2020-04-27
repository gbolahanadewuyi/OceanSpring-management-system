<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Transportmanager extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->library('session');
        $this->load->helper('url');

        $this->load->model('MyModel');
        $this->load->model('OrderModel');
    }
    /*
     * Index Page for this controller.
     *
     * Maps to the following URL
     *         http://example.com/index.php/welcome
     *    - or -
     *         http://example.com/index.php/welcome/index
     *    - or -
     * Since this controller is set as the default controller in
     * config/routes.php, it's displayed at http://example.com/
     *
     * So any other public methods not prefixed with an underscore will
     * map to /index.php/welcome/<method_name>
     * @see https://codeigniter.com/user_guide/general/urls.html
     *
     */

    public function dashboard()
    {
        if ($this->session->userdata('logged_in') == true) {
            if ($this->session->userdata('roleid') == 10) {
                $data = array(
                    'id' => $this->session->userdata('id'),
                    'token' => $this->session->userdata('token'),
                    'roleid' => $this->session->userdata('roleid'),
                    'zoneid' => $this->session->userdata('zoneid'),
                    'name' => $this->session->userdata('name'),
                );

                $this->load->view('transport_manager/header', $data);
                $this->load->view('transport_manager/dashboard');
                $this->load->view('transport_manager/footer');
            } else {
                redirect(base_url() . 'admin', 'refresh');

            }

        } else {
            redirect(base_url() . 'admin', 'refresh');
        }

    }

    public function stock()
    {
        if ($this->session->userdata('logged_in') == true) {
            if ($this->session->userdata('roleid') == 10) {
                $data = array(
                    'id' => $this->session->userdata('id'),
                    'token' => $this->session->userdata('token'),
                    'roleid' => $this->session->userdata('roleid'),
                    'zoneid' => $this->session->userdata('zoneid'),
                    'name' => $this->session->userdata('name'),
                );

                $query = $this->MyModel->get_stock_data();
                $this->load->view('transport_manager/header', $data);
                $this->load->view('transport_manager/stock', $query);
                $this->load->view('transport_manager/footer');
            } else {
                redirect(base_url() . 'admin', 'refresh');

            }

        } else {
            redirect(base_url() . 'admin', 'refresh');
        }

    }

    public function eod_report()
    {
        if ($this->session->userdata('logged_in') == true) {
            if ($this->session->userdata('roleid') == 10) {
                $data = array(
                    'id' => $this->session->userdata('id'),
                    'token' => $this->session->userdata('token'),
                    'roleid' => $this->session->userdata('roleid'),
                    'zoneid' => $this->session->userdata('zoneid'),
                    'name' => $this->session->userdata('name'),
                );

                $this->load->view('transport_manager/header', $data);
                $this->load->view('transport_manager/eodreport');
                $this->load->view('transport_manager/footer');
            } else {
                redirect(base_url() . 'admin', 'refresh');

            }

        } else {
            redirect(base_url() . 'admin', 'refresh');
        }

    }

    public function truck_drivers()
    {
        if ($this->session->userdata('logged_in') == true) {
            if ($this->session->userdata('roleid') == 10) {
                $data = array(
                    'id' => $this->session->userdata('id'),
                    'token' => $this->session->userdata('token'),
                    'roleid' => $this->session->userdata('roleid'),
                    'zoneid' => $this->session->userdata('zoneid'),
                    'name' => $this->session->userdata('name'),
                );

                $this->load->view('transport_manager/header', $data);
                $this->load->view('transport_manager/truck_drivers');
                $this->load->view('transport_manager/footer');
            } else {
                redirect(base_url() . 'admin', 'refresh');

            }

        } else {
            redirect(base_url() . 'admin', 'refresh');
        }

    }

}