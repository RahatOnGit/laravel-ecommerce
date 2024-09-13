<!DOCTYPE html>
<html>

<head>
  @include('home.css')

  <style>

  .card {
    
    box-shadow: 0 4px 8px 0 rgba(0,0,0,0.2);
    transition: 0.3s;
    width: 18.19%;
    margin-left: 43%;
    height: 50%;
    margin-top: 5%;

  }
  
 
  .card:hover {
    box-shadow: 0 8px 16px 0 rgba(0,0,0,0.2);
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

  <div class="card">

    <form action="{{url('filter_by_category')}}" method="get">
        <select name="category">
         <option value="all"> Choose a category </option>
         <option value="all"> All products </option>
         @foreach ($category as $i)
         <option value="{{$i->category_name}}">
          {{$i->category_name}} 
      
         </option>
         @endforeach
      
        
         
        </select>
      
       
    
        <button class="btn btn-sm btn-outline-success" >fliter</button>
    
   
    </form>
  </div>

 


  

  
  

  
  <!-- shop section -->

  <section class="shop_section layout_padding">
    <div class="container">
      <div class="heading_container heading_center">
        <h2>
            @if($category_name=='all')
              <h1> All Products </h1>
            @else
              {{$category_name}}

            @endif
        </h2>
      </div>
      <div class="row">
       @if($data->count()==0)
            <h1 style="margin-left: 30%; color: orange;"> No product Available! </h1>
       @endif

        @foreach ($data as $i)
          
        
        <div class="col-sm-6 col-md-4 col-lg-3">
          <div class="box">
            <a href="">
              <div class="img-box">
                <img src="products/{{$i->image}}" alt="">
              </div>
              <div class="detail-box">
                <h6>
                 {{$i->title}}
                </h6>
                <h6>
                  Price
                  <span>
                    {{$i->price}}
                  </span>
                </h6>
              </div>
              
            </a>

            <div style="padding: 15px; ">
              <a class="btn btn-sm btn-success" href="{{url('product_details',$i->id)}}">details</a>
              <a class="btn btn-sm btn-primary" href="{{url('add_cart',$i->id)}}">add to cart</a>
            </div>
          </div>
        </div>

        @endforeach

       
        
        </div>
      </div>
      
    </div>
  </section>

  <!-- end shop section -->







  <!-- contact section -->

  

  <!-- end contact section -->

   

  <!-- info section -->
  
  @include('home.footer')
  

</body>

</html>