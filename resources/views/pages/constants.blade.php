<!DOCTYPE html>
<html>
<head>
	<title></title>
	@include('includes.styles')
</head>
<body>
	 <div class="row">
      <div class="col s12 m8 offset-m2">
        <form action="" method="post">
            <fieldset>
              <div class="card-panel clearfix pb-40">   
                  <div class="row">
                      <div class="col m6 s12">
                           <label for="vehicle-number">Vehicle Number</label>
                          <input type="text" name="vehicle_number" id="vehicle-number" class="validate">
                      </div>
                      <div class="col m6 s12">
                          <label for="drivers-name">Driver's Name</label>
                          <input type="text" name="driver_name" id="drivers-name" class="validate">
                      </div>
                  </div>
                  <div class="row">
                      <div class="col m6 s12">
                          <label for="order-number">Order Number</label>
                          <input type="text" name="order_number" id="order-number">
                      </div>
                      <div class="col m6 s12">
                          <label for="waybill-number">Waybill Number</label>
                          <input type="text" name="waybill_number" id="waybill-number" class="validate">
                      </div>
                  </div>
                  <div class="row">
                      <div class="col m6 s12">
                          <label for="customer">Customer Name</label>
                          <input type="text" name="customer" id="customer" class="validate">
                      </div>
                      <div class="col m6 s12">
                          <label for="obs-litres">Obs Litres</label>
                          <input type="text" name="obs_litres" id="obs-litres">
                      </div>
                  </div>
                  <div class="row">
                      <div class="col s12">
                          <button class="next btn waves-effect waves-light pull-right" type="button">Next<i class="mdi-navigation-chevron-right"></i></button>
                      </div>
                  </div>
              </div>
            </fieldset>
            <fieldset>
                <div class="card-panel clearfix pb-40">
                    <div class="row pb-10">
                        <div class="col s6">
                            <button class="prev btn waves-effect waves-light pull-left" type="button">Back <i class="mdi-navigation-chevron-left"></i></button>
                        </div>
                        <div class="col s6">
                            <button class="btn waves-effect waves-light pull-right" type="submit">Submit Report<i class="mdi-navigation-chevron-right"></i></button>
                        </div>
                    </div>
                </div>
            </fieldset>
        </form>
      </div>
    </div>
</body>
</html>