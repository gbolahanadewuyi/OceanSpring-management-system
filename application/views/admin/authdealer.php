<!-- Sidebar Menu -->
<ul class="sidebar-menu" data-widget="tree">
    <li class="header">MAIN NAVIGATION</li>
    <!-- Optionally, you can add icons to the links -->
    <li class=""><a href="<?= base_url() ?>admin/dashboard"><i class="fa fa-area-chart"></i>
            <span>Dashboard</span></a></li>
    <li class=""><a href="<?= base_url() ?>admin/users"><i class="fa fa-group"></i> <span>Customers</span></a></li>
    <li class=""><a href="<?= base_url() ?>admin/orders"><i class="fa fa-book"></i> <span>Orders</span></a></li>
    <li class=""><a href="<?= base_url() ?>admin/anniversary_orders"><i class="fa fa-book"></i>
            <span>Anniversary</span></a></li>
    <li class="active"><a href="<?=base_url()?>admin/authdealer"><i class="fa fa-check-square"></i>
            <span>Authorized
                Dealers
            </span></a>
    <li class=""><a href="<?= base_url() ?>admin/vouchers"><i class="fa fa-barcode"></i> <span>Vouchers</span></a></li>
    <li><a href="<?= base_url() ?>admin/loyalty"><i class="fa fa-credit-card"></i> <span>Loyalty </span></a></li>
    <li class=""><a href="<?= base_url() ?>admin/create_user"><i class="fa fa-book"></i> <span>Create User</span></a>
    </li>
    <!-- <li class=""><a href="<?= base_url() ?>admin/callLogs"><i class="fa fa-phone"></i> <span>Call Logs</span></a></li> -->

    <li><a href="<?= base_url() ?>admin/eod_report"><i class="fa fa-cogs"></i> <span>EOD Report</span></a></li>
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
            Authorized Dealers
            <small>Control panel</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Dashbaord</a></li>
            <li class="active">Authorized Dealers</li>
        </ol>
    </section>

    <!-- Main content -->
    <section class="content">


        <div class="nav-tabs-custom">
            <ul class="nav nav-tabs">
                <li class="active"><a href="#tab_1" data-toggle="tab"> Dealers</a></li>
                <li><a href="#tab_2" data-toggle="tab">Register Dealer</a></li>

            </ul>
            <div class="tab-content">
                <div class="tab-pane active" id="tab_1">
                    <zing-grid editor="modal" row-class="_renderClassActivity" layout="row" layout-controls='true'
                        filter sort pager page-size="20" page-size-options="20,40,60,80">
                        <zg-caption>
                            <a class=" btn bg-purple  margin  pull-right" style="color:white;"
                                onClick="_exportDataToCSV()"><i class="fa fa-plus"></i>
                                Export </a>
                        </zg-caption>


                        <zg-colgroup>


                            <zg-column index="dealerid" header="ID"></zg-column>
                            <zg-column index="name" header="Name"></zg-column>
                            <zg-column index="phonenumber" header="Phonenumber"></zg-column>
                            <zg-column index="location" header="Location"></zg-column>
                            <zg-column index="ro" header="Relationship Officer"></zg-column>
                            <zg-column index="dateregistered" header="Registered On"></zg-column>
                            <zg-column index="dealerid,phonenumber" header="Action" editor="false">
                                <zg-button onclick='edit_dealer([[index.dealerid]])'>
                                    <zg-icon name="edit"></zg-icon> <span>Edit</span>
                                </zg-button>

                                <zg-button
                                    onclick='check_dealer_deactivation([[index.phonenumber]],[[index.dealerid]])'>
                                    <zg-icon name="close"> </zg-icon> <span>Deactivate</span>
                                </zg-button>

                                <zg-button onclick='check_dealer_activation([[index.dealerid]])'>
                                    <zg-icon name="checkmark"> </zg-icon> <span>Activate</span>
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

                        <form role="form" method="POST" action="JavaScript:auth_dealer();" id="authdealerForm">
                            <div class="box-body">
                                <div class="form-group">
                                    <label class="control-label">Dealer Name:</label>
                                    <input type="text" class="form-control" name="church_group" id="Aname"
                                        placeholder="" required>

                                </div>
                                <div class="form-group">
                                    <label class="control-label">Mobile:</label>
                                    <input type="text" class="form-control" name="church_group" id="Amobile"
                                        placeholder="Example 0244444444" required>

                                </div>
                                <div class="form-group">
                                    <label class="control-label">Location:</label>
                                    <input type="text" class="form-control" name="church_group" id="Alocation"
                                        placeholder="" required>

                                </div>

                                <!-- <div class="form-group">
                                    <label control-label>Name Of Relationship officer:</label>
                                    <select id="Arname" name="" class="form-control select2" style="width: 100%;">

                                        <option selected="selected" value="">-- Select RO --
                                        </option>

                                    </select>
                                </div> -->
                            </div>

                    </div>
                    <div class="box-footer">
                        <button type="button" class="btn btn-danger pull-left" data-dismiss="modal">Close</button>
                        <button type="submit" id="btnSaveDealer" class="showBTN btn btn-primary pull-right">Save
                            changes</button>
                    </div>
                    </form>
                </div>
            </div>

            <!-- /.tab-pane -->
        </div>

        <div class="modal fade" id="edit_dealer">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span></button>
                        <h4 class="modal-title">Edit Dealer Information</h4>
                    </div>
                    <div class="modal-body">
                        <form role="form" method="POST" action="JavaScript:update_dealer()" id="dealerupdateForm">

                            <div class="form-group">
                                <label class="control-label">Dealer Name:</label>
                                <input type="text" class="form-control" name="church_group" id="UAname" placeholder=""
                                    required>

                            </div>
                            <div class="form-group">
                                <label class="control-label">Mobile:</label>
                                <input type="text" class="form-control" name="church_group" id="UAmobile"
                                    placeholder="Example 0244444444" required>

                            </div>
                            <div class="form-group">
                                <label class="control-label">Location:</label>
                                <input type="text" class="form-control" name="church_group" id="UAlocation"
                                    placeholder="" required>

                            </div>

                            <!-- <div class="form-group">
                                <label control-label>Name Of Relationship officer:</label>
                                <select id="UArname" name="" class="form-control select2" style="width: 100%;">

                                    <option selected="selected" value="">-- Select RO --
                                    </option>

                                </select>
                            </div> -->





                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger pull-left" data-dismiss="modal">Close</button>
                        <button type="submit" id="btnUpdate" class="showUBTN btn btn-primary">Save changes</button>
                        </form>
                    </div>
                </div>
                <!-- /.modal-content -->
            </div>
            <!-- /.modal-dialog -->
        </div>

        <div class="modal fade" id="create_dealer_account">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span></button>
                        <h4 class="modal-title">Edit Dealer Information</h4>
                    </div>
                    <div class="modal-body">
                        <form role="form" method="POST" action="JavaScript:create_authdealer_account()"
                            id="accountForm">

                            <div class="form-group">
                                <label class="control-label">Dealer Name:</label>
                                <input type="text" class="form-control" name="church_group" id="UAAname" placeholder=""
                                    disabled>

                            </div>
                            <div class="form-group">
                                <label class="control-label">Mobile:</label>
                                <input type="text" class="form-control" name="church_group" id="UAAmobile"
                                    placeholder="Example 0244444444" disabled>

                            </div>
                            <div class="form-group">
                                <label class="control-label">Email:</label>
                                <input type="email" class="form-control" name="church_group" id="UAAemail"
                                    placeholder="" required>

                            </div>

                            <div class="form-group">
                                <label class="control-label">Password:</label>
                                <input type="password" class="form-control" name="church_group" id="UAApassword"
                                    placeholder="" required>

                            </div>



                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger pull-left" data-dismiss="modal">Close</button>
                        <button type="submit" id="btnAUpdate" class="btn btn-primary">Save changes</button>
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