<ul class="sidebar-menu" data-widget="tree">
    <li class="header">MAIN NAVIGATION</li>
    <!-- Optionally, you can add icons to the links -->
    <li class=""><a href="<?= base_url() ?>callrep/dashboard"><i class="fa fa-area-chart"></i>
            <span>Dashboard</span></a></li>
    <li class=""><a href="<?= base_url() ?>callrep/users"><i class="fa fa-group"></i> <span>New Users</span></a>
    </li>
    <li class=""><a href="<?= base_url() ?>callrep/orders"><i class="fa fa-book"></i> <span>Orders</span></a></li>
    <li class="active"><a href="<?= base_url() ?>callrep/anniversary_orders"><i class="fa fa-book"></i>
            <span>Anniversary</span></a></li>
    <!-- <li class=""><a href="<?=base_url()?>callrep/loyalty"><i class="fa fa-credit-card"></i> <span>Loyalty
                Cards</span></a></li> -->
    <li class=""><a href="<?= base_url() ?>callrep/callLogs"><i class="fa fa-phone"></i> <span>Call Logs</span></a></li>
    <li><a href="<?= base_url() ?>callrep/eod_report"><i class="fa fa-cogs"></i> <span>EOD Report</span></a></li>

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
            <div class="col-xs-8">
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


            <div class="col-xs-4">

                <h4>Pick A Date</h4>
                <div id="calendar"></div>

            </div>


        </div>



    </section>
    <!-- /.content -->
</div>