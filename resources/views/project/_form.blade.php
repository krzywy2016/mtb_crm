<div class="col-12 m-b-sm">
    <div class="ibox-content">
        <div class="col-12 m-b-sm">
            <label>Nazwa projektu*</label>
            <input type="text" class="form-control" name="name" value="{{ old('name', $project->name) }}">
        </div>
        <div class="col-12 m-b-sm">
            <label>Klient</label>
            <div class="row">
                <div class="col-11">
                    <select type="text" class="form-control" name="client_id">
                        <option value=""></option>
                        @foreach ($clients as $client)
                            <option value="{{ $client->id }}"
                                {{ old('client_id', $project->client_id) == $client->id ? 'selected' : '' }}>{{ $client->name }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="col-1">
                    <button class="btn btn-default"><i class="fa fa-trash text-danger" aria-hidden="true"></i></button>
                </div>
            </div>
            <button type="button" class="btn btn-default btn-xs m-t-xs" id="multi-add"><i class="fa fa-plus text-info" aria-hidden="true"></i> Dodaj kolejny</button>
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
<div class="col-12 m-b-sm mb-0">
    <div class="ibox-title">
        <h5>Wybierz logo</h5>
    </div>
</div>
<div class="col-12 mb-0 m-b-sm">
    <div class="ibox-content">
        <div>
            <input type="radio" checked="" class="m-r" name="radio1" id="">
            <img src="https://www.element61.be/sites/default/files/styles/max_325x325/public/img_company_logos/CNH%20Industrial%20logo.png.webp?itok=5yEvd3vE" alt="" height="50">
        </div>
        <hr>
        <div>
            <input type="radio" class="m-r" name="radio1" id="">

            <img src="https://upload.wikimedia.org/wikipedia/commons/thumb/1/1b/SteyrTraktorenLogo_ab_2007.svg/1200px-SteyrTraktorenLogo_ab_2007.svg.png" alt="" height="50">
        </div>
        <hr>
        <div>
            <input type="radio" class="m-r" name="radio1" id="">

            <img src="https://www.newholland.com/PublishingImages/Landing/btn_agriculture.png" alt="" height="50">
        </div>
    </div>
</div>
