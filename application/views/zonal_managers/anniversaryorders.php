<ul class="sidebar-menu" data-widget="tree">
    <li class="header">MAIN NAVIGATION</li>
    <!-- Optionally, you can add icons to the links -->
    <li class=""><a href="<?= base_url() ?>zonalmanager/dashboard"><i class="fa fa-area-chart"></i>
            <span>Dashboard</span></a></li>
    <li class=""><a href="<?= base_url() ?>zonalmanager/users"><i class="fa fa-group"></i> <span>New Users</span></a>
    </li>
    <!-- <li class=""><a href="<?= base_url() ?>zonalmanager/customer"><i class="fa fa-user"></i> <span>Customers</span></a></li> -->
    <li class=""><a href="<?= base_url() ?>zonalmanager/orders"><i class="fa fa-book"></i> <span>Orders</span></a></li>
    <li class="active"><a href="<?= base_url() ?>zonalmanager/anniversary_orders"><i class="fa fa-book"></i>
            <span>Anniversary</span></a></li>
    <li class=""><a href="<?=base_url()?>zonalmanager/authdealer"><i class="fa fa-check-square"></i> <span>Authorized
                Dealers
            </span></a>
    <li class=""><a href="<?=base_url()?>zonalmanager/arrows"><i class="fa fa-user-secret"></i> <span>Relationship
                Officers</span></a>
    <li class=""><a href="<?=base_url()?>zonalmanager/sea"><i class="fa fa-users"></i> <span>Sales
                Executive Assistants</span></a>
    </li>
    <li class=""><a href="<?=base_url()?>zonalmanager/riders"><i class="fa fa-motorcycle"></i> <span>Riders
            </span></a>
    </li>
    <li><a href="<?= base_url() ?>zonalmanager/loyalty"><i class="fa fa-credit-card"></i> <span>Loyalty Cards</span></a>
    </li>
    <li class=""><a href="<?= base_url() ?>zonalmanager/stock"><i class="fa fa-book"></i> <span>Stock</span></a></li>
    <li><a href="<?= base_url() ?>zonalmanager/eod_report"><i class="fa fa-cogs"></i> <span>EOD Report</span></a></li>
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
            Anniversary Dates
            <small>Control panel</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Dashbaord</a></li>
            <li class="active">Anniversary</li>
        </ol>
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-md-8">
                <zing-grid editor="modal" layout="row" layout-controls='true' search filter sort pager page-size="20"
                    page-size-options="20,40,60,80">
                    <zg-caption>
                        <a class=" btn bg-purple  margin  pull-right" style="color:white;"
                            onClick="_exportDataToCSV()"><i class="fa fa-plus"></i>
                            Export </a>
                    </zg-caption>


                    <zg-colgroup>
                        <zg-column index="msisdn" header="Customer Contact"></zg-column>
                        <zg-column index="item" header="Item"></zg-column>
                        <zg-column index="quantity" header="Quantity"></zg-column>
                        <!-- <zg-column index="zoneid" header="Zone"></zg-column> -->

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
                <a href="" id="downloadAnchor">&nbsp;</a>
            </div>


            <div class="col-md-4">
                <h4>Pick a date</h4>
                <div id="calendar"></div>

            </div>


        </div>



    </section>
    <!-- /.content -->
</div>