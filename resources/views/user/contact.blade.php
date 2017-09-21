
@extends('user.layout.app')

@section('content')


@if(Session::has('message'))
<div class="row">
  <div class="alert alert-success fade in col-sm-6 col-md-4, col-md-offset-4 col-sm-offset-3">

  <button data-dismiss="alert" class="close close-sm" type="button">
      <i class="icon-remove"></i>
  </button>
     {{ Session::get('message')}}
   </div>
 </div>

@endif
<br><br><br><br>
<div class="container">
    <div class="row">



              <div class="col-md-8 col-md-offset-1">
              <div class="panel panel-default">
                <div class="panel-heading">
                  <div class="pull-left">Contacter administrateur</div>
                  <div class="widget-icons pull-right">
                    <a href="#" class="wminimize"><i class="fa fa-chevron-up"></i></a>
                    <a href="#" class="wclose"><i class="fa fa-times"></i></a>
                  </div>
                  <div class="clearfix"></div>
                </div>
                <div class="panel-body">
                  <div class="padd">

                      <div class="form quick-post">
<form   action="{{route('send')}}" method="post">
  {{csrf_field()}}



										<div class="hr hr-18 dotted"></div>
										<div class="form-group">
											<label class="col-sm-3 control-label no-padding-right" for="form-field-recipient">Utilisateur:</label>

											<div class="col-sm-9">
												<span class="input-icon">
													<input type="email" name="user_email"    placeholder="Email" />
													<i class="ace-icon fa fa-user"></i>
												</span>
											</div>
										</div>

										<div class="hr hr-18 dotted"></div>
                    <div class="form-group">
                      <label class="col-sm-3 control-label no-padding-right" for="form-field-recipient">Sujet:</label>

                      <div class="col-sm-9">
                        <span class="input-icon">
                          <input type="text" name="sujet"    placeholder="sujet" />
                          
                        </span>
                      </div>
                    </div>
                    <div class="hr hr-18 dotted"></div>
										<div class="form-group">
											<label class="col-sm-3 control-label no-padding-right">
												<span class="inline space-24 hidden-480"></span>

											</label>

											<div class="col-sm-9">
												<textarea name="message" rows="8" cols="50" ></textarea>
											</div>
										</div>

										<div class="hr hr-18 dotted"></div>

										<div class="form-group no-margin-bottom">
											<label class="col-sm-3 control-label no-padding-right">:</label>

											<div class="col-sm-9">

													<button type="submit" class="btn btn-primary" name="button">Envoyer</button>
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
                    @stop
