@extends('layouts.app')
@section('title', $user_data['name'])
@section('content')
	<div class="row justify-content-center">
		<div class="col-lg-6">
			{{-- @dump($restaurant) --}}
			@if (isset($doctor))
				<section class="card my-5">
					<img src="{{ $doctor->photo }}" class="card-img-top img-fluid" alt="restaurant image">
					<div class="card-body d-flex flex-column">
						<h5 class="card-title mb-3">{{ $user_data['name'] }}</h5>

						<p class="card-text">
							<strong> Categorie: </strong>
							@foreach ($doctor->specializations as $specialization)
								{!! $specialization->name !!}
							@endforeach
						</p>
						<p class="card-text">
							<strong> Descrizione: </strong> {{ $doctor->description }}
						</p>

						<p class="card-text">
							<strong> Indirizzo: </strong> {{ $doctor->address }}
						</p>

						<p class="card-text">
							<strong> CV: </strong> {{ $doctor->curriculum_vitae }}
						</p>

						<p class="card-text">
							<strong> Email: </strong> {{ $user_data['email'] }}
						</p>

						{{-- <div class="d-flex justify-content-center gap-2">
							<a href="{{ route('dishes.index') }}" class="btn btn-primary w-50 align-self-center">Il mio Menù</a>
							<a href="{{ route('orders.index') }}" class="btn btn-secondary w-50 align-self-center">I mie Ordini</a>
						</div> --}}
					</div>
				</section>
			@endif
		</div>
	</div>
@endsection
