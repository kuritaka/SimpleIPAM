<div class="container">

    <h2>Networks</h2>

    <br/>

    <div class="row">
        <div class="col-sm-6">
            <?php
            $attr = array("class" => "form-horizontal", "role" => "form", "id" => "form1", "name" => "form1");
            echo form_open("networks/search", $attr); ?>
            <div class="form-group">
                <div class="col-md-6">
                    <input class="form-control" id="network_name" name="network_name"
                           placeholder="Search for networks..." type="text"
                           value="<?php echo set_value('network_name', $network_name); ?>"/>
                </div>
                <div class="col-md-6">
                    <input id="btn_search" name="btn_search" type="submit" class="btn btn-danger" value="Search"/>
                    <a href="<?php echo base_url() . "networks/"; ?>" class="btn btn-primary">Show All</a>
                </div>
            </div>
            <?php echo form_close(); ?>
        </div>
        <div class="col-sm-6 text-right">
            <button class="btn btn-success" onclick="add_networks()">
                <i class="glyphicon glyphicon-plus"></i> Add Network
            </button>
            <button class="btn btn-success" onclick="location.href='<?php echo site_url('networks/csv') ?>'">
                <i class="glyphicon glyphicon-retweet"></i> CSV Import/Export
            </button>
        </div>
    </div>

    <br/>

    <?php $count = ($total_rows == 0) ? "$total_rows entries" : "Showing $start to $end of $total_rows entries"; ?>
    <?php echo $count; ?>

    <table id="table_id" class="table table-striped table-bordered" cellspacing="0" width="100%">
        <thead>
        <tr>
            <th width="90px">Networks</th>
            <th width="40px">CIDR</th>
            <th width="80px">Broadcast</th>
            <th width="60px">VLAN ID</th>
            <th width="150px">Note1[Identifier]</th>
            <th width="60px">Note2[Zone]</th>
            <th>Note3[Others]</th>
            <th width="120px">Operation</th>
        </tr>
        </thead>
        <tbody>
        <?php foreach ($networks as $network): ?>
            <tr>
                <td><?php ip2host($network['networks'], $network['cidr']); ?></td>
                <td><?php echo $network['cidr']; ?></td>
                <td><?php echo $network['broadcast_address']; ?></td>
                <td><?php echo $network['vlan_id']; ?></td>
                <td><?php echo $network['note1']; ?></td>
                <td><?php echo $network['note2']; ?></td>
                <td><?php echo $network['note3']; ?></td>
                <td>
                    <button class="btn btn-warning btn-xs" onclick="edit_network(<?php echo $network['id']; ?>)">
                        <i class="glyphicon glyphicon-pencil"></i> Edit
                    </button>
                    <button class="btn btn-danger btn-xs" onclick="delete_network(<?php echo $network['id']; ?>)">
                        <i class="glyphicon glyphicon-remove"></i> Delete
                    </button>
                </td>
            </tr>
        <?php endforeach; ?>
        </tbody>

        <tfoot>
        <tr>
            <th>Networks</th>
            <th>CIDR</th>
            <th>Broadcast</th>
            <th>VLAN ID</th>
            <th>Note1[Identifier]</th>
            <th>Note2[Zone]</th>
            <th>Note3[Others]</th>
            <th>Operation</th>
        </tr>
        </tfoot>

    </table>

    <br \>
    <div class="row">
        <div class="col-md-3">
            <?php $count = ($total_rows == 0) ? "$total_rows entries" : "Showing $start to $end of $total_rows entries"; ?>
            <?php echo $count; ?>
        </div>
        <div class="col-md-9">
            <?php echo $pagination; ?>
        </div>
    </div>

</div>

<!-- ================================================================================== -->
<script src="<?php echo base_url('assets/jquery/jquery.min.js') ?>"></script>
<!-- Include all compiled plugins (below), or include individual files as needed -->
<script src="<?php echo base_url('assets/bootstrap/js/bootstrap.min.js') ?>"></script>
<script src="<?php echo base_url('assets/datatables/js/jquery.dataTables.min.js') ?>"></script>
<script src="<?php echo base_url('assets/datatables/js/ip-address.js') ?>"></script>
<script src="<?php echo base_url('assets/datatables/js/dataTables.bootstrap.js') ?>"></script>


