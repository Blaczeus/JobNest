@props(['name'])

@error($name)
    <div 
      {{$attributes->merge(["class"=>"text-red-500 text-sm"])}}
    > 
      {{ $message }} 
    </div>
@enderror
