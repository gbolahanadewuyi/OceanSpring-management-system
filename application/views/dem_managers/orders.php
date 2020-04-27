<ul class="sidebar-menu" data-widget="tree">
    <li class="header">MAIN NAVIGATION</li>
    <!-- Optionally, you can add icons to the links -->
    <li class=""><a href="<?= base_url() ?>dem_manager/dashboard"><i class="fa fa-area-chart"></i> <span>Dashboard</span></a></li>
    <li class="active"><a href="<?= base_url() ?>dem_manager/orders"><i class="fa fa-book"></i> <span>Confirmed Orders</span></a></li>
    <li class=""><a href="<?= base_url() ?>dem_manager/stock"><i class="fa fa-folder-open"></i> <span>Stock</span></a></li>
    <li class=""><a href="<?= base_url() ?>dem_manager/eod_report"><i class="fa fa-cogs"></i> <span>EOD Report</span></a></li>
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
          Confirmed Orders
            <small>Control panel</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Dashbaord</a></li>
            <li class="active">orders</li>
        </ol>
    </section>

    <!-- Main content -->
    <section class="content">
    <zing-grid editor="modal" row-class="_renderClassActivity" layout="row" layout-controls='true' search filter sort pager page-size="20" page-size-options="20,40,60,80">
                        <zg-caption>
                            <a class=" btn bg-purple  margin  pull-right" style="color:white;"  data-toggle="modal" data-target="#order"><i class="fa fa-plus"></i>
                    Take Order </a>
                        </zg-caption>


                        <zg-colgroup>
                            <zg-column index="id" header="Id"></zg-column>
                            <zg-column index="name" header="Name"></zg-column>
                            <zg-column index="msisdn" header="Phone"></zg-column>
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
                                <input type="text" class="form-control" name="church_group" id="mobileOrder" placeholder="" >

                            </div>
                            <div class="form-group">
                                <label class="control-label">Item:</label>
                                <input type="text" class="form-control" name="church_group" id="itemOrder" placeholder="" >

                            </div>
                            <div class="form-group">
                                <label class="control-label">Quantity:</label>
                                <input type="text" class="form-control" name="church_group" id="quantityOrder" placeholder="" >

                            </div>
                            <div class="form-group">
                                <label class="control-label">Datetime:</label>
                                <input type="date" class="form-control" name="church_group" id="dateOrder" placeholder="" >

                            </div>
                           


                                            <div class="form-group">
                                          
                                              <label control-label>Zone:</label>
                                                <select id="zone" name="nationality" class="form-control select2" style="width: 100%;">

                                                    <option selected="selected" value="Default">-- Select time --
                                                    </option>
                                                    <option value="1">North Kaneshie</option>
                                                    <option value="2 ">Laterbiokoshie</option>
                                                    <option value="3">Mamprobi</option>
                                                    <option value="4">Mataheko</option>
                                                    <option value="5">Sakaman</option>
                                                    <option value="6">SSNIT Flats</option>
                                                    <option value="7">Akokofoto</option>
                                                    <option value="8">Exhibition</option>
                                                    <option value="9">Last stop to zodiac</option>
                                                    <option value="10">Odorkor</option>


                                                </select>
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
                            <input type="text" class="form-control" style="display:none;" name="church_group" id="id" placeholder="">
                            <div class="form-group">
                                <label class="control-label">Mobile:</label>
                                <input type="text" class="form-control" name="church_group" id="mobile" placeholder="" disabled>

                            </div>
                            <div class="form-group">
                                <label class="control-label">Item:</label>
                                <input type="text" class="form-control" name="church_group" id="item" placeholder="" >

                            </div>
                            <div class="form-group">
                                <label class="control-label">Quantity:</label>
                                <input type="text" class="form-control" name="church_group" id="quantity" placeholder="" >

                            </div>
                            <div class="form-group">
                                <label class="control-label">Datetime:</label>
                                <input type="text" class="form-control" name="church_group" id="date" placeholder="" disabled>

                            </div>
                            <div class="form-group">
                                <div class="form-group">
                                    <label control-label>Status:</label>
                                    <select id="status" name="home" class="form-control select2" style="width: 100%;">

                                        <option selected="selected" value="">-- Select Status --
                                        </option>
                                         <option value="Pending">Pending</option>
                                        <option value="Confirmed">Confirmed</option>
                                        <option value="Cancelled">Cancelled</option>
                                        
                                    </select>
                                </div>

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