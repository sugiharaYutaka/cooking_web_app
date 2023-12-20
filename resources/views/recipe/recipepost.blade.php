@extends('layouts.header-' . (Agent::isMobile() ? 'phone' : 'pc-sns'))

@extends('recipe.recipepost-' . (Agent::isMobile() ? 'phone' : 'pc'))

@extends('layouts.footer')