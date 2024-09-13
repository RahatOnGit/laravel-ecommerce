<!DOCTYPE html>
<html>

<head>
  @include('home.css')

  <style>
    .div_deg{
        display: flex;
        justify-content: center;
        align-items: center;
        margin: 60px;
    }

    table{
        border: 2px solid black;
        text-align: center;
        width: 800px;
        
    }

    th{
        border: 2px solid black;
        text-align: center;
        color: white;
        font: 20px;
        font-weight: bold;
        background-color: black;


    }

    td{
        border: 1px solid skyblue;
        height: 150px;
    }

    .order_deg
    {
        padding-right: 100px;
        margin-top: 50px;
    }

   label
   {
     display: inline-block;
     width: 150px;
   }

   .div_gap
   {
     padding: 20px;
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
<div class="div_deg">

    <div class="order_deg">
      @if($count>0)
        <form action="{{url('confirm_order')}}" method="post">

           @csrf

            <div class="div_gap">
                <label >receiver name</label>
                <input type="text" name="name" value="{{Auth::user()->name}}">
            </div>

            <div class="div_gap">
                <label >receiver address</label>
                <textarea name="address">{{Auth::user()->address}}</textarea>
            </div>

            <div class="div_gap">
                <label >receiver phone</label>
                <input type="text" name="phone" value="{{Auth::user()->phone}}">
            </div>
         
            <div class="div_gap">
                <input type="submit" value="plcae order">
            </div>
       
        </form>

        @else

        <div>
          <h2 style="color: gray">you haven't placed any order yet!</h2>
        </div>

        @endif
    </div>

@if($count>0)

<table>

   <tr>

    <th>product title</th>
    <th>price</th>
    <th>image</th>
    <th>remove</th>
   </tr>

   <?php $total_val = 0  ?>

   @foreach ($data as $i)

   <tr>
    <td>{{$i->product->title}}</td>
    <td>{{$i->product->price}}</td>
    <td>
        <img width="150px" heigth="150px" src="products/{{$i->product->image}}" />
    </td>
    <td>
        <a class="btn btn-sm btn-danger" href="{{url('delete_cart',$i->id)}}">remove</a>
    </td>
    </tr>

    <?php $total_val+=$i->product->price ?>

   @endforeach

   <tr>
    <th>total value =  </th>
    <th>{{$total_val }}{{" "}}tk</th>
    <th>{{" "}}</th>
    <th>{{" "}}</th>
   </tr>

  
    


   


</table>
@endif



</div>









 

  <!-- end contact section -->

   

  <!-- info section -->
  
  @include('home.footer')
  

</body>

</html>