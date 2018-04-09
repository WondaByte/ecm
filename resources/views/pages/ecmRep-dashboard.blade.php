<!DOCTYPE html>
<html>
	<head>
        <meta charset="UTF-8">
        <meta name="csrf-token" content="{{csrf_token()}}">
    	@include('includes.styles')
        {{-- <link type="text/css" rel="stylesheet" href="{{url('css/dashboard.css')}}" media="screen,projection"/> --}}
        <title>ECM - Field Rep</title>
	</head>
	<body>
		 <nav class="navbar-top">
            <div class="nav-wrapper ">
                <a href="{{url('/admin/dashboard')}}" class="brand-logo"><img src="{{url('img/ecm.png')}}" /></a>
                <span>Expert Collateral &amp; Monitoring Ltd, Ghana</span>
                <ul>
                    <li class="user">Welcome <strong>{{Auth::user()->username}}</strong></li>
                    <li>
                       <a href="{{url('ecm-portal/auth/logout')}}" title="logout"><i class="fa fa-sign-out"></i></a>
                    </li>
                </ul>
            </div>
        </nav>
        <div class="content-wrap" style="margin-left: 0">
        	<div class="row">
                <div class="col m6 offset-m3 s12">
                    <div class="container">
                        <ul class="progressbar">
                            <li class="active">Product Info</li>
                            <li>Carrier Information</li>
                            <li>other Information</li>
                        </ul>
                    </div>
                </div>
            </div>
        	<h5 class="center-align pt-20">
        		<strong>Please enter the product details and ensure that all fields marked with (*) are duly field.</strong>
        	</h5>
        	<div class="row">
        		<div class="col s12 m6 offset-m3">
        			<form action="" method="post">
                          <fieldset class="showing">
                              <div class="card-panel clearfix pb-40">   
                                  <div class="row">
                                      <div class="col s12">
                                        <label for="product-name">Product Name</label>
                                        <select name="product_name">
                                            <option></option>
                                        </select>
                                      </div>
                                  </div>
                                  <div class="row">
                                      <div class="col s12">
                                        <label for="company-name">Company Name</label>
                                        <select name="company_name">
                                            <option></option>
                                            <option>Me</option>
                                            <option>You</option>
                                            <option>I</option>
                                        </select>
                                      </div>
                                  </div>
                                  <div class="row">
                                      <div class="col m6 s12">
                                          <label for="obs-litres">Obs Litres</label>
                                          <input type="text" name="obs_litres" id="obs-litres" class="validate">
                                      </div>
                                      <div class="col m6 s12">
                                          <label for="metric-tonnes-air">Metric Tonnes Air</label>
                                          <input type="text" name="metric_tons_air" id="metric-tonnes-air" class="validate">
                                      </div>
                                  </div>
                                  <div class="row">
                                      <div class="col m6 s12">
                                          <label for="obs-temp">Metric Tonnes Vacuum</label>
                                          <input type="text" name="metric_tons_vac" id="metric-tonnes-vac" class="validate">
                                      </div>
                                      <div class="col m6 s12">
                                           <label for="obs-temp">Obs Temperature</label>
                                           <input type="text" name="obs_temp" id="obs-temp">
                                      </div>
                                  </div>
                                  <div class="row">
                                      <div class="col m6 s12">
                                          <label for="vc-factor">Vc Factor</label>
                                          <input type="text" name="vc_factor" id="vc-factor">
                                      </div>
                                      <div class="col m6 s12">
                                          <label for="density-at-15-deg">Density At 15 Degrees Celcius</label>
                                          <input type="text" name="density_at_15_deg" id="density-at-15-deg">
                                      </div>
                                  </div>
                              </div>
                              <div class="row pb-10">
                                  <div class="col s12">
                                      <button class="next btn waves-effect waves-light pull-right" type="button">Next<i class="mdi-navigation-chevron-right"></i></button>
                                  </div>
                              </div>
                          </fieldset>
                          <fieldset>
                              <div class="card-panel clearfix pb-40">
                                  <div class="row">
                                      <div class="col s12">
                                        <label for="vehicle-number">Vehicle Number</label>
                                        <input type="text" name="vehicle_number" id="vehicle-number" class="validate">
                                      </div>
                                  </div>
                                  <div class="row">
                                      <div class="col s12">
                                        <label for="drivers-name">Driver's Name</label>
                                        <input type="text" name="driver_name" id="drivers-name" class="validate">
                                      </div>
                                  </div>
                                  <div class="row">
                                      <div class="col s12">
                                        <label for="waybill-number">Waybill Number</label>
                                        <input type="text" name="waybill_number" id="waybill-number" class="validate">
                                      </div>
                                  </div>
                                  <div class="row">
                                      <div class="col m6 s12">
                                          <label for="shore-tank">Shore Tank Number</label>
                                          <input type="text" name="shore_tank_number" id="shore-tank" class="validate">
                                      </div>
                                      <div class="col m6 s12">
                                           <label for="order-number">Order Number</label>
                                           <input type="text" name="order_number" id="order-number">
                                      </div>
                                  </div>
                              </div>
                              <div class="row pb-10">
                                  <div class="col s6">
                                      <button class="prev btn waves-effect waves-light pull-left" type="button">Back <i class="mdi-navigation-chevron-left"></i></button>
                                  </div>
                                  <div class="col s6">
                                      <button class="next btn waves-effect waves-light pull-right" type="button">Next <i class="mdi-navigation-chevron-right"></i></button>
                                  </div>
                              </div>
                          </fieldset>
                          <fieldset>
                              <div class="card-panel clearfix pb-40">
                                  <div class="row">
                                      <div class="col m6 s12">
                                          <label for="customer">Customer Name</label>
                                          <input type="text" name="customer" id="customer">
                                      </div>
                                      <div class="col m6 s12">
                                          <label for="depot-name">Depot Name</label>
                                          <select name="depot_name">
                                               <option></option>
                                          </select>
                                      </div>
                                  </div>
                                  <div class="row">
                                      <div class="col m6 s12">
                                          <label for="depot-name">Bank Name</label>
                                          <select name="depot_name">
                                               <option></option>
                                          </select>
                                      </div>
                                  </div>
                              </div>
                              <div class="row pb-10">
                                  <div class="col s6">
                                      <button class="prev btn waves-effect waves-light pull-left" type="button">Back <i class="mdi-navigation-chevron-left"></i></button>
                                  </div>
                                  <div class="col s6">
                                      <button class="btn waves-effect waves-light pull-right" type="submit">Submit Report<i class="mdi-navigation-chevron-right"></i></button>
                                  </div>
                              </div>
                          </fieldset>
                    </form>
        		</div>
        	</div>
        </div>
         <footer class="footer">&copy; 2018 Expert Collateral &amp; Monitoring Ltd, Ghana. All rights reserved.</footer>
        @include('includes.scripts')
        <script type="text/javascript" src="{{url('js/velocity.js')}}"></script>
        <script type="text/javascript" src="{{url('js/velocity.ui.js')}}"></script>
        <script type="text/javascript">
            $(document).ready(function(){
                 var nextBtn  = $('button.next'),
                     prevBtn  = $('button.prev'),
                     Forms = {
                            obj: $('#application-form fieldset'),
                            showNext : function(){
                                $('.showing').velocity('transition.slideLeftOut', {
                                    duration: 200,
                                    complete: function(){
                                        $('.showing')
                                            .next('fieldset')
                                            .addClass('showing')
                                            .velocity('transition.slideRightIn')
                                            .siblings('fieldset')
                                            .removeClass('showing');

                                        $('.progressbar').find('.active').removeClass('active').addClass('done').next('li').addClass('active');
                                    }
                                });
                            },
                            showPrevious: function(){
                                $('.showing').velocity('transition.slideRightOut', {
                                    duration: 200,
                                    complete: function(){
                                        $('.showing')
                                            .prev('fieldset')
                                            .addClass('showing')
                                            .velocity('transition.slideRightIn')
                                            .siblings('fieldset')
                                            .removeClass('showing')

                                        $('.progressbar').find('.active').removeClass('active').removeClass('done').prev('li').addClass('active');
                                    }
                                });
                            }
                };

                prevBtn.click(function(){
                    Forms.showPrevious();
                });
                nextBtn.click(function(){
                    Forms.showNext();
                });

            });
        </script>
	</body>
</html>