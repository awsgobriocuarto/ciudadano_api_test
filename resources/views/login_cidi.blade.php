@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Login en Cidi</div>

                <div class="card-body">
                    <a href="{{ $data->url }}?cidi={{ $data->cidi }}" class="btn btn-primary">Ingresar</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection