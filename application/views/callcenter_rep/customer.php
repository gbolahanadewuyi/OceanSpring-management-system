<ul class="sidebar-menu" data-widget="tree">
    <li class="header">MAIN NAVIGATION</li>
    <li class=""><a href="<?= base_url() ?>callrep/dashboard"><i class="fa fa-area-chart"></i> <span>Dashboard</span></a></li>
    <li class=""><a href="<?= base_url() ?>callrep/users"><i class="fa fa-group"></i> <span>New Users</span></a></li>
    <li class="active"><a href="<?= base_url() ?>callrep/customer"><i class="fa fa-user"></i> <span>Customers</span></a></li>
    <li class=""><a href="<?= base_url() ?>callrep/orders"><i class="fa fa-book"></i> <span>Orders</span></a></li>
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
            Customer
            <small>Control panel</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Dashbaord</a></li>
            <li class="active">customer</li>
        </ol>
    </section>

    <!-- Main content -->
    <section class="content">

        <zing-grid editor="modal" layout="row" layout-controls='true' search filter sort pager page-size="20" page-size-options="30,40,50,60">
            <zg-caption>
                <i class="fa fa-user"></i> Customer Table
            </zg-caption>


            <zg-colgroup>
                <zg-column index="id" header="ID"></zg-column>
                <zg-column index="firstname" header="firstname"></zg-column>
                <zg-column index="lastname" header="lastname"></zg-column>
                <zg-column index="msisdn" header="Phone"></zg-column>
                <zg-column index="location" header="location"></zg-column>
                <zg-column index="landmark" header="landmark"></zg-column>
                <zg-column index="cardnumber" header="cardnumber">
                </zg-column>
                <!-- <zg-column index="id" header="Action" editor="false">

                    <zg-button onclick='edit_user([[index.id]],)'>
                        <zg-icon name="edit"> </zg-icon> <span></span>
                    </zg-button>
                </zg-column> -->
                <!-- <zg-column index="custom" header="Edit Row" editor="false">
                    <zg-button action="editrecord" class="button button--edit"></zg-button>
                </zg-column> -->

            </zg-colgroup>
        </zing-grid>

        <!-- /.box-body -->



        <div class="modal fade" id="bulk-upload">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span></button>
                        <h4 class="modal-title">Bulk upload</h4>
                    </div>
                    <div class="modal-body">
                        <form role="form" method="" action="">
                            <div class="form-group">
                                <label for="control-label">Upload Members</label><br />
                                <small style="color:red;">Please upload your voucher data in these file
                                    formats: .csv</small>
                                <input type="file" class="form-control" id="bulk_membership_upload" aria-describedby="bulk_membership_uploadHelp" accept='application/xlsx'>
                                <progress value="0" max="100" id="uploader" style="display:none">0%</progress>
                                <span id="img-res" class="text-danger" style="display:none">
                            </div>
                        </form>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger pull-left" data-dismiss="modal">Close</button>
                        <button type="button" class="btn btn-primary">Save </button>
                    </div>
                </div>
                <!-- /.modal-content -->
            </div>
            <!-- /.modal-dialog -->
        </div>
        <!-- /.modal -->

        <div class="modal fade" id="edit_customer">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span></button>
                        <h4 class="modal-title">Edit Customer</h4>
                    </div>
                    <div class="modal-body">
                        <form role="form" method="POST" action="JavaScript:update_Customer();" id="customerForm">
                            <!-- <input type="text" class="form-control" style="display:none;" name="church_group" id="id" placeholder=""> -->
                            <div class="form-group">
                                <label class="control-label">ID:</label>
                                <input type="text" class="form-control" name="customerNumber" id="id" placeholder="" required>

                            </div>

                            <div class="form-group">
                                <label class="control-label"Firstname:</label>
                                <input type="text" class="form-control" name="feedback" id="cFirst" placeholder="" required>

                            </div>
                            <div class="form-group">
                                <label class="control-label">Lastname:</label>
                                <input type="text" class="form-control" name="operatorName" id="cLast" placeholder="" required>

                            </div>
                            <div class="form-group">
                                <label class="control-label">Telephone:</label>
                                <input type="text" class="form-control" name="operatorName" id="cMobile" placeholder="" required>

                            </div>

                            <div class="form-group">
                                <label class="control-label">Location:</label>
                                <input type="text" class="form-control" name="operatorNum" id="cusLocation" placeholder="" required>

                            </div>

                            <div class="form-group">
                                <label class="control-label">Landmark:</label>
                                <input type="text" class="form-control" name="operatorNum" id="cusADD" placeholder="" required>

                            </div>
                            
                            <div class="form-group">
                                <label class="control-label">Cardnumber:</label>
                                <input type="text" class="form-control" name="operatorNum" id="card" placeholder="" required>

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