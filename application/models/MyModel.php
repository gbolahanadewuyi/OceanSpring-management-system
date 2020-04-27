<?php

class MyModel extends CI_Model
{

    public function __construct()
    {
        parent::__construct();
        $this->load->database();
    }

    public function get_data()
    {
        $this->db->select('*')->from('loyaltycards')->where('assigned', 1);
        $q = $this->db->get();
        $assigned = $q->num_rows();

        $this->db->select('*')->from('loyaltycards')->where('assigned', 0);
        $b = $this->db->get();
        $unassigned = $b->num_rows();

        return array(
            'used' => $assigned,
            'unused' => $unassigned,
        );
    }

    public function get_stock_data()
    {

        $this->db->select_sum('quantity')->from('stockreceived');
        $a = $this->db->get();
        $totalstock = $a->row()->quantity;

        $todaydate = date('Y-m-d');

        $this->db->select_sum('quantity')->from('stockdispatched')->where('dispatchTime', $todaydate);
        $b = $this->db->get();
        $T_totalstock = $b->row()->quantity;

        return array(
            'totalstock' => $totalstock,
            't_stockToday' => $T_totalstock,
            'date' => $todaydate,
        );
    }

    public function get_total_stock($zoneid)
    {
        $this->db->select_sum('quantity')->from('stockreceived')->where('zoneid',$zoneid);
        $a = $this->db->get();

        if ($a == true) {
            $totalstock = $a->row()->quantity;
            return array(
                "status" => 200,
                'totalstock' => $totalstock,
            );

        } else {
            return array(
                "status" => 400,
            );
        }

    }

    public function getorderdetails()
    {
        // code...
        $this->db->select('*');
        $this->db->from('orderDetails');
        $this->db->join('registration', 'orderDetails.msisdn = registration.msisdn');
        $query = $this->db->get();

    }

    public function getCustomers()
    {
        // code...
        $this->db->select('*');
        $this->db->from('users');
        $this->db->order_by("datetime", "desc");
        $query = $this->db->get();

    }

    public function insertCustomer($data)
    {
        // code...
        $todaydate = date('Y-m-d');
        $userdata = array(
            'msisdn' => $data['phone'],
            'alternatePhoneNumber' => $data['alternatephonenumber'],
            'cardnumber' => $data['cardnumber'],
            'firstname' => $data['first'],
            'lastname' => $data['last'],
            'location' => $data['location'],
            'landmark' => $data['landmark'],
            'gender' => $data['gender'],
            'dateofbirth' => $data['dateofbirth'],
            'typeofHome' => $data['home'],
            'zoneid' => $data['zoneid'],
            'RO' => $data['ro'],
            "entrydate" => $todaydate,

        );

        $orderdetails = array(
            'msisdn' => $data['phone'],
            'preferredDay' => $data['day'],
            'preferredTime' => $data['time'],
            'recurringQuantity' => $data['quantity'],
            'payviaMomo' => $data['momo'],
            'payviaCash' => $data['cashondelivery'],
            'otherPayment' => $data['other'],
            'autodelivery' => $data['autodelivery'],
            'callToConfirm' => $data['calltoconfirm'],
            'subscription' => $data['subscription'],
            'frequency' => $data['frequency'],
            'FAI' => $data['fai'],
        );
        $this->db->insert('orderDetails', $orderdetails);
        $query = $this->db->insert('users', $userdata);
        if ($query == true) {
            return array(
                "status" => 200,
                "message" => 'userdata updated succesfully',
            );
        } else {
            return array(
                "status" => 400,
                "message" => 'error adding user data',
            );
        }

    }

    public function get_orders()
    {

        $q = $this->db->select("orders.id, registration.name, orders.msisdn, orders.item, orders.quantity,orders.datetime,orders.status", false)->from('orders')->join('registration', 'registration.msisdn = orders.msisdn', 'left outer')->order_by('orders.id', 'desc')->get();
        return $q->result_array();

    }

