<ul class="sidebar-menu" data-widget="tree">
    <li class="header">MAIN NAVIGATION</li>
    <li class=""><a href="<?= base_url() ?>admin/dashboard"><i class="fa fa-area-chart"></i> <span>Dashboard</span></a>
    </li>
    <li class=""><a href="<?= base_url() ?>admin/users"><i class="fa fa-group"></i> <span>Customers</span></a>
    </li>
    <li class=""><a href="<?= base_url() ?>admin/orders"><i class="fa fa-book"></i> <span>Orders</span></a></li>
    <li class=""><a href="<?= base_url() ?>admin/anniversary_orders"><i class="fa fa-book"></i>
            <span>Anniversary</span></a></li>
    <li class=""><a href="<?=base_url()?>admin/authdealer"><i class="fa fa-check-square"></i>
            <span>Authorized
                Dealers
            </span></a>
    <li class="active"><a href="<?= base_url() ?>admin/vouchers"><i class="fa fa-barcode"></i> <span>Vouchers</span></a>
    </li>
    <li><a href="<?= base_url() ?>admin/loyalty"><i class="fa fa-credit-card"></i> <span>Loyalty Cards</span></a></li>
    <li class=""><a href="<?= base_url() ?>admin/create_user"><i class="fa fa-book"></i> <span>Create User</span></a>
    </li>
    <!-- <li class=""><a href="<?= base_url() ?>admin/callLogs"><i class="fa fa-phone"></i> <span>Call Logs</span></a></li> -->

    <li class=""><a href="<?= base_url() ?>admin/eod_report"><i class="fa fa-cogs"></i> <span>EOD
                Report</span></a></li>
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
            Vouchers
            <small>Control panel</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Dashbaord</a></li>
            <li class="active">vouchers</li>
        </ol>
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="box box-primary">
            <div class="box-header">
                <a class="box-title btn bg-purple  margin btn-lg pull-left" style="color:white;" id="addproduct"
                    data-toggle="modal" data-target="#bulk-upload"><i class="fa fa-plus"></i>
                    Bulk Upload</a>

                <!-- <a class="box-title btn bg-blue  margin btn-lg " style="color:white; margin-left:20px;" id="addproduct" data-toggle="modal" data-target="#modal-edit"><i class="fa fa-plus"></i>
                    Create Group</a> -->
                <!-- <h3 class="box-title">Data Table With Full Features</h3> -->
            </div>
            <!-- /.box-header -->
            <div class="box-body">
                <table id="order_data" class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>voucher ID</th>
                            <th> Date Issued</th>
                            <th>Date Expired</th>
                            <!-- <th>Email</th>
                            <th>Mobile</th> -->
                            <!-- <th>DOB</th>
                                    <th>Action</th> -->
                        </tr>
                    </thead>
                    <tbody>

                    </tbody>
                    <tfoot>
                        <tr>
                            <th>voucher ID</th>
                            <th>Date Issued</th>
                            <th>Date Expired</th>
                        </tr>
                    </tfoot>
                </table>
            </div>
            <!-- /.box-body -->
        </div>


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
                                <input type="file" class="form-control" id="bulk_membership_upload"
                                    aria-describedby="bulk_membership_uploadHelp" accept='application/xlsx'>
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





    </section>
    <!-- /.content -->
</div>