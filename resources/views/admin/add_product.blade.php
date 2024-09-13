<!DOCTYPE html>
<html>
  <head> 
     @include('admin.css')

     <style>
        .div_deg
        {
            display: flex;
            justify-content: center;
            align-items: center;
            margin-top: 30px;
        }

        label
        {
            display: inline-block;
            width: 150px;
            font-size: 15px!important;
            color: white!important;
        }

        textarea
        {
            width: 450px;
            height: 70px;
        }

        input[type='text']
        {
            width: 200px;
            height: 50px;
        }

      .input_deg
      {
        margin: 15px;
      }
     </style>
  </head>
  <body>
    @include('admin.header')
    
    @include('admin.sidebar')
      <!-- Sidebar Navigation end-->
      <div class="page-content">
        <div class="page-header">
          <div class="container-fluid">

            <h1 style="display: flex; justify-content: center;
            align-items: center; color: green;">add product</h1>

            <div class="div_deg">
                
                <form action="{{url('upload_product')}}" method="post" enctype="multipart/form-data">
                    @csrf

                    <div class="input_deg">
                        <label>product title</label>
                        <input type="text" name="title" required>
                    </div>

                    <div class="input_deg">
                        <label>product description</label>
                        <textarea name="description" required> </textarea>
                    </div>

                    <div class="input_deg">
                        <label>price</label>
                        <input type="text" name="price" required >
                    </div>

                    <div class="input_deg">
                        <label>quantity</label>
                        <input type="number" name="qty" required>
                    </div>

                    <div class="input_deg">
                        <label>product category</label>
                        <select name="category" required >
                            <option value="">select a category</option>

                            @foreach ($category as $i)
                            <option value="{{$i->category_name}}">{{$i->category_name}}</option>
                            @endforeach
                            

                        </select>
                    </div>

                    <div class="input_deg">
                        <label>product image</label>
                        <input type="file" name="image" >
                    </div>

                    <div class="input_deg">
                        <input class="btn btn-success" type="submit" value="add product">
                    </div>

                </form>

            </div>

          </div>
        </div>
    </div>
              <!-- JavaScript files-->
    <script src="{{asset('/admincss/vendor/jquery/jquery.min.js')}}"></script>
    <script src="{{asset('/admincss/vendor/popper.js/umd/popper.min.js')}}"> </script>
    <script src="{{asset('/admincss/vendor/bootstrap/js/bootstrap.min.js')}}"></script>
    <script src="{{asset('/admincss/vendor/jquery.cookie/jquery.cookie.js')}}"> </script>
    <script src="{{asset('/admincss/vendor/chart.js/Chart.min.js')}}"></script>
    <script src="{{asset('/admincss/vendor/jquery-validation/jquery.validate.min.js')}}"></script>
    <script src="{{asset('/admincss/js/charts-home.js')}}"></script>
    <script src="{{asset('/admincss/js/front.js')}}"></script>
  </body>
</html>