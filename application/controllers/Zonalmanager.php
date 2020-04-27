<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Zonalmanager extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->library('session');
        $this->load->helper('url');

        $this->load->model('MyModel');
        $this->load->model('OrderModel');
    }
    /**
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
            if ($this->session->userdata('roleid') == 2) {
                $data = array(
                    'id' => $this->session->userdata('id'),
                    'token' => $this->session->userdata('token'),
                    'roleid' => $this->session->userdata('roleid'),
                    'zoneid' => $this->session->userdata('zoneid'),
                    'name' => $this->session->userdata('name'),
                );

                $this->load->view('zonal_managers/header', $data);
                $this->load->view('zonal_managers/dashboard');
                $this->load->view('zonal_managers/footer');
            } else {
                redirect(base_url() . 'admin', 'refresh');

            }

        } else {
            redirect(base_url() . 'admin', 'refresh');
        }

    }

    public function users()
    {
        if ($this->session->userdata('logged_in') == true) {
            if ($this->session->userdata('roleid') == 2) {
                $data = array(
                    'id' => $this->session->userdata('id'),
                    'token' => $this->session->userdata('token'),
                    'roleid' => $this->session->userdata('roleid'),
                    'zoneid' => $this->session->userdata('zoneid'),
                    'name' => $this->session->userdata('name'),
                );

                $this->load->view('zonal_managers/header', $data);
                $this->load->view('zonal_managers/users');
                $this->load->view('zonal_managers/footer');
            } else {
                redirect(base_url() . 'admin', 'refresh');

            }

        } else {
            redirect(base_url() . 'admin', 'refresh');
        }

    }

    public function customer()
    {
        if ($this->session->userdata('logged_in') == true) {
            if ($this->session->userdata('roleid') == 2) {
                $data = array(
                    'id' => $this->session->userdata('id'),
                    'token' => $this->session->userdata('token'),
                    'roleid' => $this->session->userdata('roleid'),
                    'zoneid' => $this->session->userdata('zoneid'),
                    'name' => $this->session->userdata('name'),
                );

                $this->load->view('zonal_managers/header', $data);
                $this->load->view('zonal_managers/customer');
                $this->load->view('zonal_managers/footer');
            } else {
                redirect(base_url() . 'admin', 'refresh');

            }

        } else {
            redirect(base_url() . 'admin', 'refresh');
        }

    }

    public function orders()
    {
        if ($this->session->userdata('logged_in') == true) {
            if ($this->session->userdata('roleid') == 2) {
                $data = array(
                    'id' => $this->session->userdata('id'),
                    'token' => $this->session->userdata('token'),
                    'roleid' => $this->session->userdata('roleid'),
                    'zoneid' => $this->session->userdata('zoneid'),
                    'name' => $this->session->userdata('name'),
                );

                $this->load->view('zonal_managers/header', $data);
                $this->load->view('zonal_managers/orders');
                $this->load->view('zonal_managers/footer');
            } else {
                redirect(base_url() . 'admin', 'refresh');

            }

        } else {
            redirect(base_url() . 'admin', 'refresh');
        }

    }

    public function vouchers()
    {
        if ($this->session->userdata('logged_in') == true) {
            if ($this->session->userdata('roleid') == 2) {
                $data = array(
                    'id' => $this->session->userdata('id'),
                    'token' => $this->session->userdata('token'),
                    'roleid' => $this->session->userdata('roleid'),
                    'zoneid' => $this->session->userdata('zoneid'),
                    'name' => $this->session->userdata('name'),
                );

                $this->load->view('zonal_managers/header', $data);
                $this->load->view('zonal_managers/vouchers');
                $this->load->view('zonal_managers/footer');
            } else {
                redirect(base_url() . 'admin', 'refresh');

            }

        } else {
            redirect(base_url() . 'admin', 'refresh');
        }

    }

    public function loyalty()
    {
        if ($this->session->userdata('logged_in') == true) {
            if ($this->session->userdata('roleid') == 2) {
                $data = array(
                    'id' => $this->session->userdata('id'),
                    'token' => $this->session->userdata('token'),
                    'roleid' => $this->session->userdata('roleid'),
                    'zoneid' => $this->session->userdata('zoneid'),
                    'name' => $this->session->userdata('name'),
                );
                $query = $this->MyModel->get_data();
                $this->load->view('zonal_managers/header', $data);
                $this->load->view('zonal_managers/loyalty', $query);
                $this->load->view('zonal_managers/footer');
            } else {
                redirect(base_url() . 'admin', 'refresh');

            }

        } else {
            redirect(base_url() . 'admin', 'refresh');
        }

    }

    public function callLogs()
    {
        if ($this->session->userdata('logged_in') == true) {
            if ($this->session->userdata('roleid') == 2) {
                $data = array(
                    'id' => $this->session->userdata('id'),
                    'token' => $this->session->userdata('token'),
                    'roleid' => $this->session->userdata('roleid'),
                    'zoneid' => $this->session->userdata('zoneid'),
                    'name' => $this->session->userdata('name'),
                );

                $this->load->view('zonal_managers/header', $data);
                $this->load->view('zonal_managers/callLogs');
                $this->load->view('zonal_managers/footer');
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
            if ($this->session->userdata('roleid') == 2) {
                $data = array(
                    'id' => $this->session->userdata('id'),
                    'token' => $this->session->userdata('token'),
                    'roleid' => $this->session->userdata('roleid'),
                    'zoneid' => $this->session->userdata('zoneid'),
                    'name' => $this->session->userdata('name'),
                );

                $this->load->view('zonal_managers/header', $data);
                $this->load->view('zonal_managers/eodreport');
                $this->load->view('zonal_managers/footer');
            } else {
                redirect(base_url() . 'admin', 'refresh');

            }

        } else {
            redirect(base_url() . 'admin', 'refresh');
        }

    }

    public function anniversary_orders()
    {
        if ($this->session->userdata('logged_in') == true) {
            if ($this->session->userdata('roleid') == 2) {
                $data = array(
                    'id' => $this->session->userdata('id'),
                    'token' => $this->session->userdata('token'),
                    'roleid' => $this->session->userdata('roleid'),
                    'zoneid' => $this->session->userdata('zoneid'),
                    'name' => $this->session->userdata('name'),
                );

                $this->load->view('zonal_managers/header', $data);
                $this->load->view('zonal_managers/anniversaryorders');
                $this->load->view('zonal_managers/footer');
            } else {
                redirect(base_url() . 'admin', 'refresh');

            }

        } else {
            redirect(base_url() . 'admin', 'refresh');
        }

    }

    public function arrows()
    {
        if ($this->session->userdata('logged_in') == true) {
            if ($this->session->userdata('roleid') == 2) {
                $data = array(
                    'id' => $this->session->userdata('id'),
                    'token' => $this->session->userdata('token'),
                    'roleid' => $this->session->userdata('roleid'),
                    'zoneid' => $this->session->userdata('zoneid'),
                    'name' => $this->session->userdata('name'),
                );

                $this->load->view('zonal_managers/header', $data);
                $this->load->view('zonal_managers/arrows');
                $this->load->view('zonal_managers/footer');
            } else {
                redirect(base_url() . 'admin', 'refresh');

            }

        } else {
            redirect(base_url() . 'admin', 'refresh');
        }

    }

    public function sea()
    {
        if ($this->session->userdata('logged_in') == true) {
            if ($this->session->userdata('roleid') == 2) {
                $data = array(
                    'id' => $this->session->userdata('id'),
                    'token' => $this->session->userdata('token'),
                    'roleid' => $this->session->userdata('roleid'),
                    'zoneid' => $this->session->userdata('zoneid'),
                    'name' => $this->session->userdata('name'),
                );

                $this->load->view('zonal_managers/header', $data);
                $this->load->view('zonal_managers/sea');
                $this->load->view('zonal_managers/footer');
            } else {
                redirect(base_url() . 'admin', 'refresh');

            }

        } else {
            redirect(base_url() . 'admin', 'refresh');
        }

    }

    public function riders()
    {
        if ($this->session->userdata('logged_in') == true) {
            if ($this->session->userdata('roleid') == 2) {
                $data = array(
                    'id' => $this->session->userdata('id'),
                    'token' => $this->session->userdata('token'),
                    'roleid' => $this->session->userdata('roleid'),
                    'zoneid' => $this->session->userdata('zoneid'),
                    'name' => $this->session->userdata('name'),
                );

                $this->load->view('zonal_managers/header', $data);
                $this->load->view('zonal_managers/riders');
                $this->load->view('zonal_managers/footer');
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
            if ($this->session->userdata('roleid') == 2) {
                $data = array(
                    'id' => $this->session->userdata('id'),
                    'token' => $this->session->userdata('token'),
                    'roleid' => $this->session->userdata('roleid'),
                    'zoneid' => $this->session->userdata('zoneid'),
                    'name' => $this->session->userdata('name'),
                );
            

	           	$query = $this->MyModel->get_stock_data();
                $this->load->view('zonal_managers/header', $data);
                $this->load->view('zonal_managers/stock',$query);
                $this->load->view('zonal_managers/footer');
            } else {
                redirect(base_url() . 'admin', 'refresh');

            }

        } else {
            redirect(base_url() . 'admin', 'refresh');
        }

    }


    public function authdealer()
    {
        if ($this->session->userdata('logged_in') == true) {
            if ($this->session->userdata('roleid') == 2) {
                $data = array(
                    'id' => $this->session->userdata('id'),
                    'token' => $this->session->userdata('token'),
                    'roleid' => $this->session->userdata('roleid'),
                    'zoneid' => $this->session->userdata('zoneid'),
                    'name' => $this->session->userdata('name'),
                );
            

	           	$query = $this->MyModel->get_stock_data();
                $this->load->view('zonal_managers/header', $data);
                $this->load->view('zonal_managers/authdealer');
                $this->load->view('zonal_managers/footer');
            } else {
                redirect(base_url() . 'admin', 'refresh');

            }

        } else {
            redirect(base_url() . 'admin', 'refresh');
        }

    }


    public function userdata()
    {
        $_POST = json_decode(file_get_contents('php://input'), true);
        $data = $this->MyModel->insertCustomer($_POST);
        header('Content-Type: application/json');
        echo json_encode($data);
    }

    public function get_orders()
    {
        $query = $this->MyModel->get_orders();
        $data['data'] = $query;
        header('Content-Type: application/json');
        echo json_encode($data);
    }

    public function get_confirmed_orders()
    {
        $query = $this->MyModel->get_confirmed_orders();
        $data['data'] = $query;
        header('Content-Type: application/json');
        echo json_encode($data);
    }

   

    public function get_neworders()
    {

        $_POST = json_decode(file_get_contents('php://input'), true);

        // $response = $this->MyModel->merchant_auth();

        $this->load->helper('url');
        $list = $this->OrderModel->get_datatables();
        $data = array();
        $no = $_POST['start'];
        foreach ($list as $order) {
            $no++;
            $row = array();
            $row[] = $order->id;
            $row[] = $order->msisdn;
            $row[] = $order->item;
            $row[] = $order->quantity;
            $row[] = $order->datetime;

            // if($payee->network == 'MTN'):

            // $favicon = $this->MyModel->favicon_show($prod->prod_tags);
            $row[] = '
                        <a class="btn  btn-primary" href="javascript:void(0)" title="Edit" onclick="edit_order(' . "'" . $order->id . "'" . ');"><i class="fa fa-edit"></i>Edit</a>
                        <a class="btn  btn-danger" href="javascript:void(0)" title="Delete" onclick="delete_order(' . "'" . $order->id . "'" . ');"><i class="fa fa-trash"></i>Delete</a>';
            $data[] = $row;
        }

        $output = array(
            "draw" => $_POST['draw'],
            "recordsTotal" => $this->OrderModel->count_all(),
            "recordsFiltered" => $this->OrderModel->count_filtered(),
            "data" => $data,
        );

        header('Content-Type: application/json');
        echo json_encode($output);

    }
}
