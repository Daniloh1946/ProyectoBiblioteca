<div class="box box-info padding-1">
    <div class="box-body">
        
        <div class="form-group">
            {{ Form::label('titulo') }}
            {{ Form::text('titulo', $revista->titulo, ['class' => 'form-control' . ($errors->has('titulo') ? ' is-invalid' : ''), 'placeholder' => 'Titulo']) }}
            {!! $errors->first('titulo', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('tipo de revista') }}
            {{ Form::select('tipo_id',$tipo, $revista->tipo_id, ['class' => 'form-control' . ($errors->has('tipo_id') ? ' is-invalid' : ''), 'placeholder' => 'Selecione el tipo de Revista']) }}
            {!! $errors->first('tipo_id', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('fecha') }}
            {{ Form::text('fecha', $revista->fecha, ['class' => 'form-control' . ($errors->has('fecha') ? ' is-invalid' : ''), 'placeholder' => 'Fecha']) }}
            {!! $errors->first('fecha', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('num_paginas') }}
            {{ Form::text('num_paginas', $revista->num_paginas, ['class' => 'form-control' . ($errors->has('num_paginas') ? ' is-invalid' : ''), 'placeholder' => 'Num Paginas']) }}
            {!! $errors->first('num_paginas', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('num_ejemplares') }}
            {{ Form::text('num_ejemplares', $revista->num_ejemplares, ['class' => 'form-control' . ($errors->has('num_ejemplares') ? ' is-invalid' : ''), 'placeholder' => 'Num Ejemplares']) }}
            {!! $errors->first('num_ejemplares', '<div class="invalid-feedback">:message</div>') !!}
        </div>

    </div>
    <div class="box-footer mt20">
        <button type="submit" class="btn btn-primary">Submit</button>
    </div>
</div>