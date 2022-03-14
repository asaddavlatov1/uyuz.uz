<!DOCTYPE html> 
<html lang="en"> 
<head> 
  <title>Firmalar Qo'shish</title> 
  <meta charset="utf-8"> 
  <meta name="viewport" content="width=device-width, initial-scale=1"> 
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css"> 
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script> 
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script> 
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script> 
</head> 
<body> 
 
<div class="container"> 
  <h2>Ro'yhatdan o'tish oynasi</h2> 
  @if(session()->has('error')) 
    <div class="alert alert-danger"> 
        {{ session()->get('error') }} 
    </div> 
  @endif
  
  @if(session()->has('xabar')) 
    <div class="alert alert-success"> 
        {{ session()->get('xabar') }} 
    </div> 
  @endif

  <form action="adduser" method="post"> 
  @csrf  
 
    <div class="form-group"> 
      <label for="name">Ism</label> 
      <input type="text" class="form-control" id="name"  name="firstname" placeholder="Ismni Kiriting" value="{{old('name')}}"> 
    </div>
    
    <div class="form-group"> 
      <label for="name">Familiya</label> 
      <input type="text" class="form-control" id="name"  name="lastname" placeholder="Ismni Kiriting" value="{{old('name')}}"> 
    </div>
     
    <div class="form-group"> 
      <label for="login">Login </label> 
      <input type="text" class="form-control" id="login" oninput="display(this.value)"  name="login" placeholder="Loginni kiriting" value="{{old('login')}}"> 
      <p id="check">Loginni tekshirish</p>
    </div> 
     
    <div class="form-group"> 
      <label for="parol">Parol</label> 
      <input type="password" class="form-control" id="password"  name="pass" placeholder="Parolni Kiriting" value="{{old('pass')}}"> 
    </div> 
     
    <div class="form-group"> 
      <label for="password">Parolni Takrorlang</label> 
      <input type="password" class="form-control" id="password"  name="pass1" placeholder="Parolni Takrorlang" value="{{old('pass1')}}"> 
    </div> 
     
    <div class="form-group"> 
      <label for="tel">Telefon No'mer</label> 
      <input type="number" class="form-control" id="phone"  name="phone" placeholder="Telefon No'merini Kiriting" value="{{old('tel')}}"> 
    </div> 

    <div class="form-group"> 
      <label for="email">Email (kiritish majburiy emas)</label> 
      <input type="email" class="form-control" id="email"  name="email" placeholder="Emailingizni Kiriting" value="{{old('email')}}"> 
    </div>


    <button type="submit" id="button" class="btn btn-primary">Kiritish</button> 
  </form> 
</div> 
<script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script> 
<script> 
    function display(login){ 
        iconv_mime_decode_headers = $('#login').val(); // Here, I'm getting selected value of dropdown  
        $.ajax({ 
            headers: { 
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') 
            }, 
            url: "{{route('getlogindata')}}", 
            type: "GET", 
            data:{ 
                'log' : login // in header request I'm getting value [productName: plastic product] * 
                }, 
            success:function(data){ 
              document.getElementById("check").innerHTML = data;
              if(data=="O'zgartiring")
              document.getElementById("button").disabled = true;
              else
              {
                document.getElementById("button").disabled = false;
              }
  
            }, 
             
        }); 
    } 
 
 
</script>
 
</body> 
</html>