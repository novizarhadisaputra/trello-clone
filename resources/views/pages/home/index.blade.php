@extends('layouts.before-login')
@section('content')
    <section class="pt-3">
        <div class="container-fluid">
            <div class="row">
                @include('components.cards.add-card')
            </div>
        </div>
    </section>
    <section class="pt-5">
        <div class="container">
            <div class="row">
                @foreach ($cards as $i => $card)
                    @include('components.cards.list')
                    @include('components.modals.edit-card')
                    @include('components.modals.add-task')
                @endforeach
            </div>
        </div>

    </section>


@endsection
