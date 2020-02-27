<?php
include "includes/header.php";
include "includes/sidebar.php";
?>

<!-- ============================================================== -->
<!-- Start Page Content here -->
<!-- ============================================================== -->

<div class="content-page">
    <div class="content">

        <!-- Start Content-->
        <div class="container-fluid">

            <!-- start page title -->
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box">
                        <div class="page-title-right">
                            <ol class="breadcrumb m-0">
                                <li class="breadcrumb-item"><a href="javascript: void(0);">Home</a></li>
                                <li class="breadcrumb-item active">Add/Modify Venue</li>
                            </ol>
                        </div>
                        <h4 class="page-title">Add/Modify Venue</h4>
                    </div>
                </div>
            </div>     
            <!-- end page title --> 
            <div class="row">
                <div class="col-md-4">
                    <div class="card">
                        <div class="card-body">
                            <form method="post" action="">
                                <div class="row">
                                    
                                    <div class="col-md-12">  
                                        <div class="alert alert-success on">Venue Added</div>
                                    <div class="alert alert-danger off">Venue Cannot Be Added</div>
                                        <div class="form-group">
                                            <label>Venue</label>
                                            <input type="text" class="form-control" name="room_title" id="room_title" placeholder="Venue">
                                        </div>
                                    </div>
                                    <div class="col-md-12">  
                                        <div class="form-group">
                                            <label>Venue Capacity</label>
                                            <input type="text" class="form-control" name="room_capacity" id="room_capacity" placeholder="Capacity">
                                        </div>
                                    </div>
                                    <div class="col-md-12">  
                                        <div class="form-group">
                                           <button type="button" class="btn btn-block btn-info rounded-0" id="submit" name="add-venue">Add Venue</button> 
                                       </div>
                                   </div>
                               </div>
                           </form>


                       </div> <!-- end card-body -->
                   </div> <!-- end card-->
               </div> <!-- end col -->



               <div class="col-md-8">
                <div class="card">
                    <div class="card-body">
                                <div id="listhere"></div>
                    </div> <!-- end card body-->
                </div> <!-- end card -->
            </div><!-- end col-->
            
        </div>

    </div> <!-- container -->

</div> <!-- content -->

<?php
include "includes/footer.php";
?>
<script type="text/javascript">
        $('.on, .off').hide();
   $(function(){
        ListTable();
                    // $("#basic-datatable").Datatable();

         $('#submit').click(function(){
            var room_title=$('#room_title').val();
            var room_capacity=$('#room_capacity').val();
            $.ajax({
                url: 'includes/add_venue.php',
                type: 'POST',
                data: {room_title:room_title,room_capacity,room_capacity},
                success:function(data){
                    // console.log(data);
                    if(data==1){
                        $('.on').show();
                        $('.off').hide();
                    }
                    else{
                        $('.off').show();
                        $('.on').hide();

                    }
                }
            });
            // window.setInterval(ListTable(),1000);
         });
         function ListTable(){
            $.ajax({
                url: 'includes/list_venue.php',
                type: 'GET',
                // dataType: "html",
                success:function(data){
                    // console.log(data);
                    // $('#listhere').html(data);
                    var count=1;
                    var obj = $.parseJSON(data);      
                    var result = "<table id='basic-datatable' class='table table-striped dt-responsive nowrap'><thead><tr><th>S/N</th><th>Venue Name</th><th>Capacity</th><th>Action</th></tr></thead><tbody>";
                    $.each(obj, function() {
                        var room_id=this['room_id'];
                        var room_link=href="";
                        result = result + "<tr><td>" + count++ +"</td><td>"+ this['room_title'] + "</td><td>" + this['capacity'] + "</td><td><a class='btn btn-danger' href=includes/delete-room.php?room_id="+room_id+">Delete Venue</a> </td></tr>";
                    });
                    result = result + "</tbody></table>";
                    $("#listhere").html(result);


            }
         })
        
   }
           window.setInterval(function(){
               /// call your function here
              ListTable();

            }, 2000);
})
</script>