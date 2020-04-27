<!-- Sidebar Menu -->
<ul class="sidebar-menu" data-widget="tree">
    <li class="header">MAIN NAVIGATION</li>
    <!-- Optionally, you can add icons to the links -->
    <li class=""><a href="<?=base_url()?>zonalmanager/dashboard"><i class="fa fa-area-chart"></i>
            <span>Dashboard</span></a></li>
    <li class="active"><a href="<?=base_url()?>zonalmanager/users"><i class="fa fa-group"></i> <span>New
                Users</span></a></li>
    <!-- <li class=""><a href="<?=base_url()?>zonalmanager/customer"><i class="fa fa-user"></i> <span>Customers</span></a></li> -->
    <li class=""><a href="<?=base_url()?>zonalmanager/orders"><i class="fa fa-book"></i> <span>Orders</span></a></li>
    <li class=""><a href="<?=base_url()?>zonalmanager/anniversary_orders"><i class="fa fa-book"></i>
            <span>Anniversary</span></a></li>
    <li class=""><a href="<?=base_url()?>zonalmanager/authdealer"><i class="fa fa-check-square"></i> <span>Authorized
                Dealers
            </span></a>
    <li class=""><a href="<?=base_url()?>zonalmanager/arrows"><i class="fa fa-user-secret"></i> <span>Relationship
                Officer</span></a>
    <li class=""><a href="<?=base_url()?>zonalmanager/sea"><i class="fa fa-users"></i> <span>Sales
                Executive Assistants</span></a>
    </li>
    <li class=""><a href="<?=base_url()?>zonalmanager/riders"><i class="fa fa-motorcycle"></i> <span>Riders
            </span></a>
    </li>
    <li><a href="<?= base_url() ?>zonalmanager/loyalty"><i class="fa fa-credit-card"></i> <span>Loyalty Cards</span></a>
    </li>
    <li class=""><a href="<?= base_url() ?>zonalmanager/stock"><i class="fa fa-book"></i> <span>Stock</span></a></li>
    <li><a href="<?=base_url()?>zonalmanager/eod_report"><i class="fa fa-cogs"></i> <span>EOD Report</span></a></li>
