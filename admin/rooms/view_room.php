<?php
if(isset($_GET['id'])){
    $qry = $conn->query("SELECT * FROM `room_list` where id = '{$_GET['id']}'");
    if($qry->num_rows > 0){
        $res = $qry->fetch_array();
        foreach($res as $k => $v){
            if(!is_numeric($k))
            $$k = $v;
        }
    }
}
?>
<style>
    #banner-img{
        object-fit: scale-down;
        object-position:center center;
    }
</style>
<div class="card card-outline card-primary rounded-0 shadow mb-5">
    <div class="card-header">
        <h4 class="card-title"><b>Room Details</b></h4>
        <div class="card-tools">
            <button class="btn btn-primary btn-sm btn-flat" type="button" id="edit_room"><i class="fa fa-edit"></i> Edit Details</button>
            <button class="btn btn-danger btn-sm btn-flat" type="button" id="delete_room"><i class="fa fa-trash"></i> Delete</button>
            <a class="btn btn-light border btn-sm btn-flat" href="./?page=rooms" ><i class="fa fa-angle-left"></i> Back to List</a>
        </div>
    </div>
    <div class="card-body">
        <div class="container-fluid">
            <div class="row justify-content-center">
                <div class="col-md-8 col-sm-12">
                    <img src="<?= validate_image(isset($image_path) ? $image_path : "") ?>" alt="Room Image" class="img-thumbnail bg-gradient-dark" id="banner-img">
                </div>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <dl>
                        <dt class="text-muted">Room Name</dt>
                        <dd class='pl-4 fs-4 fw-bold'><?= isset($name) ? $name : 'N/A' ?></dd>
                        <dt class="text-muted">Room Type</dt>
                        <dd class='pl-4 fs-4 fw-bold'><?= isset($type) ? $type : 'N/A' ?></dd>
                    </dl>
                </div>
                <div class="col-md-6">
                    <dl>
                        <dt class="text-muted">Price</dt>
                        <dd class='pl-4 fs-4 fw-bold'><?= isset($price) ? number_format($price,2) : '0.00' ?></dd>
                        <dt class="text-muted">Status</dt>
                        <dd class='pl-4 fs-4 fw-bold'>
                            <?php 
                                if(isset($status)){
                                    switch($status){
                                        case '1':
                                            echo '<span class="px-4 badge badge-success rounded-pill">Active</span>' ;
                                            break;
                                        case '0':
                                            echo '<span class="px-4 badge badge-danger rounded-pill">Inactive</span>' ;
                                            break;
                                    }
                                }
                            
                            ?>

                        </dd>
                    </dl>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <small class="text-muted">Description</small>
                    <div><?= isset($description) ? html_entity_decode($description) : "N/A" ?></div>
                </div>
            </div>
        </div>
    </div>
</div>


<script>
    function delete_room(){
		start_loader();
		$.ajax({
			url:_base_url_+"classes/Master.php?f=delete_room",
			method:"POST",
			data:{id: '<?= isset($id) ? $id :'' ?>'},
			dataType:"json",
			error:err=>{
				console.log(err)
				alert_toast("An error occured.",'error');
				end_loader();
			},
			success:function(resp){
				if(typeof resp== 'object' && resp.status == 'success'){
					location.href= './?page=rooms';
				}else{
					alert_toast("An error occured.",'error');
					end_loader();
				}
			}
		})
	}
    $(function(){
        $('#edit_room').click(function(){
            uni_modal("Update Room Details","rooms/manage_room.php?id=<?= isset($id) ? $id : '' ?>",'large')
        })
        $('#delete_room').click(function(){
            _conf("Are you sure to delete this Room permanently?","delete_room",[])
        })
    })
</script>