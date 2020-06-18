@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2 card">
                <div class="card-body">
                    <div class="card-title">Produits</div>

                    <div class="card-text">

                        <router-view name="produitsIndex"></router-view>
                        <router-view></router-view>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
