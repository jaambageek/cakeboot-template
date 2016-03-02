<?php
	return [
		'button'              => '<button class="btn btn-{{class}}" {{attrs}}>{{text}}</button>',
		'checkbox'            => '<input type="checkbox" value="{{value}}" name="{{name}}" {{attrs}} />',
		'checkboxFormGroup'   => '<div class="checkbox-inline">{{label}}</div>',
		//'checkboxWrapper'     => '<label class="checkbox-inline">{{label}}</label>',
		'dateWidget'          => '<div class="row"><div class="col-sm-2 lead">{{label}}</div><div class="col-sm-2">{{month}}</div><div class="col-sm-1">{{day}}</div><div class="col-sm-1">{{year}}</div><div class="col-sm-1 text-center lead"> - </div><div class="col-sm-1">{{hour}}</div><div class="col-sm-1 text-center lead"> : </div><div class="col-sm-1">{{minute}}</div><div class="col-sm-1">{{meridian}}</div></div>',
		//'error'               => '{{content}}',
		//'errorList'           => '{{content}}',
		//'errorItem'           => '{{text}}',
		//'file'                => '{{name}}, {{attrs}}',
		'formGroup'           => '{{label}}{{input}}',
		'formStart'           => '<form class="{{class}}" {{attrs}}>',
		'formEnd'             => '</form>',
		//'hiddenBlock'         => '{{content}}',
		'input'               => '<input type="{{type}}" class="form-control" placeholder="{{placeholder}}" name="{{name}}" {{attrs}} />',
		'inputContainer'      => '<div class="form-group">{{content}}</div>',
		'inputContainerError'  => '<div class="form-group has-error">{{content}}<span class="help-block">{{error}}</span></div>',
		//'inputSubmit'         => '{{type}}, {{attrs}}',
		//'label'               => '{{attrs}}, {{text}}, {{hidden}}, {{input}}',
		//'nestingLabel'        => '{{hidden}}, {{attrs}}, {{input}}, {{text}}',
		//'legend'              => '{{text}}',
		//'option'              => '{{value}}, {{attrs}}, {{text}}',
		//'optgroup'            => '{{label}}, {{attrs}}, {{content}}',
		'radio'               => '<input type="radio" {{attrs}} name="{{name}}" value="{{value}}" />',
		'radioWrapper'        => '<div class="radio-inline">{{input}} {{label}}</div>',
		'select'              => '<select class="form-control" {{attrs}} name="{{name}}">{{content}}</select>',
		'selectMultiple'      => '<select multiple class="form-control" name="{{name}}" {{attrs}}>{{content}}</select>',
		//'submitContainer'     => '{{content}}',
		'textarea'            => '<textarea class="form-control" name="{{name}}" {{attrs}}>{{value}}</textarea>'
	];
?>