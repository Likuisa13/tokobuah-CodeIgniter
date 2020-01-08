<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Suppliers List</title>
    <link rel="stylesheet" type="text/css" href="<?php echo base_url('css/bootstrap.css')?>">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url('css/dataTables.bootstrap4.min.css')?>">
</head>
<body>
    <div class="container">
        <!-- Page Heading -->
        <div class="row">
            <div class="col-12">
                <div class="col-md-12">
                    <h1>Suppliers
                        <small>List</small>
                        <div class="float-right"><a href="javascript:void(0);" class="btn btn-primary" data-toggle="modal" data-target="#Modal_Add"><span class="fa fa-plus"></span> Add New</a></div>
                    </h1>
                </div>

                <table class="table table-striped" id="mydata">
                    <thead>
                        <tr>
                            <th>Suppliers Code</th>
                            <th>Suppliers Name</th>
                            <th>Address</th>
                            <th style="text-align: right;">Actions</th>
                        </tr>
                    </thead>
                    <tbody id="show_data">
                       
                    </tbody>
                </table>
            </div>
        </div>

    </div>

    <!-- MODAL ADD -->
    <form>
        <div class="modal fade" id="Modal_Add" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
          <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Add New Suppliers</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
              </button>
          </div>
          <div class="modal-body">
            <div class="form-group row">
                <label class="col-md-2 col-form-label">Suppliers Code</label>
                <div class="col-md-10">
                  <input type="text" name="id" id="id" class="form-control" placeholder="Suppliers Code">
              </div>
          </div>
          <div class="form-group row">
            <label class="col-md-2 col-form-label">Suppliers Name</label>
            <div class="col-md-10">
              <input type="text" name="name" id="name" class="form-control" placeholder="Suppliers Name">
          </div>
      </div>
      <div class="form-group row">
        <label class="col-md-2 col-form-label">address</label>
        <div class="col-md-10">
          <input type="text" name="address" id="address" class="form-control" placeholder="address">
      </div>
  </div>
</div>
<div class="modal-footer">
    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
    <button type="button" type="submit" id="btn_save" class="btn btn-primary">Save</button>
</div>
</div>
</div>
</div>
</form>
<!--END MODAL ADD-->

<!-- MODAL EDIT -->
<form>
    <div class="modal fade" id="Modal_Edit" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Edit Suppliers</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
          </button>
      </div>
      <div class="modal-body">
        <div class="form-group row">
            <label class="col-md-2 col-form-label">Suppliers Code</label>
            <div class="col-md-10">
              <input type="text" name="id_edit" id="id_edit" class="form-control" placeholder="Suppliers Code" readonly>
          </div>
      </div>
      <div class="form-group row">
        <label class="col-md-2 col-form-label">Suppliers Name</label>
        <div class="col-md-10">
          <input type="text" name="name_edit" id="name_edit" class="form-control" placeholder="Suppliers Name">
      </div>
  </div>
  <div class="form-group row">
    <label class="col-md-2 col-form-label">address</label>
    <div class="col-md-10">
      <input type="text" name="address_edit" id="address_edit" class="form-control" placeholder="address">
  </div>
</div>
</div>
<div class="modal-footer">
    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
    <button type="button" type="submit" id="btn_update" class="btn btn-primary">Update</button>
</div>
</div>
</div>
</div>
</form>
<!--END MODAL EDIT-->

<!--MODAL DELETE-->
<form>
    <div class="modal fade" id="Modal_Delete" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Delete Suppliers</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
          </button>
      </div>
      <div class="modal-body">
       <strong>Are you sure to delete this record?</strong>
   </div>
   <div class="modal-footer">
    <input type="hidden" name="id_delete" id="id_delete" class="form-control">
    <button type="button" class="btn btn-secondary" data-dismiss="modal">No</button>
    <button type="button" type="submit" id="btn_delete" class="btn btn-primary">Yes</button>
