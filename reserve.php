<style>
    #uni_modal .modal-footer{
        display: none;
    }
</style>
<div class="conteiner-fluid">
    <form action="" id="reserve-form">
        <input type="hidden" name="id">
        <input type="hidden" name="room_id" value="<?= isset($_GET['rid']) ? $_GET['rid'] : '' ?>">
        <fieldset>
            <legend class="text-muted">Reservation Date</legend>
            <div class="row">
                <div class="col-md-6">
                    <input type="date" name="check_in" min="<?= date('Y-m-d',strtotime(date('Y-m-d')." +1 day")) ?>" class="form-control form-control-sm form-control-border" required>
                    <small class="mx-2">Check-in Date</small>
                </div>
                <div class="col-md-6">
                    <input type="date" name="check_out" class="form-control form-control-sm form-control-border" min="<?= date('Y-m-d',strtotime(date('Y-m-d')." +2 days")) ?>" required>
                    <small class="mx-2">Check-out Date</small>
                </div>
            </div>
        </fieldset>
        <fieldset>
            <legend class="text-muted">Reservor Details</legend>
            <div class="row">
                <div class="col-md-8">
                    <input type="text" name="fullname" class="form-control form-control-sm form-control-border" placeholder="John D Smith" required>
                    <small class="mx-2">Fullname</small>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <input type="text" name="contact" class="form-control form-control-sm form-control-border" placeholder="09xxxxxxxxxxx" required>
                    <small class="mx-2">Contact #</small>
                </div>
                <div class="col-md-6">
                    <input type="email" name="email" class="form-control form-control-sm form-control-border" placeholder="jsmith@sample.com" required>
                    <small class="mx-2">Email</small>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <small class="mx-2">Address</small>
                    <textarea rows="3" name="address" class="form-control form-control-sm" placeholder="Block 23 Lot 6, Her Subd., Down There City, Anywhere, 2306" required></textarea>
                </div>
            </div>
        </fieldset>
        <hr>
        <div class="my-2 text-right">
            <button class="btn btn-primary btn-flat btn-sm">Submit Reservation</button>
            <button class="btn btn-dark btn-flat btn-sm" type="button" data-dismiss='modal'><i class="fa fa-times"></i> Close</button>
        </div>
    </form>
</div>

<script>
   
   $(function(){
        $('#reserve-form').submit(function(e){
            e.preventDefault();
            var _this = $(this)
            $('.pop-msg').remove()
            var el = $('<div>')
                el.addClass("pop-msg alert")
                el.hide()
            start_loader();
            $.ajax({
                url:_base_url_+"classes/Master.php?f=save_reservation",
				data: new FormData($(this)[0]),
                cache: false,
                contentType: false,
                processData: false,
                method: 'POST',
                type: 'POST',
                dataType: 'json',
				error:err=>{
					console.log(err)
					alert_toast("An error occured",'error');
					end_loader();
				},
                success:function(resp){
                    if(resp.status == 'success'){
                        // alert_toast("Success",'success')
                        location.reload();
                    }else if(!!resp.msg){
                        el.addClass("alert-danger")
                        el.text(resp.msg)
                        _this.prepend(el)
                    }else{
                        el.addClass("alert-danger")
                        el.text("An error occurred due to unknown reason.")
                        _this.prepend(el)
                    }
                    el.show('slow')
                    $('html,body').animate({scrollTop:0},'fast')
                    end_loader();
                }
            })
        })

   })
    
</script>