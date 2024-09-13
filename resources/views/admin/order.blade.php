<!DOCTYPE html>
<html>
  <head> 
     @include('admin.css')
     <style>
        table{
            width: 850px;
            border: 2px solid rgb(247, 246, 246);

        }

        th{
            border: 2px solid gray;
            text-align: center;
            background-color: white;
            font-size: 20px;
        }

        td{
            text-align: center;
            border: 1px solid gray;
        }

           
        
        
        </style>
  </head>
  <body>
    @include('admin.header')
    
    @include('admin.sidebar')
      <!--    {{$orders}} -->
      <div class="page-content">
        <div class="page-header">
          <div class="container-fluid">

        

            <table>
                <tr>
                    <th>customer name</th>
                    <th>address</th>
                    <th>phone</th>
                    <th>product title</th>
                    <th>price</th>
                    <th>image</th>
                    <th>status</th>
                    <th>change status</th>
                    <th>print pdf</th>

                </tr>

               
                    @foreach($orders as $i)
                    <tr>
                    <td>{{$i->name}}</td>
                    <td>{{$i->rec_address}}</td>

                    <td>{{$i->phone}}</td>

                    <td>{{$i->product->title}}</td>

                    <td>{{$i->product->price}}</td>
                    <td>
                        <img height ="100px" width="100px" src="products/{{$i->product->image}}">
                    </td>

                    <td>
                    
                      @if($i->status == 'in progress')
                      <span style="color: red">{{$i->status}}</span>

                      @elseif ($i->status == 'on the way')
                       <span style="color: yellow;">{{$i->status}}</span>

                      @else 
                       <span style="color: rgb(74, 166, 74);">{{$i->status}}</span>


                      @endif


                    </td>




                     
   
                    <td>
                        <a class="btn btn-sm btn-outline-primary" href="{{url('on_the_way',$i->id)}}">on the way</a>

                        <a class="btn btn-sm btn-outline-success" style= "margin-top: 15px;" href="{{url('delivered',$i->id)}}">delivered</a>

                    </td>

                    <td>
                      <a class="btn btn-sm btn-secondary" href="{{url('print_pdf',$i->id)}}">print pdf</a>
                    </td>
                    </tr>
                    @endforeach

                    

                
            </table>
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