</ul>
<!-- /.sidebar-menu -->
</section>
<!-- /.sidebar -->
</aside>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Users
            <small>Control panel</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Dashboard</a></li>
            <li class="active">users</li>
        </ol>
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="nav-tabs-custom">
            <ul class="nav nav-tabs">
                <li class="active"><a href="#tab_1" data-toggle="tab">Customers</a></li>
                <li><a href="#tab_2" data-toggle="tab">Add User</a></li>

            </ul>
            <div class="tab-content">
                <div class="tab-pane active" id="tab_1">

                    <zing-grid editor="modal" layout="row" layout-controls='true' search filter sort pager
                        page-size="20" page-size-options="30,40,50,60">
                        <zg-caption>
                            <i class="fa fa-user"></i> Customer Table
                            <a class=" btn bg-purple  margin  pull-right" style="color:white;"
                                onClick="_exportDataToCSV()"><i class="fa fa-plus"></i>
                                Export </a>
                        </zg-caption>


                        <zg-colgroup>

                            <zg-column index="firstname" header="firstname"></zg-column>
                            <zg-column index="lastname" header="lastname"></zg-column>
                            <zg-column index="msisdn" header="Phone"></zg-column>
                            <zg-column index="location" header="location"></zg-column>
                            <!-- <zg-column index="landmark" header="landmark"></zg-column> -->
                            <zg-column index="cardnumber" header="cardnumber">
                            </zg-column>
                            <zg-column index="msisdn,id" header="Action" editor="false">
                                <zg-button onclick='customer_info([[index.msisdn]])'>
                                    <zg-icon name="info"> </zg-icon> <span></span>
                                </zg-button>

                                <zg-button onclick='edit_customer([[index.id]])'>
                                    <zg-icon name="edit"> </zg-icon> <span></span>
                                </zg-button>


                                <zg-button onclick='delete_customer([[index.id]])'>
                                    <zg-icon name="close"> </zg-icon> <span></span>
                                </zg-button>

                            </zg-column>
                            <!-- <zg-column index="id" header="Action" editor="false">

                    <zg-button onclick='edit_user([[index.id]],)'>
                        <zg-icon name="edit"> </zg-icon> <span></span>
                    </zg-button>
                </zg-column> -->
                            <!-- <zg-column index="custom" header="Edit Row" editor="false">
                    <zg-button action="editrecord" class="button button--edit"></zg-button>
                </zg-column> -->

                        </zg-colgroup>
                    </zing-grid>
                    <a href="" id="downloadAnchor">&nbsp;</a>
                </div>
                <!-- /.tab-pane -->
                <div class="tab-pane" id="tab_2">
                    <div class="box box-primary">
                        <!-- <div class="box-header with-border">
                          <h3 class="box-title">Add Member</h3>
                      </div> -->

                        <form role="form" method="post" action="JavaScript:check_user_telephone();"
                            enctype="multipart/form-data" id="customersData">
                            <div class="box-body">
                                <div class="row">
                                    <div class="col-xs-6">
                                        <div class="form-group">
                                            <label control-label>First Name:</label>
                                            <div class="input-group">
                                                <div class="input-group-addon">
                                                    <i class="fa fa-user"></i>
                                                </div>
                                                <input type="text" name="" class="form-control" id="first"
                                                    placeholder="Enter firstname .....">
                                            </div>

                                        </div>
                                    </div>
                                    <div class="col-xs-6">
                                        <div class="form-group">
                                            <label control-label>Last Name:</label>
                                            <div class="input-group">
                                                <div class="input-group-addon">
                                                    <i class="fa fa-user"></i>
                                                </div>
                                                <input type="text" name="" class="form-control" id="last"
                                                    placeholder="Enter Lastname...">
                                            </div>

                                        </div>
                                    </div>

                                </div>
                                <div class="row">
                                    <div class="col-xs-6">
                                        <div class="form-group">
                                            <label control-label>Date Of Birth:</label>
                                            <div class="input-group">
                                                <div class="input-group-addon">
                                                    <i class="fa fa-calendar"></i>
                                                </div>
                                                <input type="date" name="" class="form-control" id="date"
                                                    placeholder="">
                                            </div>

                                        </div>
                                    </div>
                                    <div class="col-xs-6">
                                        <div class="form-group">
                                            <label control-label>Gender:</label>

                                            <div class="radio">
                                                <label class="inline">
                                                    <input type="radio" name="gender" id="gender" value="Male">
                                                    Male
                                                </label>
                                            </div>
                                            <div class="radio">
                                                <label class="inline">
                                                    <input type="radio" name="gender" id="gender" value="Female">
                                                    Female
                                                </label>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                                <div class="row">
                                    <div class="col-xs-6">
                                        <div class="form-group">
                                            <label control-label>Location:</label>
                                            <div class="input-group">
                                                <div class="input-group-addon">
                                                    <i class="fa fa-home"></i>
                                                </div>
                                                <input type="text" name="" class="form-control" id="location"
                                                    placeholder="Enter location .....">
                                            </div>

                                        </div>
                                    </div>
                                    <div class="col-xs-6">
                                        <div class="form-group">
                                            <label control-label>GPS Address:</label>
                                            <div class="input-group">
                                                <div class="input-group-addon">
                                                    <i class="fa fa-map-marker"></i>
                                                </div>
                                                <input type="text" name="" class="form-control" id="landmark"
                                                    placeholder="">
                                            </div>

                                        </div>
                                    </div>

                                </div>
                                <div class="row">
                                    <div class="col-xs-6">
                                        <div class="form-group">
                                            <label control-label>Loyalty Card Number:</label>
                                            <div class="input-group">
                                                <div class="input-group-addon">
                                                    <i class="fa fa-credit-card"></i>
                                                </div>
                                                <input type="text" name="" class="form-control" id="card"
                                                    placeholder="Enter loyalty card number .....">
                                            </div>

                                        </div>
                                    </div>
                                    <div class="col-xs-6">
                                        <div class="form-group">
                                            <label control-label>Type Of Home:</label>
                                            <select id="home" name="home" class="form-control select2"
                                                style="width: 100%;">

                                                <option selected="selected" value="">-- Select type of home --
                                                </option>
                                                <option value="Apartment">Apartment</option>
                                                <option value="Compound House">Compound House</option>
                                                <option value="Flat">Flat</option>
                                                <option value="Self Compound">Self Compound</option>
                                            </select>
                                        </div>
                                    </div>

                                </div>
                                <div class="row">
                                    <div class="col-xs-6">
                                        <div class="form-group">
                                            <label control-label>Telephone:</label>
                                            <div class="input-group">
                                                <div class="input-group-addon">
                                                    <i class="fa fa-phone"></i>
                                                </div>
                                                <input type="text" name="" class="form-control" id="phone"
                                                    placeholder="v" required>
                                            </div>

                                        </div>
                                    </div>
                                    <div class="col-xs-6">
                                        <div class="form-group">
                                            <label control-label>Alternative Telephone:</label>
                                            <div class="input-group">
                                                <div class="input-group-addon">
                                                    <i class="fa fa-phone"></i>
                                                </div>
                                                <input type="text" name="" class="form-control" id="alt_phone"
                                                    placeholder="Example 0255555555">
                                            </div>

                                        </div>
                                    </div>

                                </div>
                                <div class="row">
                                    <div class="col-xs-6">
                                        <div class="form-group">
                                            <label control-label>Preffered Day:</label>
                                            <select id="day" name="nationality" class="form-control select2"
                                                style="width: 100%;">

                                                <option selected="selected" value="Default">-- Select day --
                                                </option>
                                                <option value="Monday">Monday</option>
                                                <option value="Tuesday">Tuesday</option>
                                                <option value="Wednesday">Wednesday</option>
                                                <option value="Thursday">Thursday</option>
                                                <option value="Friday">Friday</option>
                                                <option value="Saturday">Saturday</option>
                                                <option value="Sunday">Sunday</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-xs-6">
                                        <div class="form-group">
                                            <label control-label>Preffered Time: </label>
                                            <select id="time" name="nationality" class="form-control select2"
                                                style="width: 100%;">

                                                <option selected="selected" value="Default">-- Select time --
                                                </option>
                                                <option value="5am">5am</option>
                                                <option value="6am ">6am</option>
                                                <option value="7am">7am</option>
                                                <option value="8am">8am</option>
                                                <option value="9am ">9am</option>
                                                <option value=" 10am">10am</option>
                                                <option value="11am">11am</option>
                                                <option value="12pm">12pm</option>
                                                <option value="1pm">1pm</option>
                                                <option value="2pm">2pm</option>
                                                <option value="3pm">3pm</option>
                                                <option value="4pm">4pm</option>
                                                <option value="5pm">5pm</option>
                                                <option value="6pm">6pm</option>
                                                <option value="7pm">7pm</option>
                                                <option value="8pm">8pm</option>
                                            </select>
                                        </div>
                                    </div>

                                </div>
                                <div class="row">
                                    <div class="col-xs-6">
                                        <div class="form-group">
                                            <label control-label>Quantity:</label>
                                            <div class="input-group">
                                                <div class="input-group-addon">
                                                    <i class="fa fa-cart-plus"></i>
                                                </div>
                                                <input type="text" name="" class="form-control" id="Quantity"
                                                    placeholder="">
                                            </div>

                                        </div>
                                    </div>
                                    <div class="col-xs-6">

                                        <div class="form-group">
                                            <label control-label>Mode Of Payment:</label><br />
                                            <label>
                                                <input type="checkbox" class="minimal margin" id="cash">
                                                Cash on delivery
                                            </label><br />
                                            <label>
                                                <input type="checkbox" class="minimal margin" id="momo">
                                                momo
                                            </label><br />
                                            <label>
                                                <input type="checkbox" class="minimal margin" id="other">
                                                other
                                            </label>

                                        </div>


                                    </div>

                                </div>
                                <div class="row">
                                    <div class="col-xs-6">
                                        <div class="form-group">
                                            <label control-label>Request Mode:</label><br />
                                            <label>
                                                <input type="checkbox" class="minimal" id="auto">
                                                Auto delivery
                                            </label><br />
                                            <label>
                                                <input type="checkbox" class="minimal" id="call">
                                                Call to confirm delivery
                                            </label><br />
                                            <label>
                                                <input type="checkbox" class="minimal" id="sub">
                                                Monthly Subscription
                                            </label>

                                        </div>
                                    </div>
                                    <div class="col-xs-6">

                                        <div class="form-group">
                                            <label control-label>Frequency Of Request:</label><br />
                                            <div class="radio">
                                                <label>
                                                    <input type="radio" name="for" id="for" value="daily" checked>
                                                    Daily
                                                </label>
                                            </div>
                                            <div class="radio">
                                                <label>
                                                    <input type="radio" name="for" id="for" value="weekly">
                                                    Weekly
                                                </label>
                                            </div>

                                            <div class="radio">
                                                <label>
                                                    <input type="radio" name="for" id="for" value="other">
                                                    Other
                                                </label>
                                            </div>

                                        </div>


                                    </div>





                                    <div class="row">
                                        <div class="col-xs-6">

                                            <div class="form-group">
                                                <label class="control-label ">Just Ask:</label><br />

                                                <label class="margin">
                                                    <input type="checkbox" class="minimal " id="milo">
                                                    Milo
                                                </label>
                                                <label class="margin">
                                                    <input type="checkbox" class="minimal " id="wPowder">
                                                    Washing Powder
                                                </label>
                                                <label class="margin">
                                                    <input type="checkbox" class="minimal " id="sugar">
                                                    Sugar
                                                </label>
                                                <label class="margin">
                                                    <input type="checkbox" class="minimal " id="bread">
                                                    Bread
                                                </label>
                                                <label class="margin">
                                                    <input type="checkbox" class="minimal " id="milk">
                                                    milk
                                                </label>
                                                <label class="margin">
                                                    <input type="checkbox" class="minimal " id="bSoap">
                                                    Bathing soap
                                                </label>
                                                <label class="margin">
                                                    <input type="checkbox" class="minimal " id="toothpaste">
                                                    Tooth paste
                                                </label>
                                                <label class="margin">
                                                    <input type="checkbox" class="minimal " id="babyCon">
                                                    Baby consumables
                                                </label>
                                                <label class="margin">
                                                    <input type="checkbox" class="minimal " id="water">
                                                    Water
                                                </label>

                                            </div>

                                        </div>
                                        <div class="col-xs-6">
                                            <div class="form-group">
                                                <label control-label>Name Of Relationship officer:</label>
                                                <select id="Arname" name="" class="form-control select2"
                                                    style="width: 100%;">

                                                    <option selected="selected" value="">-- Select RO --
                                                    </option>

                                                </select>
                                            </div>
                                        </div>




                                    </div>



                                </div>

                            </div>
                            <div class="box-footer">
                                <button type="button" class="btn btn-danger pull-left"
                                    data-dismiss="modal">Close</button>
                                <button type="submit" id="userBtn" class="btn btn-primary pull-right">Save
                                    changes</button>
                            </div>
                        </form>
                    </div>
                </div>

                <!-- /.tab-pane -->
            </div>
            <!-- /.tab-content -->
        </div>



        <div class="modal fade" id="edit-customer">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span></button>
                        <h4 class="modal-title"></h4>
                    </div>
                    <div class="modal-body">
                        <form role="form" method="post" enctype="multipart/form-data" id="customerData">
                            <div class="box-body">
                                <div class="row">
                                    <div class="col-xs-6">
                                        <div class="form-group">
                                            <label control-label>Firstname:</label>
                                            <div class="input-group">
                                                <div class="input-group-addon">
                                                    <i class="fa fa-user"></i>
                                                </div>
                                                <input type="text" name="" class="form-control" id="Cfirst"
                                                    placeholder="">
                                            </div>

                                        </div>
                                    </div>
                                    <div class="col-xs-6">
                                        <div class="form-group">
                                            <label control-label>Lastname:</label>
                                            <div class="input-group">
                                                <div class="input-group-addon">
                                                    <i class="fa fa-user"></i>
                                                </div>
                                                <input type="text" name="" class="form-control" id="Clast"
                                                    placeholder="">
                                            </div>

                                        </div>
                                    </div>

                                </div>

                                <div class="row">
                                    <div class="col-xs-6">
                                        <div class="form-group">
                                            <label control-label>Location:</label>
                                            <div class="input-group">
                                                <div class="input-group-addon">
                                                    <i class="fa fa-home"></i>
                                                </div>
                                                <input type="text" name="" class="form-control" id="Clocation"
                                                    placeholder="Enter location .....">
                                            </div>

                                        </div>
                                    </div>
                                    <div class="col-xs-6">
                                        <div class="form-group">
                                            <label control-label>GPS address:</label>
                                            <div class="input-group">
                                                <div class="input-group-addon">
                                                    <i class="fa fa-map-marker"></i>
                                                </div>
                                                <input type="text" name="" class="form-control" id="Clandmark"
                                                    placeholder="">
                                            </div>

                                        </div>
                                    </div>

                                </div>

                                <div class="row">
                                    <div class="col-xs-6">
                                        <div class="form-group">
                                            <label control-label>Telephone:</label>
                                            <div class="input-group">
                                                <div class="input-group-addon">
                                                    <i class="fa fa-phone"></i>
                                                </div>
                                                <input type="text" name="" class="form-control" id="Cphone"
                                                    placeholder="">
                                            </div>

                                        </div>
                                    </div>
                                    <div class="col-xs-6">
                                        <div class="form-group">
                                            <label control-label>Alternative Telephone:</label>
                                            <div class="input-group">
                                                <div class="input-group-addon">
                                                    <i class="fa fa-phone"></i>
                                                </div>
                                                <input type="text" name="" class="form-control" id="Calt_phone"
                                                    placeholder="">
                                            </div>

                                        </div>
                                    </div>

                                </div>



                                <div class="row">

                                    <div class="col-xs-12">
                                        <div class="form-group">
                                            <label control-label>Name Of Relationship officer:</label>
                                            <div class="input-group">
                                                <div class="input-group-addon">
                                                    <i class="fa fa-user"></i>
                                                </div>
                                                <input type="text" name="" class="form-control" id="CArname"
                                                    placeholder="">
                                            </div>

                                        </div>
                                    </div>

                                </div>
                            </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger pull-left" data-dismiss="modal">Close</button>
                        <button type="submit" id="userCBtn" class="btn btn-primary pull-right">Save changes</button>
                    </div>
                    </form>
                </div>
                <!-- /.modal-content -->
            </div>
            <!-- /.modal-dialog -->
        </div>
        <!-- Product Modal -->

        <div class="modal fade" id="customer-info">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span></button>
                        <h4 class="modal-title"></h4>
                    </div>
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-xs-12">
                                <h2 class="page-header">
                                    <i class="fa fa-globe"></i> Ocean Spring, Inc.
                                    <small class="pull-right">Date: (<?php echo date('y-m-d');?>)</small>
                                </h2>
                            </div>
                            <!-- /.col -->
                        </div>
                        <!-- info row -->
                        <!-- <div class="row invoice-info">
                            <div class="col-sm-4 invoice-col">
                                From
                                <address>
                                    <strong>OSD</strong><br>
                                    795 Folsom Ave, Suite 600<br>
                                    San Francisco, CA 94107<br>
                                    Phone: (804) 123-5432<br>
                                    Email: info@almasaeedstudio.com
                                </address>
                            </div>
                           
                            <div class="col-sm-4 invoice-col">
                                To
                                <address>
                                    <strong>Customer</strong><br>
                                    795 Folsom Ave, Suite 600<br>
                                    San Francisco, CA 94107<br>
                                    Phone: (555) 539-1037<br>
                                    Email: john.doe@example.com
                                </address>
                            </div>
                           
                            <div class="col-sm-12 invoice-col">
                                <b>Customer Name #Babatunde</b><br>
                                <br>
                                <b>Customer ID:</b> 4F3S8J<br>
                                <b>Customer Telephone:</b>050684165<br>
                                <b>Account:</b> 968-34567
                            </div>
                          
                        </div> -->
                        <!-- /.row -->

                        <div class="row">
                            <!-- accepted payments column -->
                            <div class="col-xs-6">
                                <p class="lead">Referrals</p>

                                <div class="table-responsive">
                                    <table class="table">
                                        <tr>
                                            <th style="width:50%">Customers Referred:</th>
                                            <td id="referralscount"></td>
                                        </tr>
                                        <tr>
                                            <th>Total Quantity Purchase By Referrals:</th>
                                            <td id="referralspurchased"> </td>
                                        </tr>
                                        <tr>
                                            <th> Unit Reward per referred customer purchase</th>
                                            <td id="">10peswa/Bag</td>
                                        </tr>

                                        <tr>
                                            <th>Total Reward Earned:</th>
                                            <td id="referralReward"></td>
                                        </tr>
                                    </table>
                                </div>
                            </div>
                            <!-- /.col -->
                            <div class="col-xs-6">
                                <p class="lead">Loyalty Scheme(rewards)</p>

                                <div class="table-responsive">
                                    <table class="table">
                                        <tr>
                                            <th style="width:50%">Quantity Purchased:</th>
                                            <td id="qp"></td>
                                        </tr>
                                        <tr>
                                            <th>Rewards per 10 Bags</th>
                                            <td>5% Off</td>
                                        </tr>
                                        <tr>
                                            <th>Total Rewards Earned:</th>
                                            <td id="rewards"></td>
                                        </tr>
                                        <!-- <tr>
                                        <th>Total:</th>
                                        <td>$265.24</td>
                                        </tr> -->
                                    </table>
                                </div>
                            </div>
                            <!-- /.col -->
                        </div>



                        <div class="row">
                            <!-- accepted payments column -->
                            <div class="col-xs-6">
                                <p class="lead">Terms & Conditions Apply:</p>


                                <p class="text-muted well well-sm no-shadow" style="margin-top: 10px;">
                                    Etsy doostang zoodles disqus groupon greplin oooj voxy zoodles, weebly ning heekya
                                    handango imeem plugg
                                    dopplr jibjab, movity jajah plickers sifteo edmodo ifttt zimbra.
                                </p>
                            </div>
                            <!-- /.col -->
                            <div class="col-xs-6">
                                <p class="lead">Rewards Due (<?php echo date('y-m-d');?>)</p>

                                <div class="table-responsive">
                                    <table class="table">
                                        <tr>
                                            <th style="width:50%">Referrals:</th>
                                            <td id="totalreferralReward"></td>
                                        </tr>
                                        <tr>
                                            <th>Loyalty (5%)</th>
                                            <td id="loyaltyrewards"></td>
                                        </tr>
                                        <!-- <tr>
                                            <th>Shipping:</th>
                                            <td>$5.80</td>
                                            </tr>
                                            <tr>
                                            <th>Total:</th>
                                            <td>$265.24</td>
                                            </tr> -->
                                    </table>
                                </div>
                            </div>
                            <!-- /.col -->
                        </div>
                        <!-- /.row -->

                        <!-- this row will not appear when printing -->
                        <div class="row no-print">
                            <div class="col-xs-12">
                                <a href="" target="_blank" class="btn btn-default"><i class="fa fa-print"></i> Print</a>
                                <button type="button" class="btn btn-success pull-right"><i
                                        class="fa fa-credit-card"></i>
                                    Submit Payment
                                </button>
                                <button type="button" class="btn btn-primary pull-right" style="margin-right: 5px;">
                                    <i class="fa fa-download"></i> Generate PDF
                                </button>
                            </div>
                        </div>
                    </div>

                </div>
                <!-- /.modal-content -->
            </div>
            <!-- /.modal-dialog -->
        </div>









    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->