    public function get_orders_by_zone($zoneid)
    {
        $todaydate = date('Y-m-d');
        $q = $this->db->select("orders.id, registration.name, orders.msisdn, orders.item, orders.quantity,orders.datetime,orders.status", false)->from('orders')->join('registration', 'registration.msisdn = orders.msisdn', 'left outer')->where('orders.zoneid', $zoneid)->where('orders.datetime', $todaydate)->order_by('orders.id', 'desc')->get();
        return $q->result_array();

    }

    public function get_customers_by_zone($zoneid)
    {
        $todaydate = date('Y-m-d');
        $q = $this->db->select('*')->from('users')->where('entrydate', $todaydate)->where('zoneid', $zoneid)->order_by('id', 'desc')->get();
        return $q->result_array();

    }

    public function count_customers_by_zone($zoneid, $todaydate)
    {
        // $todaydate = date('Y-m-d');
        $this->db->select('*')->from('users')->where('zoneid', $zoneid)->like('entrydate', $todaydate);
        $q = $this->db->get();
        return $q->num_rows();
    }

    public function count_orders_by_zone($zoneid, $todaydate)
    {
        // $todaydate = date('Y-m-d');
        $this->db->select('*')->from('orders')->where('zoneid', $zoneid)->like('datetime', $todaydate);
        $q = $this->db->get();
        return $q->num_rows();
    }

    public function count_deliveredorders_by_zone($zoneid, $todaydate)
    {
        // $todaydate = date('Y-m-d');
        $this->db->select('*')->from('orders')->where('zoneid', $zoneid)->where('status', 'Delivered')->like('datetime', $todaydate);
        $q = $this->db->get();
        return $q->num_rows();
    }

    public function count_pendingorders_by_zone($zoneid, $todaydate)
    {
        // $todaydate = date('Y-m-d');
        $this->db->select('*')->from('orders')->where('zoneid', $zoneid)->where('status', 'Pending')->like('datetime', $todaydate);
        $q = $this->db->get();
        return $q->num_rows();
    }

    public function get_confirmed_orders()
    {

        $q = $this->db->select("orders.id, registration.name, orders.msisdn, orders.item, orders.quantity,orders.datetime,orders.status", false)->from('orders')->join('registration', 'registration.msisdn = orders.msisdn', 'left outer')->where('orders.status', "Confirmed")->order_by('orders.id', 'desc')->get();
        return $q->result_array();

    }

    public function get_call_dept_eod()
    {
        // $todaydate = date('Y-m-d');

        $q = $this->db->select("admins.name, COUNT(orders.id) AS TotalOrders, SUM(orders.quantity) AS TotalQuantity", false)->from('admins')->join('orders', 'admins.id = orders.assigned', 'left outer')->where('orders.zoneid', 0)->group_by('admins.name')->get();
        return $q->result_array();

    }

    public function get_loyalty_data()
    {
        // $todaydate = date('Y-m-d');

        $q = $this->db->select("users.firstname, users.cardnumber, orders.msisdn, orders.item, orders.status, orders.zoneid, COUNT(orders.quantity) AS Frequency, SUM(orders.quantity) AS TotalQuantity", false)->from('orders')->join('users', 'users.msisdn = orders.msisdn', 'left outer')->where_in('orders.status', array('confirmed', 'delivered'))->where('orders.status is not null ')->group_by('users.firstname, users.cardnumber,orders.msisdn, orders.zoneid,orders.item,orders.status')->order_by('TotalQuantity', 'DESC')->get();
        return $q->result_array();

        // select u.firstname,u.cardnumber,o.msisdn, o.zoneid,o.item,o.status, count(quantity),sum(o.quantity) from orders o left join users u on u.msisdn = o.msisdn where o.status in ('confirmed','delivered') and o.msisdn is not null group by u.firstname,u.cardnumber,o.msisdn,o.zoneid,o.item,o.status order by sum(o.quantity) desc

    }

    public function get_total_userscount($zoneid)
    {

        $this->db->select('*')->from('users')->where('zoneid', $zoneid);
        $query = $this->db->get();
        return $query->num_rows();

    }

    public function get_total_activeuserscount($zoneid)
    {

        $this->db->select('users.msisdn, COUNT(orders.id) AS TotalOrders', false)->from('users')->join('orders', 'users.msisdn = orders.msisdn', 'inner')->where('users.zoneid', $zoneid)->group_by('users.msisdn');
        $query = $this->db->get();
        return $query->num_rows();

    }

