<!DOCTYPE html>
<html>
  <head> 
     @include('admin.css')

     <style>
        th,td {
      padding: 15px;
  }
  
  table {
      border-collapse: collapse;
      margin-top: 1cm;
  }
  
  table,th,td {
      border: 1px solid gray;
  }

  td{
    color: white;
  }

  .div_deg{
    display: flex;
    justify-content: center;
    align-items: center;
    margin-top: 60px;
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

            @include('admin.success_message')

            <form action="{{url('product_search')}}" method="get">
              <input type="search" name="search">
              <input type="submit" value="search">
            </form>

            <table>
            
                <tr>
                  
                  <th>title</th>
                  <th>description</th>
                   <th>image</th>
                   <th>price</th>
                   <th>category</th>
                   <th>quantity</th>
                   <th>edit</th>
                   <th>delete</th>
                </tr>

                @foreach ($data as $i)

                <tr>
                    <td>{{$i->title}}</td>
                    <td>{!!Str::limit($i->description,30)!!}</td>
                    <td>
                        <img style="width:100px; height: 100px;" src="products/{{$i->image}}" >
                    </td>
                    <td>{{$i->price}}</td>
                    <td>{{$i->category}}</td>
                    <td>{{$i->quantity}}</td>
                    <td><a class="btn btn-success" href="{{url('update_product',$i->id)}}">edit</a></td>
                    <td><a class="btn btn-danger" href="{{url('delete_product',$i->id)}}">delete</a></td>





                </tr>
                    
                @endforeach
            
             
  
                  
   
               
             
          </table>

          <div class="div_deg">
          {{$data->onEachSide(1)->links()}}

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