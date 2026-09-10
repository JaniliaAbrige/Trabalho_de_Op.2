@extends('layouts.app')

@section('title', 'Estudantes')

@section('content')

<style>
    :root {
        --azul-principal: #003B73;
        --laranja: #F57C00;
        --fundo: #f8fafc;
        --borda: #e5e7eb;
        --texto: #1f2937;
        --cinza: #6b7280;
    }

    .student-page {
        background: var(--fundo);
        min-height: calc(100vh - 70px);
        padding: 35px 0 50px;
    }

    .page-header {
        display: flex;
        align-items: center;
        justify-content: space-between;
        gap: 20px;
        margin-bottom: 25px;
    }

    .page-title-area {
        display: flex;
        align-items: center;
        gap: 14px;
    }

    .title-icon {
        width: 48px;
        height: 48px;
        border-radius: 12px;
        background: #e8f1f8;
        color: var(--azul-principal);
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 21px;
    }

    .page-title {
        margin: 0;
        font-size: 25px;
        font-weight: 700;
        color: var(--texto);
    }

    .page-subtitle {
        margin: 4px 0 0;
        color: var(--cinza);
        font-size: 14px;
    }

    .btn-new {
        display: inline-flex;
        align-items: center;
        gap: 8px;
        padding: 11px 18px;
        background: var(--laranja);
        color: #fff;
        border-radius: 9px;
        text-decoration: none;
        font-size: 14px;
        font-weight: 600;
        transition: .2s ease;
    }

    .btn-new:hover {
        background: #df6d00;
        color: #fff;
        transform: translateY(-1px);
    }

    .alert-success {
        border: 1px solid #bbf7d0;
        background: #f0fdf4;
        color: #166534;
        border-radius: 10px;
        font-size: 14px;
    }

    .table-card {
        background: #fff;
        border: 1px solid var(--borda);
        border-radius: 16px;
        overflow: hidden;
    }

    .table-card-header {
        padding: 20px 22px;
        border-bottom: 1px solid var(--borda);
        display: flex;
        align-items: center;
        justify-content: space-between;
        gap: 15px;
    }

    .table-card-header h5 {
        margin: 0;
        font-size: 17px;
        font-weight: 700;
        color: var(--texto);
    }

    .table-card-header span {
        color: var(--cinza);
        font-size: 13px;
    }

    .table-responsive {
        overflow-x: auto;
    }

    .students-table {
        width: 100%;
        margin: 0;
        border-collapse: collapse;
    }

    .students-table thead th {
        background: #f8fafc;
        color: #4b5563;
        font-size: 12px;
        font-weight: 700;
        text-transform: uppercase;
        letter-spacing: .03em;
        padding: 14px 18px;
        border-bottom: 1px solid var(--borda);
        white-space: nowrap;
    }

    .students-table tbody td {
        padding: 15px 18px;
        border-bottom: 1px solid #f0f1f3;
        color: var(--texto);
        font-size: 14px;
        vertical-align: middle;
    }

    .students-table tbody tr:last-child td {
        border-bottom: none;
    }

    .students-table tbody tr:hover {
        background: #fbfdff;
    }

    .student-number {
        font-weight: 700;
        color: var(--azul-principal);
    }

    .student-name {
        font-weight: 600;
        color: var(--texto);
    }

    .student-email {
        color: var(--cinza);
        font-size: 13px;
    }

    .badge-active,
    .badge-inactive {
        display: inline-flex;
        align-items: center;
        gap: 5px;
        padding: 5px 10px;
        border-radius: 20px;
        font-size: 12px;
        font-weight: 600;
    }

    .badge-active {
        background: #ecfdf3;
        color: #15803d;
    }

    .badge-inactive {
        background: #f3f4f6;
        color: #6b7280;
    }

    .action-buttons {
        display: flex;
        align-items: center;
        gap: 6px;
    }

    .btn-action {
        width: 34px;
        height: 34px;
        display: inline-flex;
        align-items: center;
        justify-content: center;
        border: 1px solid var(--borda);
        border-radius: 8px;
        background: #fff;
        color: #4b5563;
        text-decoration: none;
        transition: .2s ease;
    }

    .btn-action:hover {
        color: var(--azul-principal);
        border-color: #b8cad9;
        background: #f7fbff;
    }

    .btn-action.delete:hover {
        color: #dc2626;
        border-color: #fecaca;
        background: #fff7f7;
    }

    .empty-state {
        text-align: center;
        padding: 60px 20px;
    }

    .empty-icon {
        width: 60px;
        height: 60px;
        margin: 0 auto 15px;
        border-radius: 50%;
        background: #f1f5f9;
        color: #94a3b8;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 24px;
    }

    .empty-state h5 {
        color: var(--texto);
        font-weight: 700;
        margin-bottom: 7px;
    }

    .empty-state p {
        color: var(--cinza);
        font-size: 14px;
        margin-bottom: 20px;
    }

    /* MOBILE */
    .mobile-students {
        display: none;
    }

    .student-mobile-card {
        background: #fff;
        border: 1px solid var(--borda);
        border-radius: 14px;
        padding: 17px;
        margin-bottom: 12px;
    }

    .mobile-card-top {
        display: flex;
        justify-content: space-between;
        align-items: flex-start;
        gap: 10px;
        margin-bottom: 14px;
    }

    .mobile-number {
        color: var(--azul-principal);
        font-weight: 700;
        font-size: 13px;
    }

    .mobile-name {
        font-weight: 700;
        color: var(--texto);
        margin-top: 4px;
    }

    .mobile-info {
        display: grid;
        gap: 8px;
        margin-bottom: 15px;
    }

    .mobile-info-item {
        display: flex;
        align-items: center;
        gap: 9px;
        color: var(--cinza);
        font-size: 13px;
    }

    .mobile-info-item i {
        width: 17px;
        color: var(--azul-principal);
    }

    .mobile-actions {
        display: flex;
        gap: 7px;
        border-top: 1px solid var(--borda);
        padding-top: 13px;
    }

    .mobile-actions .btn-action {
        flex: 1;
    }

    @media (max-width: 991px) {
        .students-table-wrapper {
            display: none;
        }

        .mobile-students {
            display: block;
            padding: 15px;
        }
    }

    @media (max-width: 767px) {
        .student-page {
            padding: 20px 0 35px;
        }

        .page-header {
            align-items: flex-start;
            flex-direction: column;
        }

        .page-title {
            font-size: 22px;
        }

        .btn-new {
            width: 100%;
            justify-content: center;
        }

        .table-card-header {
            padding: 17px;
        }
    }
