@extends('user.layout.app')

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
                          <th>Role</th>
                          <th> Action</th>
                        </tr>
                      </thead>

                      <tbody>

                        <tr>

                          @foreach($contact as $cont)
                          <td class="center">
                            {{ucfirst($cont->user->name)}}
                          </td>

                          <td class="center">
                            <a href="{{route('send')}}">{{$cont->user->email}}</a>
                          </td>


                          <td >
                           {{$cont->sujet}}
                          </td>
                          <td >
                           {{$cont->message}}
                          </td>
                          <td >
                            @if(Auth::guard('admin')->user()->email==$cont->role)
                           {{'Admin'}}
                           @else
                           {{'Commercant'}}
                           @endif
                          </td>
                          <td>
                            <form method="POST" action="{{ route('destroyreply', $cont->id) }}" >
                                    {{csrf_field()}}
                                    {{method_field('DELETE')}}
                                  <input type="submit" class="btn btn-danger" onclick="return confirm('Confirmer suppression ?');" value="Delete">
                                  <a class="btn btn-primary "href="{{route('send')}}">Contacter Admin</a>
                                </form>
                  </td>
                        </tr>

                        @endforeach

                        </tbody>
                        </table>
                        <div class="row">
        </div>



@stop
