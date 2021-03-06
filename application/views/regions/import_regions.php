<div id="content" class="content">
   
    <div class="breadcrumb-container ">
        <ol class="breadcrumb pull-left ">
          <li><a href="<?php echo site_url('dashboard') ?>"><i class="fa fa-dashboard"></i> Dashboard</a></li>
            <li class="active">Import Regions</li>
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
        <div class="col-md-12">
            <div class="panel panel-primary">
                <div class="panel-heading">
                    <div class="panel-heading-btn">
                        <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-primary" data-click="panel-expand"><i class="fa fa-expand"></i></a>
                        <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-warning" data-click="panel-collapse"><i class="fa fa-minus"></i></a>
                        
                    </div>
                    <h4 class="panel-title">Import Regions</h4>
                </div>
                <div class="panel-body">
                 <div class="well-content no_search">
                    <?php //echo $status->message; ?>
                    <form action="<?=base_url('regions/do_upload')?>" method="post" enctype="multipart/form-data" class="form-horizontal">

                        <div class="form_row">
                            <label for="userfile" class="field_name align_right lblBold">Select File To Import:</label>
                            <div class="field">
                                <input type="file" name="userfile" id="userfile"/>
                            </div>

                        </div>

                        <hr class="field-separator">
                        <div class="form_row">
                            <label class="field_name align_right"></label>
                            <div class="form-group col-lg-3">
                                
                              <div class="col-md-12 col-xs-12">
                                <br>
                                <br>
                                <br>
                                <button type="submit" name="submit" class="btn btn-primary" onclick="checkFile()"><i class="fa fa-upload"></i> Import</button>
                            </div>
                        </div>
                    </div>

                </form>

                <br/>
                <?php
                $existing = $this->session->flashdata('existing');
                if(!empty($existing)){ ?>
                <div id="alertdiv" class="alert alert-info "><a class="close" data-dismiss="alert">x</a>
                    <strong>Regions already Existing!</strong>
                    <br>
                    <span><?= $existing ?></span>
                </div>
                <?php } ?>
                <br/>
                <?php
                $not_imported = $this->session->flashdata('notImported');
                if(!empty($not_imported)){ ?>
                <div id="alertdiv" class="alert alert-info "><a class="close" data-dismiss="alert">x</a>
                    <strong>Failed to import!</strong>
                    <br>
                    <span><?= $not_imported ?></span>
                </div>
                <?php } ?>
            </div> 
        </div>
        <div class="panel-footer">Import Regions</div>
    </div>
</div>
</div>
</div>


<div class="modal fade" id="importModal">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                <h4 class="modal-title">Processing</h4>
            </div>
            <div class="modal-body">
                <div id="loading-div-background">
                    <div id="loading-div" class="ui-corner-all align_center">
                        <img  src="<?php echo base_url('assets/img/import_loader.gif'); ?>" alt="Importing.."/>
                        <br>PROCESSING. PLEASE WAIT...
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>


<!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->

    <script type="text/javascript">
        function checkFile(){
            jQuery('#importModal').modal('show');
        }
    </script>


</body>
</html>