<script type="text/javascript">
    $(document).ready(function () {
        // datatables/js/ip-address.js    This doesn't work well.
        $('#table_id').DataTable({
            columnDefs: [
                {type: 'ip-address', targets: [0, 2]}
            ],
            "oLanguage": {
                "sSearch": "Filter: "
            },
            //order: [ [ 0, "asc" ] ],
            order: [],
            //lengthMenu: [ 10, 20, 100, 300, 500, 750, 1000 ],
            displayLength: 1000,
            lengthChange: false,
            info: false,
            paging: false
        });
    });
    var save_method; //for save method string
    var table;


    function add_networks() {
        save_method = 'add';
        $('#form')[0].reset(); // reset form on modals
        $('#modal_form').modal('show'); // show bootstrap modal
        $('.modal-title').text('Add Network'); // Set Title to Bootstrap modal title
    }


    function edit_network(id) {
        save_method = 'update';
        $('#form')[0].reset(); // reset form on modals
        $('.form-group').removeClass('has-error'); // clear error class
        $('.help-block').empty(); // clear error string

        //Ajax Load data from ajax
        $.ajax({
            //controller's ajax_edit function
            url: "<?php echo site_url('networks/ajax_edit/')?>/" + id,
            type: "GET",
            dataType: "JSON",
            success: function (data) {
                $('[name="id"]').val(data.id);
                $('[name="networks"]').val(data.networks);
                $('[name="cidr"]').val(data.cidr);
                $('[name="broadcast_address"]').val(data.broadcast_address);
                $('[name="vlan_id"]').val(data.vlan_id);
                $('[name="note1"]').val(data.note1);
                $('[name="note2"]').val(data.note2);
                $('[name="note3"]').val(data.note3);

                $('#modal_form').modal('show'); // show bootstrap modal when complete loaded
                $('.modal-title').text('Edit Networks'); // Set title to Bootstrap modal title

            },
            error: function (jqXHR, textStatus, errorThrown) {
                alert('Error get data from ajax');
            }
        });
    }


    function save() {
        var url;
        if (save_method == 'add') {
            url = "<?php echo site_url('networks/networks_add')?>";
        }
        else {
            url = "<?php echo site_url('networks/networks_update')?>";
        }

        // ajax adding data to database
        $.ajax({
            url: url,
            type: "POST",
            data: $('#form').serialize(),
            dataType: "JSON",
            success: function (data) {
                if (data.status) //if success close modal and reload ajax table
                {
                    //if success close modal and reload ajax table
                    $('#modal_form').modal('hide');
                    location.reload();// for reload a page
                }
                else {
                    for (var i = 0; i < data.inputerror.length; i++) {
                        $('[name="' + data.inputerror[i] + '"]').parent().parent().addClass('has-error'); //select parent twice to select div form-group class and add has-error class
                        $('[name="' + data.inputerror[i] + '"]').next().text(data.error_string[i]); //select span help-block class set text error string
                    }
                }
            },
            error: function (jqXHR, textStatus, errorThrown) {
                alert('Error adding / update data');
            }
        });
    }


    function delete_network(id) {
        if (confirm('Are you sure delete this data?')) {
            // ajax delete data from database
            $.ajax({
                url: "<?php echo site_url('networks/networks_delete')?>/" + id,
                type: "POST",
                dataType: "JSON",
                success: function (data) {

                    location.reload();
                },
                error: function (jqXHR, textStatus, errorThrown) {
                    alert('Error deleting data');
                }
            });

        }
    }


</script>


<!-- Bootstrap modal -->
<div class="modal fade" id="modal_form" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span>
                </button>
                <h3 class="modal-title">Network Form</h3>
            </div>
            <div class="modal-body form">
                <form action="#" id="form" class="form-horizontal">
                    <input type="hidden" value="" name="id"/>
                    <div class="form-body">
                        <div class="form-group">
                            <label class="control-label col-md-3">Networks</label>
                            <div class="col-md-6">
                                <input name="networks" placeholder="192.168.100.0" class="form-control" type="text">
                                <span class="help-block"></span>
                            </div>
                            <div class="col-md-3">
                                <p class="text-left">*Required</p>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-3">CIDR</label>
                            <div class="col-md-6">
                                <input name="cidr" placeholder="24" class="form-control" type="text">
                                <span class="help-block"></span>
                            </div>
                            <div class="col-md-3">
                                <p class="text-left">*Required</p>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-3">Broadcast Address</label>
                            <div class="col-md-6">
                                <input name="broadcast_address" placeholder="192.168.100.255" class="form-control"
                                       type="text">
                                <span class="help-block"></span>
                            </div>
                            <div class="col-md-3">
                                <p class="text-left">*Required</p>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-3">VLAN ID</label>
                            <div class="col-md-6">
                                <input name="vlan_id" placeholder="100" class="form-control" type="text">
                            </div>
                            <div class="col-md-3">
                                <p class="text-left">1 - 4094</p>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-3">Note1[Identifier]</label>
                            <div class="col-md-9">
                                <input name="note1" placeholder="Production DMZ Operation" class="form-control"
                                       type="text">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-3">Note2[Zone]</label>
                            <div class="col-md-9">
                                <input name="note2" placeholder="Tokyo" class="form-control" type="text">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-3">Note3[Others]</label>
                            <div class="col-md-9">
                                <input name="note3" placeholder="DC" class="form-control" type="text">
                            </div>
                        </div>

                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" id="btnSave" onclick="save()" class="btn btn-primary">Save</button>
                <button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
<!-- End Bootstrap modal -->