    public function get_total_loyaltymemberscount($zoneid)
    {
        $this->db->select('*')->from('users')->where('zoneid', $zoneid)->like('cardnumber', 'OSD');
        $query = $this->db->get();
        return $query->num_rows();

    }

    public function get_total_deliveredorderscount($zoneid)
    {
        $this->db->select('*')->from('orders')->where('status', 'delivered')->where('zoneid', $zoneid);
        $query = $this->db->get();
        return $query->num_rows();

    }

    //superadmin dashboard
    public function get_superadmin_total_userscount()
    {

        $this->db->select('*')->from('users');
        $query = $this->db->get();
        return $query->num_rows();

    }

    public function get_superadmin_total_activeuserscount()
    {

        $this->db->select('users.msisdn, COUNT(orders.id) AS TotalOrders', false)->from('users')->join('orders', 'users.msisdn = orders.msisdn', 'inner')->group_by('users.msisdn');
        $query = $this->db->get();
        return $query->num_rows();

    }

    public function get_superadmin_total_loyaltymemberscount()
    {
        $this->db->select('*')->from('users')->like('cardnumber', 'OSD');
        $query = $this->db->get();
        return $query->num_rows();

    }

    public function get_superadmin_total_deliveredorderscount()
    {
        $this->db->select('*')->from('orders')->where('status', 'delivered');
        $query = $this->db->get();
        return $query->num_rows();

    }

    //Depot EOD Report
    // public function get_depot_totalstockrecieved($todaydate)
    // {
    //     // $todaydate = date('Y-m-d');
    //     $this->db->select_sum('quantity')->from('stockreceived')->like('stockdate', $todaydate);
    //     $q = $this->db->get();
    //     if ($q->row()->quantity == NULL){
    //         return 0;
    //     }else{
    //       return  $q->row()->quantity ;
    //     }

    // }

    // public function get_depot_totalstockdispatched($todaydate)
    // {
       
    //     $this->db->select_sum('quantity')->from('stockdispatched')->where('dispatchType', 'Zone')->like('dispatchTime', $todaydate);
    //     $q = $this->db->get();
    //     if ($q->row()->quantity == NULL){
    //         return 0;
    //     }else{
    //       return  $q->row()->quantity ;
    //     }
    // }

    // public function get_depot_totalstockdamged($todaydate)
    // {
       
    //     $this->db->select_sum('quantity')->from('stockdispatched')->where('dispatchType', 'Damages')->like('dispatchTime', $todaydate);
    //     $q = $this->db->get();
    //  if ($q->row()->quantity == NULL){
    //      return 0;
    //  }else{
    //    return  $q->row()->quantity ;
    //  }
        
    // }

    // public function get_depot_totalstockrebagged($todaydate)
    // {
        
    //     $this->db->select_sum('quantity')->from('stockdispatched')->where('dispatchType', 'Rebagging')->like('dispatchTime', $todaydate);
    //     $q = $this->db->get();
    //     if ($q->row()->quantity == NULL){
    //         return 0;
    //     }else{
    //       return  $q->row()->quantity ;
    //     }
    // }





    //stock related eod report
    public function get_zonal_totalstockrecieved($todaydate,$zoneid)
    {
        // $todaydate = date('Y-m-d');
        $this->db->select_sum('quantity')->from('stockreceived')->where('zoneid',$zoneid)->like('stockdate', $todaydate);
        $q = $this->db->get();
        if ($q->row()->quantity == NULL){
            return 0;
        }else{
          return  $q->row()->quantity ;
        }

    }

    public function get_zonal_totalstockdispatched($todaydate,$zoneid)
    {
       
        $this->db->select_sum('quantity')->from('stockdispatched')->where('dispatchType', 'Zone')->where('zoneid',$zoneid)->like('dispatchTime', $todaydate);
        $q = $this->db->get();
        if ($q->row()->quantity == NULL){
            return 0;
        }else{
          return  $q->row()->quantity ;
        }
    }

