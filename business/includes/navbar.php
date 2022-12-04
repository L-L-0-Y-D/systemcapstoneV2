<nav class="navbar navbar-light navbar-expand bg-white shadow mb-1 topbar static-top">
    <div class="container-fluid">
        <button class="btn btn-link d-md-none rounded-circle me-3" id="sidebarToggleTop" type="button"><i class="fas fa-bars"></i></button>
        <ul class="navbar-nav flex-nowrap ms-auto">
            <li class="nav-item dropdown no-arrow mx-1">
                <div class="nav-item dropdown no-arrow"><a class="dropdown-toggle notificationtoggle nav-link" aria-expanded="false" data-bs-toggle="dropdown" href="#"><span class="badge bg-danger badge-counter count"></span><i class="fas fa-bell fa-fw"></i></a>
                    <div class="dropdown-menu notification dropdown-menu-end dropdown-list animated--grow-in">
                        <h6 class="dropdown-header">Notification</h6>
                    </div>
                </div>
            </li>
            <script>
            $(document).ready(function(){
            
            function load_unseen_notification(view = '')
            {
            $.ajax({
            url:"fetchnotification.php?id=<?= $_SESSION['auth_user']['businessid'];?>",
            method:"POST",
            data:{view:view},
            dataType:"json",
            success:function(data)
            {
                $('.notification').html(data.notification);
                if(data.unseen_notification > 0)
                {
                $('.count').html(data.unseen_notification);
                }
            }
            });
            }
            
            load_unseen_notification();
            
            //  $('#comment_form').on('submit', function(event){
            //   event.preventDefault();
            //   if($('#subject').val() != '' && $('#comment').val() != '')
            //   {
            //     alert($('#subject').val());
            //     alert($('#comment').val());
            //    var form_data = $(this).serialize();
            //    $.ajax({
            //     url:"insert.php",
            //     method:"POST",
            //     data:form_data,
            //     success:function(data)
            //     {
            //      $('#comment_form')[0].reset();
            //      load_unseen_notification();
            //     }
            //    });
            //   }
            //   else
            //   {
            //    alert("Both Fields are Required");
            //   }
            //  });
            
            $(document).on('click', '.notificationtoggle', function(){
            $('.count').html('');
            load_unseen_notification('yes');
            });
            
            setInterval(function(){ 
            load_unseen_notification();; 
            }, 5000);
            
            });
            </script>
            <div class="d-none d-sm-block topbar-divider"></div>
            <li class="nav-item dropdown no-arrow">
                <div class="nav-item dropdown no-arrow">
                    <a class="dropdown-toggle nav-link" aria-expanded="false" data-bs-toggle="dropdown" href="#">
                        <?php
                        $host = "localhost";
                        $username = "u217632220_ieat";
                        $password = "Hj1@8QuF3C";
                        $database = "u217632220_ieatwebsite";

                        // Creating database connection
                        $con = mysqli_connect($host,$username,$password,$database);
                        $businessid = $_SESSION['auth_user']['businessid']; 
                        $sql = "SELECT * FROM `business` WHERE businessid = $businessid;";
                        $result = $con->query($sql);
                        $item = mysqli_fetch_assoc($result);
                        ?>
                        <span class="d-none d-lg-inline me-2 text-gray-600 small"><?= $item['business_name'];?></span>
                        <img class="border rounded-circle img-profile" src="../uploads/<?= $item['image'];?>">
                    </a>
                    <div class="dropdown-menu shadow dropdown-menu-end animated--grow-in">
                        <a class="dropdown-item" href="profile.php?id=<?= $_SESSION['auth_user']['businessid'];?>">
                            <i class="fas fa-user fa-sm fa-fw me-2 text-gray-400"></i>&nbsp;Profile</a>
                        <a class="dropdown-item" href="changepassword.php?id=<?= $_SESSION['auth_user']['businessid'];?>">
                            <i class="fas fa-key fa-sm fa-fw me-2 text-gray-400"></i>&nbsp;Change Password</a>
                            <div class="dropdown-divider bg-gray-500"></div>
                        <a class="dropdown-item" href="../logout.php">
                            <i class="fas fa-sign-out-alt fa-sm fa-fw me-2 text-gray-400"></i>&nbsp;Logout</a>
                    </div>
                </div>
            </li>
        </ul>
    </div>
</nav>