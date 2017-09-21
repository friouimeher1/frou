@extends('admin.layout.default')


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
    					@foreach($admin->unreadnotifications as $not)
                                            <tr>
                                                <td>{!! $not->data['message'] !!}</td>
                                                <td style="text-align: center;">
                                                    @if($not->type == 'App\Notifications\Register')
                                                    {!! $not->type !!} <br> <span class="label label-pill label-info text-center">Utilisateur</span>
                                                    @else
                                                    {!! $not->type !!} <br> <span class="label label-pill label-primary text-center">Commercant</span>

                                                    @endif
                                                </td>
                                                <td>{{ $not->created_at->diffForHumans() }}</td>
                                                <td>
                                                    <a href="{{url('/admin/notification/'.$not->id)}}" class="btn btn-warning"><i class="glyphicon glyphicon-ok" aria-hidden="true"></i></a>
                                                </td>
                                                <td>
                                                    <a href="{{url('/admin/notification/delete/'.$not->id)}}" class="btn btn-danger"><i class="glyphicon glyphicon-trash" aria-hidden="true"></i></a>
                                                </td>

                                            </tr>
                                            @endforeach
    				</tbody>
    			</table>



@endsection
