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
    <li class="active"><a href="<?=base_url()?>zonalmanager/arrows"><i class="fa fa-user-secret"></i> <span>Relationship
                Officer</span></a>
    </li>
    <li class=""><a href="<?=base_url()?>zonalmanager/sea"><i class="fa fa-users"></i> <span>Sales
                Executive Assistants</span></a>
    </li>
    <li class=""><a href="<?=base_url()?>zonalmanager/riders"><i class="fa fa-motorcycle"></i> <span>Riders
            </span></a>
    </li>
    <li><a href="<?=base_url()?>zonalmanager/loyalty"><i class="fa fa-credit-card"></i> <span>Loyalty Cards</span></a>
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
            Relationship Officer
            <small>Control panel</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Dashboard</a></li>
            <li class="active">R O</li>
        </ol>
    </section>

    <!-- Main content -->
    <section class="content">

        <div class="nav-tabs-custom">
            <ul class="nav nav-tabs">
                <li class="active"><a href="#tab_1" data-toggle="tab">RO's</a></li>
                <li><a href="#tab_2" data-toggle="tab">Add RO</a></li>

            </ul>
            <div class="tab-content">
                <div class="tab-pane active" id="tab_1">

                    <zing-grid editor="modal" layout="row" layout-controls='true' search filter sort pager
                        page-size="10" page-size-options="10,20,30,40">
                        <zg-caption>
                            <i class="fa fa-user"></i> Relational Officer's Table
                            <a class=" btn bg-purple  margin  pull-right" style="color:white;"
                                onClick="_exportDataToCSV()"><i class="fa fa-plus"></i>
                                Export </a>
                        </zg-caption>


                        <zg-colgroup>

                            <zg-column index="name" header="Name"></zg-column>
                            <zg-column index="msisdn" header="Telephone"></zg-column>
                            <zg-column index="email" type="email" header="Email"></zg-column>
                            <zg-column index="username" header="Username"></zg-column>
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

                        <form role="form" method="post" action="javaScript:add_RO();" enctype="multipart/form-data"
                            id="callrep-form">
                            <div class="box-body">


                                <div class="row">
                                    <div class="col-xs-6">
                                        <div class="form-group">
                                            <label control-label>Name:</label>
                                            <div class="input-group">
                                                <div class="input-group-addon">
                                                    <i class="fa fa-phone"></i>
                                                </div>
                                                <input type="text" name="" class="form-control" id="crname"
                                                    placeholder="" required>
                                            </div>

                                        </div>
                                    </div>
                                    <div class="col-xs-6">
                                        <div class="form-group">
                                            <label control-label>Phone:</label>
                                            <div class="input-group">
                                                <div class="input-group-addon">
                                                    <i class="fa fa-envelope"></i>
                                                </div>
                                                <input type="text" name="" class="form-control" id="crphone"
                                                    placeholder="" required>
                                            </div>

                                        </div>
                                    </div>

                                </div>
                                <div class="row">
                                    <div class="col-xs-6">
                                        <div class="form-group">
                                            <label control-label>Email:</label>
                                            <div class="input-group">
                                                <div class="input-group-addon">
                                                    <i class="fa fa-user-secret"></i>
                                                </div>
                                                <input type="email" name="" class="form-control" id="cremail"
                                                    placeholder="">
                                            </div>

                                        </div>
                                    </div>
                                    <div class="col-xs-6">
                                        <div class="form-group">
                                            <label control-label>Username:</label>
                                            <div class="input-group">
                                                <div class="input-group-addon">
                                                    <i class="fa fa-user-secret"></i>
                                                </div>
                                                <input type="text" name="" class="form-control" id="crusername"
                                                    placeholder="" required>
                                            </div>

                                        </div>
                                    </div>

                                </div>



                            </div>
                            <div class="box-footer">
                                <!-- <button type="button" class="btn btn-danger pull-left"
                                    data-dismiss="modal">Close</button> -->
                                <button type="submit" id="crBtn" class="btn btn-primary pull-right">Save
                                    changes</button>
                            </div>
                        </form>
                    </div>
                </div>

                <!-- /.tab-pane -->
            </div>
            <!-- /.tab-content -->
        </div>

    </section>
    <!-- /.content -->
</div>