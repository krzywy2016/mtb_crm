@extends('layouts.mbt')
@section('content')
    <div class="col-lg-6">
        <div class="ibox ">
            <div class="ibox-title">
                <h5>Dodaj projekt</h5>
            </div>
            <form method="post" action="{{ route('project-store') }}" enctype="multipart/form-data">
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

@section('scripts')
    <script>
        $(document).ready(function() {
            var wrapper = $("#input_fields_wrap");
            var add_button = $(".add_field_button");
            var $select = $('.client');
            var removeButton = $(".remove_field");

            add_button.click(function(e) {
                e.preventDefault();
                var $clone = $select.clone();
                $clone.find('select').val('');
                $clone.appendTo(wrapper);
            });

            $(wrapper).on("click", ".remove_field", function(e) {
                e.preventDefault();
                if (wrapper.find('.client').length > 1) {
                    $(this).closest('.client').remove();
                } else {
                    //
                }
            });
        });
    </script>
@endsection
