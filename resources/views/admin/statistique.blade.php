@extends('admin.layout.default')

@section('content')

<div class="page-content">
        <div class="box-typical box-typical-padding">
            <div class="box-typical box-typical-padding">
                <div class="container">
                    <div class="row">
                            <div class="panel panel-default">
                                    <label class="label label-success">Statistique utlilisateur</label>
                                    <div id="chart" style="height: 250px; width: 1000px;">
                                    </div>
                            </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/morris.js/0.5.1/morris.css">
<script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.0/jquery.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/raphael/2.1.0/raphael-min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/morris.js/0.5.1/morris.min.js"></script>
<script>
    var data = <?php echo json_encode($chartData) ?>;
    new Morris.Line({
            element: 'chart',
            data: data,
            xkey: 'month',
            ykeys: ['count'],
            labels: ['utlilisateur(s) inscrit(s)']

        });

</script>

@stop
