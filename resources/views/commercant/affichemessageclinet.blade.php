@extends('commercant.layout.default')
@section('content')



<br><br><br><br><br>
<div class="row">
              <div class="col-xs-12">
                <!-- PAGE CONTENT BEGINS -->
                <div class="row">
                  <div class="col-xs-12">
                    <table id="simple-table" class="table  table-bordered table-hover">
                      <thead>

                        <tr>

                          <th >Nom</th>
                          <th >Email</th>
                          <th> Sujet</th>
                          <th> Message</th>
                          <th> Action</th>
                        </tr>
                      </thead>

                      <tbody>

                        <tr>

                          @foreach($contactcommercants as $cont)
                          <td class="center">
                            {{ucfirst($cont->user->name)}}  - {{$cont->user->prenom}}
                          </td>

                          <td class="center">
                            <a href="{{route('commercant.reply',$cont->user->id)}}">{{$cont->user->email}}</a>
                          </td>


                          <td >
                           {{$cont->sujet}}
                          </td>
                          <td >
                           {{$cont->message}}
                          </td>
                          <td>
                            <form method="POST" action="{{route('commercant.destroy',$cont->id)}}" >
                                    {{csrf_field()}}
                                    {{method_field('DELETE')}}
                                  <input type="submit" class="btn btn-danger" onclick="return confirm('Confirmer suppression ?');" value="Delete">
                                </form>
                  </td>
                        </tr>

                        @endforeach

                        </tbody>
                        </table>
                        <div class="row">
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
