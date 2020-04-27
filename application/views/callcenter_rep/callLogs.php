<ul class="sidebar-menu" data-widget="tree">
    <li class="header">MAIN NAVIGATION</li>
    <!-- Optionally, you can add icons to the links -->
    <li class=""><a href="<?= base_url() ?>callrep/dashboard"><i class="fa fa-area-chart"></i>
            <span>Dashboard</span></a></li>
    <li class=""><a href="<?= base_url() ?>callrep/users"><i class="fa fa-group"></i> <span>New Users</span></a></li>
    <li class=""><a href="<?= base_url() ?>callrep/orders"><i class="fa fa-book"></i> <span>Orders</span></a></li>
    <li class=""><a href="<?= base_url() ?>callrep/anniversary_orders"><i class="fa fa-book"></i>
            <span>Anniversary</span></a></li>
    <!-- <li class=""><a href="<?=base_url()?>callrep/loyalty"><i class="fa fa-credit-card"></i> <span>Loyalty
                Cards</span></a></li> -->
    <li class="active"><a href="<?= base_url() ?>callrep/callLogs"><i class="fa fa-phone"></i> <span>Call
                Logs</span></a></li>
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
            Call Logs
            <small>Control panel</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Dashbaord</a></li>
            <li class="active">call logs</li>
        </ol>
    </section>

    <!-- Main content -->
    <section class="content">
        <zing-grid editor="modal" layout="row" layout-controls='true' search filter sort pager page-size="20"
            page-size-options="20,40,60,80">
            <zg-caption>
                <a class=" btn bg-purple  margin  pull-right" style="color:white;" data-toggle="modal"
                    data-target="#callmodal"><i class="fa fa-plus"></i>
                    Call Log </a>

                <a class=" btn bg-purple  margin  pull-right" style="color:white;" onClick="_exportDataToCSV()"><i
                        class="fa fa-plus"></i>
                    Export </a>
            </zg-caption>


            <zg-colgroup>
                <zg-column index="dateofcall" header="Date of Call" renderer="_renderClassActivity" sort-desc="true"></zg-column>
                <zg-column index="customerNumber" header="Customer Telephone"></zg-column>
                <zg-column index="purpose" header="Purpose Of Call"></zg-column>
                <zg-column index="feedback" header="Call Response"></zg-column>
                <!-- <zg-column index="comments" header="Customer Comment"></zg-column> -->
                <zg-column index="operator" header="Personnel Name"></zg-column>
                <zg-column index="operatorNumber" header="Personnel Number"></zg-column>

                <!-- <zg-column index="status" header="Status" renderer="renderActivityType"></zg-column>
                            <zg-column index="id" header="Action" editor="false">

                                <zg-button onclick='edit_order([[index.id]],)'>
                                    <zg-icon name="edit"> </zg-icon> <span></span>
                                </zg-button>
                            </zg-column> -->
                <!-- <zg-column index="custom" header="Edit Row" editor="false">
                                 <zg-button action="editrecord" class="button button--edit">Edit Record</zg-button>
                           < /zg-column> -->

            </zg-colgroup>
        </zing-grid>
        <a href="" id="downloadAnchor">&nbsp;</a>

        <div class="modal fade" id="callmodal">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span></button>
                        <h4 class="modal-title">Keep Call Logs</h4>
                    </div>
                    <div class="modal-body">
                        <form role="form" method="POST" action="JavaScript:LogCall();" id="callogForm">
                            <!-- <input type="text" class="form-control" style="display:none;" name="church_group" id="id" placeholder=""> -->
                            <div class="form-group">
                                <label class="control-label">Customer Mobile:</label>
                                <input type="text" class="form-control" name="customerNumber" id="cusmobile"
                                    placeholder="Example 0244444444" required>

                            </div>

                            <div class="form-group">
                                <label control-label>Purpose Of Call: </label>
                                <select id="poc" name="nationality" class="form-control select2" style="width: 100%;">

                                    <option selected="selected" value="Default">-- Select time --
                                    </option>
                                    <option value="Confirm Order">Confirm Order</option>
                                    <option value="Telemarketing">Telemarketing</option>
                                    <option value="Referrals">Referrals</option>
                                    <option value="Confirm Customer Details">Confirm Customer Details</option>


                                </select>
                            </div>
                            <div class="form-group">
                                <label control-label>Call Response: </label>
                                <select id="feedback" name="nationality" class="form-control select2"
                                    style="width: 100%;">

                                    <option selected="selected" value="No Response">-- Select call response --
                                    </option>
                                    <option value="Switched Off">Switched Off</option>
                                    <option value="Call Back">Call Back</option>
                                    <option value="No Answer">No Answer</option>
                                    <option value="Answered">Answered</option>


                                </select>
                            </div>

                            <div class="form-group">
                                <label class="control-label">Comment:</label>
                                <textarea class="form-control" name="feedback" id="comment" rows="5"
                                    placeholder="Enter comment made by customer"> </textarea>

                            </div>

                            <!-- <div class="form-group">
                                <label class="control-label">Operator name:</label>
                                <select id="opname" name="nationality" class="form-control select2"
                                    style="width: 100%;">

                                    <option value="Angela Brown">Angela Brown</option>
                                    <option value="Beverly Ida Aryeetey">Beverly Ida Aryeetey</option>
                                    <option value="Hellen Quaye">Hellen Quaye</option>
                                    <option value="Isaac Owusu ">Isaac Owusu </option>
                                    <option value="Oppong Deborah">Oppong Deborah </option>
                                    <option value="Patience Omaboe">Patience Omaboe</option>
                                    <option value="Fredrick Quarcoopome">Fredrick Quarcoopome</option>
                                    <option value="Fredrick Quarcoopome">Priscilla Amoah</option>




                                </select>

                            </div> -->

                            <div class="form-group">
                                <label class="control-label">Operator Line:</label>
                                <select id="opnumber" name="nationality" class="form-control select2"
                                    style="width: 100%;">

                                    <option value="1">Line 1</option>
                                    <option value="2">Line 2</option>
                                    <option value="3">Line 3</option>
                                    <option value="4">Line 4</option>
                                    <option value="5">Line 5</option>
                                    <option value="6">Line 6</option>
                                    <option value="7">Line 7</option>
                                    <option value="8">Line 8</option>


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
        <!-- /.modal -->




    </section>
    <!-- /.content -->
</div>