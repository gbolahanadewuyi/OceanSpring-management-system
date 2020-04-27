<ul class="sidebar-menu" data-widget="tree">
    <li class="header">MAIN NAVIGATION</li>
    <!-- Optionally, you can add icons to the links -->
    <li class=""><a href="<?=base_url()?>call_manager/dashboard"><i class="fa fa-area-chart"></i>
            <span>Dashboard</span></a></li>
    <li class=""><a href="<?=base_url()?>call_manager/users"><i class="fa fa-group"></i> <span>New Users</span></a></li>
    <!-- <li class=""><a href="<?=base_url()?>call_manager/customer"><i class="fa fa-user"></i> <span>Customers</span></a></li> -->
    <li class="active"><a href="<?=base_url()?>call_manager/orders"><i class="fa fa-book"></i> <span>Orders</span></a>
    </li>
    <!-- <li class=""><a href="<?=base_url()?>call_manager/vouchers"><i class="fa fa-barcode"></i> <span>Vouchers</span></a></li> -->
    <li class=""><a href="<?=base_url()?>call_manager/anniversary_orders"><i class="fa fa-book"></i>
            <span>Anniversary</span></a></li>
    <li class=""><a href="<?=base_url()?>call_manager/loyalty"><i class="fa fa-credit-card"></i> <span>Loyalty
                Cards</span></a></li>
    <li class=""><a href="<?=base_url()?>call_manager/callreps"><i class="fa fa-user-secret"></i> <span>Call
                Reps</span></a></li>
    <li class=""><a href="<?=base_url()?>call_manager/stock"><i class="fa fa-book"></i> <span>Stock
            </span></a></li>
    <li class=""><a href="<?=base_url()?>call_manager/callLogs"><i class="fa fa-phone"></i> <span>Call Logs</span></a>
    </li>
    <li><a href="<?=base_url()?>call_manager/eod_report"><i class="fa fa-cogs"></i> <span>EOD Report</span></a></li>
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
            ORDERS
            <small>Control panel</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Dashbaord</a></li>
            <li class="active">orders</li>
        </ol>
    </section>

    <!-- Main content -->
    <section class="content">
        <zing-grid editor="modal" row-class="_renderClassActivity" context-menu="customMenu" layout="row" layout-controls='true' filter sort pager
            page-size="20" page-size-options="20,40,60,80">
            <zg-caption>
                <a class=" btn bg-purple  margin  pull-right" style="color:white;" data-toggle="modal"
                    data-target="#order"><i class="fa fa-plus"></i>
                    Take Order </a>

                <a class=" btn bg-purple  margin  pull-right" style="color:white;" onClick="_exportDataToCSV()"><i
                        class="fa fa-plus"></i>
                    Export </a>
            </zg-caption>


            <zg-colgroup>

              
                <zg-column index="msisdn" header="Phone"></zg-column>
                <!-- <zg-column index="name" header="Name"></zg-column> -->
                <zg-column index="item" header="Item"></zg-column>
                <zg-column index="quantity" header="Quantity"></zg-column>
                <zg-column index="datetime" header="Date"></zg-column>
                <zg-column index="status" header="Status" renderer="renderActivityType"></zg-column>
                <zg-column index="assigned" header="Rep Assigned To"></zg-column>
                <zg-column index="id" header="Action" editor="false">
                    <zg-button onclick='caseDetails([[index.id]])'>
                        <zg-icon name="edit"> </zg-icon> <span></span>
                    </zg-button>

                </zg-column>
                <!-- <zg-column index="custom" header="Edit Row" editor="false">
                                 <zg-button action="editrecord" class="button button--edit">Edit Record</zg-button>
                           < /zg-column> -->

            </zg-colgroup>
            <zg-menu id="customMenu">
                <zg-menu-item role="exportSelection">Export Selection</zg-menu-item>
            </zg-menu>
        </zing-grid>

        <a href="" id="downloadAnchor">&nbsp;</a>



        <div class="modal fade" id="order">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span></button>
                        <h4 class="modal-title">Make Order</h4>
                    </div>
                    <div class="modal-body">
                        <form role="form" method="POST" action="JavaScript:make_Order();" id="makeOrder">

                            <div class="form-group">
                                <label class="control-label">Mobile:</label>
                                <input type="text" class="form-control" name="church_group" id="mobileOrder"
                                    placeholder="Example 0244444444">

                            </div>
                            <div class="form-group">
                                <label class="control-label">Item:</label>
                                <input type="text" class="form-control" name="church_group" id="itemOrder"
                                    placeholder="">

                            </div>
                            <div class="form-group">
                                <label class="control-label">Quantity:</label>
                                <input type="text" class="form-control" name="church_group" id="quantityOrder"
                                    placeholder="">

                            </div>
                            <div class="form-group">
                                <label class="control-label">Date:</label>
                                <input type="date" class="form-control" name="church_group" id="dateOrder"
                                    placeholder="">

                            </div>





                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger pull-left" data-dismiss="modal">Close</button>
                        <button type="submit" id="btnSaveOrder" class="showBTN btn btn-primary">Save changes</button>
                        </form>
                    </div>
                </div>
                <!-- /.modal-content -->
            </div>
            <!-- /.modal-dialog -->
        </div>

        <div class="modal fade" id="edit_order">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span></button>
                        <h4 class="modal-title">Edit Order</h4>
                    </div>
                    <div class="modal-body">
                        <form role="form" method="POST" action="JavaScript:update_order();" id="editOrder">
                            <input type="text" class="form-control" style="display:none;" name="church_group" id="id"
                                placeholder="">
                            <div class="form-group">
                                <label class="control-label">Mobile:</label>
                                <input type="text" class="form-control" name="church_group" id="mobile" placeholder=""
                                    disabled>

                            </div>
                            <div class="form-group">
                                <label class="control-label">Item:</label>
                                <input type="text" class="form-control" name="church_group" id="item" placeholder="">

                            </div>
                            <div class="form-group">
                                <label class="control-label">Quantity:</label>
                                <input type="text" class="form-control" name="church_group" id="quantity"
                                    placeholder="">

                            </div>
                            <div class="form-group">
                                <label class="control-label">Date:</label>
                                <input type="text" class="form-control" name="church_group" id="date" placeholder="">

                            </div>

                            <div class="form-group">
                                <label control-label>Status:</label>
                                <select id="statusupdate" name="home" class="form-control select2" style="width: 100%;">


                                    <option value="Confirmed">Confirmed</option>
                                    <option value="Dispatched">Dispatched</option>
                                    <option value="Delivered">Delivered</option>
                                    <option value="Pending">Pending</option>

                                </select>
                            </div>


                            <div class="form-group">
                                <label control-label>Assign To Rep:</label>
                                <input type="text" class="form-control" name="church_group" id="Repid" placeholder="">
                            </div>



                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger pull-left" data-dismiss="modal">Close</button>
                        <button type="submit" id="btnSave" class="showBTN btn btn-primary">Save changes</button>
                        </form>
                    </div>
                </div>
                <!-- /.modal-content -->
            </div>
            <!-- /.modal-dialog -->
        </div>
        <!-- /.modal -->




    </section>
    <!-- /.content -->
</div>