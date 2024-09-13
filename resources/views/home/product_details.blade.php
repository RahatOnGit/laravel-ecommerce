<!DOCTYPE html>
<html>

<head>
  @include('home.css')

  <style>
    .detail-box{
        padding: 15px;
    }

    .div_center{
        display: flex;
        align-items: center;
        justify-content: center;
        padding: 30px;
    }
  </style>
</head>

<body>
  <div class="hero_area">
    <!-- header section strats -->
      @include('home.header')
    <!-- end header section -->
    <!-- slider section -->


    <!-- end slider section -->
  </div>
  <!-- end hero area -->


  
  <!-- shop section -->

  <section class="shop_section layout_padding">
    <div class="container">
      <div class="heading_container heading_center">
        <h2>
         product details
        </h2>
      </div>
      <div  class="div_center">

     
          
        
        <div class=" col-md-5 ">
          <div class="box">
            <a href="">
              <div class="div_center">
                <img width= "400px" src="/products/{{$data->image}}" alt="">
              </div>
              <div class="detail-box">
                <h6>
                 {{$data->title}}
                </h6>
                <h6>
                  Price
                  <span>
                    {{$data->price}}
                  </span>
                </h6>
              </div>

              <div class="detail-box">
                <h6>category: 
                 {{$data->category}}
                </h6>
                <h6>
                    available quantity: 
                  <span>
                    {{$data->quantity}}
                  </span>
                </h6>
              </div>

              <div class="detail-box">
                <p>
                 {{$data->description}}
                </p>
                
              </div>

              <div class="new">
                <span>
                  New
                </span>
              </div>
            </a>

          </div>
        </div>



       
        
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