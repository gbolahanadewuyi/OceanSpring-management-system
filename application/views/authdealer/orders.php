<!-- Sidebar Menu -->
<ul class="sidebar-menu" data-widget="tree">
    <li class="header">MAIN NAVIGATION</li>
    <!-- Optionally, you can add icons to the links -->
    <li class=""><a href="<?= base_url() ?>authdealer/dashboard"><i class="fa fa-area-chart"></i>
            <span>Dashboard</span></a></li>
    <li class="active"><a href="<?= base_url() ?>authdealer/orders"><i class="fa fa-book"></i> <span>Orders</span></a>
    </li>
    <li class=""><a href="<?=base_url()?>authdealer/stock"><i class="fa fa-book"></i> <span>Stock
            </span></a></li>

    <li><a href="<?= base_url() ?>authdealer/eod_report"><i class="fa fa-cogs"></i> <span>EOD Report</span></a></li>
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


        <div class="nav-tabs-custom">
            <ul class="nav nav-tabs">
                <li class="active"><a href="#tab_1" data-toggle="tab">Orders</a></li>
                <li><a href="#tab_2" data-toggle="tab">Add Order</a></li>

            </ul>
            <div class="tab-content">
                <div class="tab-pane active" id="tab_1">
                    <zing-grid editor="modal" row-class="_renderClassActivity" layout="row" layout-controls='true'
                        search filter sort pager page-size="20" page-size-options="20,40,60,80">
                        <zg-caption>
                            <a class=" btn bg-purple  margin  pull-right" style="color:white;" data-toggle="modal"
                                data-target="#order"><i class="fa fa-plus"></i>
                                Export </a>
                        </zg-caption>


                        <zg-colgroup>


                            <zg-column index="msisdn" header="Phone"></zg-column>
                            <!-- <zg-column index="name" header="Name"></zg-column> -->
                            <zg-column index="item" header="Item"></zg-column>
                            <zg-column index="quantity" header="Quantity"></zg-column>
                            <zg-column index="datetime" header="Date"></zg-column>
                            <zg-column index="status" header="Status" renderer="renderActivityType"></zg-column>
                            <zg-column index="id" header="Action" editor="false">

                                <zg-button onclick='edit_order([[index.id]],)'>
                                    <zg-icon name="edit"> </zg-icon> <span></span>
                                </zg-button>
                            </zg-column>
                            <!-- <zg-column index="custom" header="Edit Row" editor="false">
                                 <zg-button action="editrecord" class="button button--edit">Edit Record</zg-button>
                           < /zg-column> -->

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

                        <form role="form" method="POST" action="JavaScript:make_Order();" id="makeOrder">
                            <div class="box-body">
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


<!-- 
                                <div class="form-group">

                                    <label control-label>Status:</label>
                                    <select id="status" name="nationality" class="form-control select2"
                                        style="width: 100%;">

                                        <option selected="selected" value="Pending">-- Select Status --
                                        </option>
                                        <option value="Confirmed">Confirmed</option>
                                        <option value="Dispatched">Dispatched</option>
                                        <option value="Delivered">Delivered</option>





                                    </select>
                                </div> -->
                            </div>

                    </div>
                    <div class="box-footer">
                        <button type="button" class="btn btn-danger pull-left" data-dismiss="modal">Close</button>
                        <button type="submit" id="btnSaveOrder" class=" btn btn-primary pull-right">Save
                            changes</button>
                    </div>
                    </form>
                </div>
            </div>

            <!-- /.tab-pane -->
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
                                <input type="text" class="form-control" name="church_group" id="date" placeholder=""
                                    disabled>

                            </div>

                            <div class="form-group">
                                <label control-label>Status:</label>
                                <select id="statusupdate" name="home" class="form-control select2" style="width: 100%;">

                                    <option selected="selected" value="">-- Select Status --
                                    </option>
                                    <option value="Confirmed">Confirmed</option>
                                    <option value="Dispatched">Dispatched</option>
                                    <option value="Delivered">Delivered</option>
                                    <option value="Pending">Pending</option>

                                </select>
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
    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->