@extends('twill::layouts.settings', [
    'contentFieldsetLabel' => 'Socials',
  
])

@section('contentFields')
    @formField('input', [
        'label' => 'Facebook',
        'name' => 'facebook_url'
    ])
    @formField('input', [
        'label' => 'Instagram',
        'name' => 'instagram_url'
    ])
    @formField('input', [
        'label' => 'Twitter',
        'name' => 'twitter_url'
    ])
    @formField('input', [
        'label' => 'Youtube',
        'name' => 'youtube_url'
    ])
    @formField('input', [
        'label' => 'LinkedIn',
        'name' => 'linkedin_url'
    ])
    @formField('input', [
        'label' => 'Tiktok',
        'name' => 'tiktok_url'
    ])
@stop