    public function get_zonal_totalstockdispatched_sea($todaydate,$zoneid)
    {
       
        $this->db->select_sum('quantity')->from('stockdispatched')->where('dispatchType', 'sea')->where('zoneid',$zoneid)->like('dispatchTime', $todaydate);
        $q = $this->db->get();
        if ($q->row()->quantity == NULL){
            return 0;
        }else{
          return  $q->row()->quantity ;
        }
    }

    public function get_zonal_totalstockdamged($todaydate,$zoneid)
    {
       
        $this->db->select_sum('quantity')->from('stockdispatched')->where('dispatchType', 'Damages')->where('zoneid',$zoneid)->like('dispatchTime', $todaydate);
        $q = $this->db->get();
     if ($q->row()->quantity == NULL){
         return 0;
     }else{
       return  $q->row()->quantity ;
     }
        
    }

    public function get_zonal_totalstockrebagged($todaydate,$zoneid)
    {
        
        $this->db->select_sum('quantity')->from('stockdispatched')->where('dispatchType', 'Rebagging')->where('zoneid',$zoneid)->like('dispatchTime', $todaydate);
        $q = $this->db->get();
        if ($q->row()->quantity == NULL){
            return 0;
        }else{
          return  $q->row()->quantity ;
        }
    }



    //DepotDashboardData 
    // public function get_totalstock_count()
    // {
    //     // $todaydate = date('Y-m-d');
    //     $this->db->select_sum('quantity')->from('stockreceived');
    //     $q = $this->db->get();
    //     if ($q->row()->quantity == NULL){
    //         return 0;
    //     }else{
    //       return  $q->row()->quantity ;
    //     }
    // }

      //DepotDashboardData 
      public function get_totalstock_count($zoneid)
      {
          // $todaydate = date('Y-m-d');
          $this->db->select_sum('quantity')->from('stockreceived')->where('zoneid',$zoneid);
          $q = $this->db->get();
          if ($q->row()->quantity == NULL){
              return 0;
          }else{
            return  $q->row()->quantity ;
          }
      }
  
      public function get_totalstockddispatched_count($zoneid)
      {
          // $todaydate = date('Y-m-d');
          $this->db->select_sum('quantity')->from('stockdispatched')->where('dispatchType', 'Zone')->where('zoneid',$zoneid);
          $q = $this->db->get();
          if ($q->row()->quantity == NULL){
              return 0;
          }else{
            return  $q->row()->quantity ;
          }
      }
  
      public function get_totalstockdamaged_count($zoneid)
      {
          // $todaydate = date('Y-m-d');
          $this->db->select_sum('quantity')->from('stockdispatched')->where('dispatchType', 'Damges')->where('zoneid',$zoneid);
          $q = $this->db->get();
          if ($q->row()->quantity == NULL){
              return 0;
          }else{
            return  $q->row()->quantity ;
          }
      }
  
    //   public function get_totalstockrebagged_count($zoneid)
    //   {
    //       // $todaydate = date('Y-m-d');
    //       $this->db->select_sum('quantity')->from('stockdispatched')->where('dispatchType', 'Rebagging')->where('zoneid',$zoneid);
    //       $q = $this->db->get();
    //       if ($q->row()->quantity == NULL){
    //           return 0;
    //       }else{
    //         return  $q->row()->quantity ;
    //       }
    //   }





  //Get total quantity of items ordered in a Day by zone
  public function get_totalquantity_ordered($zoneid,$todaydate)
  {
      $this->db->select_sum('quantity')->from('orders')->where('zoneid',$zoneid)->like('datetime',$todaydate);
      $q = $this->db->get();
      if ($q->row()->quantity == NULL){
          return 0;
      }else{
        return  $q->row()->quantity ;
      }
  }
  public function get_totalquantity_delivered($zoneid,$todaydate)
  {
      $this->db->select_sum('quantity')->from('orders')->where('status','Delivered')->where('zoneid',$zoneid)->like('datetime',$todaydate);
      $q = $this->db->get();
      if ($q->row()->quantity == NULL){
          return 0;
      }else{
        return  $q->row()->quantity ;
      }
  }

}