@extends('layouts.header-' . (Agent::isMobile() ? 'phone' : 'pc'))

@extends('recipe.recipepost-' . (Agent::isMobile() ? 'phone' : 'pc'))

@extends('layouts.footer')