<div class="content-page">
    <!-- Start content -->
    <div class="content">
        <div class="container">

            <div class="row">
                <div class="col-sm-12">
                    <div class="card-box table-responsive">


                  <h4 class="header-title m-t-0 m-b-30">Greek Channels</h4>

                        <table id="datatable-buttons" class="table table-striped table-bordered"></table>
                    </div>
                </div><!-- end col -->
            </div>
            <!-- end row -->
            <div id="add-the-channel" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                            <h4 class="modal-title">Add a new channel.</h4>
                        </div>
                        <div class="modal-body">
                          <form id="formadd" action="">

                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group">
                                      <label for="field-title" class="control-label">Channel Title</label>
                                        <input type="text" class="form-control" id="field-title">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                      <label for="field-region" class="control-label">Region</label>
                            <select id="field-region" class="form-control">
                              <option  value="Nationwide">Nationwide</option>
                              <option  value="Local">Local</option>
                              <option  value="WebTV">WebTV</option>
                              <option  value="World">World</option>
                              <option  value="Cyprus">Cyprus</option>
                            </select>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                      <label for="field-type" class="control-label">Type</label>
                            <select id="field-type" class="form-control">
                              <option  value="video">video</option>
                              <option  value="audio">audio</option>
                            </select>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="field-description" class="control-label">Description / Comment</label>
                                        <input type="text" class="form-control" id="field-description">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group">
                                      <label for="field-sdimage" class="control-label">SD Image</label>
                            <input type="text" class="form-control" id="field-sdimage">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                      <label for="field-hdimage" class="control-label">HD Image</label>
                            <input type="text" class="form-control" id="field-hdimage">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                      <label for="field-order" class="control-label">Order</label>
                            <select id="field-order" class="form-control">
                              <?php
                              for ($i = 1; $i <= 100; $i++) {echo '<option value="'.$i.'">'.$i.'</option>';}
?>
                            </select>
                                    </div>
                                </div>
                            </div>

                        </div>
                        <div class="modal-footer">

                            <button type="button" class="btn btn-default waves-effect" data-dismiss="modal">Close</button>
                            <button type="submit" value="Submit"  class="btn btn-info waves-effect waves-light">Add channel</button>
                        </div>
                        </form>
                    </div>
                </div>
            </div><!-- /.modal -->


            <div id="edit-the-channel" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                            <h4 class="modal-title">Edit a  channel.</h4>
                        </div>
                        <div class="modal-body">
                          <form id="formedit" action="">

                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group">
                                      <label for="field-title-e" class="control-label">Channel Title</label>
                                        <input type="text" class="form-control" id="field-title-e">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                      <label for="field-region-e" class="control-label">Region</label>
                            <select id="field-region-e" class="form-control">
                              <option  value="Nationwide">Nationwide</option>
                              <option  value="Local">Local</option>
                              <option  value="WebTV">WebTV</option>
                              <option  value="World">World</option>
                              <option  value="Cyprus">Cyprus</option>
                            </select>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                      <label for="field-type-e" class="control-label">Type</label>
                            <select id="field-type-e" class="form-control">
                                <option  value="video">video</option>
                                <option  value="audio">audio</option>
                            </select>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="field-description-e" class="control-label">Description / Comment</label>
                                        <input type="text" class="form-control" id="field-description-e">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group">
                                      <label for="field-sdimage-e" class="control-label">SD Image</label>
                            <input type="text" class="form-control" id="field-sdimage-e">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                      <label for="field-hdimage-e" class="control-label">HD Image</label>
                            <input type="text" class="form-control" id="field-hdimage-e">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                      <label for="field-order-e" class="control-label">Order</label>
                            <select id="field-order-e" class="form-control">
                              <?php
                              for ($i = 1; $i <= 100; $i++) {echo '<option value="'.$i.'">'.$i.'</option>';}
?>
                            </select>
                                    </div>
                                </div>
                            </div>

                        </div>
                        <div class="modal-footer">
                          <input type="hidden" id="field-id-e" >
                            <button type="button" class="btn btn-default waves-effect" data-dismiss="modal">Close</button>
                            <button type="submit" value="Submit"  class="btn btn-info waves-effect waves-light">Edit Channel</button>
                        </div>
                        </form>
                    </div>
                </div>
            </div><!-- /.modal -->

        </div> <!-- container -->

    </div> <!-- content -->

    <footer class="footer">
        2016 © GreekTV by UPG.GR.
    </footer>

</div>
