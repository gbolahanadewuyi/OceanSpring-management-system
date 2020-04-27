<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Admin extends CI_Controller
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
    public function index()
    {
        if ($this->session->userdata('logged_in') == true) {
            if ($this->session->userdata('roleid') == 0) {
                redirect(base_url() . 'admin/dashboard', 'refresh');
            } elseif ($this->session->userdata('roleid') == 1) {
                redirect(base_url() . 'admin/dashboard', 'refresh');
            } elseif ($this->session->userdata('roleid') == 2) {
                redirect(base_url() . 'zonalmanager/dashboard', 'refresh');
            } elseif ($this->session->userdata('roleid') == 3) {
                redirect(base_url() . 'call_manager/dashboard', 'refresh');
            } elseif ($this->session->userdata('roleid') == 4) {
                redirect(base_url() . 'dem_manager/dashboard', 'refresh');
            } elseif ($this->session->userdata('roleid') == 5) {
                redirect(base_url() . 'callrep/dashboard', 'refresh');
            } elseif ($this->session->userdata('roleid') == 7) {
                redirect(base_url() . 'depot/dashboard', 'refresh');
            }elseif ($this->session->userdata('roleid') == 8) {
                redirect(base_url() . 'authdealer/dashboard', 'refresh');
            }elseif ($this->session->userdata('roleid') == 10) {
                redirect(base_url() . 'transportmanager/dashboard', 'refresh');
            }
            
        } else {
            $this->load->view('login');
        }

    }

    public function dashboard()
    {
        if ($this->session->userdata('logged_in') == true) {
            if ($this->session->userdata('roleid') == 0 || $this->session->userdata('roleid') == 1) {
                $data = array(
                    'id' => $this->session->userdata('id'),
                    'token' => $this->session->userdata('token'),
                    'roleid' => $this->session->userdata('roleid'),
                    'zoneid' => $this->session->userdata('zoneid'),
                    'name' => $this->session->userdata('name'),
                );

                $this->load->view('admin/header', $data);
                $this->load->view('admin/dashboard');
                $this->load->view('admin/footer');
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
            if ($this->session->userdata('roleid') == 0 || $this->session->userdata('roleid') == 1) {
                $data = array(
                    'id' => $this->session->userdata('id'),
                    'token' => $this->session->userdata('token'),
                    'roleid' => $this->session->userdata('roleid'),
                    'zoneid' => $this->session->userdata('zoneid'),
                    'name' => $this->session->userdata('name'),
                );

                $this->load->view('admin/header', $data);
                $this->load->view('admin/users');
                $this->load->view('admin/footer');
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
            if ($this->session->userdata('roleid') == 0 || $this->session->userdata('roleid') == 1) {
                $data = array(
                    'id' => $this->session->userdata('id'),
                    'token' => $this->session->userdata('token'),
                    'roleid' => $this->session->userdata('roleid'),
                    'zoneid' => $this->session->userdata('zoneid'),
                    'name' => $this->session->userdata('name'),
                );

                $this->load->view('admin/header', $data);
                $this->load->view('admin/customer');
                $this->load->view('admin/footer');
            } else {
                redirect(base_url() . 'admin', 'refresh');

            }

        } else {
            redirect(base_url() . 'admin', 'refresh');
        }

    }

    public function orders()
    {if ($this->session->userdata('logged_in') == true) {
        if ($this->session->userdata('roleid') == 0 || $this->session->userdata('roleid') == 1) {
            $data = array(
                'id' => $this->session->userdata('id'),
                'token' => $this->session->userdata('token'),
                'roleid' => $this->session->userdata('roleid'),
                'zoneid' => $this->session->userdata('zoneid'),
                'name' => $this->session->userdata('name'),
            );

            $this->load->view('admin/header', $data);
            $this->load->view('admin/orders');
            $this->load->view('admin/footer');
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
            if ($this->session->userdata('roleid') == 0 || $this->session->userdata('roleid') == 1) {
                $data = array(
                    'id' => $this->session->userdata('id'),
                    'token' => $this->session->userdata('token'),
                    'roleid' => $this->session->userdata('roleid'),
                    'zoneid' => $this->session->userdata('zoneid'),
                    'name' => $this->session->userdata('name'),
                );

                $this->load->view('admin/header', $data);
                $this->load->view('admin/vouchers');
                $this->load->view('admin/footer');
            } else {
                redirect(base_url() . 'admin', 'refresh');

            }

        } else {
            redirect(base_url() . 'admin', 'refresh');
        }

    }
    public function loyalty()
    {if ($this->session->userdata('logged_in') == true) {
        if ($this->session->userdata('roleid') == 0 || $this->session->userdata('roleid') == 1) {
            $data = array(
                'id' => $this->session->userdata('id'),
                'token' => $this->session->userdata('token'),
                'roleid' => $this->session->userdata('roleid'),
                'zoneid' => $this->session->userdata('zoneid'),
                'name' => $this->session->userdata('name'),
            );
            $query = $this->MyModel->get_data();
            $this->load->view('admin/header', $data);
            $this->load->view('admin/loyaltycard', $query);
            $this->load->view('admin/footer');
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
            if ($this->session->userdata('roleid') == 0 || $this->session->userdata('roleid') == 1) {
                $data = array(
                    'id' => $this->session->userdata('id'),
                    'token' => $this->session->userdata('token'),
                    'roleid' => $this->session->userdata('roleid'),
                    'zoneid' => $this->session->userdata('zoneid'),
                    'name' => $this->session->userdata('name'),
                );

                $this->load->view('admin/header', $data);
                $this->load->view('admin/callLogs');
                $this->load->view('admin/footer');
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
            if ($this->session->userdata('roleid') == 0 || $this->session->userdata('roleid') == 1) {
                $data = array(
                    'id' => $this->session->userdata('id'),
                    'token' => $this->session->userdata('token'),
                    'roleid' => $this->session->userdata('roleid'),
                    'zoneid' => $this->session->userdata('zoneid'),
                    'name' => $this->session->userdata('name'),
                );

                $this->load->view('admin/header', $data);
                $this->load->view('admin/eodreport');
                $this->load->view('admin/footer');
            } else {
                redirect(base_url() . 'admin', 'refresh');

            }

        } else {
            redirect(base_url() . 'admin', 'refresh');
        }

    }

    public function anniversary_orders()
    {if ($this->session->userdata('logged_in') == true) {
        if ($this->session->userdata('roleid') == 0 || $this->session->userdata('roleid') == 1) {
            $data = array(
                'id' => $this->session->userdata('id'),
                'token' => $this->session->userdata('token'),
                'roleid' => $this->session->userdata('roleid'),
                'zoneid' => $this->session->userdata('zoneid'),
                'name' => $this->session->userdata('name'),
            );

            $this->load->view('admin/header', $data);
            $this->load->view('admin/anniversaryorders');
            $this->load->view('admin/footer');
        } else {
            redirect(base_url() . 'admin', 'refresh');

        }

    } else {
        redirect(base_url() . 'admin', 'refresh');
    }

    }

    public function create_user()
    {
        if ($this->session->userdata('logged_in') == true) {
            if ($this->session->userdata('roleid') == 0 || $this->session->userdata('roleid') == 1) {
                $data = array(
                    'id' => $this->session->userdata('id'),
                    'token' => $this->session->userdata('token'),
                    'roleid' => $this->session->userdata('roleid'),
                    'zoneid' => $this->session->userdata('zoneid'),
                    'name' => $this->session->userdata('name'),
                );

                $this->load->view('admin/header', $data);
                $this->load->view('admin/createuser');
                $this->load->view('admin/footer');
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
            if ($this->session->userdata('roleid') == 0 || $this->session->userdata('roleid') == 1) {
                $data = array(
                    'id' => $this->session->userdata('id'),
                    'token' => $this->session->userdata('token'),
                    'roleid' => $this->session->userdata('roleid'),
                    'zoneid' => $this->session->userdata('zoneid'),
                    'name' => $this->session->userdata('name'),
                );

                $this->load->view('admin/header', $data);
                $this->load->view('admin/authdealer');
                $this->load->view('admin/footer');
            } else {
                redirect(base_url() . 'admin', 'refresh');

            }

        } else {
            redirect(base_url() . 'admin', 'refresh');
        }

    }

    public function get_totalstock($zoneid)
    {
        $query = $this->MyModel->get_total_stock($zoneid);
        $data['data'] = $query;
        header('Content-Type: application/json');
        echo json_encode($data);

    }

    public function userdata()
    {
        $_POST = json_decode(file_get_contents('php://input'), true);
        $data = $this->MyModel->insertCustomer($_POST);
        header('Content-Type: application/json');
        echo json_encode($data);
    }

    public function customerdata($zoneid)
    {
        $query = $this->MyModel->get_customers_by_zone($zoneid);
        $data['data'] = $query;
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

    public function get_orders_by_zone($zoneid)
    {
        $query = $this->MyModel->get_orders_by_zone($zoneid);
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

    public function get_eodreport_data_by_zone($zoneid,$todaydate)
    {

        $data['customer'] = $this->MyModel->count_customers_by_zone($zoneid,$todaydate);
        $data['orders'] = $this->MyModel->count_orders_by_zone($zoneid,$todaydate);
        $data['deliveredorders'] = $this->MyModel->count_deliveredorders_by_zone($zoneid,$todaydate);
        $data['pendingorders'] = $this->MyModel->count_pendingorders_by_zone($zoneid,$todaydate);
        $data['total_quantity_ordered'] = $this->MyModel->get_totalquantity_ordered($zoneid,$todaydate);
        $data['total_quantity_delivered'] = $this->MyModel->get_totalquantity_delivered($zoneid,$todaydate);
        header('Content-Type: application/json');
        echo json_encode($data);
    }

    // public function get_depot_eodreport($todaydate)
    // {

    //     $data['totalstock'] = $this->MyModel->get_depot_totalstockrecieved($todaydate);
    //     $data['totaldispatched'] = $this->MyModel->get_depot_totalstockdispatched($todaydate);
    //     $data['stockdamaged'] = $this->MyModel->get_depot_totalstockdamged($todaydate);
    //     $data['stockrebagged'] = $this->MyModel->get_depot_totalstockrebagged($todaydate);
    //     header('Content-Type: application/json');
    //     echo json_encode($data);
    // }



    public function get_dashboard_data_by_zone($zoneid)
    {

        $data['users'] = $this->MyModel->get_total_userscount($zoneid);
        $data['activeusers'] = $this->MyModel->get_total_activeuserscount($zoneid);
        $data['loyalty'] = $this->MyModel->get_total_loyaltymemberscount($zoneid);
        $data['sales'] = $this->MyModel->get_total_deliveredorderscount($zoneid);
        header('Content-Type: application/json');
        echo json_encode($data);
    }


    //superadmin dashboard
    public function get_superadmin_dashboard_data()
    {

        $data['users'] = $this->MyModel->get_superadmin_total_userscount();
        $data['activeusers'] = $this->MyModel->get_superadmin_total_activeuserscount();
        $data['loyalty'] = $this->MyModel->get_superadmin_total_loyaltymemberscount();
        $data['sales'] = $this->MyModel->get_superadmin_total_deliveredorderscount();
        header('Content-Type: application/json');
        echo json_encode($data);
    }


    //DepotDashboardData
    public function get_depot_dashboard_data($zoneid)
    {

        $data['totalstcok'] = $this->MyModel->get_totalstock_count($zoneid);
        $data['totalstockdispatched'] = $this->MyModel->get_totalstockddispatched_count($zoneid);
        $data['totalstockdamages'] = $this->MyModel->get_totalstockdamaged_count($zoneid);
        // $data['totalstockrebagged'] = $this->MyModel->get_totalstockrebagged_count($zoneid);
        header('Content-Type: application/json');
        echo json_encode($data);
    }

//stock based EOD report per zones. hence zonalmanagers dispatch stock to sea while depot managers dispatch stock to zones
   public function get_zonal_eodreport($todaydate,$zoneid){
    $data['totalstock'] = $this->MyModel->get_zonal_totalstockrecieved($todaydate,$zoneid);
    $data['totaldispatched'] = $this->MyModel->get_zonal_totalstockdispatched($todaydate,$zoneid);
    $data['totaldispatched_sea'] = $this->MyModel->get_zonal_totalstockdispatched_sea($todaydate,$zoneid);
    $data['stockdamaged'] = $this->MyModel->get_zonal_totalstockdamged($todaydate,$zoneid);
    $data['stockrebagged'] = $this->MyModel->get_zonal_totalstockrebagged($todaydate,$zoneid);

    header('Content-Type: application/json');
    echo json_encode($data);

   }



    public function get_calldep_eod()
    {
       $data = $this->MyModel->get_call_dept_eod();
       header('Content-Type: application/json');
      echo  json_encode($data);
    }

    public function get_loyalty_data()
    {
       $data = $this->MyModel->get_loyalty_data();
       header('Content-Type: application/json');
      echo  json_encode($data);
    }
}