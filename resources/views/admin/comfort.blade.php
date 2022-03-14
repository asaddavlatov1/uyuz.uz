<!DOCTYPE html> 
<html lang="en"> 
<head> 
  <title>Qulayliklar</title> 
  <meta charset="utf-8"> 
  <meta name="viewport" content="width=device-width, initial-scale=1"> 
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css"> 
  <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js"></script> 
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script> 
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js"></script> 

</head> 
<body> 

<div class="container">
  <div class="form-group">
    <a href="/admin"><button class="btn btn-danger" type="button">Orqaga qaytish</button></a>
  </div>
</div>


<div class="container"> 
  <h2 class="text-center">Qulayliklari</h2> 

  <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#exampleModal" data-bs-whatever="@mdo">Add+</button>

<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Comfortlar qo'shish</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
      <form action="/admin/comfortcode" method="post">
       @csrf
          <div class="mb-3">
            <label for="recipient-name" class="col-form-label">Uy turini tanlang:</label>
            <select class="form-control" id="exampleFormControlSelect1" name="flat"> 
              <option>Uy turini tanlang: </option> 
              @foreach($flats as $flat)
                <option value="{{$flat->id}}">
                        {{$flat->name}}
                </option>
              @endforeach 
            </select> 
          </div>
          <div class="mb-3">
          <label for="email">Ichida bor:</label> 
          <input type="text" class="form-control" id="name" placeholder="Enter comfort" name="name"> 
          </div>
        </form>
      </div>
      <div class="modal-footer">
        <button type="submit" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-success">Kiritish</button>
      </div>
    </div>
  </div>
</div>
    
            
                <table class="table table-striped" border="1">
                        <thead>
                        <tr>
                        <td>T/r</td>
                        <td>Turi</td>
                        <td>Name</td>
                        <td>edit</td>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($comforts as $comfort)
                        <tr>
                        <td>{{$loop->index+1}}</td>
                        <td>{{$comfort->name}}</td>
                        <td>{{$comfort->comfortname}}</td>
                        <td>
                              <div class="btn-group" role="group" aria-label="Basic example">
                                <form action="/adminedit/comfortdelete"><input type="hidden" value="{{$comfort->id}}" name="id" ><button type="submit" class="btn btn-danger"><i class="bi bi-trash"></i>Delete</button></form>
                              </div>
                        </td>     
                        </tr>
                        @endforeach
                        </tbody>  
                </table>
      
</div> 
 
</body> 
</html>