<nav class="navbar navbar-light navbar-expand bg-white shadow mb-4 topbar static-top">
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
            <!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
            <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
            <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

            <ul class="nav navbar-nav navbar-right">
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown"><span class="label label-pill label-danger count" style="border-radius:10px;"></span> <span class="glyphicon glyphicon-bell" style="font-size:18px;"></span></a>
                    <ul class="dropdown-menu"></ul>
                </li>
            </ul> -->

            <script>
            $(document).ready(function(){
            
            function load_unseen_notification(view = '')
            {
            $.ajax({
            url:"fetch.php",
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
                        <span class="d-none d-lg-inline me-2 text-gray-600 small"><?= $_SESSION['auth_user']['name'];?></span>
                        <img class="border rounded-circle img-profile" src="../uploads/<?= $_SESSION['auth_user']['image'];?>">
                    </a>
                    <div class="dropdown-menu shadow dropdown-menu-end animated--grow-in">
                        <a class="dropdown-item" href="profile.php?id=<?= $_SESSION['auth_user']['userid'];?>">
                            <i class="fas fa-user fa-sm fa-fw me-2 text-gray-400"></i>&nbsp;Profile</a>
                        <a class="dropdown-item" href="admin.php">
                            <i class="fas fa-cogs fa-sm fa-fw me-2 text-gray-400"></i>&nbsp;Admin</a>
                        <a class="dropdown-item" href="changepassword.php?id=<?= $_SESSION['auth_user']['userid'];?>">
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