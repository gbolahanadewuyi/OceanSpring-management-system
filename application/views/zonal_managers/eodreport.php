<ul class="sidebar-menu" data-widget="tree">
    <li class="header">MAIN NAVIGATION</li>
    <!-- Optionally, you can add icons to the links -->
    <li class=""><a href="<?=base_url()?>zonalmanager/dashboard"><i class="fa fa-area-chart"></i>
            <span>Dashboard</span></a></li>
    <li class=""><a href="<?=base_url()?>zonalmanager/users"><i class="fa fa-group"></i> <span>New Users</span></a></li>
    <!-- <li class=""><a href="<?=base_url()?>zonalmanager/customer"><i class="fa fa-user"></i> <span>Customers</span></a></li> -->
    <li class=""><a href="<?=base_url()?>zonalmanager/orders"><i class="fa fa-book"></i> <span>Orders</span></a></li>
    <li class=""><a href="<?=base_url()?>zonalmanager/anniversary_orders"><i class="fa fa-book"></i>
            <span>Anniversary</span></a></li>
    <li class=""><a href="<?=base_url()?>zonalmanager/authdealer"><i class="fa fa-check-square"></i>
            <span>Authorized
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
    <li><a href="<?=base_url()?>zonalmanager/loyalty"><i class="fa fa-credit-card"></i> <span>Loyalty Cards</span></a>
    </li>
    <li class=""><a href="<?=base_url()?>zonalmanager/stock"><i class="fa fa-book"></i> <span>Stock</span></a></li>
    <li class="active"><a href="<?=base_url()?>zonalmanager/eod_report"><i class="fa fa-cogs"></i> <span>EOD
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
            EOD Report
            <small>Control panel</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Dashbaord</a></li>
            <li class="active">EOD Report</li>
        </ol>
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="nav-tabs-custom">
            <ul class="nav nav-tabs">
                <li class="active"><a href="#tab_1" data-toggle="tab">Summary</a></li>
                <li class=""><a href="#tab_2" data-toggle="tab">Orders Entered</a></li>
                <li class=""><a href="#tab_3" data-toggle="tab">Customers Entered</a></li>

            </ul>
            <div class="tab-content">

                <div class="tab-pane active" id="tab_1">
                    <div class="row">
                        <div class="col-md-9">
                            <div class="box">
                                <div class="box-header">
                                    <h3 class="box-title">Summary</h3>
                                </div>
                                <!-- /.box-header -->
                                <div class="box-body no-padding">
                                    <table class="table table-striped">
                                        <tr>
                                            <th style="width: 10px">#</th>
                                            <th>Task</th>
                                            <th>Count</th>
                                            <th>Progress</th>
                                            <th style="width: 40px">Label</th>
                                        </tr>
                                        <tr>
                                            <td>1.</td>
                                            <td>Customers Registered</td>
                                            <td><span class="CR badge bg-light-blue">0</span></td>
                                            <td>
                                                <div class="progress progress-xs">
                                                    <div class="progress-bar progress-bar-danger" style="width: 55%">
                                                    </div>
                                                </div>
                                            </td>
                                            <td><span class="badge bg-red CRB">0%</span></td>
                                        </tr>
                                        <tr>
                                            <td>2.</td>
                                            <td>Orders Taken</td>
                                            <td><span class="OT badge bg-light-blue">0</td>
                                            <!-- <td>
                                                <div class="progress progress-xs">
                                                    <div class="progress-bar progress-bar-yellow" style="width: 70%">
                                                    </div>
                                                </div>
                                            </td>
                                            <td><span class="badge bg-yellow ">0%</span></td> -->
                                        </tr>
                                        <tr>
                                            <td>3.</td>
                                            <td>Orders Delivered</td>
                                            <td><span class="OD badge bg-light-blue ">0</td>
                                            <td>
                                                <div class="progress progress-xs progress-striped active">
                                                    <div class="progress-bar progress-bar-primary" style="width: 30%">
                                                    </div>
                                                </div>
                                            </td>
                                            <td><span class="badge bg-light-blue ODB">0%</span></td>
                                        </tr>
                                        <tr>
                                            <td>4.</td>
                                            <td>Orders Pending</td>
                                            <td><span class="OP badge bg-light-blue">0</td>
                                            <!-- <td>
                                                <div class="progress progress-xs progress-striped active">
                                                    <div class="progress-bar progress-bar-success" style="width: 90%">
                                                    </div>
                                                </div>
                                            </td>
                                            <td><span class="badge bg-green ">0%</span></td> -->
                                        </tr>
                                        <tr>
                                            <td>5.</td>
                                            <td>Total Quantity Ordered</td>
                                            <td><span class="TQO badge bg-light-blue">0</td>
                                            <!-- <td>
                                                <div class="progress progress-xs progress-striped active">
                                                    <div class="progress-bar progress-bar-success" style="width: 90%">
                                                    </div>
                                                </div>
                                            </td>
                                            <td><span class="badge bg-green ">0%</span></td> -->
                                        </tr>
                                        <tr>
                                            <td>6.</td>
                                            <td>Total Quantity Delivered</td>
                                            <td><span class="TQD badge bg-light-blue">0</td>
                                            <!-- <td>
                                                <div class="progress progress-xs progress-striped active">
                                                    <div class="progress-bar progress-bar-success" style="width: 90%">
                                                    </div>
                                                </div>
                                            </td>
                                            <td><span class="badge bg-green ">0%</span></td> -->
                                        </tr>
                                        <tr>
                                            <td>7.</td>
                                            <td>Total Stock Recieved</td>
                                            <td><span class="TS  badge bg-light-blue">0</td>
                                            <!-- <td>
                                                <div class="progress progress-xs progress-striped active">
                                                    <div class="progress-bar progress-bar-success" style="width: 90%">
                                                    </div>
                                                </div>
                                            </td>
                                            <td><span class="badge bg-green ">0%</span></td> -->
                                        </tr>
                                        <tr>
                                            <td>8.</td>
                                            <td>Stock Dispatched</td>
                                            <td><span class="SD badge bg-light-blue">0</td>
                                            <!-- <td>
                                                <div class="progress progress-xs progress-striped active">
                                                    <div class="progress-bar progress-bar-success" style="width: 90%">
                                                    </div>
                                                </div>
                                            </td>
                                            <td><span class="badge bg-green ">0%</span></td> -->
                                        </tr>
                                        <tr>
                                            <td>9.</td>
                                            <td>Damages</td>
                                            <td><span class="SDA badge bg-light-blue">0</td>
                                            <!-- <td>
                                                <div class="progress progress-xs progress-striped active">
                                                    <div class="progress-bar progress-bar-success" style="width: 90%">
                                                    </div>
                                                </div>
                                            </td>
                                            <td><span class="badge bg-green ">0%</span></td> -->
                                        </tr>
                                        <!-- <tr>
                                            <td>10.</td>
                                            <td> Rebagged</td>
                                            <td><span class="SR badge bg-light-blue">0</td>
                                            <td>
                                                <div class="progress progress-xs progress-striped active">
                                                    <div class="progress-bar progress-bar-success" style="width: 90%">
                                                    </div>
                                                </div>
                                            </td>
                                            <td><span class="badge bg-green ">0%</span></td>
                                        </tr> -->
                                    </table>
                                </div>
                                <!-- /.box-body -->
                            </div>
                        </div>



                        <div class="col-xs-3">
                            <div id="summary-calendar"></div>
                        </div>

                    </div>

                </div>





                <div class="tab-pane" id="tab_2">

                    <div class="row">
                        <div class="col-md-9">
                            <zing-grid editor="modal" layout="row" layout-controls='true' search filter sort pager
                                page-size="5" page-size-options="5,10,15,20">
                                <zg-caption>
                                    <!-- <i class="fa fa-book"></i> Order Table -->
                                    <a class="btn bg-blue  margin  pull-left" id="reloadOBtn" style="color:white;"><i
                                            class="fa fa-refresh"></i>
                                        Reload </a>
                                    <a class=" btn bg-purple  margin  pull-right" style="color:white;"
                                        onClick="_exportDataToCSV()"><i class="fa fa-plus"></i>
                                        Export </a>
                                </zg-caption>


                                <zg-colgroup>
                                    <zg-column index="msisdn" header="Customer Contact" foot-cell="count"></zg-column>
                                    <zg-column index="item" header="Item"></zg-column>
                                    <zg-column index="quantity" header="Quantity" foot-cell="sum"></zg-column>
                                    <zg-column index="status" header="Status"></zg-column>

                                    <!-- <zg-column index="status" header="Status" renderer="renderActivityType"></zg-column>
                            <zg-column index="id" header="Action" editor="false">

                                <zg-button onclick='edit_order([[index.id]],)'>
                                    <zg-icon name="edit"> </zg-icon> <span></span>
                                </zg-button>
                            </zg-column> -->
                                    <!-- <zg-column index="custom" header="Edit Row" editor="false">
                                 <zg-button action="editrecord" class="button button--edit">Edit Record</zg-button>
                           < /zg-column> -->

                                </zg-colgroup>
                            </zing-grid>

                        </div>


                        <div class="col-xs-3">
                            <div id="calendar"></div>

                        </div>
                    </div>





                    <div id="order-count"></div>
                    <div id="orders-count"></div>


                </div>

                <!-- /.tab-pane -->
                <div class="tab-pane" id="tab_3">
                    <div class="row">
                        <div class="col-xs-9">


                            <zing-grid editor="modal" id="customer_table" layout="row" layout-controls='true' search
                                filter sort pager page-size="5" page-size-options="5,10,15,20">
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
                                    <zg-column index="msisdn" header="Customer Contact" foot-cell="count"></zg-column>
                                    <zg-column index="firstname" header="Firstname"></zg-column>
                                    <zg-column index="lastname" header="Lastname"></zg-column>
                                    <zg-column index="location" header="location"></zg-column>
                                    <!-- <zg-column index="status" header="Status" renderer="renderActivityType"></zg-column>
                                         <zg-column index="id" header="Action" editor="false">

                                        <zg-button onclick='edit_order([[index.id]],)'>
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


                        <div class="col-xs-3">
                            <div id="calendar2"></div>

                        </div>
                    </div>

                    <div id="customer-count"></div>
                    <div id="customers-count"></div>


                </div>

                <!-- /.tab-pane -->
            </div>
            <!-- /.tab-content -->
        </div>

        <!-- <div class="row">
            <div class="col-xs-6">
                <zing-grid editor="modal" layout="row" layout-controls='true' search filter sort pager page-size="5"
                    page-size-options="5,10,15,20">
                    <zg-caption>
                        <i class="fa fa-book"></i> Order Table
                        <a class=" btn bg-purple  margin  pull-right" style="color:white;"
                            onClick="_exportDataToCSV()"><i class="fa fa-plus"></i>
                            Export </a>
                    </zg-caption>


                    <zg-colgroup>
                        <zg-column index="msisdn" header="Customer Contact"></zg-column>
                        <zg-column index="item" header="Item"></zg-column>
                        <zg-column index="quantity" header="Quantity"></zg-column>
                        <zg-column index="status" header="Status"></zg-column> -->

        <!-- <zg-column index="status" header="Status" renderer="renderActivityType"></zg-column>
                            <zg-column index="id" header="Action" editor="false">

                                <zg-button onclick='edit_order([[index.id]],)'>
                                    <zg-icon name="edit"> </zg-icon> <span></span>
                                </zg-button>
                            </zg-column> -->
        <!-- <zg-column index="custom" header="Edit Row" editor="false">
                                 <zg-button action="editrecord" class="button button--edit">Edit Record</zg-button>
                           < /zg-column> -->
        <!--
                    </zg-colgroup>
                </zing-grid>

            </div> -->
        <!-- <div class="col-xs-6">
                <zing-grid editor="modal" id="customer_table" layout="row" layout-controls='true' search filter sort
                    pager page-size="5" page-size-options="5,10,15,20">
                    <zg-caption>
                        <i class="fa fa-user"></i> Customer Table
                        <a class=" btn bg-purple  margin  pull-right" style="color:white;"
                            onClick="_exportDatasToCSV()"><i class="fa fa-plus"></i>
                            Export </a>

                    </zg-caption>

                    <zg-colgroup>
                        <zg-column index="msisdn" header="Customer Contact"></zg-column>
                        <zg-column index="firstname" header="Firstname"></zg-column>
                        <zg-column index="lastname" header="Lastname"></zg-column>
                        <zg-column index="location" header="location"></zg-column> -->
        <!-- <zg-column index="status" header="Status" renderer="renderActivityType"></zg-column>
                            <zg-column index="id" header="Action" editor="false">

                                <zg-button onclick='edit_order([[index.id]],)'>
                                    <zg-icon name="edit"> </zg-icon> <span></span>
                                </zg-button>
                            </zg-column> -->
        <!-- <zg-column index="custom" header="Edit Row" editor="false">
                                 <zg-button action="editrecord" class="button button--edit">Edit Record</zg-button>
                           < /zg-column> -->

        <!-- </zg-colgroup>
                </zing-grid>
                <a href="" id="downloadAnchor">&nbsp;</a>
            </div>
        </div>



        <div class="margin" id="donut-example"></div> -->










        <input type="text" style="display:none" id="customerscount">

        <input type="text" style="display:none" id="orderscount">

        <input type="text" style="display:none" id="orderssDeliverredcount">


    </section>
    <!-- /.content -->
</div>