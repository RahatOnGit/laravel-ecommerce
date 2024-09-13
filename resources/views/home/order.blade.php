<!DOCTYPE html>
<html>

<head>
  @include('home.css')

  <style>
    .div_center
    {
        display: flex;
        justify-content: center;
        align-items: center;
        margin-top: 60px;
    }

    table{
        border: 2px solid black;
        text-align: center;
        width: 800px;
    }

    th{
        border: 2px solid black;
        text-align: center;
        background-color: black;
        color: white;
        font-weight: bold;
        font-size: 19px;
    }

    td
    {
        border : 1px solid skyblue;

    }
  </style>
</head>

<body>
  <div class="hero_area">
    <!-- header section strats -->
      @include('home.header')
    <!-- end header section -->
    <!-- slider section -->

    
  @include('admin.success_message')



    <!-- end slider section -->
  </div>
  <!-- end hero area -->

  
  <!-- shop section -->


  <!-- end shop section -->

 @if($data->count()!=0)

 <div class="div_center">
    <table>
        <tr>
            <th>product name</th>
            <th>price</th>
            <th>delivery status</th>
            <th>image</th>
        </tr>

        @foreach($data as $i)
         <tr>
            <td>{{$i->product->title}}</td>
            <td>{{$i->product->price}}</td>
            <td>{{$i->status}}</td>
            <td>
              <img width="150px" height="150px" src="products/{{$i->product->image}}" >

             </td>

         </tr>

        @endforeach

    </table>
 </div>

 @else
  <h2 style="margin-top: 50px; text-align: center; color: gray; ">there isn't any order placed</h2>


@endif





  <!-- contact section -->

  <!-- end contact section -->

   

  <!-- info section -->
  
  @include('home.footer')

  
  

</body>

</html>