@extends('web.pages.account')

@section('profileContent')
<div class="account-orders-container">
  <table class="table orders-table">
    <thead class="thead-dark">
      <tr>
        <th scope="col"></th>
        <th scope="col">Order NUMBER</th>
        <th scope="col">Date</th>
        <th scope="col">Status</th>
        <th scope="col">Total</th>
        <th scope="col">ACTIONS</th>
      </tr>
    </thead>
    <tbody>
      @for ($i = 0; $i < 10; $i++) <tr>
        <td>
          <div class="images-container" id="images-container-{{ $i }}">

          </div>
        </td>
        <td>
          <div class="order-number">#211155C</div>
        </td>
        <td>
          <div class="order-date">October 6, 2024</div>
        </td>
        <td>
          <div class="order-status">On Hold</div>
        </td>
        <td>
          <div class="order-total">
            <span>15,000 LE</span>
            <span>For 5 items</span>
          </div>
        </td>
        <td>
          <div data-toggle="modal" data-target="#exampleModal2" class="custom-button">
            <div class="custom-button-text">VIEW</div>
          </div>
        </td>
        </tr>
        @endfor
    </tbody>
  </table>
  <!-- order Modal -->
  <div class="modal fade" id="exampleModal2" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" style="width: 90vw; max-width: 100vw !important; top: 0;" role="document">
      <div class="modal-content ">
        <h5 class="modal-title" style="text-align: start; width: 90%; margin: 0 auto;" id="exampleModalLabel">Summery Order </h5>
        <div style="width: 100%">

          <div class="shipping-details">
            <div>
              <div class="details-section">
                <span class="details-section-title">SHIPPING INFO</span>
                <div class="details-section-content">
                  <div>
                    <div>
                      <span>Name</span>
                      <span>John Doe</span>
                    </div>
                    <div>
                      <span>Phone</span>
                      <span>+122 523 352</span>
                    </div>
                  </div>
                  <div>
                    <div>
                      <span>City</span>
                      <span>San Francisco, California</span>
                    </div>
                    <div>
                      <span>Company name</span>
                      <span> Mobel Inc</span>
                    </div>
                  </div>
                  <div>
                    <div>
                      <span>Email</span>
                      <span>johndoe@company.com</span>
                    </div>
                    <div>
                      <span>Zip</span>
                      <span>94107</span>
                    </div>
                  </div>
                  <div>
                    <div>
                      <span>Address</span>
                      <span>795 Folsom Ave, Suite 600</span>
                    </div>
                    <div>
                      <span>Company phone</span>
                      <span>+1223336665</span>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div>
              <div class="details-section">
                <span class="details-section-title">ORDER DETAILS</span>
                <div class="details-section-content">
                  <div>
                    <div>
                      <span>Order no.</span>
                      <span>52522-63259226</span>
                    </div>
                    <div>
                      <span>Transaction ID</span>
                      <span>2265996</span>
                    </div>
                  </div>
                  <div>
                    <div>
                      <span>Order date</span>
                      <span> 06/30/2017 </span>
                    </div>
                    <div>
                      <span>Shipping arrival</span>
                      <span>07/30/2017</span>
                    </div>
                  </div>
                </div>
              </div>
              <div class="details-section">
                <span class="details-section-title"> PAYMENT DETAILS</span>
                <div class="details-section-content">
                  <div>
                    <div>
                      <span> Transaction time</span>
                      <span>06/30/2017 at 00:59 </span>
                    </div>
                    <div>
                      <span>Amount</span>
                      <span>$1259,00</span>
                    </div>
                  </div>
                  <div>
                    <div>
                      <span>Cart details </span>
                      <span> **** **** **** 5446</span>
                    </div>
                    <div>
                      <span>Items in cart</span>
                      <span>4</span>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="order-table">
            <div class="tableRow head">
              <div>YOUR ORDER</div>
              <div>QNTY</div>
              <div>UNIT</div>
              <div>PRICE</div>
            </div>
            <div class="tableRow">
              <div>
                <div class="order-image">
                  <img src="{{asset('storage/assets/product.png')}}" />
                </div>
                <div class="order-info">
                  <div>طقم ترابيزات جانبية متداخلة</div>
                  <div>منتجات ستانلس</div>
                </div>
              </div>
              <div>1</div>
              <div>EGP 15,000</div>
              <div>EGP 15,000</div>
            </div>
          </div>
          <div class="order-summary">
            <div class="rectangle"></div>
            <div class="content">
              <h4>Payment Summary</h4>
              <div class="typography">
                <div>
                  <span>Order number</span>
                  <span>11458523</span>
                </div>
                <div>
                  <span>VAT Amount</span>
                  <span>EGP 15,000</span>
                </div>
                <div>
                  <span>Order amount</span>
                  <span>EGP 15,000</span>
                </div>
              </div>
              <div class="separetor">
                <div class="circle circle-l"></div>
                <div class="dashed-line"></div>
                <div class="circle circle-r"></div>
              </div>
              <div class="ammount">
                <div>
                  <span>Amount to be paid</span>
                  <span>EGP 15,000</span>
                </div>
                <div><img src="{{asset('storage/assets/list.png')}}" /></div>
              </div>
            </div>
          </div>

        </div>
      </div>
    </div>
  </div>
</div>
@endsection

@section('container_js')
<script>
  $(document).ready(function() {
    function setImages(containerId, images) {
      const $container = $(containerId);
      $container.empty();
      
      const imageCount = images.length;
      
      $.each(images, function(index, src) {
        const $div = $('<div>').addClass('image-wrapper');
        const $img = $('<img>').attr('src', src);
        
        if (imageCount === 2 || imageCount === 3) {
          $img.addClass('small');
        } else if (imageCount > 4 && index >= 4) {
          $img.addClass('extra');
        }
        
        $div.append($img);
        $container.append($div);
      });

      $container.removeClass('two-images three-images four-images');
      
      if (imageCount === 2) {
        $container.addClass('two-images');
      } else if (imageCount === 3) {
        $container.addClass('three-images');
      } else if (imageCount >= 4) {
        $container.addClass('four-images');
      }
    }

    // Example usage for each row
    @for ($i = 0; $i < 10; $i++)
      setImages('#images-container-{{ $i }}', [
        "{{ asset('storage/assets/account-order.png') }}", 
        "{{ asset('storage/assets/account-order.png') }}", 
        "{{ asset('storage/assets/account-order.png') }}", 
        "{{ asset('storage/assets/account-order.png') }}", 
        "{{ asset('storage/assets/account-order.png') }}", 
        "{{ asset('storage/assets/account-order.png') }}"
      ]);
    @endfor
  });
</script>
@endsection