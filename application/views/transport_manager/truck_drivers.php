<ul class="sidebar-menu" data-widget="tree">
    <li class="header">MAIN NAVIGATION</li>
    <!-- Optionally, you can add icons to the links -->
    <li class=""><a href="<?= base_url() ?>transportmanager/dashboard"><i class="fa fa-area-chart"></i>
            <span>Dashboard</span></a></li>
    <li class=""><a href="<?=base_url()?>transportmanager/stock"><i class="fa fa-book"></i> <span>Stock
            </span></a></li>
    <li class="active"><a href="<?=base_url()?>transportmanager/truck_drivers"><i class="fa fa-truck"></i>
            <span>Trucks/Drivers
            </span></a></li>
    <li class=""><a href="<?= base_url() ?>transportmanager/eod_report"><i class="fa fa-cogs"></i> <span>EOD
                Report</span></a>
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
            Drivers
            <small>Control panel</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Dashboard</a></li>
            <li class="active">Drivers</li>
        </ol>
    </section>

    <!-- Main content -->
    <section class="content">
        <zing-grid editor="modal" layout="row" layout-controls='true' id="ridertable" filter sort pager page-size="10"
            page-size-options="10,20,30,40">
            <zg-caption>
                <!-- <i class="fa fa-user"></i> Riders -->
                <a class="btn bg-blue  margin  pull-left" id="reloadRiderBTN" style="color:white;"><i
                        class="fa fa-refresh"></i>
                    Reload </a>
                <a class=" btn bg-purple  margin  pull-right" style="color:white;" data-toggle="modal"
                    data-target="#ridermodal"><i class="fa fa-plus"></i>
                    Create Driver </a>
            </zg-caption>


            <zg-colgroup>

                <zg-column index="id" header="RideID"></zg-column>
                <zg-column index="name" header="Rider Name"></zg-column>
                <zg-column index="msisdn" header="Rider Telephone"></zg-column>
                <zg-column index="dateadded" header="Date Added"></zg-column>
                <zg-column index="zoneid" header="Zone Assigned To"></zg-column>
                <zg-column index="id" header="Action" editor="false">

                    <zg-button onclick='edit_rider([[index.id]])'>
                        <zg-icon name="edit"> </zg-icon> <span></span>
                    </zg-button>

                </zg-column>



            </zg-colgroup>
        </zing-grid>



        <div class="modal fade" id="ridermodal">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span></button>
                        <h4 class="modal-title">Edit Driver Details</h4>
                    </div>
                    <div class="modal-body">
                        <form role="form" method="POST" action="JavaScript:add_rider();" id="riderform">

                            <div class="form-group">
                                <label class="control-label">Name of Driver:</label>
                                <input type="text" class="form-control" name="church_group" id="nRider" placeholder="">

                            </div>

                            <div class="form-group">
                                <label class="control-label">Driver Mobile :</label>
                                <input type="text" class="form-control" name="church_group" id="nMobile" placeholder="">

                            </div>


                            <div class="modal-footer">
                                <button type="button" class="btn btn-danger pull-left"
                                    data-dismiss="modal">Close</button>
                                <button type="submit" id="btnRider" class="showBTN btn btn-primary">Save
                                    changes</button>
                            </div>
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