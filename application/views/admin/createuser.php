<ul class="sidebar-menu" data-widget="tree">
    <li class="header">MAIN NAVIGATION</li>
    <!-- Optionally, you can add icons to the links -->
    <li class=""><a href="<?=base_url()?>admin/dashboard"><i class="fa fa-area-chart"></i> <span>Dashboard</span></a>
    </li>
    <li class=""><a href="<?=base_url()?>admin/users"><i class="fa fa-group"></i> <span>Customers</span></a></li>
    <li class=""><a href="<?=base_url()?>admin/orders"><i class="fa fa-book"></i> <span>Orders</span></a></li>
    <li class=""><a href="<?=base_url()?>admin/anniversary_orders"><i class="fa fa-book"></i>
            <span>Anniversary</span></a></li>
    <li class=""><a href="<?=base_url()?>admin/authdealer"><i class="fa fa-check-square"></i>
            <span>Authorized
                Dealers
            </span></a>
    <li class=""><a href="<?=base_url()?>admin/vouchers"><i class="fa fa-barcode"></i> <span>Vouchers</span></a></li>
    <li><a href="<?=base_url()?>admin/loyalty"><i class="fa fa-credit-card"></i> <span>Loyalty </span></a></li>
    <li class="active"><a href="<?=base_url()?>admin/create_user"><i class="fa fa-book"></i> <span>Create
                User</span></a></li>
    <!-- <li class=""><a href="<?=base_url()?>admin/callLogs"><i class="fa fa-phone"></i> <span>Call Logs</span></a></li> -->

    <li><a href="<?=base_url()?>admin/eod_report"><i class="fa fa-cogs"></i> <span>EOD Report</span></a></li>
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
            Create User
            <small>Control panel</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Dashboard</a></li>
            <li class="active">C U</li>
        </ol>
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="nav-tabs-custom">
            <ul class="nav nav-tabs">
                <li class="active"><a href="#tab_1" data-toggle="tab">Users</a></li>
                <li><a href="#tab_2" data-toggle="tab">Add Users</a></li>
                <li><a href="#tab_3" data-toggle="tab">Register Role</a></li>
                <li><a href="#tab_4" data-toggle="tab">Register Zone</a></li>
                <li><a href="#tab_5" data-toggle="tab">Register Rider</a></li>

            </ul>
            <div class="tab-content">
                <div class="tab-pane active" id="tab_1">

                    <zing-grid editor="modal" layout="row" layout-controls='true' search filter sort pager
                        page-size="10" page-size-options="10,20,30,40">
                        <zg-caption>
                            <!-- <i class="fa fa-user"></i> Users -->
                            <a class="btn bg-blue  margin  pull-left" id="reloadUBtn" style="color:white;"><i
                                    class="fa fa-refresh"></i>
                                Reload </a>
                        </zg-caption>


                        <zg-colgroup>

                            <zg-column index="name" header="Name"></zg-column>
                            <zg-column index="msisdn" header="Telephone"></zg-column>
                            <zg-column index="email" type="email" header="Email"></zg-column>
                            <zg-column index="username" header="Username"></zg-column>
                            <zg-column index="zoneid" header="Zone"></zg-column>
                            <zg-column index="roleid" header="Role"></zg-column>
                            </zg-column>
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
                </div>
                <!-- /.tab-pane -->
                <div class="tab-pane" id="tab_2">
                    <div class="box box-primary">
                        <!-- <div class="box-header with-border">
                          <h3 class="box-title">Add Member</h3>
                      </div> -->

                        <form role="form" method="post" action="javaScript:add_user();" enctype="multipart/form-data"
                            id="user-form">
                            <div class="box-body">
                                <div class="row">
                                    <div class="col-xs-6">

                                        <div class="form-group">
                                            <label control-label>Role:</label>
                                            <select id="Urole" name="nationality" class="form-control select2"
                                                style="width: 100%;">

                                            </select>
                                        </div>

                                    </div>

                                    <div class="col-xs-6">
                                        <div class="form-group">
                                            <label control-label>Zone:</label>
                                            <select id="Uzone" name="nationality" class="form-control select2"
                                                style="width: 100%;">

                                            </select>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-xs-6">
                                        <div class="form-group">
                                            <label control-label>Dem:</label>
                                            <select id="Dem" name="dem" class="form-control select2"
                                                style="width: 100%;">

                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-xs-6">
                                        <div class="form-group">
                                            <label control-label>Name:</label>
                                            <div class="input-group">
                                                <div class="input-group-addon">
                                                    <i class="fa fa-phone"></i>
                                                </div>
                                                <input type="text" name="" class="form-control" id="Uname"
                                                    placeholder="" required>
                                            </div>

                                        </div>

                                    </div>

                                </div>
                                <div class="row">
                                    <div class="col-xs-6">
                                        <div class="form-group">
                                            <label control-label>Phone:</label>
                                            <div class="input-group">
                                                <div class="input-group-addon">
                                                    <i class="fa fa-envelope"></i>
                                                </div>
                                                <input type="text" name="" class="form-control" id="Uphone"
                                                    placeholder="" required>
                                            </div>

                                        </div>
                                    </div>
                                    <div class="col-xs-6">
                                        <div class="form-group">
                                            <label control-label>Username:</label>
                                            <div class="input-group">
                                                <div class="input-group-addon">
                                                    <i class="fa fa-user-secret"></i>
                                                </div>
                                                <input type="text" name="" class="form-control" id="Uusername"
                                                    placeholder="" required>
                                            </div>

                                        </div>
                                    </div>


                                </div>

                                <div class="row">
                                    <div class="col-xs-6">
                                        <div class="form-group">
                                            <label control-label>Email:</label>
                                            <div class="input-group">
                                                <div class="input-group-addon">
                                                    <i class="fa fa-user-secret"></i>
                                                </div>
                                                <input type="email" name="" class="form-control" id="Uemail"
                                                    placeholder="">
                                            </div>

                                        </div>

                                    </div>

                                    <div class="col-xs-6">

                                        <div class="form-group">
                                            <label control-label>Password:</label>
                                            <div class="input-group">
                                                <div class="input-group-addon">
                                                    <i class="fa fa-key"></i>
                                                </div>
                                                <input type="password" name="" class="form-control" id="Upassword"
                                                    placeholder="" required>
                                            </div>

                                        </div>
                                    </div>

                                </div>




                            </div>
                    </div>
                    <div class="box-footer">
                        <!-- <button type="button" class="btn btn-danger pull-left"
                                    data-dismiss="modal">Close</button> -->
                        <button type="submit" id="UBtn" class="btn btn-primary pull-right">Save
                            changes</button>
                    </div>
                    </form>
                </div>
                <div class="tab-pane" id="tab_3">

                    <zing-grid editor="modal" layout="row" layout-controls='true' id="rolestable" filter sort pager
                        page-size="10" page-size-options="10,20,30,40">
                        <zg-caption>
                            <!-- <i class="fa fa-user"></i> Roles -->
                            <a class="btn bg-blue  margin  pull-left" id="reloadRBtn" style="color:white;"><i
                                    class="fa fa-refresh"></i>
                                Reload </a>
                            <a class=" btn bg-purple  margin  pull-right" style="color:white;" data-toggle="modal"
                                data-target="#rolemodal"><i class="fa fa-plus"></i>
                                create Role </a>
                        </zg-caption>


                        <zg-colgroup>

                            <zg-column index="roleid" header="RoleID"></zg-column>
                            <zg-column index="role" header="Role Name"></zg-column>

                            </zg-column>


                        </zg-colgroup>
                    </zing-grid>
                </div>

                <div class="tab-pane" id="tab_4">

                    <zing-grid editor="modal" layout="row" layout-controls='true' id="zonestable" filter sort pager
                        page-size="10" page-size-options="10,20,30,40">
                        <zg-caption>
                            <!-- <i class="fa fa-user"></i> Zones -->
                            <a class="btn bg-blue  margin  pull-left" id="reloadZBtn" style="color:white;"><i
                                    class="fa fa-refresh"></i>
                                Reload </a>
                            <a class=" btn bg-purple  margin  pull-right" style="color:white;" data-toggle="modal"
                                data-target="#zonemodal"><i class="fa fa-plus"></i>
                                Create Zone </a>

                        </zg-caption>


                        <zg-colgroup>

                            <zg-column index="id" header="ZoneID"></zg-column>
                            <zg-column index="name" header="Zone Name"></zg-column>
                            <zg-column index="dem" header="Dem"></zg-column>




                        </zg-colgroup>
                    </zing-grid>
                </div>


                <div class="tab-pane" id="tab_5">

                    <zing-grid editor="modal" layout="row" layout-controls='true' id="ridertable" filter sort pager
                        page-size="10" page-size-options="10,20,30,40">
                        <zg-caption>
                            <!-- <i class="fa fa-user"></i> Riders -->
                            <a class="btn bg-blue  margin  pull-left" id="reloadRiderBTN" style="color:white;"><i
                                    class="fa fa-refresh"></i>
                                Reload </a>
                            <a class=" btn bg-purple  margin  pull-right" style="color:white;" data-toggle="modal"
                                data-target="#ridermodal"><i class="fa fa-plus"></i>
                                Create Rider </a>
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
                </div>
            </div>

            <!-- /.tab-pane -->
        </div>



        <div class="modal fade" id="rolemodal">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span></button>
                        <h4 class="modal-title">Create Role</h4>
                    </div>
                    <div class="modal-body">
                        <form role="form" method="POST" action="JavaScript:add_role();" id="roleform">

                            <div class="form-group">
                                <label class="control-label">Name of Role:</label>
                                <input type="text" class="form-control" name="church_group" id="nRole" placeholder="">

                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-danger pull-left"
                                    data-dismiss="modal">Close</button>
                                <button type="submit" id="btnRole" class="showBTN btn btn-primary">Save
                                    changes</button>
                            </div>
                        </form>
                    </div>
                </div>
                <!-- /.modal-content -->
            </div>
            <!-- /.modal-dialog -->
        </div>

        <div class="modal fade" id="zonemodal">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span></button>
                        <h4 class="modal-title">Create Zone`</h4>
                    </div>
                    <div class="modal-body">
                        <form role="form" method="POST" action="JavaScript:add_zone();" id="zoneform">

                            <!-- <div class="form-group">
                                <label class="control-label">Name of Dem:</label>
                                <input type="text" class="form-control" name="church_group" id="nRole" placeholder="">

                            </div> -->

                            <div class="form-group">
                                <label class="control-label">Name of Zone:</label>
                                <input type="text" class="form-control" name="church_group" id="nZone" placeholder="">

                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-danger pull-left"
                                    data-dismiss="modal">Close</button>
                                <button type="submit" id="btnZone" class="showBTN btn btn-primary">Save
                                    changes</button>
                            </div>
                        </form>
                    </div>
                </div>
                <!-- /.modal-content -->
            </div>
            <!-- /.modal-dialog -->
        </div>


        <div class="modal fade" id="ridermodal">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span></button>
                        <h4 class="modal-title">Create Rider</h4>
                    </div>
                    <div class="modal-body">
                        <form role="form" method="POST" action="JavaScript:add_rider();" id="riderform">

                            <div class="form-group">
                                <label class="control-label">Name of Rider:</label>
                                <input type="text" class="form-control" name="church_group" id="nRider" placeholder="">

                            </div>

                            <div class="form-group">
                                <label class="control-label">Rider Mobile :</label>
                                <input type="text" class="form-control" name="church_group" id="nMobile" placeholder="">

                            </div>


                            <!-- <div class="form-group">
                                <label class="control-label">Assign Rider To Zone :</label>
                                <select id="Rzone" name="nationality" class="form-control select2" style="width: 100%;">

                                </select>

                            </div> -->




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


        <div class="modal fade" id="editridermodal">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span></button>
                        <h4 class="modal-title">Edit/Assign Rider</h4>
                    </div>
                    <div class="modal-body">
                        <form role="form" method="POST" action="JavaScript:();" id="riderEform">

                            <div class="form-group">
                                <label class="control-label">Name of Rider:</label>
                                <input type="text" class="form-control" name="church_group" id="enRider" placeholder="">

                            </div>

                            <div class="form-group">
                                <label class="control-label">Rider Mobile :</label>
                                <input type="text" class="form-control" name="church_group" id="enMobile"
                                    placeholder="">

                            </div>


                            <div class="form-group">
                                <label class="control-label">Assign Rider To Zone :</label>
                                <select id="eRzone" name="nationality" class="form-control select2"
                                    style="width: 100%;">

                                </select>

                            </div>




                            <div class="modal-footer">
                                <button type="button" class="btn btn-danger pull-left"
                                    data-dismiss="modal">Close</button>
                                <button type="submit" id="btneRider" class="showREBTN btn btn-primary">Save
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