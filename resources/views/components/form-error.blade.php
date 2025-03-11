@props(['name'])

@error($name)
    <div 
      {{$attributes->merge(["class"=>"ml-4 text-red-500 text-sm"])}}
    > 
      {{ $message }} 
    </div>
@enderror
