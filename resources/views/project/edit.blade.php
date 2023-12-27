@extends('layouts.mbt')
@section('content')
    <div class="col-lg-6">
        <div class="ibox ">
            <div class="ibox-title">
                <h5>Edytuj projekt</h5>
            </div>
            <form method="post" action="{{ route('project-update', $project->id) }}" enctype="multipart/form-data">
                @csrf
                <div class="row form-row m-b">
                    @include('project._form')
                </div>
                <a href="{{ route('project-index') }}" class="btn btn-default">Powrót</a>
                <button type="submit" class="btn btn-primary">Zapisz</a>
            </form>
        </div>
    </div>
@endsection

@section('scripts')
    <script>
        $(document).ready(function() {
            var wrapper = $("#input_fields_wrap");
            var add_button = $(".add_field_button");
            var $select = $('.assigment');
            var removeButton = $(".remove_field");

            add_button.click(function(e) {
                e.preventDefault();
                var $clone = $select.clone();
                $clone.find('select').val('');
                $clone.appendTo(wrapper);
            });

            $(wrapper).on("click", ".remove_field_assigment", function(e) {
                e.preventDefault();
                if (wrapper.find('.assigment').length > 1) {
                    $(this).closest('.assigment').remove();
                } else {
                    //
                }
            });
        });
    </script>
@endsection
