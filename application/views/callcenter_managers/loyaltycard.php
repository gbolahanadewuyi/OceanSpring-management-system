<ul class="sidebar-menu" data-widget="tree">
    <li class="header">MAIN NAVIGATION</li>
    <!-- Optionally, you can add icons to the links -->
    <li class=""><a href="<?= base_url() ?>call_manager/dashboard"><i class="fa fa-area-chart"></i>
            <span>Dashboard</span></a></li>
    <li class=""><a href="<?= base_url() ?>call_manager/users"><i class="fa fa-group"></i> <span>New Users</span></a>
    </li>
    <!-- <li class=""><a href="<?= base_url() ?>call_manager/customer"><i class="fa fa-user"></i> <span>Customers</span></a></li> -->
    <li class=""><a href="<?= base_url() ?>call_manager/orders"><i class="fa fa-book"></i> <span>Orders</span></a></li>
    <li class=""><a href="<?= base_url() ?>call_manager/anniversary_orders"><i class="fa fa-book"></i>
            <span>Anniversary</span></a></li>
    <li class="active"><a href="<?=base_url()?>call_manager/loyalty"><i class="fa fa-credit-card"></i> <span>Loyalty
                Cards</span></a></li>
    <li class=""><a href="<?=base_url()?>call_manager/callreps"><i class="fa fa-user-secret"></i> <span>Call
                Reps</span></a> </li>
    <li class=""><a href="<?=base_url()?>call_manager/stock"><i class="fa fa-book"></i> <span>Stock
            </span></a></li>
    <li class=""><a href="<?= base_url() ?>call_manager/callLogs"><i class="fa fa-phone"></i> <span>Call Logs</span></a>
    </li>
    <li><a href="<?= base_url() ?>call_manager/eod_report"><i class="fa fa-cogs"></i> <span>EOD Report</span></a></li>
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
            Loyalty Card
            <small>Control panel</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Dashbaord</a></li>
            <li class="active">loyalty cards</li>
        </ol>
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="box box-primary">
            <div class="box-header">
                <a class="box-title btn bg-purple  margin btn-lg pull-left" style="color:white;" id="addproduct" data-toggle="modal" data-target="#loyalty"><i class="fa fa-plus"></i>
                    Generate </a>

                <a class="box-title btn bg-blue  margin btn-lg " style="color:white; margin-left:20px;" id="addproduct" data-toggle="modal" data-target="#loyaltyCard"><i class="fa fa-plus"></i>
                    Assign Card Number</a>
                <!-- <h3 class="box-title">Data Table With Full Features</h3> -->
            </div>
            <!-- /.box-header -->
            <div class="box-body">
                <div id="graph"></div>
                <input type="text" style="display:none" value="<?php echo $used ?>" id="val1">
                <input type="text" style="display:none" value="<?php echo $unused ?>" id="val2">
            </div>
            <!-- /.box-body -->
        </div>

        <div class="modal fade" id="loyalty">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span></button>
                        <h4 class="modal-title">Generate Loyalty Card</h4>
                    </div>
                    <div class="modal-body">
                        <form role="form" method="POST" action="JavaScript:church_groupy_name_post();" id="churchgroup">
                            <div class="form-group">

                                <label class="control-label">Start:</label>
                                <input type="text" class="form-control" name="church_group" id="church_group" placeholder="" required>

                            </div>

                            <div class="form-group">
                                <label class="control-label">End:</label>
                                <input type="text" class="form-control" name="" id="" placeholder="" required>

                            </div>

                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger pull-left" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Generate</button>
                        </form>
                    </div>
                </div>
                <!-- /.modal-content -->
            </div>
            <!-- /.modal-dialog -->
        </div>
        <!-- /.modal -->
        <div class="modal fade" id="loyaltyCard">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span></button>
                        <h4 class="modal-title">Verify Loyalty Card</h4>
                    </div>
                    <div class="modal-body">
                        <form role="form" method="POST" action="JavaScript:verifyCard();" id="verCard">
                            <div class="form-group">
                                <label control-label>Cardnumber:</label>
                                <div class="input-group">
                                    <div class="input-group-addon">
                                        <i class="fa fa-credit-card"></i>
                                    </div>
                                    <input type="text" name="" class="form-control" id="card" placeholder="Enter credit card number ....." required>
                                </div>

                            </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger pull-left" data-dismiss="modal">Close</button>
                        <button type="submit" id="verCBtn" class="btn btn-primary">Verify</button>
                        </form>
                    </div>
                </div>
                <!-- /.modal-content -->
            </div>
            <!-- /.modal-dialog -->
        </div>
        <div class="modal fade" id="customer">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span></button>
                        <h4 class="modal-title">Verify Customer Telephone</h4>
                    </div>
                    <div class="modal-body">
                        <form role="form" method="POST" action="JavaScript:verifyTelephone();" id="verCNform">
                            <div class="form-group">
                                <label control-label>Customer Telephone:</label>
                                <div class="input-group">
                                    <div class="input-group-addon">
                                        <i class="fa fa-phone"></i>
                                    </div>
                                    <input type="text" name="" class="form-control" id="mobile" placeholder="Enter customer telephone " required>
                                </div>

                            </div>




                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger pull-left" data-dismiss="modal">Close</button>
                        <button type="submit" id="vercnBtn" class="btn btn-primary">Verify</button>
                        </form>
                    </div>
                </div>
                <!-- /.modal-content -->
            </div>
            <!-- /.modal-dialog -->
        </div>
        <div class="modal fade" id="assign">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span></button>
                        <h4 class="modal-title">Assign loyalty Card </h4>
                    </div>
                    <div class="modal-body">
                        <form role="form" method="POST" action="JavaScript:assignCN();" id="assignCNForm">
                            <input type="text" name="" style="display:none;" class="form-control" id="cid" placeholder="" required>

                            <div class="form-group">
                                <label control-label>Customer Telephone:</label>
                                <div class="input-group">
                                    <div class="input-group-addon">
                                        <i class="fa fa-phone"></i>
                                    </div>
                                    <input type="text" name="" class="form-control" id="telephone" placeholder="" disabled>
                                </div>

                            </div>
                            <div class="form-group">
                                <label control-label>Customer Name:</label>
                                <div class="input-group">
                                    <div class="input-group-addon">
                                        <i class="fa fa-phone"></i>
                                    </div>
                                    <input type="text" name="" class="form-control" id="name" placeholder="" disabled>
                                </div>

                            </div>
                            <div class="form-group">
                                <label control-label>Location:</label>
                                <div class="input-group">
                                    <div class="input-group-addon">
                                        <i class="fa fa-map-marker"></i>
                                    </div>
                                    <input type="text" name="" class="form-control" id="location" placeholder="" >
                                </div>

                            </div>
                            <div class="form-group">
                                <label control-label>Card Number:</label>
                                <div class="input-group">
                                    <div class="input-group-addon">
                                        <i class="fa fa-credit-card"></i>
                                    </div>
                                    <input type="text" name="" class="form-control" id="customercard" placeholder="" required>
                                </div>

                            </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger pull-left" data-dismiss="modal">Close</button>
                        <button type="submit" id="asignBTN" class="btn btn-primary">Assign</button>
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