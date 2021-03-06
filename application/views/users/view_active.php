
<!-- begin #content -->
<div id="content" class="content">

    <div class="breadcrumb-container ">
        <ol class="breadcrumb pull-left ">
            <li><a href="<?php echo site_url('dashboard') ?>"><i class="fa fa-dashboard"></i> Dashboard</a></li>
            <li class="active">Active Users</li>
        </ol>
    </div>


    <div id="alert_placeholder">
        <?php
        $appmsg = $this->session->flashdata('appmsg');
        if(!empty($appmsg)){ ?>
        <div id="alertdiv" class="alert <?=$this->session->flashdata('alert_type') ?> "><a class="close" data-dismiss="alert">x</a><span><?= $appmsg ?></span></div>
        <?php } ?>
    </div>


    <div class="row">

        <ul class="nav nav-tabs nav-stacked col-md-2">
          <li ><a href="<?php echo site_url('password') ?>"> Change Password</a></li>
          <?php if ($this->session->userdata('role')!="USER"): ?>
              <?php if ($this->session->userdata('role')==="ADMIN"): ?>
                  <li ><a  href="<?php echo site_url('settings/configuration') ?>" >SDP Configuration</a></li>
                  <li><a href="<?php echo site_url('settings/services') ?>" >Agrimanagr SMS</a></li>
              <?php endif ?>
              <li class="active"><a data-toggle="tab" href="<?php echo site_url('users/active') ?>" >Users</a></li>
          <?php endif ?>
      </ul>


      <div class="panel tab-content col-md-10">
        <div class="tab-pane active" id="tab_a">
           <ul class="nav nav-tabs">
            <li class="active"><a href="#default-tab-1" data-toggle="tab"><h4 class="panel-title">Active Users</h4></a></li>
            <li class=""><a href="<?=base_url('users/suspended')?>" >Suspended Users</a></li>
            <?php if ($this->session->userdata('role')==="ADMIN"): ?>
                <li><a href="<?=base_url('users/add')?>">Add User</a></li>                    
            <?php endif ?>
        </ul>

        <div class="tab-content">
            <div class="tab-pane fade active in" id="default-tab-1">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <div class="panel-heading-btn">
                            <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-primary" data-click="panel-expand"><i class="fa fa-expand"></i></a>
                            <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-warning" data-click="panel-collapse"><i class="fa fa-minus"></i></a>

                        </div>                
                        <h4>Active Users</h4>
                    </div>

                    <div class="panel-body">

                        <table id="example" class="table table-striped table-bordered table-hover datatable">
                            <thead>
                                <tr>
                                    <th>Username</th>
                                    <th>Full Names</th>
                                    <th>Mobile No</th>
                                    <th>Email</th>
                                    <th>Role</th>
                                    <th>Date Created</th>
                                    <?Php if($user_role==="ADMIN"){ ?>
                                    <th>Action</th>
                                    <?php } ?>
                                </tr>
                            </thead>
                            <tbody ></tbody>
                        </table>
                    </div>

                </div>
            </div>
        </div>
    </div>

</div><!-- tab content -->
</div>
</div>






<script type="text/javascript">
    jQuery(document).ready(function(){
        jQuery('#example').dataTable({
            "processing": true,
            "serverSide": true,
            "scrollCollapse": true,
            "jQueryUI": true,
            "scrollX": true,
            "scrollY": 400,
            "pagingType": "full_numbers",
            "pageLength": 50,
            "lengthMenu": [[50, 100,250,-1], [50, 100, 250,"All"]],
            "dom": 'T<"clear">lfrtip',
            "tableTools": {
                "sSwfPath": "<?= base_url('assets/tabletools/swf/copy_csv_xls_pdf.swf');?>",
                "aButtons": [ "copy", "csv","xls","pdf" ]
            },
            columns: [

            { "data": "username" },
            { "data": "name"},
            { "data": "mobile" },
            { "data": "email" },
            { "data": "role"},
            { "data": "created"}
            <?Php if($user_role==="ADMIN"){ ?>
                ,
                { "data": "actions","orderable": false,"bSearchable": false }
                <?Php  } ?>
                ],
                "oLanguage": {
                    "sProcessing": "<img src='<?= base_url('assets/img/loading.gif'); ?>'>"
                },
                "ajax":{
                    "url": "<?=base_url('users/active/datatable')?>",
                    "type": "POST"
                }
            });


    });

    function setUser(uid){
        var id = uid;
        jQuery('#user').val(id);

    }

    function resetUser(){
        var id = jQuery("#user").val();
        var tp = jQuery("#tempPass").val();
        jQuery.ajax({
            type: "POST",
            url: "<?=base_url("users/active/reset");?>",
            data: {u:id, p:tp},
            success: function(data){
                showalert2(data,"alert-success");
                /*setInterval(function(){//function for reloading page
                    location.reload();
                },20000);*/
            }
        });

    }
</script>




<script type="text/javascript">

    function showalert(message,alerttype){
        jQuery('#alert_placeholder').append('<div id="alertdiv" class="alert ' + alerttype + '"><a class="close" data-dismiss="alert">x</a><span>'+message+'</span></div>')
        setTimeout(function() {
            jQuery('#alertdiv').remove();
        },10000);
    }

    function showMessage(message){
        if(message.length>0){
            showalert2(message,"alert-info");
        }
    }

    function showalert2(message,alerttype){
        jQuery('#alert_placeholder').append('<div id="alertdiv" class="alert ' + alerttype + '"><a class="close" data-dismiss="alert">x</a><span>'+message+'</span></div>')
        setTimeout(function() {
            jQuery('#alertdiv').remove();
        },20000);


    }

</script>





<div id="myModal2" class="modal hide fade" tabindex="-1" data-backdrop="static" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true"><i class="icon-remove"></i></button>
        <h3>Temporary Password</h3>
    </div>
    <form action="<?php echo base_url('users/reset'); ?>" method="post">
        <div class="modal-body">
            <input id="user" type="hidden" value="" name="id">
            <label class="field_name">Password: </label>
            <input id="tempPass" type="password" value="" class="span4" name="password">
        </div>
        <div class="modal-footer">
            <button type="submit"  class="btn dark_green" >Reset</button>
            <a  data-dismiss="modal" aria-hidden="true" class="btn grey">Close</a>

        </div>
    </form>
</div>
</body>
</html>