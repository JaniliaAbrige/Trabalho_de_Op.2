@extends('layouts.app')

@section('title', 'Cursos')

@section('content')

<style>
    .curso-page {
        background: #f8fafc;
        min-height: calc(100vh - 140px);
        padding: 35px 0 50px;
    }

    .page-header {
        margin-bottom: 25px;
        display: flex;
        justify-content: space-between;
        align-items: flex-end;
        gap: 20px;
    }

    .page-header h1 {
        color: #003B73;
        font-size: 26px;
        font-weight: 700;
        margin: 0;
    }

    .page-header p {
        color: #6b7280;
        margin: 6px 0 0;
        font-size: 14px;
    }

    .btn-novo {
        border: none;
        background: #F57C00;
        color: #fff;
        border-radius: 7px;
        padding: 10px 18px;
        font-size: 13px;
        font-weight: 600;
        text-decoration: none;
        display: inline-flex;
        align-items: center;
        justify-content: center;
        gap: 7px;
        white-space: nowrap;
        transition: all .2s ease;
    }

    .btn-novo:hover {
        background: #003B73;
        color: #fff;
    }

    .curso-card {
        background: #fff;
        border: 1px solid #e5e7eb;
        border-radius: 12px;
        overflow: hidden;
    }

    .card-title-area {
        padding: 20px 24px;
        border-bottom: 1px solid #e5e7eb;
        display: flex;
        align-items: center;
        gap: 12px;
    }

    .title-icon {
        width: 42px;
        height: 42px;
        min-width: 42px;
        border-radius: 8px;
        background: #003B73;
        color: #fff;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 17px;
    }

    .card-title-area h2 {
        color: #003B73;
        font-size: 18px;
        font-weight: 700;
        margin: 0;
    }

    .card-title-area p {
        color: #6b7280;
        font-size: 12px;
        margin: 3px 0 0;
    }

    .table-area {
        width: 100%;
    }

    .curso-table {
        width: 100%;
        margin: 0;
        border-collapse: collapse;
    }

    .curso-table thead th {
        background: #f8fafc;
        color: #374151;
        font-size: 12px;
        font-weight: 700;
        padding: 14px 18px;
        border-bottom: 1px solid #e5e7eb;
        white-space: nowrap;
    }

    .curso-table tbody td {
        color: #4b5563;
        font-size: 13px;
        padding: 15px 18px;
        border-bottom: 1px solid #f0f1f3;
        vertical-align: middle;
    }

    .curso-table tbody tr:last-child td {
        border-bottom: none;
    }

    .curso-table tbody tr {
        transition: background .15s ease;
    }

    .curso-table tbody tr:hover {
        background: #fafafa;
    }

    .curso-codigo {
        color: #6b7280;
        font-size: 12px;
        font-weight: 600;
        white-space: nowrap;
    }

    .curso-nome {
        color: #003B73;
        font-weight: 700;
        line-height: 1.4;
    }

    .curso-categoria {
        color: #374151;
        font-size: 12px;
        font-weight: 500;
    }

    .curso-modalidade {
        display: inline-flex;
        align-items: center;
        padding: 5px 9px;
        border-radius: 6px;
        background: #eff6ff;
        color: #003B73;
        font-size: 11px;
        font-weight: 600;
        white-space: nowrap;
    }

    .curso-preco {
        color: #374151;
        font-weight: 600;
        white-space: nowrap;
    }

    .curso-vagas {
        color: #374151;
        white-space: nowrap;
    }

    .badge-ativo,
    .badge-inativo {
        display: inline-flex;
        align-items: center;
        justify-content: center;
        padding: 5px 10px;
        border-radius: 20px;
        font-size: 11px;
        font-weight: 600;
        white-space: nowrap;
    }

    .badge-ativo {
        background: #ecfdf5;
        color: #047857;
    }

    .badge-inativo {
        background: #f3f4f6;
        color: #6b7280;
    }

    .acoes {
        display: flex;
        align-items: center;
        justify-content: center;
        gap: 6px;
    }

    .btn-acao {
        width: 34px;
        height: 34px;
        display: inline-flex;
        align-items: center;
        justify-content: center;
        border: 1px solid #e5e7eb;
        border-radius: 7px;
        background: #fff;
        color: #4b5563;
        text-decoration: none;
        transition: all .2s ease;
        font-size: 12px;
        cursor: pointer;
    }

    .btn-acao:hover {
        border-color: #003B73;
        color: #003B73;
        background: #f8fafc;
    }

    .btn-ativar:hover {
        border-color: #047857;
        color: #047857;
        background: #ecfdf5;
    }

    .btn-desativar:hover {
        border-color: #F57C00;
        color: #F57C00;
        background: #fff7ed;
    }

    .btn-eliminar:hover {
        border-color: #dc2626;
        color: #dc2626;
        background: #fef2f2;
    }

    .alert-success {
        border: none;
        border-radius: 8px;
        font-size: 13px;
        margin-bottom: 20px;
    }

    .empty-state {
        text-align: center;
        padding: 55px 20px;
    }

    .empty-icon {
        width: 55px;
        height: 55px;
        margin: 0 auto 15px;
        border-radius: 10px;
        background: #f1f5f9;
        color: #003B73;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 21px;
    }

    .empty-state h3 {
        color: #003B73;
        font-size: 16px;
        font-weight: 700;
        margin-bottom: 6px;
    }

    .empty-state p {
        color: #6b7280;
        font-size: 13px;
        margin: 0;
    }

    /* MOBILE */

    .mobile-list {
        display: none;
    }

    .mobile-course-card {
        padding: 17px 16px;
        border-bottom: 1px solid #e5e7eb;
    }

    .mobile-course-card:last-child {
        border-bottom: none;
    }

    .mobile-course-top {
        display: flex;
        justify-content: space-between;
        align-items: flex-start;
        gap: 12px;
        margin-bottom: 12px;
    }

    .mobile-course-code {
        color: #9ca3af;
        font-size: 11px;
        font-weight: 600;
        margin-bottom: 3px;
    }

    .mobile-course-name {
        color: #003B73;
        font-size: 14px;
        font-weight: 700;
        line-height: 1.4;
    }

    .mobile-course-category {
        color: #6b7280;
        font-size: 12px;
        margin-bottom: 12px;
    }

    .mobile-course-info {
        display: grid;
        grid-template-columns: repeat(2, 1fr);
        gap: 10px;
        margin-bottom: 14px;
    }

    .info-item {
        background: #f8fafc;
        border: 1px solid #eef0f3;
        border-radius: 7px;
        padding: 9px;
    }

    .info-label {
        display: block;
        color: #9ca3af;
        font-size: 10px;
        margin-bottom: 3px;
    }

    .info-value {
        color: #374151;
        font-size: 12px;
        font-weight: 600;
    }

    .mobile-course-footer {
        display: flex;
        align-items: center;
        justify-content: space-between;
        gap: 10px;
    }

    .mobile-actions {
        display: flex;
        align-items: center;
        gap: 5px;
    }

    .mobile-actions .btn-acao {
        width: 32px;
        height: 32px;
        font-size: 11px;
    }

    @media (max-width: 1100px) {

        .curso-table thead th,
        .curso-table tbody td {
            padding-left: 12px;
            padding-right: 12px;
        }

        .curso-table {
            min-width: 1000px;
        }
    }

    @media (max-width: 767px) {

        .curso-page {
            padding: 22px 12px 35px;
        }

        .curso-page .container {
            padding-left: 0;
            padding-right: 0;
        }

        .page-header {
            margin-bottom: 20px;
            flex-direction: column;
            align-items: stretch;
            gap: 15px;
        }

        .page-header h1 {
            font-size: 23px;
        }

        .page-header p {
            font-size: 13px;
            line-height: 1.5;
        }

        .btn-novo {
            width: 100%;
            min-height: 42px;
        }

        .curso-card {
            border-radius: 10px;
        }

        .card-title-area {
            padding: 16px;
        }

        .title-icon {
            width: 38px;
            height: 38px;
            min-width: 38px;
            font-size: 15px;
        }

        .card-title-area h2 {
            font-size: 16px;
        }

        .card-title-area p {
            font-size: 11px;
        }

        .desktop-table {
            display: none;
        }

        .mobile-list {
            display: block;
        }
    }

    @media (min-width: 768px) {
        .desktop-table {
            display: block;
        }

        .mobile-list {
            display: none;
        }
    }
