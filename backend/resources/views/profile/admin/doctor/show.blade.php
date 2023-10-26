@extends('layouts.app')
@section('title', $user_data['name'])
@section('content')
	<div class="row justify-content-center">
		<div class="col-lg-6">
			{{-- @dump($restaurant) --}}
			@if (isset($doctor))

				{{-- Edit --}}
				<ul class="list-unstyled d-flex m-0 gap-1 justify-content-center">
					<li><a href="{{ route('profile.admin.doctor.edit', $doctor) }}" class="btn btn-sm btn-warning">Modifica Profilo
							Dottore</a></li>
					{{-- <li><a href="#" class="btn btn-sm btn-danger" data-bs-toggle="modal" data-bs-target="#post-{{ $doctor->id }}">Delete</a> --}}</li>
				</ul>
				{{-- /Edit --}}

				<section class="card my-5">
					<img src="{{ $doctor->getPictureUri() }}" class="card-img-top img-fluid" alt="restaurant image">
					<div class="card-body d-flex flex-column">
						<h5 class="card-title mb-3">{{ $user_data['name'] }}</h5>

						<p class="card-text">
							<strong> Specializzazioni: </strong>
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
