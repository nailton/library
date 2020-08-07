@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Adicionar Autor</div>

                <div class="card-body">

                    <form method="POST" action="/authors">
                        @csrf

                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">Nome</label>

                            <div class="col-md-6">
                                <input id="name" type="name" class="form-control @error('email') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                                @error('name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="dob" class="col-md-4 col-form-label text-md-right">{{ __('dob') }}</label>

                            <div class="col-md-6">
                                <input id="dob" type="dob" class="form-control @error('dob') is-invalid @enderror" name="dob" required autocomplete="current-dob">

                                @error('dob')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-8 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    Adicionar novo autor
                                </button>
                            </div>
                        </div>

                    </form>
                    <br><br>
                    @if($author)

                    <table class="table">
                      <thead>
                        <tr>
                          <th scope="col">#</th>
                          <th scope="col">Nome</th>
                          <th scope="col">Data de Nascimento</th>
                          <th scope="col">Criado em</th>
                      </tr>
                  </thead>
                  <tbody>
                    @foreach ($author as $a)
                    <tr>
                      <th scope="row">{{ $a->id }}</th>
                      <td>{{ $a->name }}</td>
                      <td>{{ $a->dob->format('d/m/Y') }}</td>
                      <td>{{ $a->created_at->format('d/m/Y H:i:s') }}</td>
                  </tr>
                  @endforeach
              </tbody>
          </table>
          @endif
      </div>
  </div>
</div>
</div>
</div>
@endsection
