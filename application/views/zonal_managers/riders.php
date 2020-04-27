<ul class="sidebar-menu" data-widget="tree">
    <li class="header">MAIN NAVIGATION</li>
    <!-- Optionally, you can add icons to the links -->
    <li class=""><a href="<?=base_url()?>zonalmanager/dashboard"><i class="fa fa-area-chart"></i>
            <span>Dashboard</span></a></li>
    <li class=""><a href="<?=base_url()?>zonalmanager/users"><i class="fa fa-group"></i> <span>New
                Users</span></a></li>
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
    </li>

    <li class=""><a href="<?=base_url()?>zonalmanager/sea"><i class="fa fa-users"></i> <span>Sales
                Executive Assistants</span></a>
    </li>

    <li class="active"><a href="<?=base_url()?>zonalmanager/riders"><i class="fa fa-motorcycle"></i> <span>Riders
            </span></a>
    </li>


    <li><a href="<?=base_url()?>zonalmanager/loyalty"><i class="fa fa-credit-card"></i> <span>Loyalty</span></a>
    </li>
    <li class=""><a href="<?=base_url()?>zonalmanager/stock"><i class="fa fa-book"></i> <span>Stock</span></a></li>
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
            Riders
            <small>Control panel</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Dashboard</a></li>
            <li class="active">Rider</li>
        </ol>
    </section>

    <!-- Main content -->
    <section class="content">

        <zing-grid editor="modal" layout="row" layout-controls='true' id="ridertable" filter sort pager page-size="10"
            page-size-options="10,20,30,40">
            <zg-caption>
                <i class="fa fa-user"></i> Riders
            </zg-caption>


            <zg-colgroup>

                <zg-column index="id" header="RideID"></zg-column>
                <zg-column index="name" header="Rider Name"></zg-column>
                <zg-column index="msisdn" header="Rider Telephone"></zg-column>
                <zg-column index="dateadded" header="Date Added"></zg-column>
                <!-- <zg-column index="zoneid" header="Zone Assigned To"></zg-column> -->
               
            </zg-colgroup>
        </zing-grid>

    </section>
    <!-- /.content -->
</div>