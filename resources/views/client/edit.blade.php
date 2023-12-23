@extends('layouts.mbt')
@section('content')
    <div class="col-lg-6">
        <div class="ibox ">
            <div class="ibox-title">
                <h5>Edytuj klienta</h5>
            </div>
            <form class="ibox-content" method="post" action="{{ route('client-update', $client->id) }}" enctype="multipart/form-data">
                @csrf
                <div class="row form-row m-b">
                    @include('client._form')
                    <div class="col-12 m-b-sm">
                        @if ($client->logo)
                            <label>Aktualne logo</label>
                            <div>
                                <img style="max-width:100%" src="{{ Storage::url($client->logo) }}">
                            </div>
                        @endif
                        <label class="m-t">Zmień logo</label>
                        <input type="file" class="form-control" name="logo">
                    </div>
                </div>
                <a href="{{ route('client-index') }}" class="btn btn-default">Powrót</a>
                <button type="submit" class="btn btn-primary">Zapisz</a>
            </form>
        </div>
    </div>
    <div class="col-lg-6">
        <div class="ibox ">
            <div class="ibox-title">
                <h5>Loga dodatkowe</h5>
                <div class="ibox-tools">
                    <button class="btn btn-xs m-b text-light" style="background-color: #d2798d;" data-toggle="modal" data-target="#addLogo">Dodaj logo dodatkowe</button>
                </div>
            </div>
            
            <div class="ibox-content">

                <!-- Brak dodatkowych logo -->
                
                <div>
                    <button class="btn btn-danger btn-xs m-r tooltip-more delete-warning" title="" data-original-title="Usuń"><i class="fa fa-trash" aria-hidden="true"></i></button>

                    <img src="https://upload.wikimedia.org/wikipedia/commons/thumb/1/1b/SteyrTraktorenLogo_ab_2007.svg/1200px-SteyrTraktorenLogo_ab_2007.svg.png" alt="" height="50">
                </div>
                <hr>
                <div>
                    <button class="btn btn-danger btn-xs m-r tooltip-more delete-warning" title="" data-original-title="Usuń"><i class="fa fa-trash" aria-hidden="true"></i></button>

                    <img src="https://www.newholland.com/PublishingImages/Landing/btn_agriculture.png" alt="" height="50">
                </div>
            </div>
        </div>
    </div>
    {{-- Modal --}}
    <div class="modal inmodal" id="addLogo" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content animated fadeIn">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span><span class="sr-only">Close</span></button>
                    <h4 class="modal-title">Dodaj logo dodatkowe</h4>
                </div>
                <div class="modal-body">
    
                    <label for="">Logo dodatkowe</label>
                    <div class="custom-file m-b-sm">
                        <input id="inputGroupFile01" type="file" class="custom-file-input">
                        <label class="custom-file-label" for="inputGroupFile01">Wybierz plik</label>
                        <small>Dozwolone formaty plików: .jpg, .png, .jpeg, .svg</small> <br>
                        <small class="text-danger">Logo dodatkowe musi być plikiem typu jpg, jpeg, png, svg.</small>
                    </div>
    
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-white" data-dismiss="modal">Anuluj</button>
                    <button type="button" class="btn btn-primary" data-dismiss="modal">Zapisz</button>
                </div>
            </div>
        </div>
    </div>
    {{-- ./ Modal --}}
@endsection
