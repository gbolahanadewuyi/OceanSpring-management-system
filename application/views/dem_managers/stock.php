<ul class="sidebar-menu" data-widget="tree">
    <li class="header">MAIN NAVIGATION</li>
    <!-- Optionally, you can add icons to the links -->
    <li class=""><a href="<?= base_url() ?>dem_manager/dashboard"><i class="fa fa-area-chart"></i> <span>Dashboard</span></a></li>
    <li class=""><a href="<?= base_url() ?>dem_manager/orders"><i class="fa fa-book"></i> <span>Confirmed Orders</span></a></li>
    <li class="active"><a href="<?= base_url() ?>dem_manager/stock"><i class="fa fa-folder-open"></i> <span>Stock</span></a></li>
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
            Stock
            <small>Control panel</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Dashbaord</a></li>
            <li class="active">stock</li>
        </ol>
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="box box-primary">
            <div class="box-header">
                <a class="box-title btn bg-purple  margin btn-lg pull-left" style="color:white;" id="addproduct" data-toggle="modal" data-target="#stock"><i class="fa fa-plus"></i>
                    New Stock </a>

                <a class="box-title btn bg-blue  margin btn-lg " style="color:white; margin-left:20px;" id="addproduct" data-toggle="modal" data-target="#dispatch-stock"><i class="fa fa-plus"></i>
                    Dispatch Stock</a>
                <!-- <h3 class="box-title">Data Table With Full Features</h3> -->
            </div>
            <!-- /.box-header -->
            <div class="box-body">
                <div id="graph"></div>
                <input type="text" style="display:none" value="<?php echo $totalstock ?>" id="val1">
                <input type="text" style="display:none" value="<?php echo $t_stockToday ?>" id="val2">
            </div>
            <!-- /.box-body -->
        </div>

        <div class="modal fade" id="stock">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span></button>
                        <h4 class="modal-title">Keep stock record </h4>
                    </div>
                    <div class="modal-body">
                        <form role="form" method="POST" action="JavaScript:keep_stock();" id="stockform">

                            <div class="form-group">
                                <label control-label>Stock date:</label>
                                <div class="input-group">
                                    <div class="input-group-addon">
                                        <i class="fa fa-calendar"></i>
                                    </div>
                                    <input type="text" name="" class="form-control" id="date" placeholder="" required>
                                </div>

                            </div>
                            <div class="form-group">
                                <label control-label>Item:</label>
                                <div class="input-group">
                                    <div class="input-group-addon">
                                        <i class="fa fa-shopping-cart"></i>
                                    </div>
                                    <input type="text" name="" class="form-control" id="item" placeholder="" required>
                                </div>

                            </div>
                            <div class="form-group">
                                <label control-label>Quantity:</label>
                                <div class="input-group">
                                    <div class="input-group-addon">
                                        <i class="fa fa-bookmark-o"></i>
                                    </div>
                                    <input type="text" name="" class="form-control" id="quantity" placeholder="" required>
                                </div>

                            </div>
                            <div class="form-group">
                                <label control-label>Waybill number:</label>
                                <div class="input-group">
                                    <div class="input-group-addon">
                                        <i class="fa fa-phone"></i>
                                    </div>
                                    <input type="text" name="" class="form-control" id="wbnum" placeholder="" required>
                                </div>

                            </div>
                            <div class="form-group">
                                <label control-label>Name of delivery driver:</label>
                                <div class="input-group">
                                    <div class="input-group-addon">
                                        <i class="fa fa-drivers-license"></i>
                                    </div>
                                    <input type="text" name="" class="form-control" id="drivername" placeholder="" required>
                                </div>

                            </div>
                            <div class="form-group">
                                <label control-label>Delivery vehicle number:</label>
                                <div class="input-group">
                                    <div class="input-group-addon">
                                        <i class="fa fa-car"></i>
                                    </div>
                                    <input type="text" name="" class="form-control" id="vechileno" placeholder="" required>
                                </div>

                            </div>
                            <div class="form-group">
                                <label control-label>Recieved by:</label>
                                <div class="input-group">
                                    <div class="input-group-addon">
                                        <i class="fa fa-user-secret"></i>
                                    </div>
                                    <input type="text" name="" class="form-control" id="recievedby" placeholder="" required>
                                </div>

                            </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger pull-left" data-dismiss="modal">Close</button>
                        <button type="submit" id="stockBTN" class="btn btn-primary">Save</button>
                        </form>
                    </div>
                </div>
                <!-- /.modal-content -->
            </div>
            <!-- /.modal-dialog -->
        </div>
        <!-- /.modal -->
        <div class="modal fade" id="dispatch-stock">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span></button>
                        <h4 class="modal-title">Dispatch stock</h4>
                    </div>
                    <div class="modal-body">
                        <form role="form" method="POST" action="JavaScript:checkSTOCK();" id="d-stockform">
                            <div class="form-group">
                                <label control-label>Item:</label>
                                <div class="input-group">
                                    <div class="input-group-addon">
                                        <i class="fa fa-shopping-cart"></i>
                                    </div>
                                    <input type="text" name="" class="form-control" id="d-item" placeholder="" required>
                                </div>

                            </div>
                            <div class="form-group">
                                <label control-label>Quantity:</label>
                                <div class="input-group">
                                    <div class="input-group-addon">
                                        <i class="fa fa-bookmark-o"></i>
                                    </div>
                                    <input type="text" name="" class="form-control" id="d-quantity" placeholder="" required>
                                </div>

                            </div>
                            <div class="form-group">
                                <label control-label>Recieving riders name:</label>
                                <div class="input-group">
                                    <div class="input-group-addon">
                                        <i class="fa fa-drivers-license"></i>
                                    </div>
                                    <input type="text" name="" class="form-control" id="RRname" placeholder="" required>
                                </div>

                            </div>
                            <div class="form-group">
                                <label control-label>Receiving vehicle number:</label>
                                <div class="input-group">
                                    <div class="input-group-addon">
                                        <i class="fa fa-car"></i>
                                    </div>
                                    <input type="text" name="" class="form-control" id="RVno" placeholder="" required>
                                </div>

                            </div>
                            <div class="form-group">
                                <label control-label>Time dispatched:</label>
                                <div class="input-group">
                                    <div class="input-group-addon">
                                        <i class="fa fa-clock-o"></i>
                                    </div>
                                    <input type="date" name="" class="form-control" id="Tdispatch" placeholder="" required>
                                </div>

                            </div>
                            <div class="form-group">
                                <label control-label>Dispatched by:</label>
                                <div class="input-group">
                                    <div class="input-group-addon">
                                        <i class="fa fa-user-agent"></i>
                                    </div>
                                    <input type="text" name="" class="form-control" id="dispatchBy" placeholder="" required>
                                </div>

                            </div>
                    </div>


                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger pull-left" data-dismiss="modal">Close</button>
                        <button type="submit" id="dstockBtn" class="btn btn-primary">Save</button>
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