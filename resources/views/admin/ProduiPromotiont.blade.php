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

                          <th>#</th>
                          <th> Nom Produit</th>
                          <th> Image</th>
                          <th> Prix sans promotion</th>
                        <th> Prix avec promotion</th>
                        <th> Pourcentage</th>
                        </tr>
                      </thead>

                      <tbody>
                      @foreach($promotions as $promotion)
                        <tr>


                          <td class="center">
                            {{$promotion->id}}
                          </td>




                          <td >
					{{$promotion->produit->nom}}
                      </td>
                      <td >
					<img src="/images/{{$promotion->produit->image}}" width="20px" height="20px">
                      </td>
                      <td>
                      {{$promotion->produit->prix}}
                      </td>
                          <td >
                           {{$promotion->prixpromo}}
                          </td>

                          <td>
                           {{number_format(($percent=($promotion->prixpromo * 100)/$promotion->produit->prix),2,'.',',')}}%
                  </td>
                        </tr>

                        @endforeach

                        </tbody>
                        </table>



                                </div>
                              </div>
                          </div>



                      </div>

@stop
