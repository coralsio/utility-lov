@extends('layouts.crud.create_edit')

@section('content_header')
    @component('components.content_header')
        @slot('page_title')
            {{ $title_singular }}
        @endslot

        @slot('breadcrumb')
            {{ Breadcrumbs::render('utility_listOfValue_create_edit') }}
        @endslot
    @endcomponent
@endsection

@section('content')
    @parent
    @component('components.box')
        {!! CoralsForm::openForm($listOfValue) !!}
        <div class="row">
            <div class="col-md-4">
                {!! CoralsForm::text('code','utility_lov::attributes.listOfValue.code', false, $listOfValue->code, ['help_text' => 'Utility::attributes.listOfValue.code_help']) !!}
                {!! CoralsForm::text('label',trans('utility_lov::attributes.listOfValue.label'), false, $listOfValue->label) !!}
                {!! CoralsForm::textarea('value','utility_lov::attributes.listOfValue.value', true) !!}
                {!! CoralsForm::number('display_order','utility_lov::attributes.listOfValue.display_order') !!}
            </div>
            <div class="col-md-4">
                {!! CoralsForm::select('module','Utility::attributes.listOfValue.module', \Utility::getUtilityModules(), false, null, [], 'select2') !!}
                {!! CoralsForm::select('parent_id','Utility::attributes.listOfValue.parent', \ListOfValues::getParents(), false, null, [], 'select2') !!}
                {!! CoralsForm::radio('status','Corals::attributes.status', true, trans('Corals::attributes.status_options')) !!}
                {!! CoralsForm::checkbox('hidden','utility_lov::attributes.listOfValue.hidden', $listOfValue->hidden, true) !!}
                @include("Corals::key_value",[
                        "label"=>["key"=> trans("Corals::labels.key"), "value"=>trans("Corals::labels.value")],
                        "name"=>"properties",
                        "options"=>$listOfValue->properties ?? []
                        ])
            </div>
            <div class="col-md-6">
                @php
                    if($listOfValue->hasMedia($listOfValue->mediaCollectionName)){
                        $media =  $listOfValue->thumbnail;
                        $hasMedia = true;
                    }else{
                        $media =   $listOfValue->getProperty('thumbnail_link');
                    }
                @endphp

                @if($media)
                    <img src="{{ $media }}" class="img-responsive" style="max-width: 100%;"
                         alt="Thumbnail"/>
                    <br/>
                    @if(isset($hasMedia))
                        {!! CoralsForm::checkbox('clear', 'Utility::attributes.listOfValue.clear') !!}
                    @endif
                @endif
                {!! CoralsForm::file('thumbnail', 'utility_lov::attributes.listOfValue.thumbnail') !!}

            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                {!! CoralsForm::formButtons() !!}
            </div>
        </div>
        {!! CoralsForm::closeForm($listOfValue) !!}
    @endcomponent
@endsection
