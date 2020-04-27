<ul class="sidebar-menu" data-widget="tree">
    <li class="header">MAIN NAVIGATION</li>
    <!-- Optionally, you can add icons to the links -->
    <li class=""><a href="<?=base_url()?>admin/dashboard"><i class="fa fa-area-chart"></i> <span>Dashboard</span></a>
    </li>
    <li class=""><a href="<?=base_url()?>admin/users"><i class="fa fa-group"></i> <span>Customers</span></a></li>

    <li class=""><a href="<?=base_url()?>admin/orders"><i class="fa fa-book"></i> <span>Orders</span></a></li>
    <li class=""><a href="<?=base_url()?>admin/anniversary_orders"><i class="fa fa-book"></i>
            <span>Anniversary</span></a></li>
    <li class=""><a href="<?=base_url()?>admin/authdealer"><i class="fa fa-check-square"></i>
            <span>Authorized
                Dealers
            </span></a>
    <li class=""><a href="<?=base_url()?>admin/vouchers"><i class="fa fa-barcode"></i> <span>Vouchers</span></a></li>
    <li><a href="<?=base_url()?>admin/loyalty"><i class="fa fa-credit-card"></i> <span>Loyalty </span></a></li>
    <li class=""><a href="<?=base_url()?>admin/create_user"><i class="fa fa-book"></i> <span>Create User</span></a>
    </li>
    <!-- <li class=""><a href="<?=base_url()?>admin/callLogs"><i class="fa fa-phone"></i> <span>Call Logs</span></a></li> -->

    <li class="active"><a href="<?=base_url()?>admin/eod_report"><i class="fa fa-cogs"></i> <span>EOD
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
                <li class="active"><a href="#tab_1" data-toggle="tab">Call Reps</a></li>
                <li class=""><a href="#tab_2" data-toggle="tab">Zonal Managers</a></li>
                <li><a href="#tab_3" data-toggle="tab">Dem Managers</a></li>

            </ul>
            <div class="tab-content">
                <div class="tab-pane active" id="tab_1">

                    <div class="row">
                        <div class="col-xs-9">
                            <!-- <zing-grid caption="EOD Report" pager page-size="10" viewport-stop>

                                <zg-colgroup>
                                    <zg-column type="custom" header="">
                                        <div class="header">
                                            <div class="default  default--arrow">
                                                <span class="arrow">⌃</span>
                                            </div>
                                            <div class="team--info">[[index.name]] </div>
                                        </div>
                                        <div class="expandable">
                                            <p><strong>Orders:</strong> [[index.TotalOrders]]</p>
                                            <p><strong>Quantity:</strong> [[index.TotalQuantity]]</p>

                                        </div>
                                    </zg-column>
                                </zg-colgroup>
                            </zing-grid> -->
                            <zing-grid caption="Expandable Rows" pager page-size="10" viewport-stop>
                                <zg-source>
                                    <p>Source: <a href="https://github.com/jokecamp/FootballData"
                                            target="_blank">https://github.com/jokecamp/FootballData</a>
                                    </p>
                                </zg-source>
                                <zg-data>
                                    <zg-param name="src"
                                        value="https://storage.googleapis.com/zinggrid-pwa.appspot.com/2016-fa-cup.json">
                                    </zg-param>
                                    <zg-param name="recordPath" value="sheets.Teams"></zg-param>
                                </zg-data>
                                <zg-colgroup>
                                    <zg-column type="custom" header="2016 FA Cup Details">
                                        <div class="header">
                                            <div class="default  default--arrow">
                                                <span class="arrow">⌃</span>
                                            </div>
                                            <div class="team--info">[[record.Team]] Group ([[record.Group]])</div>
                                        </div>
                                        <div class="expandable">
                                            <p><strong>Rank:</strong> [[record.FIFA ranking]]</p>
                                            <p><strong>Coach:</strong> [[record.Coach]]</p>
                                            <p><strong>Bio:</strong> [[record.Bio]]</p>
                                            <p><strong>Strengths:</strong> [[record.strengths]]</p>
                                            <p><strong>Weaknesses:</strong> [[record.weaknesses]]</p>
                                        </div>
                                    </zg-column>
                                </zg-colgroup>
                            </zing-grid>
                            <a href="" id="downloadAnchor">&nbsp;</a>

                        </div>

                        <div class="col-xs-3">
                            <div id="calendar"></div>
                        </div>



                        <!-- <div id="donut-example"></div> -->

                    </div>




                </div>


                <div class="tab-pane " id="tab_2">

                    <div class='row'>
                        <div class='col-xs-9'>
                            <zing-grid editor="modal" id="order_table" layout="row" layout-controls='true' filter sort
                                pager page-size="5" page-size-options="5,10,15,20">
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
                                        onClick="_exportDataToCSV()"><i class="fa fa-plus"></i>
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