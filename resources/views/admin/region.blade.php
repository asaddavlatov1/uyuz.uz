<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css"> 
  <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js"></script> 
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script> 
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js"></script> 

  <title>Document</title>
</head>
<body>
  

<div class="container"> 
  <h2 class="text-center">Viloyat qo'shish</h2> 
  <div class="form-group">
    <a href="/admin"><button class="btn btn-danger" type="button">Orqaga qaytish</button></a>
  </div>
  <div class="d-grid gap-2 d-md-flex justify-content-md-end">
  <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#exampleModal" data-bs-whatever="@mdo">Add+</button>
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Viloyat qo'shish</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body">
          <form action="/admin/regioncode" method="post">
          @csrf 
              <div class="mb-12">
                <label for="recipient-name" class="col-form-label">Viloyat:</label>
                <input type="text" class="form-control" id="region" name="region">
              </div>
            </div>
          <div class="modal-footer">
            <button type="submit" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-success">Kiritish</button>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>

  <div class="row">      
      <table class="table table-striped" border="1">
        <thead>
          <tr class="text-center">
            <th>T/r</th>
            <th>Name</th>
            <th>edit</th>
          </tr>
        </thead>
        <tbody>
          @foreach($regions as $region)
            <tr class="text-center">
              <td>{{$loop->index+1}}</td>
              <td>{{$region->name}}</td>
              <td>
                <div class="btn-group" role="group" aria-label="Basic example">
                   <form action="/adminedit/regiondelete"><input type="hidden" value="{{$region->id}}" name="id" ><button type="submit" class="btn btn-danger"><i class="bi bi-trash"></i>Delete</button></form>
                </div>
             </td>
            </tr>
          @endforeach
        </tbody>  
      </table>
    </div>  
  </div>     



</div> 
</body>
</html>

