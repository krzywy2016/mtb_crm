<div class="col-12 m-b-sm">
    <div class="ibox-content">
        <div class="col-12 m-b-sm">
            <label>Nazwa projektu*</label>
            <input type="text" class="form-control" name="name" value="{{ old('name', $project->name) }}">
        </div>
        <div class="col-12 m-b-sm">
            <label>Klient</label>
            <div id="input_fields_wrap">
                @if($mode == 'edit')
                    @foreach ($project->clients as $assigment)
                        <div class="row mt-2 assigment">
                            <div class="col-11">
                                <select type="text" class="form-control" name="client_id[]">
                                    @foreach ($clients as $clientOption)
                                    <option value="{{ $clientOption->id }}"
                                        {{ $assigment->id == $clientOption->id ? 'selected' : '' }}>{{ $clientOption->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-1">
                                <button class="btn btn-default remove_field_assigment"><i class="fa fa-trash text-danger" aria-hidden="true"></i></button>
                            </div>
                        </div>
                    @endforeach
                @endif
                @if($mode != 'edit')
                <div class="row mt-2 client">
                    <div class="col-11">
                        <select type="text" class="form-control" name="client_id[]">
                            <option value=""></option>
                            @foreach ($clients as $clientOption)
                                <option value="{{ $clientOption->id }}"
                                    {{ old("client_id", $project->client_id) == $clientOption->id ? 'selected' : '' }}>{{ $clientOption->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-1">
                        <button class="btn btn-default remove_field"><i class="fa fa-trash text-danger" aria-hidden="true"></i></button>
                    </div>
                </div>
                @endif
            </div>     
            <button type="button" class="btn btn-default btn-xs m-t-xs add_field_button"><i class="fa fa-plus text-info" aria-hidden="true"></i> Dodaj kolejny</button>
        </div>
        <div class="col-12 m-b-sm">
            <label>Termin</label>
            <input type="date" class="form-control" name="deadline" value="{{ old('deadline', $project->deadline) }}">
        </div>
        <div class="col-12 m-b-sm">
            <label>Opis projektu</label>
            <textarea class="form-control" name="description">{{ old('description', $project->description) }}</textarea>
        </div>
    </div>
</div>
@if($mode == 'edit')
<div class="col-12 m-b-sm mb-0">
    <div class="ibox-title">
        <h5>Wybierz logo</h5>
    </div>
</div>
<div class="col-12 mb-0 m-b-sm">
    <div class="ibox-content">
        @foreach ($clients as $client)
            <div class="pt-1">
                <input type="radio" name="logo" value="{{ $client->logo }}" id="main_logo_{{ $client->id }}"
                    {{ $project->logo == $client->logo ? 'checked' : '' }}>
                <label for="main_logo_{{ $client->id }}">
                    <img src="{{ Storage::url($client->logo) }}" alt="{{ $client->name }}" height="50">
                </label>

                @if (!empty($client->extra_logos))
                    @foreach (json_decode($client->extra_logos) as $extraLogo)
                        <div class="pt-1">
                            <input type="radio" name="logo" value="{{ $extraLogo }}" id="extra_logo_{{ $client->id }}_{{ $loop->index }}"
                                {{ $project->logo == $extraLogo ? 'checked' : '' }}>
                            <label for="extra_logo_{{ $client->id }}_{{ $loop->index }}">
                                <img src="{{ Storage::url($extraLogo) }}" alt="{{ $client->name }}" height="50">
                            </label>
                        </div>
                    @endforeach
                @endif
            </div>
        @endforeach
    </div>
</div>
@endif