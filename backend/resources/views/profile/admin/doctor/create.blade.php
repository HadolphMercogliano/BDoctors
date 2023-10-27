@extends('layouts.app')

@section('content')
    <div class="container">
        <h2>Crea post</h2>

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
        <section id="section-create">
            <div class="container">
                <div class="row py-4">
                    <h2>Crea il tuo profilo</h2>
                </div>
            </div>
        </section>

        <div class="container pt-4">
            <div class="row">
                {{-- per inserire immagini mettiamo l'enctype enctype="multipart/form-data" --}}
                <form action="{{ route('profile.admin.doctor.store') }}" method="POST" enctype="multipart/form-data"
                    class="form-input-image">
                    {{-- token laravel form --}}
                    @csrf
                    {{-- token --}}

                    <div class="mb-3">
                        <label for="description" class="form-label">Descrizione</label>
                        <textarea class="form-control" id="description" name="description">{{ old('description') }}</textarea>
                    </div>

                    <div class="mb-3">
                        <p>Scegli la tua specializzazione:</p>
                        @foreach ($specializations as $specialization)
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="checkbox" id="specialization"
                                    value="{{ $doctor->id }}" name="specializations[]"
                                    {{ in_array($specialization->id, old('specializations', [])) ? 'checked' : '' }}>
                                <label class="form-check-label" for="specialization">{!! $specialization->name !!}</label>
                            </div>
                        @endforeach
                    </div>

                    <div class="mb-3">
                        <label for="address" class="form-label">Indirizzo:</label>
                        <input type="text" class="form-control" id="address" name="address"
                            placeholder="Inserisci indirizzo dottore" required minlength="1" maxlength="100"
                            value="{{ old('address') }}">
                    </div>


                    <div class="mb-3">
                        <label for="curriculum_vitae" class="form-label">CV:</label>
                        <input type="text" class="form-control" id="curriculum_vitae" name="curriculum_vitae"
                            placeholder="Inserisci CV" required minlength="1" maxlength="100"
                            value="{{ old('curriculum_vitae') }}">
                    </div>

                    <div class="mb-3">
                        <label for="email" class="form-label">Email:</label>
                        <input type="email" class="form-control" id="email" name="email"
                            placeholder="inserisci email" required minlength="1" maxlength="100"
                            value="{{ old('email') }}">
                    </div>


                    {{-- Immagine --}}
                    <div class="mb-3">
                        <div class="preview">
                            <img id="file-image-preview">
                        </div>
                        <label for="photo" class="form-label">Carica Foto</label>
                        <input class="form-control" type="file" id="photo" name="photo">
                    </div>
                    {{-- Immagine --}}

                    <button type="submit" class="btn btn-primary">Submit</button>
                </form>
            </div>

        </div>

    </div>
@endsection
