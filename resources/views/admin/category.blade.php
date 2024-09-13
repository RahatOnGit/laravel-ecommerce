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
     </style>
  </head>
  <body>
    @include('admin.header')
    
    @include('admin.sidebar')
      <!-- Sidebar Navigation end-->
      <div class="page-content">
        <div class="page-header">
          <div class="container-fluid">
            
        <div>
          
            <form action="{{url('add_category')}}" method="post">

                @csrf
                <div>
                    <input type="text" name="category">
                    <input class="btn-sm" type="submit" value="add category">
                </div>
            </form>

        </div>
        
            
       @include('admin.success_message')

    @if(sizeof($data) > 0)

        <table >
            
              <tr>
                
                <th>Category</th>
                <th>edit</th>
                 <th>Delete</th>
              </tr>
          
           

                @foreach ($data as $val)
                <tr> <td> {{$val->category_name}} </td>  
                  <td><a class="btn btn-success" href="{{url('edit_category',$val->id)}}">edit</a></td>
                 <td> <a class="btn btn-danger" onclick ="conformation(event)" href="{{url('delete_category', $val->id)}}">
                  delete</a></td></tr>
                
               @endforeach
 
             
           
        </table>

        @endif




          </div>



          </div>
        </div>
    </div>
              <!-- JavaScript files-->

              <script>

                function conformation(ev)
                {
                  ev.preventDefault();

                  var urlToRedirect = ev.currentTarget.getAttribute('href');

                  console.log(urlToRedirect);

                  swal({
                    title:"Are you sure want to delete",
                    text: "the delete will be permanent",
                    icon:"warning",
                    buttons:true,
                    dangerMode:true,
                  })

                  .then((willCancel)=>{

                    if(willCancel)
                  {
                    window.location.href = urlToRedirect;
                  }
                  });


                }

              </script>

              <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js" integrity="sha512-AA1Bzp5Q0K1KanKKmvN/4d3IRKVlv9PYgwFPvm32nPO6QS8yH1HO7LbgB1pgiOxPtfeg5zEn2ba64MUcqJx6CA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

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