@extends('commercant.layout.default')

@section('content')



<br><br><br><br>
<div class="container">
    <div class="row">



              <div class="col-md-8 col-md-offset-1">
              <div class="panel panel-default">
                <div class="panel-heading">
                  <div class="pull-left">Répondre à client</div>
                  <div class="widget-icons pull-right">
                    <a href="#" class="wminimize"><i class="fa fa-chevron-up"></i></a>
                    <a href="#" class="wclose"><i class="fa fa-times"></i></a>
                  </div>
                  <div class="clearfix"></div>
                </div>
                <div class="panel-body">
                  <div class="padd">

                      <div class="form quick-post">
<form   action="{{route('commercant.storereply',$user->id)}}" method="post">
  {{csrf_field()}}

										<div class="form-group">
											<label class="col-sm-3 control-label no-padding-right" for="form-field-recipient">Commercant:</label>

											<div class="col-sm-9">
												<span class="input-icon">
													<input type="email"  id="form-field-recipient" value="{{$contactcommercants->email_commercant}}" name="commercant_email"  placeholder="Email"  />
													<i class="ace-icon fa fa-user"></i>
												</span>
											</div>
										</div>

										<div class="hr hr-18 dotted"></div>
										<div class="form-group">
											<label class="col-sm-3 control-label no-padding-right" for="form-field-recipient">Utilisateur:</label>

											<div class="col-sm-9">
												<span class="input-icon">
													<input type="email" value="{{$user->email}}"    placeholder="Email" readonly="true"/>
													<i class="ace-icon fa fa-user"></i>
												</span>
											</div>
										</div>

										<div class="hr hr-18 dotted"></div>

										<div class="form-group">
											<label class="col-sm-3 control-label no-padding-right" for="form-field-subject">Sujet:</label>

											<div class="col-sm-6 col-xs-12">
												<div class="input-icon block col-xs-12 no-padding">
													<input maxlength="100" type="text" class="col-xs-12" name="sujet" id="form-field-subject" placeholder="Subject" />
													<i class="ace-icon fa fa-comment-o"></i>
												</div>
											</div>
										</div>

										<div class="hr hr-18 dotted"></div>

										<div class="form-group">
											<label class="col-sm-3 control-label no-padding-right">
												<span class="inline space-24 hidden-480"></span>

											</label>

											<div class="col-sm-9">
												<textarea name="message" rows="8" cols="80" ></textarea>
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
