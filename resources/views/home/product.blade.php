<section class="shop_section layout_padding">
    <div class="container">
      <div class="heading_container heading_center">
        <h2>
          All Products
        </h2>
      </div>
      <div class="row">

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