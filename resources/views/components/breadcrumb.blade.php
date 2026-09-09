@props([
    'title' => '',
    'items' => []
])

<section class="page-header">

    <div class="container">

        <div class="page-header-content">

            <div>

                <div class="breadcrumb-wrapper">

                    <a href="{{ Route::has('dashboard') ? route('dashboard') : url('/') }}">
                        <i class="fas fa-home"></i>
                        Início
                    </a>

                    @foreach($items as $item)

                        <span class="breadcrumb-separator">
                            <i class="fas fa-chevron-right"></i>
                        </span>

                        @if(isset($item['url']) && $item['url'])
                            <a href="{{ $item['url'] }}">
                                {{ $item['label'] }}
                            </a>
                        @else
                            <span class="breadcrumb-current">
                                {{ $item['label'] }}
                            </span>
                        @endif

                    @endforeach

                </div>

                <h1>
                    {{ $title }}
                </h1>

            </div>

        </div>

    </div>

</section>


<style>

    .page-header {
        background: #FFFFFF;
        border-bottom: 1px solid rgba(0, 59, 115, 0.08);
        padding: 25px 0;
    }

    .page-header-content {
        display: flex;
        align-items: center;
        justify-content: space-between;
    }

    .breadcrumb-wrapper {
        display: flex;
        align-items: center;
        flex-wrap: wrap;
        gap: 9px;

        margin-bottom: 9px;

        font-size: 12px;
    }

    .breadcrumb-wrapper a {
        color: #003B73;
        text-decoration: none;
        font-weight: 600;

        transition: color 0.2s ease;
    }

    .breadcrumb-wrapper a:hover {
        color: #F57C00;
    }

    .breadcrumb-wrapper a i {
        margin-right: 4px;
    }

    .breadcrumb-separator {
        color: #003B73;
        opacity: 0.45;
        font-size: 9px;
    }

    .breadcrumb-current {
        color: #003B73;
        opacity: 0.65;
        font-weight: 500;
    }

    .page-header h1 {
        color: #003B73;
        font-size: 26px;
        font-weight: 750;
        margin: 0;
    }

    @media (max-width: 575.98px) {

        .page-header {
            padding: 20px 0;
        }

        .page-header h1 {
            font-size: 22px;
        }

    }

</style>