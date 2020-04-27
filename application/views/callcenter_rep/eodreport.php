<ul class="sidebar-menu" data-widget="tree">
    <li class="header">MAIN NAVIGATION</li>
    <!-- Optionally, you can add icons to the links -->
    <li class=""><a href="<?= base_url() ?>callrep/dashboard"><i class="fa fa-area-chart"></i>
            <span>Dashboard</span></a></li>
    <li class=""><a href="<?= base_url() ?>callrep/users"><i class="fa fa-group"></i> <span>New Users</span></a></li>
    <li class=""><a href="<?= base_url() ?>callrep/orders"><i class="fa fa-book"></i> <span>Orders</span></a></li>
    <li class=""><a href="<?= base_url() ?>callrep/anniversary_orders"><i class="fa fa-book"></i>
            <span>Anniversary</span></a></li>
    <li class=""><a href="<?= base_url() ?>callrep/callLogs"><i class="fa fa-phone"></i> <span>Call Logs</span></a></li>
    <li class="active"><a href="<?= base_url() ?>callrep/eod_report"><i class="fa fa-cogs"></i> <span>EOD
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
                <li class="active"><a href="#tab_1" data-toggle="tab">Calls</a></li>
                <li class=""><a href="#tab_2" data-toggle="tab">Orders</a></li>
                <li><a href="#tab_3" data-toggle="tab">Customers Registered</a></li>

            </ul>
            <div class="tab-content">
                <div class="tab-pane active" id="tab_1">

                    <div class="row">
                        <div class="col-xs-9">
                            <zing-grid editor="modal" layout="row" id='calls_table' layout-controls='true' filter sort
                                pager page-size="10" page-size-options="10,20,30,40">
                                <zg-caption>
                                    <a class="btn bg-blue  margin  pull-left" id="reloadCallBtn" style="color:white;"><i
                                            class="fa fa-refresh"></i>
                                        Reload </a>
                                    <a class=" btn bg-purple  margin  pull-right" style="color:white;"
                                        onClick="_exportDataaToCSV()"><i class="fa fa-plus"></i>
                                        Export </a>
                                </zg-caption>


                                <zg-colgroup>
                                    <zg-column index="dateofcall" header="Date of Call" sort-desc="true"></zg-column>
                                    <zg-column index="customerNumber" header="Customer Telephone"></zg-column>
                                    <zg-column index="purpose" header="Purpose Of Call"></zg-column>
                                    <zg-column index="feedback" header="Call Response"></zg-column>
                                    <!-- <zg-column index="comments" header="Customer Comment"></zg-column> -->
                                    <zg-column index="operator" header="Personnel Name"></zg-column>
                                    <zg-column index="operatorNumber" header="Call Line"></zg-column>

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

                        <div class="col-xs-3">
                            <div id="calls-calendar"></div>
                        </div>



                        <!-- <div id="donut-example"></div> -->

                    </div>




                </div>


                <div class="tab-pane " id="tab_2">

                    <div class='row'>
                        <div class='col-xs-9'>
                            <zing-grid editor="modal" layout="row" id="order-table" layout-controls='true' filter sort pager
                                page-size="10" page-size-options="10,20,30,40">
                                <zg-caption>
                                    <!-- <i class="fa fa-book"></i> Orders -->
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
                            <a href="" id="downloadAnchor">&nbsp;</a>


                        </div>
                        <div class='col-xs-3'>
                            <div id="order-calendar"></div>
                        </div>


                        <!-- <div id="order-example"></div> -->
                    </div>










                </div>

                <!-- /.tab-pane -->
                <div class="tab-pane" id="tab_3">
                    <div class="row">

                        <div class="col-xs-9">

                            <zing-grid editor="modal" id="customer_table" layout="row" layout-controls='true' filter
                                sort pager page-size="5" page-size-options="5,10,15,20">
                                <zg-caption>
                                    <!-- <i class="fa fa-user"></i> Customer Table -->
                                    <a class="btn bg-blue  margin  pull-left" id="reloadCUBtn" style="color:white;"><i
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
                                            < /zg-column> -->

                                </zg-colgroup>
                            </zing-grid>
                            <a href="" id="downloadAnchor">&nbsp;</a>

                        </div>
                        <div class="col-xs-3">
                            <div id="customer-calendar"></div>
                        </div>
                        <!-- <div id="customer-example"></div> -->
                    </div>


                </div>

                <!-- /.tab-pane -->
            </div>
            <!-- /.tab-content -->
        </div>

    </section>
    <!-- /.content -->
</div>