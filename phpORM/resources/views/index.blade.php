@extends('Layout')
@section('titrePage')
    Liste des mangas
@endsection
@section('titreItem')
    <h1> tous les mangas <h1>
@endsection
@section('contenu')
@if(session()->has('info'))
        <div class="car text-white bg-success mb-3" style="max-width: 18rem;">
            <div class="card-body">
                <p class="card-text">{{session('info')}}</p>
            </div>
        </div>
    @endif
    <div class="card">
        <header class="card-header">
            <h5 class="card-header-title">Nous avons selectionné pour vous: </h5>
        </header>
        <div class="card-content">
        	<div class="content">
			
		<td><a class="btn btn-primary" href="{{ route('mangas.create')}}">Ajouter un manga </a> </td>
        		<table class="table is-hoverable">
        			<thread>
        				<tr>
        					<th>#</th>
        					<th>Titre</th>
        					<th>Genre</th>
        					<th></th>
        					<th></th>
        				</tr>
        			</thread>
        			@foreach($mangas as $manga)
        				<tr>
        					<td>{{ $manga->id}} </td>
        					<td><strong>{{$manga ->titre}}</strong></td>
        					<td>{{$manga->genre}}</td>
        					<td><a class="btn btn-primary" href="{{ route('mangas.show', $manga->id)}}">Voir </a></td>
							<td> <a class="btn btn-warning" href ="{{route('mangas.edit',$manga->id)}}">Modifier </a>
        					<td>
        						<form action="{{route('mangas.destroy',$manga->id)}}" method="post">
        							@csrf
        							@method('DELETE')
        							<button class="btn btn-danger" type="submit"> Supprimer</button>
        						</form>
        					</td>
        				</tr>
        			@endforeach
        		</table>
        	</div>
        </div>
    </div>
@endsection