</style>

<div class="student-page">

    <div class="container">

        {{-- CABEÇALHO --}}
        <div class="page-header">

            <div class="page-title-area">

                <div class="title-icon">
                    <i class="fas fa-user-graduate"></i>
                </div>

                <div>
                    <h1 class="page-title">Estudantes</h1>

                    <p class="page-subtitle">
                        Gestão dos estudantes registados no sistema.
                    </p>
                </div>

            </div>

            <a href="{{ route('estudantes.create') }}" class="btn-new">
                <i class="fas fa-user-plus"></i>
                Novo estudante
            </a>

        </div>


        {{-- MENSAGEM DE SUCESSO --}}
        @if(session('success'))

            <div class="alert alert-success alert-dismissible fade show mb-4" role="alert">

                <i class="fas fa-circle-check me-2"></i>

                {{ session('success') }}

                <button
                    type="button"
                    class="btn-close"
                    data-bs-dismiss="alert"
                ></button>

            </div>

        @endif


        {{-- CARD DA TABELA --}}
        <div class="table-card">

            <div class="table-card-header">

                <div>
                    <h5>
                        Lista de estudantes
                    </h5>

                    <span>
                        {{ $estudantes->count() }}
                        {{ $estudantes->count() == 1 ? 'estudante registado' : 'estudantes registados' }}
                    </span>
                </div>

            </div>


            @if($estudantes->count() > 0)

                {{-- ============================= --}}
                {{-- DESKTOP --}}
                {{-- ============================= --}}

                <div class="students-table-wrapper">

                    <div class="table-responsive">

                        <table class="students-table">

                            <thead>
                                <tr>
                                    <th>Nº Estudante</th>
                                    <th>Nome</th>
                                    <th>Email</th>
                                    <th>Telefone</th>
                                    <th>Nível académico</th>
                                    <th>Província</th>
                                    <th>Estado</th>
                                    <th>Ações</th>
                                </tr>
                            </thead>

                            <tbody>

                                @foreach($estudantes as $estudante)

                                    <tr>

                                        {{-- NÚMERO --}}
                                        <td>
                                            <span class="student-number">
                                                {{ $estudante->numero_estudante }}
                                            </span>
                                        </td>


                                        {{-- NOME --}}
                                        <td>

                                            <div class="student-name">
                                                {{ $estudante->usuario->nome ?? 'Sem nome' }}
                                            </div>

                                        </td>


                                        {{-- EMAIL --}}
                                        <td>

                                            <span class="student-email">
                                                {{ $estudante->usuario->email ?? '—' }}
                                            </span>

                                        </td>


                                        {{-- TELEFONE --}}
                                        <td>
                                            {{ $estudante->usuario->telefone ?? '—' }}
                                        </td>


                                        {{-- NÍVEL --}}
                                        <td>
                                            {{ $estudante->nivel_academico }}
                                        </td>


                                        {{-- PROVÍNCIA --}}
                                        <td>
                                            {{ $estudante->provincia }}
                                        </td>


                                        {{-- ESTADO --}}
                                        <td>

                                            @if(($estudante->usuario->estado ?? 0) == 1)

                                                <span class="badge-active">
                                                    <i class="fas fa-circle-check"></i>
                                                    Ativo
                                                </span>

                                            @else

                                                <span class="badge-inactive">
                                                    <i class="fas fa-circle-minus"></i>
                                                    Inativo
                                                </span>

                                            @endif

                                        </td>


                                        {{-- AÇÕES --}}
                                        <td>

                                            <div class="action-buttons">

                                                <a
                                                    href="{{ route('estudantes.show', $estudante) }}"
                                                    class="btn-action"
                                                    title="Ver estudante"
                                                >
                                                    <i class="fas fa-eye"></i>
                                                </a>

                                                <a
                                                    href="{{ route('estudantes.edit', $estudante) }}"
                                                    class="btn-action"
                                                    title="Editar estudante"
                                                >
                                                    <i class="fas fa-pen"></i>
                                                </a>

                                                <form
                                                    action="{{ route('estudantes.destroy', $estudante) }}"
                                                    method="POST"
                                                    class="d-inline"
                                                    onsubmit="return confirm('Tem certeza que deseja eliminar este estudante?');"
                                                >

                                                    @csrf
                                                    @method('DELETE')

                                                    <button
                                                        type="submit"
                                                        class="btn-action delete"
                                                        title="Eliminar estudante"
                                                    >
                                                        <i class="fas fa-trash"></i>
                                                    </button>

                                                </form>

                                            </div>

                                        </td>

                                    </tr>

                                @endforeach

                            </tbody>

                        </table>

                    </div>

                </div>


                {{-- ============================= --}}
                {{-- MOBILE --}}
                {{-- ============================= --}}

                <div class="mobile-students">

                    @foreach($estudantes as $estudante)

                        <div class="student-mobile-card">

                            <div class="mobile-card-top">

                                <div>

                                    <div class="mobile-number">
                                        Nº {{ $estudante->numero_estudante }}
                                    </div>

                                    <div class="mobile-name">
                                        {{ $estudante->usuario->nome ?? 'Sem nome' }}
                                    </div>

                                </div>

                                @if(($estudante->usuario->estado ?? 0) == 1)

                                    <span class="badge-active">
                                        Ativo
                                    </span>

                                @else

                                    <span class="badge-inactive">
                                        Inativo
                                    </span>

                                @endif

                            </div>


                            <div class="mobile-info">

                                <div class="mobile-info-item">

                                    <i class="fas fa-envelope"></i>

                                    <span>
                                        {{ $estudante->usuario->email ?? '—' }}
                                    </span>

                                </div>


                                <div class="mobile-info-item">

                                    <i class="fas fa-phone"></i>

                                    <span>
                                        {{ $estudante->usuario->telefone ?? '—' }}
                                    </span>

                                </div>


                                <div class="mobile-info-item">

                                    <i class="fas fa-graduation-cap"></i>

                                    <span>
                                        {{ $estudante->nivel_academico }}
                                    </span>

                                </div>


                                <div class="mobile-info-item">

                                    <i class="fas fa-location-dot"></i>

                                    <span>
                                        {{ $estudante->provincia }}
                                    </span>

                                </div>

                            </div>


                            <div class="mobile-actions">

                                <a
                                    href="{{ route('estudantes.show', $estudante) }}"
                                    class="btn-action"
                                    title="Ver"
                                >
                                    <i class="fas fa-eye"></i>
                                </a>

                                <a
                                    href="{{ route('estudantes.edit', $estudante) }}"
                                    class="btn-action"
                                    title="Editar"
                                >
                                    <i class="fas fa-pen"></i>
                                </a>

                                <form
                                    action="{{ route('estudantes.destroy', $estudante) }}"
                                    method="POST"
                                    class="flex-grow-1"
                                    onsubmit="return confirm('Tem certeza que deseja eliminar este estudante?');"
                                >

                                    @csrf
                                    @method('DELETE')

                                    <button
                                        type="submit"
                                        class="btn-action delete w-100"
                                        title="Eliminar"
                                    >
                                        <i class="fas fa-trash"></i>
                                    </button>

                                </form>

                            </div>

                        </div>

                    @endforeach

                </div>

            @else

                {{-- ============================= --}}
                {{-- SEM ESTUDANTES --}}
                {{-- ============================= --}}

                <div class="empty-state">

                    <div class="empty-icon">
                        <i class="fas fa-user-graduate"></i>
                    </div>

                    <h5>
                        Nenhum estudante registado
                    </h5>

                    <p>
                        Ainda não existem estudantes cadastrados no sistema.
                    </p>

                    <a
                        href="{{ route('estudantes.create') }}"
                        class="btn-new"
                    >
                        <i class="fas fa-user-plus"></i>
                        Registar primeiro estudante
                    </a>

                </div>

            @endif

        </div>

    </div>

</div>

@endsection

