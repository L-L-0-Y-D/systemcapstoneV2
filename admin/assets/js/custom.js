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
                            if(response == 200)
                            {
                                swal("Success!", "Municipality Deleted Successfully", "success");
                            }
                            else if(response == 500)
                            {
                                swal("Success!", "Something went wrong", "error");
                            }

                        }
                    });
            }
          });
        
    });
});