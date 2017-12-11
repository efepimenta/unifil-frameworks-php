<div class="row">

    <div class="col-md-6">
        <div class="form-grup">
            {!! Form::label('title','Título',['class'=>'control-label']) !!}
            {!! Form::text('title', null, ['class'=>'form-control']) !!}
        </div>
    </div>
    <div class="col-md-3">
        {!! Form::label('status','Status',['class'=>'control-label']) !!}
        {!! Form::number('status', null, ['class'=>'form-control']) !!}
    </div>

</div>

<div class="row">
    <div class="col-md-6">
        {!! Form::label('description','Descricao',['class'=>'control-label']) !!}
        {!! Form::textarea('description', null, ['class'=>'form-control']) !!}
    </div>
</div>
