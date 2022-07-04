<?php   
    $repository = [];
    session_start();
    $errors = [];
    if($_SERVER['REQUEST_METHOD'] === 'POST'){
      if(isset($_FILES['image'])){
        $file_name = $_FILES['image']['name'];
        $file_size =$_FILES['image']['size'];
        $file_tmp = $_FILES['image']['tmp_name'];
        $file_type = $_FILES['image']['type'];
        $file_ext = strtolower(end(explode('.',$_FILES['image']['name'])));
        
        $extensions= array("png");
        
        if(in_array($file_ext,$extensions) == false){
          array_push($errors,"Unsuported File");
          echo '
          <div id="popup" class="audun_warn">
             <i class="fa fa-exclamation-triangle" aria-hidden="true"></i>
            Its not an image try again 
          </div>';
        }
        else if(empty($errors) == true){
           move_uploaded_file($file_tmp,"./UsersRegistry/".$file_name);
           echo '<div id="popup1" class="audun_success popup">
           <i class="fa fa-check-circle" aria-hidden="true"></i>
           Files Registered 
           </div>';
        }else{
           print_r($errors);
        }
     }
    }


    $items = scandir("./UsersRegistry");
    foreach($items as $item)
    {
      if($items !== "." || $items !== ".."){
        array_push($repository, $item);
      }
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Main Page</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="style.css">
    <script src="https://kit.fontawesome.com/a6948756a2.js" crossorigin="anonymous"></script>
    <script
  src="https://code.jquery.com/jquery-3.6.0.js"
  integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk="
  crossorigin="anonymous"></script>
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.12.1/css/jquery.dataTables.css">
  <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.js"></script>
  <script src="https://kit.fontawesome.com/a6948756a2.js" crossorigin="anonymous"></script>
</head>
<body>
<section class="vh-100 gradient-custom">
  <div class="container py-5 h-100">
    <div class="row d-flex justify-content-center h-100">
      <div class="col-12 col-md-8 col-lg-6 col-xl-5">
        <div class="card bg-white text-black" style="border-radius: 1rem;">
          <div class="card-body p-4 text-center">
            <div class="mb-md-5 mt-md-4 pb-5">
              <h2 class="fw-bold mb-2 text-uppercase">Welcome!</h2>
                <img width="300px" height="300px" src="" alt="Rendered_Image">
                <form id="my-form" action="<?php echo $_SERVER['PHP_SELF'];?>" method="POST" enctype="multipart/form-data">
                <div style="width: 80%; margin-left:auto; margin-right:auto;" class="form-outline form-white mb-4">
              </div>
              <div class="form-outline form-white mb-4">
                <input name="image" style="width: 80%; margin-left:auto; margin-right:auto;" type="file" id="file" class="form-control form-control-lg" />
                <label class="form-label" for="file">Insert a file here</label>
              </div>
              <button class="btn btn-dark btn-lg px-5" type="submit">Upload</button>
            </form>
            </div>
          </div>
        </div>
      </div>
      <div class="col-12 col-md-8 col-lg-6 col-xl-5">
        <div class="card bg-white text-dark" style="border-radius: 1rem;">
          <div class="card-body p-4 text-center">
            <div class="mb-md-5 mt-md-4 pb-5">
              <h2 class="fw-bold mb-2 text-uppercase">Your Files</h2>
              <table id="table" style=" border-radius: 8px;" class="table">
                <thead>
                  <tr>
                    <th width="60%">Files</th>
                    <th width="20%">Preview</th>
                    <th width="20%">Delete</th>
                  </tr>
                </thead>
              </table>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
<button id="delete" value="testImage">algo</button>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.5/dist/umd/popper.min.js" integrity="sha384-Xe+8cL9oJa6tN/veChSP7q+mnSPaj5Bcu9mPX5F5xIGE0DVittaqT5lorf0EI7Vk" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.min.js" integrity="sha384-kjU+l4N0Yf4ZOJErLsIcvOU2qSb74wXpOhqTvwVx3OElZRweTnQ6d31fXEoRD1Jy" crossorigin="anonymous"></script>
<script>
  //Made to make the popup dissapear after certain time
// setTimeout(() => {
//   const box = document.getElementById('popup');
//   const box1 = document.getElementById('popup1');
//   const box2 = document.getElementById('popup2');
//   box.style.display = 'none';
//   box1.style.display = 'none';
//   box2.style.display = 'none';
// }, 5000);

var info = <?php echo json_encode($repository) ?>;
console.log(info);
$(document).ready(()=>{
    const table = $('#table').DataTable({
      paging:false,
      info:false,
      columns:[
        {
                render: function(data){
                    return `
                    ${data}
                    `;
                }
            },
            {
                render: function(data){
                    return `
                    <button class="btn btn-dark preview" value="${data}"><i class="fa-solid fa-2xs fa-magnifying-glass"></i></button>
                    `;
                }
            },
            {
                render: function(data){
                    return `<button class="btn btn-dark delete" value="${data}"><i class="fa-solid fa-2xs fa-trash"></i></button>`;
                }
            }
      ]
    });
    info.forEach(data => {
      table.row.add([data, data, data]).draw();
    });
    // setInterval( function () {
    //   $('#table').DataTable.ajax.reload();
    // }, 2000 );

    $(".delete").click((e) => {
      e.preventDefault();
      var fileSend = $(e.target).val();
      console.log(fileSend);
      $.ajax({
        type: "POST",
        url: "delete.php",
        data:{
          name: fileSend
        },
        dataType:"json",
        encode:"true",
        success: function (res){
          console.log(res);
          table.row( $(this).parents("tr") ).remove().draw();
        },
        error: function(res){
          console.log(res.responseText);
        }

      })
    });
}
);




</script>
</body>
</html>