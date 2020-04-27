<!-- Sidebar Menu -->
<ul class="sidebar-menu" data-widget="tree">
    <li class="header">MAIN NAVIGATION</li>
    <!-- Optionally, you can add icons to the links -->
    <li class=""><a href="<?= base_url() ?>admin/dashboard"><i class="fa fa-area-chart"></i> <span>Dashboard</span></a>
    </li>
    <li class="active"><a href="<?= base_url() ?>admin/users"><i class="fa fa-group"></i> <span>Customers</span></a>
    </li>
    <li class=""><a href="<?= base_url() ?>admin/orders"><i class="fa fa-book"></i> <span>Orders</span></a></li>
    <li class=""><a href="<?= base_url() ?>admin/anniversary_orders"><i class="fa fa-book"></i>
            <span>Anniversary</span></a></li>
    <li class=""><a href="<?=base_url()?>admin/authdealer"><i class="fa fa-check-square"></i>
            <span>Authorized
                Dealers
            </span></a>
    <li class=""><a href="<?= base_url() ?>admin/vouchers"><i class="fa fa-barcode"></i> <span>Vouchers</span></a></li>
    <li><a href="<?= base_url() ?>admin/loyalty"><i class="fa fa-credit-card"></i> <span>Loyalty </span></a></li>
    <li class=""><a href="<?= base_url() ?>admin/create_user"><i class="fa fa-book"></i> <span>Create User</span></a>
    </li>
    <!-- <li class=""><a href="<?= base_url() ?>admin/callLogs"><i class="fa fa-phone"></i> <span>Call Logs</span></a></li> -->

    <li class=""><a href="<?= base_url() ?>admin/eod_report"><i class="fa fa-cogs"></i> <span>EOD
                Report</span></a></li>
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
            Customers
            <small>Control panel</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Dashboard</a></li>
            <li class="active">Customers</li>
        </ol>
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="nav-tabs-custom">
            <ul class="nav nav-tabs">
                <li class="active"><a href="#tab_1 " data-toggle="tab">Registered Customers</a></li>
                <li><a href="#tab_2" data-toggle="tab">Users Registered via USSD</a></li>

            </ul>
            <div class="tab-content">

                <div class="tab-pane active" id="tab_1">
                    <zing-grid editor="modal" layout="row" id="customer_table" layout-controls='true' filter sort pager
                        page-size="20" page-size-options="30,40,50,60">
                        <zg-caption>
                            <!-- <i class="fa fa-user"></i> Customer Table -->
                            <a class="btn bg-blue  margin  pull-left" id="reloadCBtn" style="color:white;"><i
                                    class="fa fa-refresh"></i>
                                Reload </a>
                            <a class=" btn bg-purple  margin  pull-right" style="color:white;"
                                onClick="_exportDatasToCSV()"><i class="fa fa-plus"></i>
                                Export </a>
                        </zg-caption>


                        <zg-colgroup>

                            <zg-column index="firstname" header="firstname"></zg-column>
                            <zg-column index="lastname" header="lastname"></zg-column>
                            <zg-column index="msisdn" header="Phone"></zg-column>
                            <zg-column index="location" header="location"></zg-column>
                            <!-- <zg-column index="landmark" header="landmark"></zg-column> -->
                            <zg-column index="cardnumber" header="cardnumber"></zg-column>
                            <zg-column index="zoneid" header="Zone"></zg-column>

                            <!-- <zg-column index="msisdn,id" header="Action" editor="false">
                                <zg-button onclick='customer_info([[index.msisdn]],)'>
                                    <zg-icon name="info"> </zg-icon> <span></span>
                                </zg-button>

                                <zg-button onclick='edit_customer([[index.id]],)'>
                                    <zg-icon name="edit"> </zg-icon> <span></span>
                                </zg-button>

                                <zg-button onclick='delete_customer([[index.id]],)'>
                                    <zg-icon name="close"> </zg-icon> <span></span>
                                </zg-button>




                            </zg-column> -->
                        </zg-colgroup>
                    </zing-grid>
                    <a href="" id="downloadAnchor">&nbsp;</a>
                </div>

                <!-- /.tab-pane -->
                <div class="tab-pane" id="tab_2">
                    <zing-grid editor="modal" layout="row" layout-controls='true' id="ussd-table" filter sort pager
                        page-size="20" page-size-options="20,40,60,80">
                        <zg-caption>
                            <!-- <i class="fa fa-user"></i>  -->
                            <a class="btn bg-blue  margin  pull-left" id="reloadUBtn" style="color:white;"><i
                                    class="fa fa-refresh"></i>
                                Reload </a>
                            <a class=" btn bg-purple  margin  pull-right" style="color:white;"
                                onClick="_exportDataToCSV()"><i class="fa fa-plus"></i>
                                Export </a>
                        </zg-caption>


                        <zg-colgroup>

                            <zg-column index="name" header="Name"></zg-column>
                            <zg-column index="msisdn" header="Phone"></zg-column>
                            <zg-column index="cardnumber" header="cardnumber"></zg-column>
                            <zg-column index="datetime" header="Date"></zg-column>
                            <!-- <zg-column index="id" header="Action" editor="false">

                                <zg-button onclick='edit_user([[index.id]],)'>
                                    <zg-icon name="edit"> </zg-icon> <span></span>
                                </zg-button>
                            </zg-column> -->
                            <!-- <zg-column index="custom" header="Edit Row" editor="false">
                                 <zg-button action="editrecord" class="button button--edit">Edit Record</zg-button>
                           </zg-column> -->

                        </zg-colgroup>
                    </zing-grid>
                    <a href="" id="downloadAnchor">&nbsp;</a>
                </div>

                <!-- /.tab-pane -->
            </div>
            <!-- /.tab-content -->
        </div>



        <div class="modal fade" id="add-user">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span></button>
                        <h4 class="modal-title">Add User</h4>
                    </div>
                    <div class="modal-body">
                        <form role="form" method="post" action="JavaScript:check_ussduser_telephone();"
                            enctype="multipart/form-data" id="userData">
                            <div class="box-body">
                                <input type="text" style="display:none;" class="form-control" id="Eid" placeholder="">
                                <div class="row">
                                    <div class="col-xs-6">
                                        <div class="form-group">
                                            <label control-label>Firstname:</label>
                                            <div class="input-group">
                                                <div class="input-group-addon">
                                                    <i class="fa fa-user"></i>
                                                </div>
                                                <input type="text" name="" class="form-control" id="Efirst"
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
                                                <input type="text" name="" class="form-control" id="Elast"
                                                    placeholder="">
                                            </div>

                                        </div>
                                    </div>

                                </div>
                                <div class="row">
                                    <div class="col-xs-6">
                                        <div class="form-group">
                                            <label control-label>Date of Birth:</label>
                                            <div class="input-group">
                                                <div class="input-group-addon">
                                                    <i class="fa fa-calendar"></i>
                                                </div>
                                                <input type="date" name="" class="form-control" id="Edate"
                                                    placeholder="">
                                            </div>

                                        </div>
                                    </div>
                                    <div class="col-xs-6">
                                        <div class="form-group">
                                            <label control-label>Gender:</label>

                                            <div class="radio">
                                                <label class="inline">
                                                    <input type="radio" name="gender" id="Egender" value="Male">
                                                    Male
                                                </label>
                                            </div>
                                            <div class="radio">
                                                <label class="inline">
                                                    <input type="radio" name="gender" id="Egender" value="Female">
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
                                                <input type="text" name="" class="form-control" id="Elocation"
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
                                                <input type="text" name="" class="form-control" id="Elandmark"
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
                                                <input type="text" name="" class="form-control" id="Ecard"
                                                    placeholder="Enter loyalty number .....">
                                            </div>

                                        </div>
                                    </div>
                                    <div class="col-xs-6">
                                        <div class="form-group">
                                            <label control-label>Type of Home:</label>
                                            <select id="Ehome" name="home" class="form-control select2"
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
                                                <input type="text" name="" class="form-control" id="Ephone"
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
                                                <input type="text" name="" class="form-control" id="Ealt_phone"
                                                    placeholder="">
                                            </div>

                                        </div>
                                    </div>

                                </div>
                                <div class="row">
                                    <div class="col-xs-6">
                                        <div class="form-group">
                                            <label control-label>Preffered Day:</label>
                                            <select id="Eday" name="nationality" class="form-control select2"
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
                                            <label control-label>Preffered time: </label>
                                            <select id="Etime" name="nationality" class="form-control select2"
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
                                                <input type="text" name="" class="form-control" id="EQuantity"
                                                    placeholder="">
                                            </div>

                                        </div>
                                    </div>
                                    <div class="col-xs-6">

                                        <div class="form-group">
                                            <label control-label>Mode of Payment:</label><br />
                                            <label>
                                                <input type="checkbox" class="minimal margin" id="Ecash">
                                                Cash on delivery
                                            </label><br />
                                            <label>
                                                <input type="checkbox" class="minimal margin" id="Ecash">
                                                momo
                                            </label><br />
                                            <label>
                                                <input type="checkbox" class="minimal margin" id="Eother">
                                                other
                                            </label>

                                        </div>


                                    </div>

                                </div>
                                <div class="row">
                                    <div class="col-xs-6">
                                        <div class="form-group">
                                            <label control-label>Request mode:</label><br />
                                            <label>
                                                <input type="checkbox" class="minimal" id="Eauto">
                                                Auto delivery
                                            </label><br />
                                            <label>
                                                <input type="checkbox" class="minimal" id="Ecall">
                                                Call to confirm delivery
                                            </label><br />
                                            <label>
                                                <input type="checkbox" class="minimal" id="Esub">
                                                Monthly Subscription
                                            </label>

                                        </div>
                                    </div>
                                    <div class="col-xs-6">

                                        <div class="form-group">
                                            <label control-label>Frequency on request:</label><br />
                                            <div class="radio">
                                                <label>
                                                    <input type="radio" name="for" id="Efor" value="daily">
                                                    Daily
                                                </label>
                                            </div>
                                            <div class="radio">
                                                <label>
                                                    <input type="radio" name="for" id="Efor" value="weekly">
                                                    Weekly
                                                </label>
                                            </div>

                                            <div class="radio">
                                                <label>
                                                    <input type="radio" name="for" id="Efor" value="other">
                                                    Other
                                                </label>
                                            </div>

                                        </div>


                                    </div>




                                </div>
                                <div class="row">

                                    <div class="col-xs-6">
                                        <div class="form-group">
                                            <label control-label>Name Of Relationship officer:</label>
                                            <div class="input-group">
                                                <div class="input-group-addon">
                                                    <i class="fa fa-user"></i>
                                                </div>
                                                <input type="text" name="" class="form-control" id="EArname"
                                                    placeholder="">
                                            </div>

                                        </div>
                                    </div>

                                </div>
                            </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger pull-left" data-dismiss="modal">Close</button>
                        <button type="submit" id="userEBtn" class="btn btn-primary pull-right">Save changes</button>
                    </div>
                    </form>
                </div>
                <!-- /.modal-content -->
            </div>
            <!-- /.modal-dialog -->
        </div>
        <!-- Product Modal -->




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


        <div class="modal fade" id="customer-info">
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
                                <p>Customer Phone :</p>
                                <p id="ciphone"></p> <br />
                                <p>Quantity Purchased :</p>
                                <p id="qp"></p> <br />
                                <p>Rewards:</p>
                                <p id="reward"></p>
                            </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger pull-left" data-dismiss="modal">Close</button>
                    </div>
                    </form>
                </div>
                <!-- /.modal-content -->
            </div>
            <!-- /.modal-dialog -->
        </div>

    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->