@extends('admin.layout.default')


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

                          <th >#</th>
                          <th> Catégorie</th>
                          <th> Action</th>
                        </tr>
                      </thead>

                      <tbody>
                      @foreach($categorie as $cat)
                        <tr>


                          <td class="center">
                            {{$cat->id}}
                          </td>




                          <td >
                           {{$cat->nom_categorie}}
                          </td>

                          <td>
                            <form method="POST" action="{{ route('Categorie.destroy', $cat->id) }}" accept-charset="UTF-8">
                                    <input name="_method" type="hidden" value="DELETE">
                                    <input name="_token" type="hidden" value="{{ csrf_token() }}">
                                    <a href="{{route('Categorie.edit', $cat->id)}}" class="btn btn-primary">Modifier</a>
                                  <input type="submit" class="btn btn-danger" onclick="return confirm('Confirmer suppression ?');" value="Delete">
                                </form>
                  </td>
                        </tr>

                        @endforeach

                        </tbody>
                        </table>
                        <div class="row">
          <a class="btn btn-success" href="{{ route('Categorie.create') }}">Ajouter</a>
        </div>


                                </div>
                              </div>
                          </div>



                      </div>



@endsection