</style>

<div class="curso-page">

    <div class="container">

        {{-- CABEÇALHO --}}
        <div class="page-header">

            <div>
                <h1>Cursos</h1>

                <p>
                    Gerencie os cursos disponíveis no sistema.
                </p>
            </div>

            <a href="{{ route('cursos.create') }}" class="btn-novo">
                <i class="fas fa-plus"></i>
                Novo curso
            </a>

        </div>

        {{-- MENSAGEM DE SUCESSO --}}
        @if(session('success'))

            <div class="alert alert-success alert-dismissible fade show" role="alert">

                <i class="fas fa-check-circle me-1"></i>

                {{ session('success') }}

                <button
                    type="button"
                    class="btn-close"
                    data-bs-dismiss="alert">
                </button>

            </div>

        @endif

        <div class="curso-card">

            {{-- TÍTULO --}}
            <div class="card-title-area">

                <div class="title-icon">
                    <i class="fas fa-book"></i>
                </div>

                <div>
                    <h2>Lista de cursos</h2>

                    <p>
                        Cursos registados no sistema
                    </p>
                </div>

            </div>


            {{-- ================= DESKTOP ================= --}}
            <div class="table-area desktop-table">

                @if($cursos->count() > 0)

                    <div class="table-responsive">

                        <table class="curso-table">

                            <thead>

                                <tr>

                                    <th>Código</th>

                                    <th>Curso</th>

                                    <th>Categoria</th>

                                    <th>Duração</th>

                                    <th>Carga horária</th>

                                    <th>Modalidade</th>

                                    <th>Preço</th>

                                    <th>Vagas</th>

                                    <th>Estado</th>

                                    <th width="170" class="text-center">
                                        Ações
                                    </th>

                                </tr>

                            </thead>

                            <tbody>

                                @foreach($cursos as $curso)

                                    <tr>

                                        <td>
                                            <span class="curso-codigo">
                                                {{ $curso->codigo }}
                                            </span>
                                        </td>

                                        <td>
                                            <div class="curso-nome">
                                                {{ $curso->nome }}
                                            </div>
                                        </td>

                                        <td>

                                            <span class="curso-categoria">

                                                {{ $curso->categoria->nome ?? 'Sem categoria' }}

                                            </span>

                                        </td>

                                        <td>
                                            {{ $curso->duracao }}
                                        </td>

                                        <td>
                                            {{ $curso->carga_horaria }} h
                                        </td>

                                        <td>

                                            <span class="curso-modalidade">

                                                {{ $curso->modalidade }}

                                            </span>

                                        </td>

                                        <td>

                                            <span class="curso-preco">

                                                {{ number_format($curso->preco, 2, ',', '.') }}
                                                MT

                                            </span>

                                        </td>

                                        <td>

                                            <span class="curso-vagas">

                                                {{ $curso->vagas }}

                                            </span>

                                        </td>

                                        <td>

                                            @if($curso->estado == 1)

                                                <span class="badge-ativo">

                                                    <i class="fas fa-check-circle me-1"></i>

                                                    Ativo

                                                </span>

                                            @else

                                                <span class="badge-inativo">

                                                    <i class="fas fa-minus-circle me-1"></i>

                                                    Inativo

                                                </span>

                                            @endif

                                        </td>

                                        <td>

                                            <div class="acoes">

                                                {{-- VISUALIZAR --}}

                                                <a
                                                    href="{{ route('cursos.show', $curso->id) }}"
                                                    class="btn-acao"
                                                    title="Visualizar"
                                                >
                                                    <i class="fas fa-eye"></i>
                                                </a>


                                                {{-- EDITAR --}}

                                                <a
                                                    href="{{ route('cursos.edit', $curso->id) }}"
                                                    class="btn-acao"
                                                    title="Editar"
                                                >
                                                    <i class="fas fa-pen"></i>
                                                </a>


                                                {{-- ATIVAR / DESATIVAR --}}

                                                @if($curso->estado == 0)

                                                    <form
                                                        action="{{ route('cursos.ativar', $curso->id) }}"
                                                        method="POST"
                                                    >

                                                        @csrf

                                                        @method('PATCH')

                                                        <button
                                                            type="submit"
                                                            class="btn-acao btn-ativar"
                                                            title="Ativar"
                                                        >

                                                            <i class="fas fa-check"></i>

                                                        </button>

                                                    </form>

                                                @else

                                                    <form
                                                        action="{{ route('cursos.desativar', $curso->id) }}"
                                                        method="POST"
                                                    >

                                                        @csrf

                                                        @method('PATCH')

                                                        <button
                                                            type="submit"
                                                            class="btn-acao btn-desativar"
                                                            title="Desativar"
                                                        >

                                                            <i class="fas fa-ban"></i>

                                                        </button>

                                                    </form>

                                                @endif


                                                {{-- ELIMINAR --}}

                                                <form
                                                    action="{{ route('cursos.destroy', $curso->id) }}"
                                                    method="POST"
                                                    onsubmit="return confirm('Tem certeza que deseja eliminar este curso?');"
                                                >

                                                    @csrf

                                                    @method('DELETE')

                                                    <button
                                                        type="submit"
                                                        class="btn-acao btn-eliminar"
                                                        title="Eliminar"
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

                @else

                    <div class="empty-state">

                        <div class="empty-icon">

                            <i class="fas fa-book"></i>

                        </div>

                        <h3>Nenhum curso registado</h3>

                        <p>
                            Ainda não existem cursos cadastrados no sistema.
                        </p>

                    </div>

                @endif

            </div>


            {{-- ================= MOBILE ================= --}}
            <div class="mobile-list">

                @if($cursos->count() > 0)

                    @foreach($cursos as $curso)

                        <div class="mobile-course-card">

                            <div class="mobile-course-top">

                                <div>

                                    <div class="mobile-course-code">
                                        {{ $curso->codigo }}
                                    </div>

                                    <div class="mobile-course-name">
                                        {{ $curso->nome }}
                                    </div>

                                </div>

                                <div>

                                    @if($curso->estado == 1)

                                        <span class="badge-ativo">
                                            <i class="fas fa-check-circle me-1"></i>
                                            Ativo
                                        </span>

                                    @else

                                        <span class="badge-inativo">
                                            <i class="fas fa-minus-circle me-1"></i>
                                            Inativo
                                        </span>

                                    @endif

                                </div>

                            </div>


                            <div class="mobile-course-category">

                                <i class="fas fa-layer-group me-1"></i>

                                {{ $curso->categoria->nome ?? 'Sem categoria' }}

                            </div>


                            <div class="mobile-course-info">

                                <div class="info-item">

                                    <span class="info-label">
                                        Duração
                                    </span>

                                    <span class="info-value">
                                        {{ $curso->duracao }}
                                    </span>

                                </div>


                                <div class="info-item">

                                    <span class="info-label">
                                        Carga horária
                                    </span>

                                    <span class="info-value">
                                        {{ $curso->carga_horaria }} h
                                    </span>

                                </div>


                                <div class="info-item">

                                    <span class="info-label">
                                        Modalidade
                                    </span>

                                    <span class="info-value">
                                        {{ $curso->modalidade }}
                                    </span>

                                </div>


                                <div class="info-item">

                                    <span class="info-label">
                                        Preço
                                    </span>

                                    <span class="info-value">
                                        {{ number_format($curso->preco, 2, ',', '.') }} MT
                                    </span>

                                </div>

                            </div>


                            <div class="mobile-course-footer">

                                <span class="form-text">
                                    {{ $curso->vagas }} vagas
                                </span>


                                <div class="mobile-actions">

                                    <a
                                        href="{{ route('cursos.show', $curso->id) }}"
                                        class="btn-acao"
                                        title="Visualizar"
                                    >
                                        <i class="fas fa-eye"></i>
                                    </a>


                                    <a
                                        href="{{ route('cursos.edit', $curso->id) }}"
                                        class="btn-acao"
                                        title="Editar"
                                    >
                                        <i class="fas fa-pen"></i>
                                    </a>


                                    @if($curso->estado == 0)

                                        <form
                                            action="{{ route('cursos.ativar', $curso->id) }}"
                                            method="POST"
                                        >

                                            @csrf
                                            @method('PATCH')

                                            <button
                                                type="submit"
                                                class="btn-acao btn-ativar"
                                                title="Ativar"
                                            >
                                                <i class="fas fa-check"></i>
                                            </button>

                                        </form>

                                    @else

                                        <form
                                            action="{{ route('cursos.desativar', $curso->id) }}"
                                            method="POST"
                                        >

                                            @csrf
                                            @method('PATCH')

                                            <button
                                                type="submit"
                                                class="btn-acao btn-desativar"
                                                title="Desativar"
                                            >
                                                <i class="fas fa-ban"></i>
                                            </button>

                                        </form>

                                    @endif


                                    <form
                                        action="{{ route('cursos.destroy', $curso->id) }}"
                                        method="POST"
                                        onsubmit="return confirm('Tem certeza que deseja eliminar este curso?');"
                                    >

                                        @csrf
                                        @method('DELETE')

                                        <button
                                            type="submit"
                                            class="btn-acao btn-eliminar"
                                            title="Eliminar"
                                        >
                                            <i class="fas fa-trash"></i>
                                        </button>

                                    </form>

                                </div>

                            </div>

                        </div>

                    @endforeach

                @else

                    <div class="empty-state">

                        <div class="empty-icon">
                            <i class="fas fa-book"></i>
                        </div>

                        <h3>Nenhum curso registado</h3>

                        <p>
                            Ainda não existem cursos cadastrados no sistema.
                        </p>

                    </div>

                @endif

            </div>

        </div>

    </div>

</div>

@endsection