@extends('layouts.app')

@section('title', 'Categorias')

@section('content')

<style>
    .categoria-page {
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

    .btn-nova {
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

    .btn-nova:hover {
        background: #003B73;
        color: #fff;
    }

    .categoria-card {
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

    .categoria-table {
        width: 100%;
        margin: 0;
        border-collapse: collapse;
    }

    .categoria-table thead th {
        background: #f8fafc;
        color: #374151;
        font-size: 12px;
        font-weight: 700;
        padding: 14px 20px;
        border-bottom: 1px solid #e5e7eb;
        white-space: nowrap;
    }

    .categoria-table tbody td {
        color: #4b5563;
        font-size: 13px;
        padding: 15px 20px;
        border-bottom: 1px solid #f0f1f3;
        vertical-align: middle;
    }

    .categoria-table tbody tr:last-child td {
        border-bottom: none;
    }

    .categoria-table tbody tr {
        transition: background .15s ease;
    }

    .categoria-table tbody tr:hover {
        background: #fafafa;
    }

    .categoria-nome {
        color: #003B73;
        font-weight: 600;
    }

    .categoria-descricao {
        color: #6b7280;
        max-width: 480px;
        line-height: 1.5;
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

    /* =========================================
       TABLET
       ========================================= */

    @media (max-width: 991px) {

        .categoria-page {
            padding: 30px 0 45px;
        }

        .categoria-table thead th,
        .categoria-table tbody td {
            padding-left: 14px;
            padding-right: 14px;
        }

        .categoria-descricao {
            max-width: 300px;
        }
    }

    /* =========================================
       MOBILE
       ========================================= */

    @media (max-width: 767px) {

        .categoria-page {
            padding: 22px 12px 35px;
        }

        .categoria-page .container {
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

        .btn-nova {
            width: 100%;
            min-height: 42px;
        }

        .categoria-card {
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

        /*
         * No mobile escondemos a tabela
         * e mostramos os cards.
         */
        .desktop-table {
            display: none;
        }

        .mobile-list {
            display: block;
        }

        .mobile-category-card {
            padding: 17px 16px;
            border-bottom: 1px solid #e5e7eb;
        }

        .mobile-category-card:last-child {
            border-bottom: none;
        }

        .mobile-category-top {
            display: flex;
            justify-content: space-between;
            align-items: flex-start;
            gap: 12px;
            margin-bottom: 10px;
        }

        .mobile-category-number {
            color: #9ca3af;
            font-size: 11px;
            font-weight: 600;
            margin-bottom: 3px;
        }

        .mobile-category-name {
            color: #003B73;
            font-size: 14px;
            font-weight: 700;
            line-height: 1.4;
        }

        .mobile-category-description {
            color: #6b7280;
            font-size: 12px;
            line-height: 1.5;
            margin-bottom: 14px;
        }

        .mobile-category-footer {
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

        .empty-state {
            padding: 45px 18px;
        }
    }

    /* =========================================
       DESKTOP
       ========================================= */

    @media (min-width: 768px) {

        .mobile-list {
            display: none;
        }

        .desktop-table {
            display: block;
        }
    }
</style>


<div class="categoria-page">

    <div class="container">

        {{-- CABEÇALHO --}}
        <div class="page-header">

            <div>
                <h1>Categorias</h1>

                <p>
                    Gerencie as categorias utilizadas para organizar os cursos.
                </p>
            </div>

            <a
                href="{{ route('categorias.create') }}"
                class="btn-nova"
            >
                <i class="fas fa-plus"></i>
                Nova categoria
            </a>

        </div>


        {{-- MENSAGEM DE SUCESSO --}}
        @if(session('success'))

            <div
                class="alert alert-success alert-dismissible fade show"
                role="alert"
            >

                <i class="fas fa-check-circle me-1"></i>

                {{ session('success') }}

                <button
                    type="button"
                    class="btn-close"
                    data-bs-dismiss="alert"
                ></button>

            </div>

        @endif


        {{-- CARD PRINCIPAL --}}
        <div class="categoria-card">

            {{-- CABEÇALHO DO CARD --}}
            <div class="card-title-area">

                <div class="title-icon">
                    <i class="fas fa-layer-group"></i>
                </div>

                <div>
                    <h2>Lista de categorias</h2>

                    <p>
                        Categorias registadas no sistema
                    </p>
                </div>

            </div>


            {{-- =========================================
                 DESKTOP / TABLET
                 ========================================= --}}
            <div class="table-area desktop-table">

                @if($categorias->count() > 0)

                    <div class="table-responsive">

                        <table class="categoria-table">

                            <thead>

                                <tr>
                                    <th width="60">#</th>
                                    <th>Nome</th>
                                    <th>Descrição</th>
                                    <th>Estado</th>
                                    <th width="170" class="text-center">
                                        Ações
                                    </th>
                                </tr>

                            </thead>

                            <tbody>

                                @foreach($categorias as $categoria)

                                    <tr>

                                        {{-- ID --}}
                                        <td>
                                            {{ $categoria->id }}
                                        </td>


                                        {{-- NOME --}}
                                        <td>
                                            <span class="categoria-nome">
                                                {{ $categoria->nome }}
                                            </span>
                                        </td>


                                        {{-- DESCRIÇÃO --}}
                                        <td>

                                            <div class="categoria-descricao">

                                                {{ $categoria->descricao ?: 'Sem descrição' }}

                                            </div>

                                        </td>


                                        {{-- ESTADO --}}
                                        <td>

                                            @if($categoria->estado == 1)

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


                                        {{-- AÇÕES --}}
                                        <td>

                                            <div class="acoes">

                                                {{-- VISUALIZAR --}}
                                                <a
                                                    href="{{ route('categorias.show', $categoria->id) }}"
                                                    class="btn-acao"
                                                    title="Visualizar"
                                                >
                                                    <i class="fas fa-eye"></i>
                                                </a>


                                                {{-- EDITAR --}}
                                                <a
                                                    href="{{ route('categorias.edit', $categoria->id) }}"
                                                    class="btn-acao"
                                                    title="Editar"
                                                >
                                                    <i class="fas fa-pen"></i>
                                                </a>


                                                {{-- ATIVAR / DESATIVAR --}}
                                                @if($categoria->estado == 0)

                                                    <form
                                                        action="{{ route('categorias.ativar', $categoria->id) }}"
                                                        method="POST"
                                                        style="display:inline;"
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
                                                        action="{{ route('categorias.desativar', $categoria->id) }}"
                                                        method="POST"
                                                        style="display:inline;"
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
                                                    action="{{ route('categorias.destroy', $categoria->id) }}"
                                                    method="POST"
                                                    style="display:inline;"
                                                    onsubmit="return confirm('Tem certeza que deseja eliminar esta categoria?');"
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
                            <i class="fas fa-layer-group"></i>
                        </div>

                        <h3>Nenhuma categoria registada</h3>

                        <p>
                            Ainda não existem categorias cadastradas no sistema.
                        </p>

                    </div>

                @endif

            </div>


            {{-- =========================================
                 MOBILE
                 ========================================= --}}
            <div class="mobile-list">

                @if($categorias->count() > 0)

                    @foreach($categorias as $categoria)

                        <div class="mobile-category-card">

                            <div class="mobile-category-top">

                                <div>

                                    <div class="mobile-category-number">
                                        Categoria #{{ $categoria->id }}
                                    </div>

                                    <div class="mobile-category-name">
                                        {{ $categoria->nome }}
                                    </div>

                                </div>


                                {{-- ESTADO --}}
                                <div>

                                    @if($categoria->estado == 1)

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


                            {{-- DESCRIÇÃO --}}
                            <div class="mobile-category-description">

                                {{ $categoria->descricao ?: 'Sem descrição' }}

                            </div>


                            {{-- RODAPÉ --}}
                            <div class="mobile-category-footer">

                                <span class="form-text">
                                    Ações
                                </span>


                                <div class="mobile-actions">

                                    {{-- VISUALIZAR --}}
                                    <a
                                        href="{{ route('categorias.show', $categoria->id) }}"
                                        class="btn-acao"
                                        title="Visualizar"
                                    >
                                        <i class="fas fa-eye"></i>
                                    </a>


                                    {{-- EDITAR --}}
                                    <a
                                        href="{{ route('categorias.edit', $categoria->id) }}"
                                        class="btn-acao"
                                        title="Editar"
                                    >
                                        <i class="fas fa-pen"></i>
                                    </a>


                                    {{-- ATIVAR / DESATIVAR --}}
                                    @if($categoria->estado == 0)

                                        <form
                                            action="{{ route('categorias.ativar', $categoria->id) }}"
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
                                            action="{{ route('categorias.desativar', $categoria->id) }}"
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
                                        action="{{ route('categorias.destroy', $categoria->id) }}"
                                        method="POST"
                                        onsubmit="return confirm('Tem certeza que deseja eliminar esta categoria?');"
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
                            <i class="fas fa-layer-group"></i>
                        </div>

                        <h3>Nenhuma categoria registada</h3>

                        <p>
                            Ainda não existem categorias cadastradas no sistema.
                        </p>

                    </div>

                @endif

            </div>

        </div>

    </div>

</div>

@endsection