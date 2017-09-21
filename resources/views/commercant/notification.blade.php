@extends('commercant.layout.default')


@section('content')

<br><br><br>

                        <table class="table table-bordered">
    				<thead>
            <th>Message</th>
    					<th>type</th>

              <th>Crée le</th>
              <th colspan="2">Action</th>
    				</thead>
    				<tbody>
    					@foreach($comm->unreadnotifications as $not)
                                            <tr>
                                                <td>vérifier votre {!! $not->data['message'] !!}</td>
                                                <td style="text-align: center;">

                                                    {!! $not->type !!} <br> <span class="label label-pill label-primary text-center">Stock</span>


                                                </td>
                                                <td>{{ $not->created_at->diffForHumans() }}</td>
                                                <td>
                                                    <a href="{{url('/commercant/notification/'.$not->id)}}" class="btn btn-warning"><i class="glyphicon glyphicon-ok" aria-hidden="true"></i></a>
                                                </td>
                                                <td>
                                                    <a href="{{url('/commercant/notification/delete/'.$not->id)}}" class="btn btn-danger"><i class="glyphicon glyphicon-trash" aria-hidden="true"></i></a>
                                                </td>

                                            </tr>
                                            @endforeach
    				</tbody>
    			</table>



@endsection