</div>
</div>
</div>
</div>
</form>
<!--END MODAL DELETE-->

<script type="text/javascript" src="<?php echo base_url('js/jquery-3.3.1.js')?>"></script>
<script type="text/javascript" src="<?php echo base_url('js/bootstrap.js')?>"></script>
<script type="text/javascript" src="<?php echo base_url('js/jquery.dataTables.min.js')?>"></script>
<script type="text/javascript" src="<?php echo base_url('js/dataTables.bootstrap4.min.js')?>"></script>
<script type="text/javascript">
    $(document).ready(function(){
        show_suppliers(); //call function show all Suppliers

        $('#mydata').dataTable();
        
        function show_suppliers(){
            $.ajax({
                type  : 'ajax',
                url   : '<?php echo site_url('admin/suppliers/supplier_data')?>',
                async : true,
                dataType : 'json',
                success : function(data){
                    var html = '';
                    var i;
                    for(i=0; i<data.length; i++){
                        html += '<tr>'+
                        '<td>'+data[i].id+'</td>'+
                        '<td>'+data[i].name+'</td>'+
                        '<td>'+data[i].address+'</td>'+
                        '<td style="text-align:right;">'+
                        '<a href="javascript:void(0);" class="btn btn-info btn-sm item_edit" data-id="'+data[i].id+'" data-name="'+data[i].name+'" data-address="'+data[i].address+'">Edit</a>'+' '+
                        '<a href="javascript:void(0);" class="btn btn-danger btn-sm item_delete" data-id="'+data[i].id+'">Delete</a>'+
                        '</td>'+
                        '</tr>';
                    }
                    $('#show_data').html(html);
                }

            });
        }

        //Save Suppliers
        $('#btn_save').on('click',function(){
            var id = $('#id').val();
            var name = $('#name').val();
            var address = $('#address').val();
            $.ajax({
                type : "POST",
                url  : "<?php echo site_url('admin/suppliers/save')?>",
                dataType : "JSON",
                data : {id:id , name:name, address:address},
                success: function(data){
                    $('[name="id"]').val("");
                    $('[name="name"]').val("");
                    $('[name="address"]').val("");
                    $('#Modal_Add').modal('hide');
                    show_suppliers();
                }
            });
            return false;
        });

        //get data for update record
        $('#show_data').on('click','.item_edit',function(){
            var id = $(this).data('id');
            var name = $(this).data('name');
            var address        = $(this).data('address');

            $('#Modal_Edit').modal('show');
            $('[name="id_edit"]').val(id);
            $('[name="name_edit"]').val(name);
            $('[name="address_edit"]').val(address);
        });

        //update record to database
        $('#btn_update').on('click',function(){
            var id = $('#id_edit').val();
            var name = $('#name_edit').val();
            var address        = $('#address_edit').val();
            $.ajax({
                type : "POST",
                url  : "<?php echo site_url('admin/suppliers/update')?>",
                dataType : "JSON",
                data : {id:id , name:name, address:address},
                success: function(data){
                    $('[name="id_edit"]').val("");
                    $('[name="name_edit"]').val("");
                    $('[name="address_edit"]').val("");
                    $('#Modal_Edit').modal('hide');
                    show_suppliers();
                }
            });
            return false;
        });

        //get data for delete record
        $('#show_data').on('click','.item_delete',function(){
            var id = $(this).data('id');

            $('#Modal_Delete').modal('show');
            $('[name="id_delete"]').val(id);
        });

        //delete record to database
        $('#btn_delete').on('click',function(){
            var id = $('#id_delete').val();
            $.ajax({
                type : "POST",
                url  : "<?php echo site_url('admin/suppliers/delete')?>",
                dataType : "JSON",
                data : {id:id},
                success: function(data){
                    $('[name="id_delete"]').val("");
                    $('#Modal_Delete').modal('hide');
                    show_suppliers();
                }
            });
            return false;
        });

    });

</script>
</body>
</html>