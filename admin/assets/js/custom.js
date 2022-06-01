$(document).ready(function() {

    $('.delete_municipality_btn').click(function (e){
        e.preventDefault();

        var id = $(this).val();
        //alert(id);

        swal({
            title: "Are you sure?",
            text: "Once deleted, you will not be able to recover the data",
            icon: "warning",
            buttons: true,
            dangerMode: true,
          })
          .then((willDelete) => {
            if (willDelete) {
                $.ajax({
                    method: "POST",
                        url: "code.php",
                        data: {
                            'municipalityid':id,
                            'delete_municipality_btn': true
                        },
                        success: function (response) {
                            console.log(response);
                            if(response == 100)
                            {
                                swal("Success!", "Municipality Deleted Successfully", "success");
                                $("#municipality_table").load(location.href + " #municipality_table");
                            }
                            else if(response == 200)
                            {
                                swal("Success!", "Something went wrong", "error");
                            }

                        }
                    });
            }
          });
        
    });

    $('.delete_category_btn').click(function (e){
        e.preventDefault();

        var id = $(this).val();
        //alert(id);

        swal({
            title: "Are you sure?",
            text: "Once deleted, you will not be able to recover the data",
            icon: "warning",
            buttons: true,
            dangerMode: true,
          })
          .then((willDelete) => {
            if (willDelete) {
                $.ajax({
                    method: "POST",
                        url: "code.php",
                        data: {
                            'categoryid':id,
                            'delete_category_btn': true
                        },
                        success: function (response) {
                            console.log(response);
                            if(response == 300)
                            {
                                swal("Success!", "Category Deleted Successfully", "success");
                                $("#category_table").load(location.href + " #category_table");

                            }
                            else if(response == 400)
                            {
                                swal("Success!", "Something went wrong", "error");
                            }

                        }
                    });
            }
          });
        
    });

    $('.delete_customer_btn').click(function (e){
        e.preventDefault();

        var id = $(this).val();
        //alert(id);

        swal({
            title: "Are you sure?",
            text: "Once deleted, you will not be able to recover the data",
            icon: "warning",
            buttons: true,
            dangerMode: true,
          })
          .then((willDelete) => {
            if (willDelete) {
                $.ajax({
                    method: "POST",
                        url: "code.php",
                        data: {
                            'userid':id,
                            'delete_customer_btn': true
                        },
                        success: function (response) {
                            console.log(response);
                            if(response == 500)
                            {
                                swal("Success!", "Customer Deleted Successfully", "success");
                                $("#customer_table").load(location.href + " #customer_table");

                            }
                            else if(response == 600)
                            {
                                swal("Success!", "Something went wrong", "error");
                            }

                        }
                    });
            }
          });
        
    });

    $('.delete_business_btn').click(function (e){
        e.preventDefault();

        var id = $(this).val();
        //alert(id);

        swal({
            title: "Are you sure?",
            text: "Once deleted, you will not be able to recover the data",
            icon: "warning",
            buttons: true,
            dangerMode: true,
          })
          .then((willDelete) => {
            if (willDelete) {
                $.ajax({
                    method: "POST",
                        url: "code.php",
                        data: {
                            'businessid':id,
                            'delete_business_btn': true
                        },
                        success: function (response) {
                            console.log(response);
                            if(response == 700)
                            {
                                swal("Success!", "Customer Deleted Successfully", "success");
                                $("#business_table").load(location.href + " #business_table");

                            }
                            else if(response == 800)
                            {
                                swal("Success!", "Something went wrong", "error");
                            }

                        }
                    });
            }
          });
        
    });
});