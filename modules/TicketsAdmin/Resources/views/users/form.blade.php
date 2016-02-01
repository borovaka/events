<div class="form-group">
    {!! Form::label('name','Name:') !!}
    {!! Form::text('name',null,['class'=>'form-control']) !!}
</div>

<div class="form-group">
    {!! Form::label('email','Email:') !!}
    {!! Form::text('email',null,['class'=>'form-control']) !!}
</div>

<div class="form-group">
    {!! Form::label('type','Type:') !!}
    {!! Form::select('type',App\User::$roleNames, $defaultType ,['class'=>'form-control']) !!}
</div>

<div class="form-group">
    {!! Form::label('password','Passwrod:') !!}
    {!! Form::password('password',['class'=>'form-control']) !!}
</div>
@if(\Request::route()->getName() === 'admin.users.edit')
<div class="form-group">
    {!! Form::label('apikey','ApiKEY:') !!}
    {!! Form::text('apikeystring',null,['class'=>'form-control','readonly'=>'readonly']) !!}
</div>
<div class="form-group">
    {!! link_to_route('admin.users.apikey','Generate KEY',[$user->id],['class'=>'btn btn-primary form-control']) !!}
</div>
@endif
<div class="form-group">
    {!! Form::submit($submitText,['class'=>'btn btn-primary form-control']) !!}
</div>