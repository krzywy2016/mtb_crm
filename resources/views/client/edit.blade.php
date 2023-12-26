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
                                <img style="max-height:50px" src="{{ Storage::url($client->logo) }}">
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
                    <button class="btn btn-xs m-b text-light pb-1" style="background-color: #d2798d;" data-toggle="modal" data-target="#addLogo">Dodaj logo dodatkowe</button>
                </div>
            </div>
            <div class="ibox-content"> 
                @if (count(json_decode($client->extra_logos, true)) > 0)
                    @foreach (json_decode($client->extra_logos) as $extraLogo)
                        <div>
                            <button class="btn btn-danger btn-xs m-r tooltip-more delete-warning" title="Usuń" data-original-title="Usuń" onclick="confirmDelete('{{ $extraLogo }}')"> <i class="fa fa-trash" aria-hidden="true"></i></button>
                            <img src="{{ Storage::url($extraLogo) }}" alt="" height="50">
                        </div>
                        <hr>
                    @endforeach
                @else
                    <p class="text-center">Brak dodanego loga dodatkowego</p>
                @endif
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
                <form class="modal-body" method="post" action="{{ route('client-add-extra-logo', $client->id) }}" enctype="multipart/form-data" id="addLogoForm">
                    @csrf
    
                    <label for="inputGroupFile01">Logo dodatkowe</label>
                    <div class="custom-file m-b-sm">
                        <input id="inputGroupFile01" type="file" class="custom-file-input" name="extra_logo" onchange="handleFileChange()">
                        <label class="custom-file-label" for="inputGroupFile01" id="fileLabel">Wybierz plik</label>
                    </div>
    
                    <small id="fileFormatInfo">Dozwolone formaty plików: .jpg, .png, .jpeg, .svg</small>
                    <small class="text-danger" id="fileError" style="display: none;">Logo dodatkowe musi być plikiem typu jpg, jpeg, png, svg.</small>
    
                    <div class="modal-footer">
                        <button type="button" class="btn btn-white" data-dismiss="modal">Anuluj</button>
                        <button type="submit" class="btn btn-primary">Zapisz</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    {{-- ./ Modal --}}

    <script>
        function confirmDelete(extraLogoPath) {
            swal({
                title: "Usunąć?",
                text: "Elementu nie będzie się dało odzyskać!",
                type: "warning",
                showCancelButton: true,
                confirmButtonColor: "#DD6B55",
                confirmButtonText: "Usuń",
                cancelButtonText: "Nie usuwaj",
                closeOnConfirm: false,
                closeOnCancel: true
            },
            function () {
                window.location.href = '/client/{{ $client->id }}/remove-extra-logo/' + extraLogoPath;
            });
        }
    </script>

    <script>
        function handleFileChange() {
            var input = document.getElementById('inputGroupFile01');
            var label = document.getElementById('fileLabel');
            var formatInfo = document.getElementById('fileFormatInfo');
            var error = document.getElementById('fileError');

            if (input.files.length > 0) {
                var fileName = input.files[0].name;
                label.innerHTML = fileName;

                var allowedExtensions = ['.jpg', '.jpeg', '.png', '.svg'];
                var fileExtension = fileName.substring(fileName.lastIndexOf('.')).toLowerCase();

                if (allowedExtensions.indexOf(fileExtension) === -1) {
                    formatInfo.style.display = 'none';
                    error.style.display = 'block';
                }
            } else {
                label.innerHTML = 'Wybierz plik';
                error.style.display = 'block';
            }
        }
    </script>
@endsection
