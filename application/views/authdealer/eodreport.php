<ul class="sidebar-menu" data-widget="tree">
    <li class="header">MAIN NAVIGATION</li>
    <!-- Optionally, you can add icons to the links -->
    <li class=""><a href="<?= base_url() ?>authdealer/dashboard"><i class="fa fa-area-chart"></i>
            <span>Dashboard</span></a></li>
    <li class=""><a href="<?= base_url() ?>authdealer/orders"><i class="fa fa-book"></i> <span>Orders</span></a>
    </li>
    <li class=""><a href="<?=base_url()?>authdealer/stock"><i class="fa fa-book"></i> <span>Stock
            </span></a></li>

    <li class="active"><a href="<?= base_url() ?>authdealer/eod_report"><i class="fa fa-cogs"></i> <span>EOD Report</span></a></li>
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
                <li class="active"><a href="#tab_1" data-toggle="tab">Orders </a></li>
                <li class=""><a href="#tab_2" data-toggle="tab">Stock</a></li>

            </ul>
            <div class="tab-content">

                <div class="tab-pane active" id="tab_1">

                    <div class="row">
                        <div class="col-xs-9">
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
                <div class="tab-pane" id="tab">
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