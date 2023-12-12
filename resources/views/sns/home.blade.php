@extends('layouts.header-' . (Agent::isMobile() ? 'phone' : 'pc-sns'))
<!-- resources/views/home.blade.php -->

@extends('sns.snsapp')

@section('title', 'SNSトップページ')



@extends('layouts.snsfooter')