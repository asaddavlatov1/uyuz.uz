<!DOCTYPE html> 
<html lang="en"> 
<head> 
  <title>To'lov turi</title> 
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
  <h2 class="text-center">To'lov turlari</h2> 

  <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#exampleModal" data-bs-whatever="@mdo">Add+</button>
  <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Payment type title</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
           
            <form action="/admin/paymentcode" method="POST">
                @csrf
                <div class="mb-3">
                    <label for="name" class="form-label">Name</label>
                    <input type="text" name="name" class="form-control" id="name" value="{{old('name')}}">
                </div>
            
                <div class="mb-3">
                    <label for="sum" class="form-label">Sum</label>
                    <input type="text" name="sum" class="form-control" id="sum" value="{{old('sum')}}">
                </div>
            
                <div class="modal-footer d-flex justify-content-between align-content-between">
                    <button type="submit" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-success">Save</button>
                </div>
            
            </form>
        </div>
      </div>
    </div>
</div>
<div class="col-12">    
            
                <table class="table table-striped" border="1">
                        <thead>
                        <tr>
                        <td>T/r</td>
                        <td>Name</td>
                        <td>Sum</td>
                        <td>edit</td>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($payments as $payment)
                        <tr>
                          <td>{{$loop->index+1}}</td>.
                          <td>{{$payment->name}}</td>
                          <td>{{$payment->sum}}</td>
                          <td>
                            <div class="btn-group" role="group" aria-label="Basic example">
                                <form action="/adminedit/paymentdelete"><input type="hidden" value="{{$payment->id}}" name="id" ><button type="submit" class="btn btn-danger"><i class="bi bi-trash"></i>Delete</button></form>
                              </div>
                            </div>
                        </td>
                        </tr>
                        @endforeach
                        </tbody>  
                </table>
      </div>
</div>
  
 
</body> 
</html>