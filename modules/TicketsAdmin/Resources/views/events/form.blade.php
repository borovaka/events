<div class="form-group">
    {!! Form::label('event_name','Name:') !!}
    {!! Form::text('event_name',null,['class'=>'form-control']) !!}
</div>

<div class="form-group">
    {!! Form::label('event_desc','Description:') !!}
    {!! Form::textarea('event_desc',null,['class'=>'form-control']) !!}
</div>

<div class="form-group">
    {!! Form::label('start_date','Start:') !!}
    {!! Form::datetime('start_date',null,['class'=>'form-control']) !!}
</div>

<div class="form-group">
    {!! Form::label('quantity','Quantity:') !!}
    {!! Form::text('quantity',null,['class'=>'form-control']) !!}
</div>
<div class="form-group">
    {!! Form::label('price','Price:') !!}
    {!! Form::text('price',null,['class'=>'form-control']) !!}
</div>
<div class="form-group">
    {!! Form::label('discount','Discount:') !!}
    {!! Form::text('discount',null,['class'=>'form-control']) !!}
</div>

<div class="form-group">
    {!! Form::label('promocode','Promocode:') !!}
    {!! Form::text('promocode',null,['class'=>'form-control']) !!}
</div>

<div class="form-group">
    {!! Form::submit($submitText,['class'=>'btn btn-primary form-control']) !!}
</div>