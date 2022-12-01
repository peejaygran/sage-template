<div class="booking-summary container mt-5">
  <div class="card p-4">
    <h5>Booking summary</h5>
    <hr>
    <div class="p-2">
      <span>First clean</span>
      <span><i class="fas fa-minus"></i></span>
    </div>
    <div class="p-2">
      <span>How often</span>
      <span><i class="fas fa-minus"></i></span>
    </div>
    <div class="p-2">
      <span>House of cleaning</span>
      <span><i class="fas fa-minus"></i></span>
    </div>
    <hr>
    <div class="search-block px-3">
      <form class="row">
        <div class="input-group ">
          <input type="text" class="form-control pl-3 mr-3" name="postcode" placeholder="Enter postcode here" autocomplete="off">
          <span class="input-group-append">
          <button type="submit" class="btn text-white bg-primary">+ Gift Card</button>
          </span>
        </div>
      </form>
    </div>
    <hr>
    <div class="p-2">
      <span class="h5">Price</span>

      <span><i class="fas fa-minus minus"></i></span>
      <span><i class="fas fa-pound-sign"></i></span>
    </div>
  </div>
</div>



<style>
  .booking-summary .card {
    /* background-color: #f1f6fd; */
    border: none !important;
    border-radius: 0% !important;
    box-shadow: 0px 5px 21px rgb(51 97 110 / 20%);
  }

  .booking-summary span .fa-minus, .fa-pound-sign {
    float: right;
  }

  .booking-summary .search-block .form-control, button {
    border-radius: 5px !important;
  }

  .booking-summary .h5, .fa-pound-sign, .minus {
    color: #2B59C3;
  }
  </style>
