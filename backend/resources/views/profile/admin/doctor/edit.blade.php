@extends('layouts.app')

@section('content')
    <div class="container">
        <h2>Modifica Profilo Dottore: {{ $user_data['name'] }}</h2>

        {{-- validazione errori --}}
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        {{-- validazione errori --}}


        {{-- per inserire immagini mettiamo l'enctype enctype="multipart/form-data" --}}
        <form action="{{ route('profile.admin.doctor.update', $doctor) }}" method="POST" enctype="multipart/form-data"
            class="form-input-image">
            @csrf
            @method('PUT')
            <div class="mb-3">
                <label for="description" class="form-label">Descrizione</label>
                <textarea class="form-control" id="description" name="description">{{ old('description', $doctor->description) }}</textarea>
            </div>

            <div class="mb-3">
                <p>Specializzato in:</p>
                @foreach ($specializations as $specialization)
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="checkbox" id="{{ $specialization->id }}"
                        value="{{ $specialization->id }}" name="specializations[]"
                        @checked(in_array($specialization->id, old('specializations', $doctor_specializations ?? [])))>
                    <label class="form-check-label" for="specialization">{!! $specialization->name !!}</label>
                </div>
                @endforeach
            </div>

            <div class="mb-3">
                <label for="address" class="form-label">Indirizzo dottore:</label>
                <input type="text" class="form-control" id="address" name="address"
                    placeholder="Inserisci indirizzo dottore" required minlength="1" maxlength="100"
                    value="{{ old('address', $doctor->address) }}">
            </div>

            <div class="mb-3">
                <label for="curriculum_vitae" class="form-label">CV:</label>
                <input type="text" class="form-control" id="curriculum_vitae" name="curriculum_vitae"
                    placeholder="Inserisci CV" required minlength="1" maxlength="100"
                    value="{{ old('curriculum_vitae', $doctor->curriculum_vitae) }}">
            </div>

            <div class="mb-3">
                <label for="email" class="form-label">Email Dottore:</label>
                <input type="email" class="form-control" id="email" name="email" placeholder="inserisci email"
                    required minlength="1" maxlength="100" value="{{ old('email', $user_data['email']) }}">
            </div>
            {{-- immagini --}}
            <div class="mb-3 @if (!$doctor->photo) d-none @endif" id="image-input-container">
                {{-- preview immagine --}}
                <div class="preview">
                    {{-- DATABASE <img id="file-image-preview" @if ($doctor->photo) src="{{ asset('storage/' . $doctor->photo) }}" @endif> --}}
                    <img id="file-image-preview" @if ($doctor->photo) src="{{ $doctor->getPictureUri() }}" @endif>
                </div>
                <label for="photo" class="form-label py-4">Foto Dottore</label>
                <input class="form-control" type="file" id="photo" name="photo"
                value="{{ old('photo', $doctor->photo) }}">
            </div>
            {{-- /immagini --}}

            <button type="submit" class="btn btn-primary">Modifica</button>
        </form>

    </div>
@endsection
