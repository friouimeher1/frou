@extends('admin.layout.default')


@section('content')

<br><br><br>


<div class="row">
              <div class="col-xs-12">
                <!-- PAGE CONTENT BEGINS -->
                <div class="row">
                  <div class="col-xs-12">
                    <table id="simple-table" class="table  table-bordered table-hover">
                      <thead>
                        <tr>

                          <th class="detail-col">Nom et Prénom</th>
                          <th> Email</th>
                          <th> Addresse</th>


                          <th>

                             Longitude
                          </th>
                          <th class="hidden-480">  Latitude</th>


                          <th class="hidden-480">  Téléphone</th>
                          <th class="hidden-480">  Action</th>
                        </tr>
                      </thead>

                      <tbody>
                       @foreach($customers as $customer)
                        <tr>


                          <td class="center">
                            {{$customer -> name   }} <p>  {{$customer -> prenom}}
                          </td>

                          <td>
                            <a href="#">{{$customer -> email}}</a>
                          </td>
                          <td>{{$customer -> adresse}}</td>
                          <td>{{$customer -> lng}}</td>
                          <td>{{$customer ->lat}}</td>

                          <td class="hidden-480">
                            <span class="label label-sm label-warning">{{$customer ->telephone}}</span>
                          </td>

                           <td>
                                  <form action="{{url('/admin/Commercant/approve1')}}" method="POST">
                                                                {{ csrf_field() }}
                                                                <input <?php if($customer->approve == 1) { echo "checked";}?> type="checkbox" name="approve">
                                                                <input type="hidden" name="commercantId" value="{{ $customer->id }}"> &nbsp;
                                                                <p><input type="submit" value="Approver" class="btn btn-primary"></p>
                                                            </form>
                                                            <form method="POST" action="{{ route('Customer.destroy', $customer->id) }}" accept-charset="UTF-8">
                                                            {{ csrf_field() }}
                                                            <input name="_method" type="hidden" value="DELETE">
                                  <div class="btn-group">

                                  <input type="submit" class="btn btn-danger" onclick="return confirm('are you sure ?');" value="Supprimer">
                                </div>
                                </form>
                                  </td>
                          @endforeach
                        </tr>






@stop
