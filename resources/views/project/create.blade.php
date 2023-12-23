@extends('layouts.mbt')
@section('content')
    <div class="col-lg-6">
        <div class="ibox ">
            <div class="ibox-title">
                <h5>Dodaj projekt</h5>
            </div>
            <form {{-- class="ibox-content" --}} method="post" action="{{ route('project-store') }}" enctype="multipart/form-data">
                @csrf
                <div class="row form-row m-b mb-0">
                    @include('project._form')
                </div>
                <div class="ibox-content">
                    <a href="{{ route('project-index') }}" class="btn btn-default">Powrót</a>
                    <button type="submit" class="btn btn-primary">Zapisz</button>
                </div>
            </form>
        </div>
    </div>
@endsection
