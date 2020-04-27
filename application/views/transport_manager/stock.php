<ul class="sidebar-menu" data-widget="tree">
    <li class="header">MAIN NAVIGATION</li>
    <!-- Optionally, you can add icons to the links -->
    <li class=""><a href="<?= base_url() ?>transportmanager/dashboard"><i class="fa fa-area-chart"></i>
            <span>Dashboard</span></a></li>
    <li class="active"><a href="<?=base_url()?>transportmanager/stock"><i class="fa fa-book"></i> <span>Stock
            </span></a></li>
    <li class=""><a href="<?=base_url()?>transportmanager/truck_drivers"><i class="fa fa-truck"></i>
            <span>Trucks/Drivers
            </span></a></li>
    <li><a href="<?= base_url() ?>transportmanager/eod_report"><i class="fa fa-cogs"></i> <span>EOD Report</span></a>
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
        <div class="nav-tabs-custom">
            <ul class="nav nav-tabs">
                <!-- <li class="active"><a href="" data-toggle="tab">Track Activity</a></li> -->
                <li class="active"><a href="#tab_1" data-toggle="tab">Record Stock Produced</a></li>
                <li><a href="#tab_2" data-toggle="tab">Dispatch Stock</a></li>

            </ul>
            <div class="tab-content">
                <div class="tab-pane " id="tab">
                    <zing-grid editor="modal" layout="row" layout-controls='true' filter sort pager page-size="20"
                        page-size-options="20,40,60,80">
                        <zg-caption>
                            <a class=" btn bg-purple  margin  pull-right" style="color:white;"
                                onClick="_exportDataToCSV()"><i class="fa fa-plus"></i>
                                Export </a>
                        </zg-caption>


                        <zg-colgroup>

                            <zg-column index="date" header="Date"></zg-column>
                            <!-- <zg-column index="name" header="Name"></zg-column> -->
                            <zg-column index="description" header="Description"></zg-column>
                            <zg-column index="quantity" header="Quantity"></zg-column>
                            <!-- <zg-column index="zoneid" header="Zone"></zg-column> -->




                        </zg-colgroup>
                    </zing-grid>
                    <a href="" id="downloadAnchor">&nbsp;</a>
                </div>
                <!-- /.tab-pane -->


                <div class="tab-pane active" id="tab_1">
                    <div class="box box-primary">
                        <form role="form" method="POST" action="JavaScript:keep_stock();" id="stockform">

                            <div class="form-group">
                                <label control-label>Date:</label>
                                <div class="input-group">
                                    <div class="input-group-addon">
                                        <i class="fa fa-calendar"></i>
                                    </div>
                                    <input type="date" name="" class="form-control" id="date" placeholder="" required>
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
                                <label control-label>Quantity Produced:</label>
                                <div class="input-group">
                                    <div class="input-group-addon">
                                        <i class="fa fa-bookmark-o"></i>
                                    </div>
                                    <input type="text" name="" class="form-control" id="quantity" placeholder=""
                                        required>
                                </div>

                            </div>


                    </div>
                    <div class="box-footer">

                        <button type="button" class="btn btn-danger pull-left" data-dismiss="modal">Close</button>
                        <button type="submit" id="stockBTN" class="btn btn-primary pull-right">Save</button>
                    </div>
                    </form>
                </div>

                <div class="tab-pane" id="tab_2">
                    <div class="box box-primary">

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
                                    <input type="text" name="" class="form-control" id="d-quantity" placeholder=""
                                        required>
                                </div>

                            </div>

                            <div class="form-group">
                                <label control-label>Dispatch Type:</label>
                                <select id="Dtype" name="" class="form-control select2" style="width: 100%;"
                                    onchange="showinput(this);">


                                    <option selected="selected" value="">-- Select Dispatch Type --
                                    </option>
                                    <option value="DAMAGES">Damages
                                    <option value="Depot">Depot Dispatch
                                    </option>

                                </select>

                            </div>

                            <div class="form-group" id='zone'>
                                <label control-label>Recieving Dem:</label>
                                <select id="depot" name="" class="form-control select2" style="width: 100%;">

                                    <option selected="selected" value="">-- Select Dem --
                                    </option>

                                </select>

                            </div>

                            <div class="form-group" id='rider'>
                                <label control-label>Truck Driver Name:</label>
                                <div class="input-group">
                                    <div class="input-group-addon">
                                        <i class="fa fa-drivers-license"></i>
                                    </div>
                                    <input type="text" name="" class="form-control" id="RRname" placeholder="">
                                </div>

                            </div>
                            <div class="form-group" id='vnumber'>
                                <label control-label>Truck number:</label>
                                <div class="input-group">
                                    <div class="input-group-addon">
                                        <i class="fa fa-car"></i>
                                    </div>
                                    <input type="text" name="" class="form-control" id="RVno" placeholder="">
                                </div>

                            </div>
                            <div class="form-group" id='time'>
                                <label control-label>Time dispatched:</label>
                                <div class="input-group">
                                    <div class="input-group-addon">
                                        <i class="fa fa-clock-o"></i>
                                    </div>
                                    <input type="date" name="" class="form-control" id="Tdispatch" placeholder=""
                                        required>
                                </div>

                            </div>


                    </div>
                    <div class="box-footer">
                        <button type="button" class="btn btn-danger pull-left" data-dismiss="modal">Close</button>
                        <button type="submit" id="dstockBtn" class="btn btn-primary pull-right">Save</button>
                    </div>
                    </form>
                </div>
            </div>

            <!-- /.tab-pane -->
        </div>

































        <!-- <div class="box box-primary">
            <div class="box-header">
                <a class="box-title btn bg-purple  margin btn-lg pull-left" style="color:white;" id="addproduct"
                    data-toggle="modal" data-target="#stock"><i class="fa fa-plus"></i>
                    New Stock </a>

                <a class="box-title btn bg-blue  margin btn-lg " style="color:white; margin-left:20px;" id="addproduct"
                    data-toggle="modal" data-target="#dispatch-stock"><i class="fa fa-plus"></i>
                    Dispatch Stock</a>

            </div>

            <div class="box-body">
                <div id="graph"></div>
                <input type="text" style="display:none" value="<?php echo $totalstock ?>" id="val1">
                <input type="text" style="display:none" value="<?php echo $t_stockToday ?>" id="val2">
            </div>

        </div> -->








    </section>
    <!-- /.content -->
</div>