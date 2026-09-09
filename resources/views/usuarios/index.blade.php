@extends('layouts.app')

@section('title', 'Utilizadores')

@section('content')

    <x-breadcrumb
        title="Utilizadores"
        :items="[
            ['label' => 'Utilizadores']
        ]"
    />

    <div class="container py-4">

        <h2>
            Lista de Utilizadores
        </h2>

    </div>

@endsection