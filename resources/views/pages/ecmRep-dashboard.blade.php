@extends('layouts.layout')
@section('title', 'ECM Field Rep Dashboard')
@section('user', 'ECM Field Rep')
@section('side-bar')
    <li>
        <a href="{{url('ecm-portal/field-rep/dashboard')}}" class="waves-effect waves-blue"><i class="fa fa fa-dashboard"></i> Dashboard</a>
    </li>
    <li>
      <a href="view/users/users" class="view-btn yay-sub-toggle waves-effect waves-blue">
          <i class="fa fa-archive"></i> Reports 
      </a>
    </li>
@endsection
@section('contents')

<h5 class="center-align">Complete the form by filling out the fields then click submit.</h5>
<div class="row">
  <div class="col m8 offset-m2">
      <form action="action/report" method="post" id="report-form">
          <fieldset class="showing">
            <div class="card-panel clearfix pb-40">
                <div class="row">
                    <div class="col m6 s12">
                        <label for="driver-name">Driver Name</label>
                        <input type="text" name="driver_name" id="driver-name" class="validate">
                    </div>
                    <div class="col m6 s12">
                       <label for="obs-litres">Obs Litres</label>
                       <input type="text" name="obs_litres" id="obs-litres" class="validate">
                    </div>
                </div>
                <div class="row">
                    <div class="col m6 s12">
                        <label for="vehicle-number">Vehicle Number</label>
                        <input type="text" name="vehicle_number" id="vehicle-number" class="validate">
                    </div>
                    <div class="col m6 s12">
                        <label for="order-number">Order Number</label>
                        <input type="text" name="order_number" id="order-number" class="validate">
                    </div>
                </div>
                <div class="row">
                    <div class="col m6 s12">
                       <label for="waybill-number">Waybill Number</label>
                       <input type="text" name="waybill_number" id="waybill-number" class="validate">
                    </div>
                    <div class="col m6 s12">
                       <label for="customer">Customer</label>
                       <input type="text" name="customer" id="customer" class="validate">
                    </div>
                </div>
                <div class="row">
                    <div class="col s12">
                        <button type="submit" class="btn waves-effect waves-green">submit</button>
                    </div>
                </div>    
            </div>
          </fieldset>
      </form>
  </div>
</div>
<div id="edit-modal" class="modal">
  <div class="modal-content">
    <h5 class="center-align">Fill this form to continue. This is very important as it is used to initialize your reporting.</h5>
    <form action="" method="post">
        <fieldset>
            <div class="row">
                  <div class="col m6 s12">
                      <label for="product-name">Product Name</label>
                      <select name="product_id" id="product-name" class="validate">
                           <option></option>
                           @foreach($products as $product)
                              <option value="{{$product->product_id}}">{{$product->product_name}}</option>
                           @endforeach
                      </select>
                  </div>
                  <div class="col m6 s12">
                      <label for="bdc-name">Company Name</label>
                      <select name="bdc_id" id="bdc-name" class="validate">
                           <option></option>
                           @foreach($bdcs as $bdc)
                              <option value="{{$bdc->bdc_id}}">{{$bdc->name}}</option>
                           @endforeach
                      </select>
                  </div>
              </div>
              <div class="row">
                  <div class="col m6 s12">
                      <label for="bank-name">Funding Bank</label>
                      <select name="bank_id" id="bank-name" class="validate">
                           <option></option>
                           @foreach($banks as $bank)
                              <option value="{{$bank->bank_id}}">{{$bank->name}}</option>
                           @endforeach
                      </select>
                  </div>
                  <div class="col m6 s12">
                      <label for="shore-tank">Shore Tank Number</label>
                      <input type="text" name="shore_tank_number" id="shore-tank" class="validate">
                  </div>
              </div>  
        </fieldset>
    </form>
  </div>
  <div class="modal-footer">
    <button type="submit" class="modal-action waves-effect waves-green btn-flat done-btn" data-action="add.constraints">Submit</button>
    <button type="submit" class="modal-action modal-close waves-effect waves-green btn-flat">Cancel</button>
  </div>
</div>
@endsection
@section('script')
<script type="text/javascript" src="{{url('js/velocity.js')}}"></script>
<script type="text/javascript" src="{{url('js/velocity.ui.js')}}"></script>
<script type="text/javascript" src="{{url('js/forms.js')}}"></script>
<script type="text/javascript">
     $(document).ready(function(){
        $('#edit-modal').openModal();

        $('#report-form').submit(function(event){
            event.preventDefault();

            var error = false,
                url   = $(this).attr('action'),
                data  = $(this).serialize();

            $(this).find('[name]').each(function(){
                if($(this).val() === '')
                    error = true;
            });

            if (error) {
              Materialize.toast('Please fill out all the fields', 3000);
            }
            else{

                $.post(url, data, function(response){
                    Materialize.toast(response.message, 3000, '', function(){
                        $('#report-form').find('[name]').each(function(){
                            $(this)
                            .val('')
                            .css({
                                borderBottom: '1px solid #9e9e9e',
                                boxShadow: 'none'
                            });
                        });
                    });
                });        
            }
        });
     });
</script>
@endsection