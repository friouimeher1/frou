@extends('user.layout.app')

@section('content')

<br><br><br><br><br>

<div class="container">
    <div class="row">
        <div class="col-md-12 col-md-offset-2">


    <div class="col-md-8 portlets">
              <div class="panel panel-default">
                <div class="panel-heading">
                  <div class="pull-left"><b>Paiment</b></div>

                  <div class="clearfix"></div>
                </div>
                <div class="panel-body">
                  <div class="padd">

                      <div class="form quick-post">
                            <div class="row">
        <div class="small-6 small-centered columns">
        <form action="{{route('payment.store')}}" method="POST" id="payment-form">
            {{csrf_field()}}
            <span class="payment-errors"></span>

                 <label for="name" class="col-md-4 control-label">Numéro Carte</label>

                           <div class="col-md-6">


                                <input type="text" size="35" data-stripe="number">


                                   <span class="help-block">
                                       <strong></strong>
                                   </span>

                           </div>




                 <label for="name" class="col-md-4 control-label">Expiration (MM/YY)</label>

                           <div class="col-md-6">


                                <input type="text" size="15" data-stripe="exp_month">
                                <span> | </span>
                                <input type="text" size="15" data-stripe="exp_year">
                                   <span class="help-block">
                                       <strong></strong>
                                   </span>

                           </div>



                 <label for="name" class="col-md-4 control-label">Code Vérification Carte</label>

                           <div class="col-md-6">

                              <input type="text" size="7.5" data-stripe="cvc">
                                   <span class="help-block">
                                       <strong></strong>
                                   </span>

                           </div>

                             <div class="form-group">
                            <div class="col-md-8 col-md-offset-4">



                                      <input type="submit" class="submit button success" value=" Payment">

                            </div>
                        </div>


        </form>
        </div>
    </div>

                      </div>
                      </div>
                      </div>
                      </div>
                      </div>
                      </div>
                      </div>
                      </div>
<script src="{{asset('js1/jquery.js')}}"></script>
<script type="text/javascript" src="https://js.stripe.com/v2/"></script>
<script type="text/javascript">
    Stripe.setPublishableKey('pk_test_M1OuvOGV3FaS3YSPpHK5QQFk');
</script>
<script src="{{asset('js1/disk/app.js')}}"></script>


@stop
