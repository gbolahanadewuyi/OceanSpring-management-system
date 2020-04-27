<ul class="sidebar-menu" data-widget="tree">
    <li class="header">MAIN NAVIGATION</li>
    <!-- Optionally, you can add icons to the links -->
    <li class=""><a href="<?= base_url() ?>transportmanager/dashboard"><i class="fa fa-area-chart"></i>
            <span>Dashboard</span></a></li>
    <li class=""><a href="<?=base_url()?>transportmanager/stock"><i class="fa fa-book"></i> <span>Stock
            </span></a></li>
    <li class=""><a href="<?=base_url()?>transportmanager/truck_drivers"><i class="fa fa-truck"></i>
            <span>Trucks/Drivers
            </span></a></li>
    <li class="active"><a href="<?= base_url() ?>transportmanager/eod_report"><i class="fa fa-cogs"></i> <span>EOD
                Report</span></a>
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
                                <!-- <th>Progress</th>
                                            <th style="width: 40px">Label</th> -->
                            </tr>
                            <tr>
                                <td>1.</td>
                                <td>Stock Produced</td>
                                <td><span class="OT badge bg-light-blue ">0</span></td>
                                <!-- <td>
                                                <div class="progress progress-xs">
                                                    <div class="progress-bar progress-bar-danger" style="width: 55%">
                                                    </div>
                                                </div>
                                            </td>
                                            <td><span class="badge bg-red ">55%</span></td> -->
                            </tr>
                            <tr>
                                <td>2.</td>
                                <td>Stock Dispatched</td>
                                <td><span class="OD badge bg-light-blue ">0</span></td>
                                <!-- <td>
                                                <div class="progress progress-xs">
                                                    <div class="progress-bar progress-bar-yellow" style="width: 70%">
                                                    </div>
                                                </div>
                                            </td>
                                            <td><span class="badge bg-yellow ">70%</span></td> -->
                            </tr>
                            <tr>
                                <td>3.</td>
                                <td>Stock Damaged</td>
                                <td><span class="OP badge bg-light-blue ">0</span></td>
                                <!-- <td>
                                                <div class="progress progress-xs progress-striped active">
                                                    <div class="progress-bar progress-bar-primary" style="width: 30%">
                                                    </div>
                                                </div>
                                            </td>
                                            <td><span class="badge bg-light-blue ">0%</span></td> -->
                            </tr>
                            <!-- <tr>
                                <td>4.</td>
                                <td>Stock Rebagged</td>
                                <td><span class="CM badge bg-light-blue ">0</span></td>
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

            <div class="col-md-3">
                <div id="summary-calendar"></div>
            </div>
        </div>



    </section>
    <!-- /.content -->
</div>