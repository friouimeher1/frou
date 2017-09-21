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
                          <th> Ville</th>


                          <th>

                             Addresse
                          </th>
                          <th class="hidden-480">  Téléphone</th>



                          <th class="hidden-480">  Action</th>
                        </tr>
                      </thead>

                      <tbody>
                      @foreach($users as $user)
                        <tr>


                          <td class="center">
                            {{ucfirst($user -> name)   }} <p>  {{ucfirst($user -> prenom)}}
                          </td>

                          <td>
                            <a href="#">{{$user -> email}} </a>
                          </td>
                          <td>{{$user -> ville}}</td>
                          <td>{{$user -> adresse}}</td>
                          <td><span class="label label-sm label-warning">{{$user ->telephone}}</span></td>



                          <td>

                              <form action="{{url('/admin/User/approve1')}}" method="POST">
                                                                {{ csrf_field() }}
                                                                <input <?php if($user->approve == 1) { echo "checked";}?> type="checkbox" name="approve">
                                                                <input type="hidden" name="userId" value="{{ $user->id }}"> &nbsp;
                                                                <p><input type="submit" value="Approver" class="btn btn-primary"></p>
                                                            </form>
                                                            <form method="POST" action="{{ route('User.destroy', $user->id) }}" accept-charset="UTF-8">
                                                            {{ csrf_field() }}
                                                            <input name="_method" type="hidden" value="DELETE">
                                  <div class="btn-group">

                                  <input type="submit" class="btn btn-danger" onclick="return confirm('Confirmer suppression ?');" value="Supprimer">
                                </div>
                                </form>
                                  </td>

                            </div>


                          </td>
                          @endforeach
                        </tr>

@stop
