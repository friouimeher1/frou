<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<style type="text/css">
	#moncadre {
		width:700px;
		margin:0 auto;
		padding:10px;
		border:2px solid #000000;
		border-radius:5px;
		-webkit-border-radius:5px;
		-moz-border-radius:5px;
	}
	#cadre {
		width:300px;
		padding:2px;
		border:1px solid #000000;
		border-radius:5px;
		-webkit-border-radius:5px;
		-moz-border-radius:5px;
	}
	#cadre1 {
		width:300px;
		height: 120px;
		padding:2px;
		border:1px solid #000000;
		border-radius:5px;
		-webkit-border-radius:5px;
		-moz-border-radius:5px;
	}
	#block_container
	{
		text-align:center;
	}
	.bloc1, .bloc2
	{
		display:inline;
		height: 150px;
		width: 350px;
	}

</style>

<body id="moncadre">
	<div id="cadre">
		<h3 class="text-center"> {{Auth::guard('user')->user()->name}}</h3>

	</div>
	<br>
	<br>

	<div id="block_container">
		<table id="demo-dt-basic" class="table-bordered" cellpadding="3" width="70%" cellspacing="3">
			<tr>
				<th><h3><strong>Détails: </strong></h3></th>
			</tr>
			<tr>
				<th><h3><strong>Nom Client: {{$factures->commande->panier->user->name}}</strong></h3></th>
			</tr>
			<tr>
				<th><h3><strong>Prénom Client: {{$factures->commande->panier->user->prenom}}</strong></h3></th>
			</tr>
			<tr>
				<th><h3><strong>Téléphone Client: {{$factures->commande->panier->user->telephone}}</strong></h3></th>
			</tr>
			@foreach($panier->contenu->items as $item)

			<tr>
				<th><h3><strong>Produit: {{$item['item']['nom']}}</strong></h3></th>
			</tr>
			<tr>
				<th><h3><strong>Prix:  {{ $item['price'] }} DT</strong></h3></th>
			</tr>
			<tr>
				<th><h3><strong>Quantité: {{ $item['qty'] }}</strong></h3></th>
			</tr>
			 @endforeach
			<td >

                                        {{$p=0}}
                                        {{ $p=$p+(number_format(($panier->commande->total)*($panier->contenu->totalQty))) }} DT

                                        </td>
                                        
		</table>
	</div>
</body>
</html>
